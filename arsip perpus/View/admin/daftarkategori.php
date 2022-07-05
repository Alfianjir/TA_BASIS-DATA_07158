<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

    <style>
        body {
            font-family: poppins;
            background-color: #F5FFFA;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom px-2" style="background-color: white">
        <a class="navbar-brand nav" href="#">Perpustakaan | </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link label text-reset text-decoration-none " href="index.php?page=admin&aksi=viewPenulis">Penulis</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link label" href="index.php?page=admin&aksi=viewKategori">Kategori</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link label" href="index.php?page=admin&aksi=viewBuku">Buku</a>
                </li>
            </ul>
        </div>
        <div class="form-inline">
            <a class=" btn btn-danger" href="index.php?page=auth&aksi=logout">Logout</a>
        </div>

    </nav>

    <!-- <center> -->
    <div class="container">
        <div class="card mt-5">
            <div class=" card-header text-center">
                <h2>Daftar Kategori</h2>
            </div>
            <div class="col-12 text-end px-4">
                <button type="button" class="btn btn-success rounded-pill mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <td class="label">No</td>
                            <td class="label">Nama Kategori</td>
                            <td class="label">Pilih</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td class="label text-center"><?= $no++ ?></td>
                                <td class="label"><?= $row['nama_kategori'] ?></td>
                                <td class="d-flex justify-content-center">

                                    <a class="text-decoration-none me-2" href="index.php?page=admin&aksi=deleteKategori&id_kategori=<?= $row['id_kategori'] ?>">
                                        <button type="submit" class="btn btn-danger shadow-none"><i class="bi bi-x-lg"></i></button>
                                    </a>

                                    <form action="index.php?page=admin&aksi=editKategori" method="POST">
                                        <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">
                                        <button type="submit" class="btn btn-warning text-white shadow-none"><i class="bi bi-pencil-square"></i></button>
                                    </form>

                                </td>

                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- </center> -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?page=admin&aksi=cekTambahKategori" method="POST">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label me-1">Kategori</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>