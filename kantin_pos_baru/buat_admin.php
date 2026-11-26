<?php
require "config.php";
$username="admin"; $password=password_hash("Admin123!", PASSWORD_DEFAULT); $nama="Administrator";
$stmt=$conn->prepare("INSERT INTO users(username,password,nama,role) VALUES(?,?,?,'admin') ON DUPLICATE KEY UPDATE password=VALUES(password),nama=VALUES(nama),role='admin'");
$stmt->bind_param("sss",$username,$password,$nama);
if($stmt->execute()) echo "Akun admin siap! Username: admin | Password: Admin123! <br><a href='login.php'>Buka login</a><p>Setelah berhasil login, hapus file buat_admin.php.</p>";
else echo "Gagal: ".htmlspecialchars($stmt->error);
?>