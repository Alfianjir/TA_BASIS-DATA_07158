<?php

class authController
{
    private $model;

    public function __construct()
    {
        $this->model = new authModel();
    }

    public function loginAdmin()
    {
        require_once("View/auth/loginAdmin.php");
    }

    public function authAdmin()
    {
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAdmin($nama, $password);
        if ($data) {
            $_SESSION['role'] = 'admin';
            $_SESSION['admin'] = $data;
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        } else {
            echo "<script type='text/javascript'>
            alert('Username atau Password Anda Salah');
            window.location='index.php?page=auth&aksi=loginAdmin';
            </script>";
            //header("location:index.php?page=auth&aksi=loginAdmin&pesan=Gagal Login");
        }
    }

    public function logout()
    {
        session_destroy();
        header("location:index.php?page=auth&aksi=loginAdmin&pesan=Berhasil Logout");
    }
}
