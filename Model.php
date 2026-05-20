<?php
require_once 'Koneksi.php';

// ============ MEMBER ============
function getMember() {
    $conn = getKoneksi();
    $stmt = $conn->query("SELECT * FROM member");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar]);
}
function getMemberById($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id]);
}
function deleteMember($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
    return $stmt->execute([$id]);
}

// ============ BUKU ============
function getBuku() {
    $conn = getKoneksi();
    $stmt = $conn->query("SELECT * FROM buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addBuku($judul, $penulis, $penerbit, $tahun) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
}
function getBukuById($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}
function deleteBuku($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id]);
}

// ============ PEMINJAMAN ============
function getPeminjaman() {
    $conn = getKoneksi();
    $stmt = $conn->query("SELECT p.*, m.nama_member, b.judul_buku FROM peminjaman p JOIN member m ON p.id_member = m.id_member JOIN buku b ON p.id_buku = b.id_buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku]);
}
function getPeminjamanById($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("UPDATE peminjaman SET tgl_pinjam=?, tgl_kembali=?, id_member=?, id_buku=? WHERE id_peminjaman=?");
    return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $id]);
}
function deletePeminjaman($id) {
    $conn = getKoneksi();
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    return $stmt->execute([$id]);
}
?>