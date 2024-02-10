<?php
// panggil koneksi database
include "koneksi.php";

// cek tombol simpan di klik
if (isset($_POST['bsimpan'])) {

  // query simpan data baru
  $simpan = mysqli_query($koneksi, "INSERT INTO produk (nama_produk,keterangan,harga,jumlah)
                                      VALUES ('$_POST[tproduk]',
                                              '$_POST[tketerangan]',
                                              '$_POST[tharga]',
                                              '$_POST[tjumlah]')");

  // cek jika simpan berhasil
  if ($simpan) {
    echo "<script>
                alert('Data berhasil Disimpan!');
                document.location='index.php';
              </script>";
  } else {
    echo "<script>
                alert('Data gagal Disimpan!');
                document.location='index.php';
              </script>";
  }
}

// cek tombol ubah di klik
if (isset($_POST['bubah'])) {

  // query ubah data
  $ubah = mysqli_query($koneksi, "UPDATE produk SET
                                                    nama_produk = '$_POST[tproduk]',
                                                    keterangan = '$_POST[tketerangan]',
                                                    harga = '$_POST[tharga]',
                                                    jumlah = '$_POST[tjumlah]'
                                                  WHERE id_produk = '$_POST[id_produk]'
                                                    ");

  // cek jika ubah berhasil
  if ($ubah) {
    echo "<script>
                alert('Data berhasil di Ubah!');
                document.location='index.php';
              </script>";
  } else {
    echo "<script>
                alert('Data gagal di Ubah!');
                document.location='index.php';
              </script>";
  }
}


// cek tombol hapus di klik
if (isset($_POST['bhapus'])) {

  // query hapus data
  $hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$_POST[id_produk]'");

  // cek jika hapus berhasil
  if ($hapus) {
    echo "<script>
                alert('Data berhasil di Hapus!');
                document.location='index.php';
              </script>";
  } else {
    echo "<script>
                alert('Data gagal di Hapus!');
                document.location='index.php';
              </script>";
  }
}
