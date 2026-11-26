<?php
session_start();
$conn = new mysqli("localhost", "root", "", "kantin_pos_db");
if ($conn->connect_error) die("Koneksi database gagal. Pastikan MySQL aktif dan setup.sql sudah diimpor. " . $conn->connect_error);
$conn->set_charset("utf8mb4");
?>