document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-btn');
  
    deleteButtons.forEach(button => {
      button.addEventListener('click', () => {
        const articleId = button.getAttribute('data-id');
        if (confirm(`Yakin ingin menghapus artikel ID ${articleId}?`)) {
          const row = button.closest('tr');
          row.remove(); // Menghapus baris artikel dari tabel
          alert(`Artikel ID ${articleId} berhasil dihapus.`);
          // Tambahkan logika penghapusan di server, jika perlu
        }
      });
    });
  });
  