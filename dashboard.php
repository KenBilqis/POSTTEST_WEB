<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookRating - Platform Rating Buku</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <h1 class="nav-title">BookRating</h1>
            <ul class="nav-list">
                <li class="nav-item"><a href="#home" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="#books" class="nav-link">Buku</a></li>
                <li class="nav-item"><a href="#top-rated" class="nav-link">Teratas</a></li>
                <li class="nav-item"><a href="#reviews" class="nav-link">Ulasan</a></li>
                <li class="nav-item"><a href="#profile" class="nav-link">Profil</a></li>
            </ul>
            <div class="nav-actions">
                <a href="logout.php" class="logout-btn" aria-label="Logout">Logout</a>
                <button id="darkModeToggle" class="dark-mode-toggle" aria-label="Toggle dark mode">🌙</button>
            </div>
        </nav>
    </header>
    <main class="container">
        <section id="home" class="section">
            <h2 class="section-title">Selamat Datang, <?= $username ?>!</h2>
            <p style="text-align: center;">Temukan, rating, dan diskusikan buku-buku favorit Anda.</p>
            <!-- Konten buku tetap sama seperti di dashboard.txt -->
            <article class="card-container">
                <figure class="card">
                    <img src="./Asset/Pulang-Tere Liye.jpg" alt="Cover buku 'Pulang' oleh Tere Liye" class="card-image">
                    <figcaption class="card-caption">Pulang - Tere Liye</figcaption>
                </figure>
                <!-- ... (copy seluruh konten dari dashboard.txt, bagian home hingga exclusive-videos) ... -->
                <!-- Untuk efisiensi, di sini hanya ditunjukkan struktur. Salin semua dari dashboard.txt -->
            </article>
        </section>

        <!-- Salin SEMUA bagian lain dari dashboard.txt di sini (books, top-rated, reviews, profile, dll) -->
        <!-- Ganti bagian profil jika ingin dinamis, tapi untuk sementara tetap statis -->

        <!-- Contoh: bagian profil bisa tetap statis seperti aslinya -->
        <section id="profile" class="section">
            <h2 class="section-title">Profil Saya</h2>
            <div class="profile-grid">
                <div class="profile-info">
                    <h3>Informasi Profil</h3>
                    <p><strong>Nama:</strong> <?= $username ?></p>
                    <p><strong>Username:</strong> <?= $username ?></p>
                    <p><strong>Email:</strong> <?= strtolower($username) ?>@bookrating.com</p>
                    <p><strong>Tanggal Bergabung:</strong> 12 Maret 2022</p>
                    <p><strong>Asal:</strong> Jakarta, Indonesia</p>
                </div>
                <!-- Sisanya bisa tetap statis atau disesuaikan -->
                <!-- Salin sisa konten dari dashboard.txt -->
                <div class="profile-info">
                    <h3>Statistik Baca</h3>
                    <p><strong>Total Buku yang Dibaca:</strong> 87</p>
                    <p><strong>Total Rating yang Diberikan:</strong> 72</p>
                    <p><strong>Total Ulasan yang Ditulis:</strong> 34</p>
                    <p><strong>Buku Favorit:</strong> "Laut Bercerita" oleh Leila S. Chudori</p>
                    <p><strong>Genre Favorit:</strong> Fiksi Sastra, Biografi, Motivasi</p>
                </div>
                <div class="profile-info">
                    <h3>Daftar Buku Saya</h3>
                    <h4>Dibaca</h4>
                    <ul>
                        <li>Pulang - Tere Liye</li>
                        <li>Laut Bercerita - Leila S. Chudori</li>
                        <li>Sang Pemimpi - Andrea Hirata</li>
                        <li>The Alchemist - Paulo Coelho</li>
                        <li>Atomic Habits - James Clear</li>
                    </ul>
                    <h4>Ingin Dibaca</h4>
                    <ul>
                        <li>Man's Search for Meaning - Viktor E. Frankl</li>
                        <li>Harry Potter and the Philosopher's Stone - J.K. Rowling</li>
                        <li>Garis Waktu - Fiersa Besari</li>
                        <li>Negeri 5 Menara - Ahmad Fuadi</li>
                    </ul>
                    <h4>Dibaca Sekarang</h4>
                    <ul>
                        <li>Perahu Kertas - Dewi Lestari</li>
                    </ul>
                </div>
                <div class="profile-info">
                    <h3>Preferensi Baca</h3>
                    <p><strong>Genre Disukai:</strong> Fiksi Sastra, Biografi, Motivasi, Sejarah</p>
                    <p><strong>Genre Tidak Disukai:</strong> Horor, Fantasy</p>
                    <p><strong>Penulis Favorit:</strong> Tere Liye, Leila S. Chudori, Paulo Coelho</p>
                    <p><strong>Bahasa Utama:</strong> Bahasa Indonesia, Inggris</p>
                    <p><strong>Waktu Baca Ideal:</strong> Malam hari, 20:00 - 23:00</p>
                </div>
                <div class="profile-info">
                    <h3>Aktivitas Terbaru</h3>
                    <ul>
                        <li>15 Oktober 2023: Memberikan rating 5 bintang untuk "Atomic Habits"</li>
                        <li>12 Oktober 2023: Menulis ulasan untuk "Laut Bercerita"</li>
                        <li>10 Oktober 2023: Menambahkan "Man's Search for Meaning" ke daftar ingin dibaca</li>
                        <li>8 Oktober 2023: Menandai "Perahu Kertas" sebagai dibaca sekarang</li>
                        <li>5 Oktober 2023: Memberikan rating 4 bintang untuk "Pulang"</li>
                    </ul>
                </div>
            </div>
            <div class="profile-actions" style="margin-top: 2rem;">
                <p><a href="#">Edit Profil</a> | <a href="#">Ubah Password</a> | <a href="logout.php">Keluar</a></p>
            </div>
        </section>

        <!-- Lanjutkan dengan bagian "What to read" dan "Exclusive videos" -->
        <section id="what-to-read" class="section">
            <h2 class="section-title">What to read</h2>
            <p style="text-align: center;">Rekomendasi berdasarkan preferensi Anda</p>
            <article class="card-container">
                <figure class="card">
                    <img src="./Asset/bumi-manusia.jpg" alt="Cover buku 'Bumi Manusia' oleh Pramoedya Ananta Toer" class="card-image">
                    <figcaption class="card-caption">Bumi Manusia - Pramoedya Ananta Toer</figcaption>
                </figure>
                <figure class="card">
                    <img src="./Asset/Sapiens.jpg" alt="Cover buku 'Sapiens' oleh Yuval Noah Harari" class="card-image">
                    <figcaption class="card-caption">Sapiens - Yuval Noah Harari</figcaption>
                </figure>
                <figure class="card">
                    <img src="./Asset/The Power of Now.jpg" alt="Cover buku 'The Power of Now' oleh Eckhart Tolle" class="card-image">
                    <figcaption class="card-caption">The Power of Now - Eckhart Tolle</figcaption>
                </figure>
                <figure class="card">
                    <img src="./Asset/Sejarah-Indonesia.jpg" alt="Cover buku 'Sejarah Indonesia' oleh M.C. Ricklefs" class="card-image">
                    <figcaption class="card-caption">Sejarah Indonesia - M.C. Ricklefs</figcaption>
                </figure>
            </article>
        </section>
        <section id="exclusive-videos" class="section">
            <h2 class="section-title">Exclusive videos</h2>
            <p style="text-align: center;">Wawancara dengan penulis, diskusi buku, dan konten eksklusif</p>
            <div class="video-container">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/MYSMXknVKMo"
                    title="Wawancara Eksklusif dengan Penulis Buku Terkenal" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2025 BookRating. Semua hak dilindungi.</p>
        <p>Referensi: <a href="https://www.imdb.com/">https://www.imdb.com/</a></p>
    </footer>
    <script src="./javascript.js"></script>
</body>
</html>