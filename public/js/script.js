//slide menu
const prevButton = document.getElementById('prev-btn');
const nextButton = document.getElementById('next-btn');
const galleryContainer = document.querySelector('.overflow-x-hidden');
const imageWidth = galleryContainer.querySelector('img').offsetWidth;

prevButton.addEventListener('click', () => {
  galleryContainer.scrollBy({ left: -imageWidth, behavior: 'smooth' });
});

nextButton.addEventListener('click', () => {
  galleryContainer.scrollBy({ left: imageWidth, behavior: 'smooth' });
});

//direct to admin page
const searchForm = document.getElementById('searchForm');
searchForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const searchTerm = document.getElementById('search-dropdown').value.trim();
  if (searchTerm.toLowerCase() === 'get:halaman admin') {
    window.location.href = 'admin/admin-beranda';
  } else {
    console.log('Search term:', searchTerm);
  }
});

// Logika serupa untuk menambahkan langkah-langkah

