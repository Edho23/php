<?php
session_start();
require '../database.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak. Anda bukan admin!");
}

// Ambil artikel dengan status 'pending'
$stmt = $conn->prepare("SELECT * FROM articles WHERE status = 'pending'");
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Artikel</title>
    <link rel="stylesheet" href="verifikasi_artikel.css"> <!-- Gunakan admin.css -->
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h3>Dashboard</h3>
            <ul>
                <li><a href="admin.php">Profil</a></li>
                <li><a href="verifikasi_artikel.php" class="active">Verifikasi Artikel</a></li>
                <li><a href="hapus_artikel.php">Hapus Artikel</a></li>
                <li><a href="daftar_akun.php">Daftar Akun</a></li>
                <li><a href="form_penulis.php">Formulir Penulis</a></li>
                <li><a href="artikel_baru.php">Artikel Baru</a></li>
                <li><a href="edit_artikel.php">Edit Artikel</a></li>
            </ul>
            <a href="logout.php" class="logout">Logout</a>
        </aside>

        <main class="main-content">
            <h2>Verifikasi Artikel</h2>
            <?php if (count($articles) > 0): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Konten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= htmlspecialchars($article['judul']); ?></td>
                                <td><?= htmlspecialchars($article['penulis']); ?></td>
                                <td><?= date('d M Y', strtotime($article['tanggal'])); ?></td>
                                <td><?= htmlspecialchars(substr($article['konten'], 0, 100)); ?>...</td>
                                <td>
                                    <form method="POST" action="proses_verifikasi.php" class="verifikasi-form">
                                        <input type="hidden" name="id" value="<?= $article['id']; ?>">
                                        <select name="section" class="select-section" required>
                                            <option value="">Pilih Section</option>
                                            <option value="konten1">Konten 1</option>
                                            <option value="konten2">Konten 2</option>
                                            <option value="konten_editor_pick">Editor Pick</option>
                                            <option value="story_war">Story War</option>
                                            <option value="semua_class">Semua Class</option>
                                        </select>
                                        <button type="submit" name="action" value="approve" class="btn btn-approve">Setujui</button>
                                        <button type="submit" name="action" value="reject" class="btn btn-reject">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Tidak ada artikel yang perlu diverifikasi.</p>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
