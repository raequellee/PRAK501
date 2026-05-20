<?php
require 'Model.php';
if (isset($_GET['hapus'])) { deleteMember($_GET['hapus']); header("Location: Member.php"); }
$members = getMember();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-secondary" href="#">Library System</a>
            <div class="navbar-nav"><a class="nav-link active" href="Member.php">Member</a><a class="nav-link" href="Buku.php">Buku</a><a class="nav-link" href="Peminjaman.php">Peminjaman</a></div>
        </div>
    </nav>
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title text-secondary">Data Member</h4>
                    <a href="FormMember.php" class="btn btn-primary btn-sm" style="background-color: #b19cd9; border:none;">+ Tambah Member</a>
                </div>
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr><th>Nama</th><th>Nomor</th><th>Alamat</th><th>Tgl Daftar</th><th>Terakhir Bayar</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $m) : ?>
                        <tr>
                            <td><?= $m['nama_member'] ?></td><td><?= $m['nomor_member'] ?></td><td><?= $m['alamat'] ?></td>
                            <td><?= $m['tgl_mendaftar'] ?></td><td><?= $m['tgl_terakhir_bayar'] ?></td>
                            <td>
                                <a href="FormMember.php?id=<?= $m['id_member'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                <a href="Member.php?hapus=<?= $m['id_member'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
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