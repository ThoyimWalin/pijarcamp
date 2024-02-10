<?php

// panggil koneksi
include "koneksi.php";


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thoyim Walin - Tugas 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mt-4">
            <h3 class="text-center">CRUD - PHP MySQL</h3>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Data Produk
            </div>
            <div class="card-body ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover mt-3">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    // persiapan menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM produk");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['nama_produk'] ?></td>
                            <td class="text-center"><?= $data['keterangan'] ?></td>
                            <td class="text-center"><?= $data['harga'] ?></td>
                            <td class="text-center"><?= $data['jumlah'] ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning me-1 px-4" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="#" class="btn btn-danger ms-1 px-4" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal ubah-->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi.php">
                                        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label for="namaProduk" class="form-label">Nama Produk</label>
                                                <input type="text" class="form-control" name="tproduk" value="<?= $data['nama_produk'] ?>" id="namaProduk" placeholder="Masukkan nama Produk">
                                            </div>

                                            <div class="mb-3">
                                                <label for="ket" class="form-label">Keterangan</label>
                                                <select name="tketerangan" id="ket" class="form-select">
                                                    <option value="<?= $data['keterangan'] ?>"> <?= $data['keterangan'] ?></option>
                                                    <option value="Makanan">Makanan</option>
                                                    <option value="Minuman">Minuman</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga</label>
                                                <input type="number" class="form-control" name="tharga" value="<?= $data['harga'] ?>" id="harga" placeholder="Masukkan nama Produk">
                                            </div>

                                            <div class="mb-3">
                                                <label for="jml" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" name="tjumlah" value="<?= $data['jumlah'] ?>" id="jml" placeholder="Masukkan nama Produk">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal ubah-->

                        <!-- Awal Modal hapus-->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi.php">
                                        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                                        <div class="modal-body">

                                            <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
                                                <span class="text-danger"><?= $data['keterangan'] ?> - <?= $data['nama_produk'] ?></span>
                                            </h5>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal hapus-->

                    <?php
                    endwhile;
                    ?>
                </table>

                <!-- Awal Modal tambah-->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi.php">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="namaProduk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="tproduk" id="namaProduk" placeholder="Masukkan nama Produk">
                                    </div>

                                    <div class="mb-3">
                                        <label for="ket" class="form-label">Keterangan</label>
                                        <select name="tketerangan" id="ket" class="form-select">
                                            <option></option>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Minuman">Minuman</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="tharga" id="harga" placeholder="Masukkan nama Produk">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jml" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="tjumlah" id="jml" placeholder="Masukkan nama Produk">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah-->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>