document.addEventListener('DOMContentLoaded', () => {
    const approveButtons = document.querySelectorAll('.approve-btn');
    const rejectButtons = document.querySelectorAll('.reject-btn');
  
    approveButtons.forEach(button => {
      button.addEventListener('click', () => {
        const articleId = button.getAttribute('data-id');
        alert(`Artikel ID ${articleId} disetujui!`);
        // Tambahkan logika pengiriman ke server
      });
    });
  
    rejectButtons.forEach(button => {
      button.addEventListener('click', () => {
        const articleId = button.getAttribute('data-id');
        alert(`Artikel ID ${articleId} ditolak!`);
        // Tambahkan logika pengiriman ke server
      });
    });
  });
  