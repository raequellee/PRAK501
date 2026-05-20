<?php
require 'Model.php';
$id = $_GET['id'] ?? null;
$b = $id ? getBukuById($id) : null;
$judul = $b['judul_buku'] ?? ''; $penulis = $b['penulis'] ?? ''; $penerbit = $b['penerbit'] ?? ''; $tahun = $b['tahun_terbit'] ?? '';

if (isset($_POST['submit'])) {
    if ($id) updateBuku($id, $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    else addBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    header("Location: Buku.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4"><div class="container"><a class="navbar-brand fw-bold text-secondary" href="Buku.php">Kembali</a></div></nav>
    <div class="container"><div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;"><div class="card-body">
        <h5 class="card-title text-secondary mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Buku</h5>
        <form method="POST">
            <div class="mb-3"><label class="form-label">Judul Buku</label><input type="text" name="judul" class="form-control" value="<?= $judul ?>" required></div>
            <div class="mb-3"><label class="form-label">Penulis</label><input type="text" name="penulis" class="form-control" value="<?= $penulis ?>" required></div>
            <div class="mb-3"><label class="form-label">Penerbit</label><input type="text" name="penerbit" class="form-control" value="<?= $penerbit ?>" required></div>
            <div class="mb-3"><label class="form-label">Tahun Terbit</label><input type="number" name="tahun" class="form-control" value="<?= $tahun ?>" required></div>
            <button type="submit" name="submit" class="btn text-white w-100" style="background-color: #b19cd9;">Simpan</button>
        </form>
    </div></div></div>
</body>
</html>