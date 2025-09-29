<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Kami - Toko Bunga Anda</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #fdfaf6;
            color: #5d4037;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
            padding: 20px 0;
        }
        header {
            background: #a1887f;
            color: #ffffff;
            padding: 1.5rem 0;
            text-align: center;
            border-bottom: 4px solid #795548;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .page-intro {
            text-align: center;
            margin-top: 25px;
            font-size: 1.1em;
            color: #6d4c41;
        }
        .team-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .team-member {
            background: #ffffff;
            width: 30%;
            min-width: 280px;
            margin: 15px;
            text-align: center;
            padding: 25px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .team-member:hover {
            transform: translateY(-5px);
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Membuat gambar menjadi bulat */
            object-fit: cover;
            border: 4px solid #f0e9e9;
        }
        .team-member h3 {
            margin: 15px 0 5px 0;
            color: #795548;
            font-size: 1.4em;
        }
        .team-member .role {
            font-style: italic;
            color: #a1887f;
            font-size: 1em;
            margin-bottom: 15px;
        }
        .team-member p {
            font-size: 0.95em;
        }
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            background: #a1887f;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <header>
        <h1>Orang di Balik Rangkaian Indah</h1>
    </header>

    <div class="container">
        <p class="page-intro">
            Kenali tim kami yang bersemangat dan berdedikasi untuk menghadirkan buket bunga terbaik untuk setiap momen spesial Anda.
        </p>

        <div class="team-container">
            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Foto Anggota Tim 1">
                <h3>Andini Putri</h3>
                <div class="role">Founder & Lead Florist</div>
                <p>
                    Dengan kecintaannya pada seni dan bunga, Andini adalah jantung dari setiap kreasi buket kami. Keahliannya memastikan setiap rangkaian bunga memiliki cerita dan sentuhan personal.
                </p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Foto Anggota Tim 2">
                <h3>Bima Santoso</h3>
                <div class="role">Marketing & Customer Happiness</div>
                <p>
                    Bima adalah wajah ramah di balik layar. Ia berdedikasi untuk memberikan pelayanan terbaik dan memastikan setiap pelanggan merasa puas dan bahagia dengan pesanan mereka.
                </p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Foto Anggota Tim 3">
                <h3>Citra Lestari</h3>
                <div class="role">Operations & Quality Control</div>
                <p>
                    Citra memastikan semua pesanan diproses dengan sempurna, mulai dari pemilihan bunga paling segar hingga pengiriman yang tepat waktu. Ketelitiannya adalah kunci kualitas kami.
                </p>
            </div>
        </div>
    </div>

    <footer>
        <p>Hak Cipta &copy; 2025 Nama Toko Bunga Anda</p>
    </footer>

</body>
</html>