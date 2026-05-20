<?php
require 'Model.php';
if (isset($_GET['hapus'])) { deleteBuku($_GET['hapus']); header("Location: Buku.php"); }
$bukus = getBuku();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-secondary" href="#">Library System</a>
            <div class="navbar-nav"><a class="nav-link" href="Member.php">Member</a><a class="nav-link active" href="Buku.php">Buku</a><a class="nav-link" href="Peminjaman.php">Peminjaman</a></div>
        </div>
    </nav>
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3"><h4 class="card-title text-secondary">Data Buku</h4><a href="FormBuku.php" class="btn text-white btn-sm" style="background-color: #b19cd9;">+ Tambah Buku</a></div>
                <table class="table table-hover align-middle">
                    <thead class="table-light"><tr><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach ($bukus as $b) : ?>
                        <tr>
                            <td><?= $b['judul_buku'] ?></td><td><?= $b['penulis'] ?></td><td><?= $b['penerbit'] ?></td><td><?= $b['tahun_terbit'] ?></td>
                            <td>
                                <a href="FormBuku.php?id=<?= $b['id_buku'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                <a href="Buku.php?hapus=<?= $b['id_buku'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>