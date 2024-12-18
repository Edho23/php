<?php
session_start();
require '../database.php';

if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Harap login terlebih dahulu.");
}

$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Ambil artikel pengguna
$stmt = $conn->prepare("SELECT id, judul, tanggal, views, likes FROM articles WHERE author_id = :author_id ORDER BY tanggal DESC");
$stmt->execute(['author_id' => $userId]);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel Saya</title>
  <link rel="stylesheet" href="artikel_saya.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h3>Dashboard</h3>
      <ul>
        <?php if ($role === 'admin'): ?>
          <li><a href="admin.php">Profil Admin</a></li>
          <li><a href="Tambah.php">Tambah Artikel</a></li>
          <li><a href="edit_artikel.php">Edit Artikel</a></li>
          <li><a href="hapus_artikel.php">Hapus Artikel</a></li>
          <li><a href="artikel_saya.php">Artikel Saya</a></li>
        <?php else: ?>
          <li><a href="profile.php">Profil Saya</a></li>
          <li><a href="Tambah.php">Tambah Artikel</a></li>
          <li><a href="edit_artikel.php">Edit Artikel</a></li>
          <li><a href="artikel_saya.php">Artikel Saya</a></li>
        <?php endif; ?>
      </ul>
      <a href="logout.php" class="logout">Logout</a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <h2>Artikel Saya</h2>
      <div class="article-list">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Artikel</th>
              <th>Tanggal Dibuat</th>
              <th>Views</th>
              <th>Likes</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($articles as $index => $article): ?>
              <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($article['judul']); ?></td>
                <td><?= htmlspecialchars($article['tanggal']); ?></td>
                <td><?= htmlspecialchars($article['views']); ?></td>
                <td><?= htmlspecialchars($article['likes']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
