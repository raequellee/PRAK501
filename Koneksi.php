<?php
function getKoneksi() {
    // Masukkan data dari Aiven di sini
    $host = "perpustakaan-db-perpustakaan-db.a.aivencloud.com";
    $port = "10278"; // Contoh: 18055
    $user = "avnadmin";
    $pass = "AVNS_bNcfs7zDi4LRUoETl4G";
    $db   = "defaultdb"; // Pakai bawaan Aiven

    try {
        // Port wajib dimasukkan ke dalam string koneksi
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
?>