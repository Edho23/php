document.addEventListener('DOMContentLoaded', function () {
  // Simulasi data artikel
  const articles = [
    { id: 1, title: "Artikel Pertama", date: "2024-12-01", views: 150, likes: 25 },
    { id: 2, title: "Artikel Kedua", date: "2024-12-05", views: 300, likes: 45 },
    { id: 3, title: "Artikel Ketiga", date: "2024-12-10", views: 120, likes: 10 },
  ];

  const tableBody = document.getElementById('article-table');

  // Populate table dengan data artikel
  articles.forEach((article, index) => {
    const row = document.createElement('tr');

    row.innerHTML = `
      <td>${index + 1}</td>
      <td>${article.title}</td>
      <td>${article.date}</td>
      <td>${article.views}</td>
      <td>${article.likes}</td>
    `;

    tableBody.appendChild(row);
  });
});
