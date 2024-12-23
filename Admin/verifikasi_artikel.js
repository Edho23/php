function toggleKategori(selectElement) {
    const kategoriContainer = selectElement.closest('form').querySelector('.kategori-container');

    if (selectElement.value === 'semua-class') {
        kategoriContainer.style.display = 'block';
    } else {
        kategoriContainer.style.display = 'none';
        kategoriContainer.querySelector('select').value = ""; // Reset kategori
    }
}
