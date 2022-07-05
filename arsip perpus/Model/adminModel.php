<?php

class adminModel
{

    public function getdaftarbuku($id = null)
    {
        if ($id === null) {
            $sql = "SELECT buku.id_buku, buku.jenis_buku, buku.Penerbit, buku.tahun_terbit, kategori.nama_kategori, penulis.nama FROM buku JOIN kategori ON kategori.id_kategori = buku.id_kategori JOIN penulis ON penulis.id_penulis = buku.id_penulis";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                $hasil[] = $data;
            }
            return $hasil;
        } else {
            $sql = "SELECT buku.id_buku, buku.jenis_buku, buku.Penerbit, buku.id_kategori, buku.id_penulis, buku.tahun_terbit, kategori.nama_kategori, penulis.nama FROM buku JOIN kategori ON kategori.id_kategori = buku.id_kategori JOIN penulis ON penulis.id_penulis = buku.id_penulis WHERE id_buku=$id";
            $query = koneksi()->query($sql);

            $data = $query->fetch_array();
            return $data;
        }
    }



    public function prosesTambahBuku($jenis_buku, $penerbit, $tahun, $kategori, $penulis)
    {
        $sql = "insert into buku(jenis_buku, Penerbit, tahun_terbit, id_kategori, id_penulis) values ('$jenis_buku', '$penerbit','$tahun', $kategori, $penulis)";
        return koneksi()->query($sql);
    }



    public function prosesEditBuku($jenis_buku, $penerbit, $tahun, $kategori, $penulis, $id_buku)
    {
        $sql = "update buku set jenis_buku='$jenis_buku',Penerbit='$penerbit', tahun_terbit='$tahun', id_kategori=$kategori, id_penulis=$penulis where id_buku=$id_buku";
        return koneksi()->query($sql);
    }

    public function prosesDeleteBuku($id_buku)
    {
        $sql = "delete from buku where id_buku = $id_buku";
        return koneksi()->query($sql);
    }

    public function getPenulis($id = null)
    {
        if ($id === null) {
            $sql = "SELECT * FROM penulis";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                $hasil[] = $data;
            }
            return $hasil;
        } else {
            $sql = "SELECT * FROM penulis WHERE id_penulis=$id";
            $query = koneksi()->query($sql);

            $data = $query->fetch_array();
            return $data;
        }
    }


    public function prosesTambahPenulis($nama, $email)
    {
        $sql = "insert into penulis(nama, email) values ('$nama', '$email')";
        return koneksi()->query($sql);
    }

    public function prosesEditPenulis($nama, $email, $id_penulis)
    {
        $sql = "update penulis set nama='$nama', email='$email' where id_penulis=$id_penulis";
        return koneksi()->query($sql);
    }

    public function prosesDeletePenulis($id_penulis)
    {
        $sql = "delete from penulis where id_penulis = $id_penulis";
        return koneksi()->query($sql);
    }

    public function getKategori($id = null)
    {
        if ($id === null) {
            $sql = "SELECT * FROM kategori";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                $hasil[] = $data;
            }
            return $hasil;
        } else {
            $sql = "SELECT * FROM kategori WHERE id_kategori=$id";
            $query = koneksi()->query($sql);

            $data = $query->fetch_array();
            return $data;
        }
    }

    public function prosesTambahKategori($nama)
    {
        $sql = "insert into kategori(nama_kategori) values ('$nama')";
        return koneksi()->query($sql);
    }

    public function prosesEditKategori($nama, $id_kategori)
    {
        $sql = "update kategori set nama_kategori='$nama' where id_kategori=$id_kategori";
        return koneksi()->query($sql);
    }

    public function prosesDeleteKategori($id_kategori)
    {
        $sql = "delete from kategori where id_kategori = $id_kategori";
        return koneksi()->query($sql);
    }
}
// $tes = new adminModel;
// var_export($tes->getKategori());
// die;