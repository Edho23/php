$(document).ready(function () {
  $('#like-button').click(function (e) {
      e.preventDefault(); // Mencegah reload halaman

      const articleId = $(this).data('id'); // Ambil ID artikel dari atribut data-id

      $.ajax({
          url: 'like_artikel_ajax.php', // Endpoint PHP untuk memproses like
          method: 'POST',
          data: { id: articleId },
          success: function (response) {
              if (response.success) {
                  // Perbarui jumlah likes di halaman
                  $('#like-count').text(response.likes);
              } else {
                  alert('Gagal menambahkan like: ' + response.message);
              }
          },
          error: function () {
              alert('Terjadi kesalahan. Silakan coba lagi.');
          }
      });
  });
});
