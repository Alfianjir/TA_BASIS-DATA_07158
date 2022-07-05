<?php

// Koneksi
require_once("koneksi.php");

/**
 * Memanggil Model
 */
require_once("Model/authModel.php");
require_once("Model/adminModel.php");
// require_once("Model/anggotaModel.php");


/**
 * Memanggil Controller
 */
require_once("controller/authController.php");
require_once("controller/adminController.php");
// require_once("controller/anggotaController.php");


//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {

    session_start();

    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    if ($page == "auth") {
        $auth = new authController();
        if ($aksi == 'loginAdmin') {
            $auth->loginAdmin();
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else if ($aksi == 'daftarAnggota') {
            $auth->daftarAnggota();
        } else if ($aksi == 'inputAnggota') {
            $auth->inputAnggota();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "admin") {
        if ($_SESSION['role'] == 'admin') {
            $admin = new adminController();
            if ($aksi == 'viewBuku') {
                $admin->daftarbuku();
            } else if ($aksi == 'tambah') {
                $admin->tambahBuku();
            } else if ($aksi == 'cekTambahBuku') {
                $admin->cekTambahBuku();
            } else if ($aksi == 'editBuku') {
                $admin->editbuku();
            } else if ($aksi == 'cekEditBuku') {
                $admin->cekEditBuku();
            } else if ($aksi == 'deleteBuku') {
                $admin->deleteBuku();
            } else if ($aksi == 'viewPenulis') {
                $admin->daftarPenulis();
            } else if ($aksi == 'editPenulis') {
                $admin->editpenulis();
            } else if ($aksi == 'cekTambahPenulis') {
                $admin->cekTambahPenulis();
            } else if ($aksi == 'cekEditPenulis') {
                $admin->cekEditPenulis();
            } else if ($aksi == 'deletePenulis') {
                $admin->deletePenulis();
            } else if ($aksi == 'viewKategori') {
                $admin->daftarKategori();
            } else if ($aksi == 'editKategori') {
                $admin->editkategori();
            } else if ($aksi == 'cekTambahKategori') {
                $admin->cekTambahKategori();
            } else if ($aksi == 'cekEditKategori') {
                $admin->cekEditKategori();
            } else if ($aksi == 'deleteKategori') {
                $admin->deleteKategori();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location:index.php?page=auth&aksi=loginAdmin");
        }
    } else {
        echo "Halaman Tidak Ditemukan";
    }
} else {
    header("location: index.php?page=auth&aksi=loginAdmin"); //Jangan ada spasi habis location
}
