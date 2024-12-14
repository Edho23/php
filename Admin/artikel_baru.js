document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('new-article-form');
  
    form.addEventListener('submit', (event) => {
      event.preventDefault();
  
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
  
      alert(`
        Artikel Baru Berhasil Ditambahkan!
        Judul: ${data.title}
        Kategori: ${data.category}
      `);
  
      // Kirim data ke server (jika diperlukan)
      // fetch('/api/add_article', {
      //   method: 'POST',
      //   body: formData,
      // })
      // .then(response => response.json())
      // .then(result => console.log(result))
      // .catch(error => console.error('Error:', error));
  
      form.reset();
    });
  });
  