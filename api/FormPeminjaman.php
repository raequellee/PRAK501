<?php
require 'Model.php';
date_default_timezone_set('Asia/Makassar'); 

$id = $_GET['id'] ?? null;
$p = $id ? getPeminjamanById($id) : null;
$members = getMember(); 
$bukus = getBuku();     

$tgl_pinjam = $p['tgl_pinjam'] ?? date('Y-m-d');
$tgl_kembali = $p['tgl_kembali'] ?? date('Y-m-d', strtotime('+7 days')); 
$id_member = $p['id_member'] ?? '';
$id_buku = $p['id_buku'] ?? '';

if (isset($_POST['submit'])) {
    if ($id) updatePeminjaman($id, $_POST['tgl_pinjam'], $_POST['tgl_kembali'], $_POST['id_member'], $_POST['id_buku']);
    else addPeminjaman($_POST['tgl_pinjam'], $_POST['tgl_kembali'], $_POST['id_member'], $_POST['id_buku']);
    header("Location: Peminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .bg-soft { background-color: #e6e6fa; } </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-soft shadow-sm mb-4"><div class="container"><a class="navbar-brand fw-bold text-secondary" href="Peminjaman.php">Kembali</a></div></nav>
    <div class="container"><div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;"><div class="card-body">
        <h5 class="card-title text-secondary mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Peminjaman</h5>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Member</label>
                <select name="id_member" class="form-select" required>
                    <option value="">Pilih Member...</option>
                    <?php foreach ($members as $m): ?>
                        <option value="<?= $m['id_member'] ?>" <?= $id_member == $m['id_member'] ? 'selected' : '' ?>><?= $m['nama_member'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="id_buku" class="form-select" required>
                    <option value="">Pilih Buku...</option>
                    <?php foreach ($bukus as $b): ?>
                        <option value="<?= $b['id_buku'] ?>" <?= $id_buku == $b['id_buku'] ? 'selected' : '' ?>><?= $b['judul_buku'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Tgl Pinjam (Waktu BJM)</label><input type="date" name="tgl_pinjam" class="form-control" value="<?= $tgl_pinjam ?>" required></div>
            <div class="mb-3"><label class="form-label">Tgl Kembali</label><input type="date" name="tgl_kembali" class="form-control" value="<?= $tgl_kembali ?>" required></div>
            <button type="submit" name="submit" class="btn text-white w-100" style="background-color: #b19cd9;">Simpan</button>
        </form>
    </div></div></div>
</body>
</html>