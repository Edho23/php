<?php
session_start();
require '../database.php';

header('Content-Type: application/json'); // Set tipe konten sebagai JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi ID artikel
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID artikel tidak valid.']);
        exit;
    }

    $articleId = (int) $_POST['id'];

    // Query untuk meningkatkan jumlah likes
    $stmt = $conn->prepare("UPDATE articles SET likes = likes + 1 WHERE id = :id");
    if ($stmt->execute(['id' => $articleId])) {
        // Ambil jumlah likes terbaru
        $stmt = $conn->prepare("SELECT likes FROM articles WHERE id = :id");
        $stmt->execute(['id' => $articleId]);
        $likes = $stmt->fetchColumn();

        echo json_encode(['success' => true, 'likes' => $likes]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal memperbarui likes.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Metode permintaan tidak valid.']);
}
?>
