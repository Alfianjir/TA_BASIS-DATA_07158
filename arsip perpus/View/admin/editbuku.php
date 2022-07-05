<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Edit Buku</h2>
            </div>
            <div class="card-body">
                <form action="index.php?page=admin&aksi=cekEditBuku" method="POST">
                    <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Jenis Buku</label>
                        <input type="text" class="form-control" name="jenis_buku" value="<?= $data['jenis_buku'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="<?= $data['Penerbit'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="date" class="form-control" name="tahun" value="<?= $data['tahun_terbit'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" aria-label="Default select example">
                            <option selected value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                            <?php foreach ($dataK as $row) : ?>
                                <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <select name="penulis" class="form-select" aria-label="Default select example">
                            <option selected value="<?= $data['id_penulis'] ?>"><?= $data['nama'] ?></option>
                            <?php foreach ($dataP as $row) : ?>
                                <option value="<?= $row['id_penulis'] ?>"><?= $row['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-dark btn-block">Edit</button>
                        <a href="index.php?page=admin&aksi=viewBuku" class="btn btn-dark  btn-block">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>