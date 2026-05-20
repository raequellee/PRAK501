<?php
require 'Model.php';
if (isset($_GET['hapus'])) { deletePeminjaman($_GET['hapus']); header("Location: Peminjaman.php"); }
$peminjaman = getPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-secondary" href="#">Library System</a>
            <div class="navbar-nav"><a class="nav-link" href="Member.php">Member</a><a class="nav-link" href="Buku.php">Buku</a><a class="nav-link active" href="Peminjaman.php">Peminjaman</a></div>
        </div>
    </nav>
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3"><h4 class="card-title text-secondary">Data Peminjaman</h4><a href="FormPeminjaman.php" class="btn text-white btn-sm" style="background-color: #b19cd9;">+ Tambah Peminjaman</a></div>
                <table class="table table-hover align-middle">
                    <thead class="table-light"><tr><th>Member</th><th>Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach ($peminjaman as $p) : ?>
                        <tr>
                            <td><?= $p['nama_member'] ?></td><td><?= $p['judul_buku'] ?></td><td><?= $p['tgl_pinjam'] ?></td><td><?= $p['tgl_kembali'] ?></td>
                            <td>
                                <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                <a href="Peminjaman.php?hapus=<?= $p['id_peminjaman'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
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