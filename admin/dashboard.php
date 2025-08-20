<?php
include '../config/db.php';
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - UD MEYLIN</title>
</head>
<body>
    <h2>Selamat datang, <?= $_SESSION['user']; ?> (<?= $_SESSION['role']; ?>)</h2>
    <ul>
        <li><a href="penjualan.php">Penjualan</a></li>
        <?php if ($_SESSION['role'] == 'superadmin'): ?>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="users.php">Kelola User</a></li>
        <?php endif; ?>
        <li><a href="harga_jual.php">Harga Jual</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</body>
</html>