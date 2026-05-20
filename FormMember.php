<?php
require 'Model.php';
date_default_timezone_set('Asia/Makassar'); // Setting timezone BJM

$id = $_GET['id'] ?? null;
$m = $id ? getMemberById($id) : null;

// Mengisi nilai default form dengan data lama (jika edit) atau timestamp real-time (jika tambah)
$nama = $m['nama_member'] ?? '';
$nomor = $m['nomor_member'] ?? '';
$alamat = $m['alamat'] ?? '';
$tgl_daftar = $m['tgl_mendaftar'] ?? date('Y-m-d\TH:i'); 
$tgl_bayar = $m['tgl_terakhir_bayar'] ?? date('Y-m-d');

if (isset($_POST['submit'])) {
    if ($id) {
        updateMember($id, $_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl_daftar'], $_POST['tgl_bayar']);
    } else {
        addMember($_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl_daftar'], $_POST['tgl_bayar']);
    }
    header("Location: Member.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4"><div class="container"><a class="navbar-brand fw-bold text-secondary" href="Member.php">Kembali</a></div></nav>
    <div class="container">
        <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title text-secondary mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Member</h5>
                <form method="POST">
                    <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="nama" class="form-control" value="<?= $nama ?>" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Member</label><input type="text" name="nomor" class="form-control" value="<?= $nomor ?>" required></div>
                    <div class="mb-3"><label class="form-label">Alamat</label><textarea name="alamat" class="form-control" required><?= $alamat ?></textarea></div>
                    <div class="mb-3"><label class="form-label">Tgl Mendaftar (Waktu BJM)</label><input type="datetime-local" name="tgl_daftar" class="form-control" value="<?= $tgl_daftar ?>" required></div>
                    <div class="mb-3"><label class="form-label">Terakhir Bayar</label><input type="date" name="tgl_bayar" class="form-control" value="<?= $tgl_bayar ?>" required></div>
                    <button type="submit" name="submit" class="btn text-white w-100" style="background-color: #b19cd9;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>