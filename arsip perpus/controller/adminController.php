<?php

class adminController
{
    private $model;

    public function __construct()
    {
        $this->model = new adminModel();
    }

    public function tambahBuku()
    {
        require_once("View/admin/viewBuku.php");
    }

    public function editbuku()
    {
        $id_buku = $_POST['id_buku'];
        $data = $this->model->getDaftarBuku($id_buku);
        $dataK = $this->model->getKategori();
        $dataP = $this->model->getPenulis();
        extract($data);
        extract($dataK);
        extract($dataP);
        require_once("View/admin/editbuku.php");
    }

    public function editpenulis()
    {
        $id_penulis = $_POST['id_penulis'];
        $data = $this->model->getPenulis($id_penulis);
        extract($data);
        require_once("View/admin/editpenulis.php");
    }

    public function editkategori()
    {
        $id = $_POST['id_kategori'];
        $data = $this->model->getKategori($id);
        extract($data);
        require_once("View/admin/editkategori.php");
    }

    public function daftarbuku()
    {
        $data = $this->model->getdaftarbuku();
        $dataK = $this->model->getKategori();
        $dataP = $this->model->getPenulis();
        extract($data);
        extract($dataK);
        extract($dataP);
        require_once("View/buku/daftarbukuAdmin.php");
    }

    public function daftarBukuById()
    {
        $id_buku = $_POST['id_buku'];
        $this->model->getDaftarBuku($id_buku);
    }

    // public function daftarpenerbit(){
    //     $data=$this->model->penerbit();
    //     extract($data);
    //     require_once("View/admin/daftarpenerbit.php");
    // }

    public function cektambahBuku()
    {
        $jenis_buku = $_POST['jenis_buku'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $kategori = $_POST['kategori'];
        $penulis = $_POST['penulis'];
        if ($this->model->prosesTambahBuku($jenis_buku, $penerbit, $tahun, $kategori, $penulis)) {
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=viewBuku&pesan=gagal");
        }
    }

    public function cekEditBuku()
    {
        $id_buku = $_POST['id_buku'];
        $jenis_buku = $_POST['jenis_buku'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $kategori = $_POST['kategori'];
        $penulis = $_POST['penulis'];
        if ($this->model->prosesEditBuku($jenis_buku, $penerbit, $tahun, $kategori, $penulis, $id_buku)) {
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=editBuku&pesan=gagal");
        }
    }

    public function deleteBuku()
    {
        $id_buku = $_GET['id_buku'];
        if ($this->model->prosesDeleteBuku($id_buku)) {
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        } else {
            echo "<script type='text/javascript'>
            alert('Buku Tidak Bisa Dihapus Karena Sedang Di Pinjam');
            window.location='index.php?page=admin&aksi=viewBuku';
            </script>";
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Gagal");
        }
    }

    public function daftarPenulis()
    {
        $data = $this->model->getPenulis();
        extract($data);
        require_once("View/admin/daftarpenulis.php");
    }

    public function cekTambahPenulis()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        if ($this->model->prosesTambahPenulis($nama, $email)) {
            header("location:index.php?page=admin&aksi=viewPenulis&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=viewPenulis&pesan=gagal");
        }
    }

    public function cekEditPenulis()
    {
        $id = $_POST['id_penulis'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        if ($this->model->prosesEditPenulis($nama, $email, $id)) {
            header("location:index.php?page=admin&aksi=viewPenulis&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=viewPenulis&pesan=gagal");
        }
    }

    public function deletePenulis()
    {
        $id_penulis = $_GET['id_penulis'];
        if ($this->model->prosesDeletePenulis($id_penulis)) {
            header("location:index.php?page=admin&aksi=viewPenulis&pesan=Berhasil");
        } else {
            echo "<script type='text/javascript'>
            alert('Penulis Tidak Bisa Dihapus');
            window.location='index.php?page=admin&aksi=viewPenulis';
            </script>";
        }
    }

    public function daftarKategori()
    {
        $data = $this->model->getKategori();
        extract($data);
        require_once("View/admin/daftarkategori.php");
    }

    public function cekTambahKategori()
    {
        $nama = $_POST['nama'];
        if ($this->model->prosesTambahKategori($nama)) {
            header("location:index.php?page=admin&aksi=viewKategori&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=viewKategori&pesan=gagal");
        }
    }

    public function cekEditKategori()
    {
        $id = $_POST['id_kategori'];
        $nama = $_POST['nama'];
        if ($this->model->prosesEditKategori($nama, $id)) {
            header("location:index.php?page=admin&aksi=viewKategori&pesan=Berhasil");
        } else {
            header("location:index.php?page=admin&aksi=viewKategori&pesan=gagal");
        }
    }

    public function deleteKategori()
    {
        $id_kategori = $_GET['id_kategori'];
        if ($this->model->prosesDeleteKategori($id_kategori)) {
            header("location:index.php?page=admin&aksi=viewKategori&pesan=Berhasil");
        } else {
            echo "<script type='text/javascript'>
            alert('Kategori Tidak Bisa Dihapus');
            window.location='index.php?page=admin&aksi=viewKategori';
            </script>";
        }
    }


    // public function cekTambahPenerbit(){
    //     $nama_penerbit = $_POST['nama_penerbit'];
    //     $tahun_terbit = $_POST['tahun_terbit'];
    //     if($this->model->prosesTambahPenerbit($nama_penerbit,$tahun_terbit)){
    //         header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
    //     }else{
    //         header("location:index.php?page=admin&aksi=tambahPenerbit&pesan=gagal");
    //     }
    // }

    // public function cekEditPenerbit(){
    //     $id_penerbit = $_GET['id_penerbit'];
    //     $nama_penerbit= $_POST['nama_penerbit'];
    //     $tahun_terbit = $_POST['tahun_terbit'];
    //     if($this->model->prosesEditPenerbit($nama_penerbit,$tahun_terbit,$id_penerbit)){
    //         header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
    //     }else{
    //         header("location:index.php?page=admin&aksi=editPenerbit&pesan=gagal");
    //     } 
    // }

    // public function deletePenerbit(){
    //     $id_penerbit = $_GET['id'];
    //     if($this->model->prosesDeletePenerbit($id_penerbit)){
    //         header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
    //     }else{
    //         header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Gagal");
    //     }
    // }
}

// $tes = new adminController;
// var_export($tes->editbuku());
// die;
