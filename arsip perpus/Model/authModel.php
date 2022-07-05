<?php

class authModel
{

    public function prosesAuthAdmin($nama, $password)
    {
        $sql = "select * from petugas where username='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}

// $tes = new authModel;
// var_export($tes->prosesinputAnggota('akue', 'laki-laki', '2001-03-02', 'Malang', '123', '0812345679'));
// die;