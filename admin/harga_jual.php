<?php
include '../config/db.php';
if (!isset($_SESSION['user'])) { header("Location: ../login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_id = $_POST['item_id'];
    $harga   = $_POST['harga_jual'];

    $sql = "INSERT INTO harga_barang (item_id, harga_jual, updated_at)
            VALUES ('$item_id','$harga',NOW())
            ON DUPLICATE KEY UPDATE harga_jual='$harga', updated_at=NOW()";
    $conn->query($sql);
    $msg = "Harga jual berhasil disimpan.";
}

$items = $conn->query("SELECT * FROM items");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Harga Jual - UD MEYLIN</title>
</head>
<body>
    <h2>Atur Harga Jual Barang</h2>
    <form method="POST">
        <select name="item_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php while ($row = $items->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
            <?php endwhile; ?>
        </select>
        <input type="number" name="harga_jual" placeholder="Harga Jual" required>
        <button type="submit">Simpan</button>
    </form>
    <?php if (!empty($msg)) echo "<p style='color:green'>$msg</p>"; ?>
</body>
</html>