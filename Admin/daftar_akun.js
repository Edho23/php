document.addEventListener('DOMContentLoaded', () => {
    const rows = document.querySelectorAll('#account-list tr');
  
    rows.forEach(row => {
      const statusCell = row.cells[4]; // Kolom status
      const status = statusCell.textContent.trim();
  
      // Tambahkan kelas status untuk gaya
      if (status.toLowerCase() === 'aktif') {
        statusCell.classList.add('status-active');
      } else if (status.toLowerCase() === 'nonaktif') {
        statusCell.classList.add('status-inactive');
      }
    });
  });
  