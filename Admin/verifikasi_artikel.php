<?php
session_start();
require '../database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak. Harap login sebagai admin.");
}

// Ambil kategori untuk filter
$stmt = $conn->prepare("SELECT DISTINCT kategori FROM articles WHERE is_verified = 0");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filter Berdasarkan Kategori
$filter = isset($_GET['kategori']) ? $_GET['kategori'] : null;

if ($filter) {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE is_verified = 0 AND kategori = :kategori ORDER BY tanggal DESC");
    $stmt->execute(['kategori' => $filter]);
} else {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE is_verified = 0 ORDER BY tanggal DESC");
    $stmt->execute();
}

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Proses verifikasi artikel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['article_id'])) {
    $articleId = $_POST['article_id'];
    $section = $_POST['section'];

    if (empty($section)) {
        die("Section tidak boleh kosong. Pilih section sebelum memverifikasi.");
    }

    $stmt = $conn->prepare("UPDATE articles SET is_verified = 1, section = :section WHERE id = :id");
    $stmt->execute([
        'id' => $articleId,
        'section' => $section
    ]);

    echo "<script>alert('Artikel berhasil diverifikasi!'); window.location.href='verifikasi_artikel.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Artikel</title>
  <link rel="stylesheet" href="verifikasi_artikel.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h3>Dashboard</h3>
      <ul>
          <li><a href="Profile_admin.php">Profil</a></li>
          <li><a href="verifikasi_artikel.php" class="active">Verifikasi Artikel</a></li>
          <li><a href="hapus_artikel_admin.php">Hapus Artikel</a></li>
          <li><a href="daftar_akun.php">Daftar Akun</a></li>
          <li><a href="form_penulis.php">Formulir Penulis</a></li>
          <li><a href="Tambah_admin.php">Tambah Artikel</a></li>
          <li><a href="edit_artikel_admin.php">Edit Artikel</a></li>
      </ul>
      <a href="../logout.php" class="logout">Logout</a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <h2>Verifikasi Artikel</h2>

      <!-- Filter -->
      <form method="GET" action="verifikasi_artikel.php" class="verifikasi-form">
        <label for="kategori">Filter Berdasarkan Kategori:</label>
        <select id="kategori" name="kategori" class="select-section">
          <option value="">Semua Kategori</option>
          <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['kategori']); ?>" <?= $filter === $category['kategori'] ? 'selected' : ''; ?>>
              <?= htmlspecialchars($category['kategori']); ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-approve">Filter</button>
      </form>

      <!-- Tabel Artikel -->
      <table class="data-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Kategori</th>
            <th>Tanggal Dibuat</th>
            <th>Penulis</th>
            <th>Section</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($articles as $index => $article): ?>
            <tr>
              <td><?= $index + 1; ?></td>
              <td><?= htmlspecialchars($article['judul']); ?></td>
              <td><?= htmlspecialchars($article['kategori']); ?></td>
              <td><?= htmlspecialchars($article['tanggal']); ?></td>
              <td><?= htmlspecialchars($article['penulis']); ?></td>
              <td>
                <form method="POST" action="verifikasi_artikel.php" class="verifikasi-form">
                  <input type="hidden" name="article_id" value="<?= $article['id']; ?>">
                  <select name="section" class="select-section" required>
                    <option value="" disabled selected>Pilih Section</option>
                    <option value="konten-1">Konten 1</option>
                    <option value="konten-2">Konten 2</option>
                    <option value="konten-editor-pick">Konten Editor Pick</option>
                    <option value="story-war">Story War</option>
                    <option value="semua-class">Semua Class</option>
                  </select>
                  <button type="submit" class="btn btn-approve">Verifikasi</button>
                </form>
              </td>
              <td>
                <button class="btn btn-reject">Tolak</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>