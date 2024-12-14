document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('writer-form');
  
    form.addEventListener('submit', (event) => {
      event.preventDefault();
  
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
  
      alert(`
        Pendaftaran Penulis Baru Berhasil!
        Nama: ${data.name}
        Email: ${data.email}
      `);
  
      // Kirim data ke server (jika diperlukan)
      // fetch('/api/register_writer', {
      //   method: 'POST',
      //   body: JSON.stringify(data),
      //   headers: { 'Content-Type': 'application/json' },
      // })
      // .then(response => response.json())
      // .then(result => console.log(result))
      // .catch(error => console.error('Error:', error));
  
      form.reset();
    });
  });
  