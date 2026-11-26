<?php
require "config.php"; $error="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
 $u=trim($_POST["username"]??""); $p=$_POST["password"]??"";
 $s=$conn->prepare("SELECT id,username,password,nama,role FROM users WHERE username=? LIMIT 1"); $s->bind_param("s",$u); $s->execute(); $user=$s->get_result()->fetch_assoc();
 if($user && password_verify($p,$user["password"])){session_regenerate_id(true); $_SESSION["user_id"]=$user["id"]; $_SESSION["nama"]=$user["nama"]; $_SESSION["username"]=$user["username"]; header("Location: dashboard.php"); exit;} else $error="Username atau password salah.";
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login Kantin POS</title><link rel="stylesheet" href="style.css"></head><body><main class="card"><div class="logo">KP</div><p class="eyebrow">SISTEM KASIR & INVENTARIS</p><h1>Selamat datang</h1><p>Masuk untuk mengelola Kantin POS.</p><?php if($error) echo '<div class="error">'.htmlspecialchars($error).'</div>'; ?><form method="post"><label>Username</label><input name="username" required><label>Password</label><input type="password" name="password" required><button>Masuk ke Dashboard →</button></form><small>Akun awal setelah setup: admin / Admin123!</small></main></body></html>