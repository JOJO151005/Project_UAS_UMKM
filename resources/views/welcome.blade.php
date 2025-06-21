<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori UMKM | Temukan & Dukung Usaha Lokal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables untuk Tema Orange & Coklat */
        :root {
            --primary-orange: #E67E22;
            --dark-brown: #6D4C41;
            --light-beige: #FDF8F0;
            --white: #FFFFFF;
            --shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
            --border-light: #E0E0E0;
        }

        /* Reset dan General Styling */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            background-color: var(--light-beige);
            color: var(--dark-brown);
            line-height: 1.6;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1, h2, h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        /* Navigation Bar */
        .navbar {
            padding: 15px 0;
            background-color: rgba(253, 248, 240, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-light);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* --- PERUBAHAN DI SINI --- */
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        /* --- AKHIR PERUBAHAN --- */

        .nav-brand {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary-orange);
            text-decoration: none;
        }

        .nav-links a {
            color: var(--dark-brown);
            text-decoration: none;
            margin: 0 18px;
            font-weight: 700;
            position: relative;
            padding-bottom: 5px;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--primary-orange);
            transition: width 0.3s ease-in-out;
        }
        .nav-links a:hover::after {
            width: 100%;
        }

        .btn {
            background-color: var(--primary-orange);
            color: var(--white);
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(230, 126, 34, 0.4);
        }

        .btn:hover {
            background-color: #D35400;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 126, 34, 0.5);
        }

        /* Hero Section */
        .hero {
            padding: 80px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.2rem;
            color: var(--dark-brown);
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--dark-brown);
            opacity: 0.8;
            max-width: 650px;
            margin: 0 auto 40px auto;
        }

        /* Sections */
        .section {
            padding: 70px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 50px;
            position: relative;
        }
        .section-title::after {
             content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--primary-orange);
            border-radius: 2px;
        }


        /* Categories Section */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 25px;
            text-align: center;
        }

        .category-item {
            background-color: var(--white);
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }
        
        .category-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .category-item .icon svg {
            width: 48px;
            height: 48px;
            margin-bottom: 15px;
            color: var(--primary-orange);
        }
        
        .category-item h3 {
             font-family: 'Lato', sans-serif;
             font-weight: 700;
             font-size: 1.1rem;
        }

        /* Featured UMKM Section */
        .umkm-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .umkm-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .umkm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }
        
        .umkm-card-image {
            width: 100%;
            height: 220px;
            background-size: cover;
            background-position: center;
        }
        
        .umkm-card-content {
            padding: 25px;
        }
        
        .umkm-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.4rem;
        }

        .umkm-card p {
             opacity: 0.8;
        }

        .umkm-card .category-badge {
            display: inline-block;
            background-color: #FBEAE0;
            color: var(--primary-orange);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-brown);
            color: var(--light-beige);
            text-align: center;
            padding: 40px 0;
            margin-top: 50px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .section-title { font-size: 2.2rem; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="/" class="nav-brand">DirektoriUMKM</a>
            <div class="nav-links">
                <a href="#kategori">Kategori</a>
                <a href="#unggulan">Unggulan</a>
                <a href="#tentang">Tentang</a>
            </div>
            <a href="/admin" class="btn">Login Admin</a>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1>Dukung Lokal, Majukan Bangsa</h1>
            <p>Jelajahi dan dukung ribuan Usaha Mikro, Kecil, dan Menengah dari seluruh penjuru negeri. Temukan produk dan jasa berkualitas di dekat Anda.</p>
            <a href="#unggulan" class="btn">Lihat Direktori</a>
        </div>
    </header>

    <section id="kategori" class="section">
        <div class="container">
            <h2 class="section-title">Jelajahi Kategori</h2>
            <div class="categories-grid">
                <div class="category-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"></path><path d="M17.8 17.8C16 19.5 14.1 20.4 12 20.4s-4-.9-5.8-2.6C4.5 16 3.6 14.1 3.6 12s.9-4 2.6-5.8C8 4.5 9.9 3.6 12 3.6s4 .9 5.8 2.6c1.7 1.8 2.6 3.7 2.6 5.8s-.9 4-2.6 5.8z"></path><path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path></svg>
                    </div>
                    <h3>Kuliner</h3>
                </div>
                <div class="category-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>
                    </div>
                    <h3>Fashion</h3>
                </div>
                <div class="category-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0L12 2.69z"></path><path d="M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg>
                    </div>
                    <h3>Kriya</h3>
                </div>
                <div class="category-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 12H12c-2.8 0-5 2.2-5 5v4c0 1.1.9 2 2 2h6c1.1 0 2-.9 2-2v-4c0-2.8 2.2-5 5-5z"></path><path d="M12 12V2.5A2.5 2.5 0 0 1 14.5 0V0A2.5 2.5 0 0 1 17 2.5V12"></path><path d="M7 12V2.5A2.5 2.5 0 0 1 9.5 0V0A2.5 2.5 0 0 1 12 2.5V12"></path></svg>
                    </div>
                    <h3>Agribisnis</h3>
                </div>
                <div class="category-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <h3>Jasa Digital</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="unggulan" class="section">
        <div class="container">
            <h2 class="section-title">UMKM Unggulan</h2>
            <div class="umkm-grid">
                <div class="umkm-card">
                    <div class="umkm-card-image" style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=800&auto=format&fit=crop');"></div>
                    <div class="umkm-card-content">
                        <span class="category-badge">Kuliner</span>
                        <h3>Sate Ayam Madura Pak Tohir</h3>
                        <p>Sate legendaris dengan bumbu kacang khas yang meresap sempurna. Wajib coba!</p>
                    </div>
                </div>
                <div class="umkm-card">
                    <div class="umkm-card-image" style="background-image: url('https://images.unsplash.com/photo-1445205170230-053b83016050?q=80&w=800&auto=format&fit=crop');"></div>
                    <div class="umkm-card-content">
                        <span class="category-badge">Fashion</span>
                        <h3>Bandung Clothing Distro</h3>
                        <p>Koleksi kaos dan kemeja terkini dengan desain orisinal dan bahan berkualitas tinggi.</p>
                    </div>
                </div>
                <div class="umkm-card">
                     <div class="umkm-card-image" style="background-image: url('https://images.unsplash.com/photo-1599422476906-44b0976a6176?q=80&w=800&auto=format&fit=crop');"></div>
                    <div class="umkm-card-content">
                        <span class="category-badge">Kriya</span>
                        <h3>Batik Tulis Semarang Jaya</h3>
                        <p>Menyediakan batik tulis asli dengan motif klasik dan kontemporer, cocok untuk acara formal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="tentang" class="footer">
        <div class="container">
            <p>&copy; 2025 DirektoriUMKM. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>