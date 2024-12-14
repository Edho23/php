<?php
session_start();
require '../database.php';

if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Harap login terlebih dahulu.");
}

// Validasi role pengguna
if (!isset($_SESSION['role'])) {
    die("Role pengguna tidak ditemukan. Harap login ulang.");
}

$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Ambil daftar artikel berdasarkan role
if ($role === 'admin') {
    $stmt = $conn->prepare("SELECT id, judul FROM articles ORDER BY tanggal DESC");
} else {
    $stmt = $conn->prepare("SELECT id, judul FROM articles WHERE author_id = :author_id ORDER BY tanggal DESC");
    $stmt->bindParam(':author_id', $userId);
}
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil artikel untuk diedit jika ada parameter article_id
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['article_id'])) {
    $articleId = $_GET['article_id'];

    if ($role === 'admin') {
        $stmt = $conn->prepare("SELECT * FROM articles WHERE id = :id");
    } else {
        $stmt = $conn->prepare("SELECT * FROM articles WHERE id = :id AND author_id = :author_id");
        $stmt->bindParam(':author_id', $userId);
    }
    $stmt->bindParam(':id', $articleId);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Artikel tidak ditemukan atau Anda tidak memiliki izin untuk mengedit artikel ini.");
    }
}

// Proses update artikel
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = $_POST['article_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $imagePath = $_POST['current_image'];

    // Upload gambar baru jika ada
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../assets";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $imagePath = $targetDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die("Gagal mengunggah gambar.");
        }
    }

    // Query update artikel
    if ($role === 'admin') {
      $stmt = $conn->prepare("UPDATE articles SET judul = :judul, konten = :konten, kategori = :kategori, gambar = :gambar WHERE id = :id");
      $stmt->execute([
          ':judul' => $title,
          ':konten' => $content,
          ':kategori' => $category,
          ':gambar' => $imagePath,
          ':id' => $articleId
      ]);
  } else {
      $stmt = $conn->prepare("UPDATE articles SET judul = :judul, konten = :konten, kategori = :kategori, gambar = :gambar WHERE id = :id AND author_id = :author_id");
      $stmt->execute([
          ':judul' => $title,
          ':konten' => $content,
          ':kategori' => $category,
          ':gambar' => $imagePath,
          ':id' => $articleId,
          ':author_id' => $userId
      ]);
  }
  

    echo "<script>alert('Artikel berhasil diperbarui!'); window.location.href='edit_artikel.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Artikel</title>
  <link rel="stylesheet" href="edit_artikel.css">
</head>
<body>
  <div class="container">
  <aside class="sidebar">
    <h3>Dashboard</h3>
      <ul>
        <?php if ($_SESSION['role'] === 'admin'): ?>
        <!-- Menu untuk admin -->
        <li><a href="admin.php">Profil</a></li>
        <li><a href="verifikasi.php">Verifikasi Artikel</a></li>
        <li><a href="hapus_artikel.php">Hapus Artikel</a></li>
        <li><a href="daftar_akun.php">Daftar Akun</a></li>
        <li><a href="form_penulis.php">Formulir Penulis</a></li>
        <li><a href="artikel_baru.php">Artikel Baru</a></li>
        <li><a href="edit_artikel.php">Edit Artikel</a></li>
        <?php elseif ($_SESSION['role'] === 'penulis'): ?>
        <!-- Menu untuk penulis -->
        <li><a href="Profile.php">Profile</a></li>
        <li><a href="Tambah.php">Tambah Artikel</a></li>
        <li><a href="edit_artikel.php">Edit Artikel</a></li>
        <li><a href="artikel_saya.php">Artikel Saya</a></li>
        <li><a href="hapus_artikel.php">Hapus Artikel</a></li>
        <?php endif; ?>
      </ul>
    <a href="logout.php" class="logout">Logout</a>
  </aside>

    <main class="main-content">
      <h2>Edit Artikel</h2>

      <!-- Form Pilih Artikel -->
      <form method="GET" action="edit_artikel.php">
        <label for="article-id">Pilih Artikel untuk Diedit:</label>
        <select id="article-id" name="article_id" required>
          <?php foreach ($articles as $articleItem): ?>
            <option value="<?= $articleItem['id']; ?>"><?= htmlspecialchars($articleItem['judul']); ?></option>
          <?php endforeach; ?>
        </select>
        <button type="submit">Edit Artikel</button>
      </form>

      <!-- Form Edit Artikel -->
      <?php if (isset($article)): ?>
      <form method="POST" enctype="multipart/form-data" action="edit_artikel.php">
        <input type="hidden" name="article_id" value="<?= $article['id']; ?>">
        <input type="hidden" name="current_image" value="<?= $article['gambar']; ?>">

        <div class="form-group">
          <label for="title">Judul Artikel</label>
          <input type="text" id="title" name="title" value="<?= htmlspecialchars($article['judul']); ?>" required>
        </div>
        <div class="form-group">
          <label for="category">Kategori</label>
          <select id="category" name="category" required>
            <option value="">Pilih Kategori</option>
            <option value="Bisnis" <?= $article['kategori'] === 'Bisnis' ? 'selected' : ''; ?>>Bisnis</option>
            <option value="Keuangan" <?= $article['kategori'] === 'Keuangan' ? 'selected' : ''; ?>>Keuangan</option>
            <option value="Olahraga" <?= $article['kategori'] === 'Olahraga' ? 'selected' : ''; ?>>Olahraga</option>
            <option value="Internasional" <?= $article['kategori'] === 'Internasional' ? 'selected' : ''; ?>>Internasional</option>
            <option value="Budaya" <?= $article['kategori'] === 'Budaya' ? 'selected' : ''; ?>>Budaya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="content">Konten</label>
          <textarea id="content" name="content" rows="6" required><?= htmlspecialchars($article['konten']); ?></textarea>
        </div>
        <div class="form-group">
          <label for="image">Gambar</label>
          <input type="file" id="image" name="image" accept="image/*">
          <p>Gambar saat ini: <?= htmlspecialchars($article['gambar']); ?></p>
        </div>
        <button type="submit" class="btn-submit">Simpan Perubahan</button>
      </form>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>
