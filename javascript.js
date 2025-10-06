// script.js

// === LOGIN FORM HANDLER ===
const loginForm = document.getElementById('loginForm');

if (loginForm) {
  loginForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Mencegah form submit default

    // Ambil nilai input
    const nickname = document.getElementById('loginNickname').value;
    const password = document.getElementById('loginPassword').value;

    // Validasi sederhana (bisa disesuaikan dengan kebutuhan)
    if (nickname && password) {
      // Redirect ke index.html
      window.location.href = './index.html';
    } else {
      alert('Mohon isi semua field!');
    }
  });
}

// === DARK MODE TOGGLE ===
// Gunakan tombol yang sudah ada di HTML
const toggleBtn = document.getElementById('darkModeToggle');

if (toggleBtn) {
  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    toggleBtn.textContent = isDark ? '☀️' : '🌙';
    localStorage.setItem('darkMode', isDark);
  });

  // Cek preferensi pengguna saat halaman dimuat
  const savedDarkMode = localStorage.getItem('darkMode') === 'true';
  if (savedDarkMode) {
    document.body.classList.add('dark-mode');
    toggleBtn.textContent = '☀️';
  }
}

// === LOGOUT FUNCTIONALITY ===
const logoutBtn = document.getElementById('logoutBtn');

if (logoutBtn) {
  logoutBtn.addEventListener('click', () => {
    // Tambahkan efek visual saat diklik
    logoutBtn.style.transform = 'scale(0.95)';

    // Konfirmasi logout (opsional)
    const confirmLogout = confirm('Apakah Anda yakin ingin logout?');

    if (confirmLogout) {
      // Animasi loading singkat
      logoutBtn.textContent = 'Logging out...';
      logoutBtn.disabled = true;

      // Redirect ke login.html setelah delay singkat
      setTimeout(() => {
        window.location.href = './login.html';
      }, 800);
    } else {
      // Reset tombol jika dibatalkan
      logoutBtn.style.transform = '';
    }
  });

  // Hover effect tambahan untuk logout button
  logoutBtn.addEventListener('mouseenter', () => {
    logoutBtn.style.transform = 'translateY(-2px)';
  });

  logoutBtn.addEventListener('mouseleave', () => {
    if (!logoutBtn.disabled) {
      logoutBtn.style.transform = '';
    }
  });
}

// === INTERAKTIVITAS TAMBAHAN ===

// Smooth scroll untuk anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 80, // offset untuk header sticky
        behavior: 'smooth',
      });
    }
  });
});

// Hover effect tambahan (opsional, hanya untuk interaktivitas)
const cards = document.querySelectorAll('.card, .review-card');
cards.forEach((card) => {
  card.addEventListener('mouseenter', () => {
    card.style.transform = card.classList.contains('card') ? 'translateY(-8px)' : '';
  });
  card.addEventListener('mouseleave', () => {
    card.style.transform = '';
  });
});

// Tambahkan animasi kecil saat section muncul (opsional)
const sections = document.querySelectorAll('.section');
const observerOptions = {
  root: null,
  rootMargin: '0px',
  threshold: 0.1,
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = 1;
      entry.target.style.transform = 'translateY(0)';
    }
  });
}, observerOptions);

sections.forEach((section) => {
  section.style.opacity = 0;
  section.style.transform = 'translateY(20px)';
  section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  observer.observe(section);
});

// Di bagian logout functionality
setTimeout(() => {
  window.location.href = './logout.php'; // Ganti dari login.html ke logout.php
}, 800);
