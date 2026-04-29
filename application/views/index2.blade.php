<!DOCTYPE html>
<html lang="{{ config('application.language', 'id') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT BPR Karawang Jabar (Perseroda) | Company Profile</title>
    <meta name="description"
        content="Company Profile PT BPR Karawang Jabar (Perseroda), bank perkreditan rakyat milik daerah yang berfokus pada simpanan, pembiayaan, dan penguatan ekonomi lokal.">
    <style>
        :root {
            --navy: #0f2742;
            --navy-deep: #091728;
            --gold: #b9975b;
            --gold-soft: #d9c29a;
            --ivory: #f7f4ee;
            --paper: #fffdf9;
            --ink: #233142;
            --muted: #637083;
            --line: rgba(15, 39, 66, 0.12);
            --shadow: 0 22px 60px rgba(9, 23, 40, 0.12);
            --max-width: 1120px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(185, 151, 91, 0.18), transparent 28%),
                linear-gradient(180deg, #f2ece1 0%, #f8f5ef 18%, #f4f0e8 100%);
            line-height: 1.8;
        }

        .page-shell {
            width: min(calc(100% - 40px), var(--max-width));
            margin: 32px auto;
            background: var(--paper);
            border: 1px solid rgba(185, 151, 91, 0.2);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .cover {
            position: relative;
            padding: 88px 72px 72px;
            color: #fff;
            background:
                linear-gradient(135deg, rgba(9, 23, 40, 0.92), rgba(15, 39, 66, 0.86)),
                linear-gradient(45deg, rgba(185, 151, 91, 0.16), transparent 45%);
        }

        .cover::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 6px;
            background: linear-gradient(90deg, var(--gold), #e3d1a9, var(--gold));
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 18px;
            padding: 7px 14px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            color: var(--gold-soft);
            font-size: 12px;
            letter-spacing: 0.28em;
            text-transform: uppercase;
        }

        h1,
        h2,
        h3 {
            margin: 0;
            font-weight: 600;
            line-height: 1.2;
        }

        h1 {
            max-width: 780px;
            font-size: clamp(2.5rem, 4vw, 4.4rem);
            letter-spacing: 0.01em;
        }

        .tagline {
            max-width: 720px;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.86);
            font-size: 1.15rem;
        }

        .cover-meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-top: 42px;
        }

        .cover-meta div {
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.82);
        }

        .cover-meta strong {
            display: block;
            margin-bottom: 6px;
            color: var(--gold-soft);
            font-size: 0.78rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .content {
            padding: 28px 72px 72px;
        }

        .section {
            padding: 34px 0;
            border-bottom: 1px solid var(--line);
        }

        .section:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .section-header {
            margin-bottom: 18px;
        }

        .section-number {
            display: inline-block;
            margin-bottom: 10px;
            color: var(--gold);
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        h2 {
            color: var(--navy);
            font-size: clamp(1.7rem, 2vw, 2.3rem);
        }

        p {
            margin: 0 0 18px;
            font-size: 1.02rem;
        }

        p:last-child {
            margin-bottom: 0;
        }

        .lead {
            color: var(--muted);
            font-size: 1.08rem;
        }

        .grid-two {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 28px;
            align-items: start;
        }

        .panel {
            padding: 24px;
            background: linear-gradient(180deg, rgba(185, 151, 91, 0.08), rgba(185, 151, 91, 0.03));
            border: 1px solid rgba(185, 151, 91, 0.18);
        }

        .panel h3 {
            margin-bottom: 12px;
            color: var(--navy);
            font-size: 1.2rem;
        }

        .statement-list,
        .card-list {
            display: grid;
            gap: 18px;
            margin-top: 18px;
        }

        .statement-item,
        .card {
            padding: 22px;
            border: 1px solid var(--line);
            background: #fff;
        }

        .statement-item strong,
        .card strong {
            display: block;
            margin-bottom: 8px;
            color: var(--navy);
            font-size: 1rem;
        }

        .quad-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-top: 20px;
        }

        .closing {
            padding: 34px;
            color: #fff;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
        }

        .closing p {
            color: rgba(255, 255, 255, 0.88);
        }

        @media (max-width: 900px) {
            .cover,
            .content {
                padding-left: 28px;
                padding-right: 28px;
            }

            .cover-meta,
            .grid-two,
            .quad-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <main class="page-shell">
        <section class="cover">
            <span class="eyebrow">Company Profile</span>
            <h1>PT BPR Karawang Jabar (Perseroda)</h1>
            <p class="tagline">Melayani dengan integritas, tumbuh bersama masyarakat, dan menggerakkan ekonomi daerah melalui layanan perbankan yang aman, terpercaya, serta berorientasi pada kemajuan UMKM.</p>
            <div class="cover-meta">
                <div>
                    <strong>Fokus Utama</strong>
                    Simpanan, pembiayaan, dan pelayanan keuangan yang mudah dijangkau masyarakat.
                </div>
                <div>
                    <strong>Orientasi</strong>
                    Penguatan ekonomi lokal melalui dukungan nyata terhadap pelaku usaha mikro, kecil, dan menengah.
                </div>
                <div>
                    <strong>Landasan</strong>
                    Tata kelola perusahaan yang baik, profesionalisme, dan kepercayaan publik.
                </div>
            </div>
        </section>

        <div class="content">
            <section class="section">
                <div class="section-header">
                    <span class="section-number">01</span>
                    <h2>Tentang Perusahaan</h2>
                </div>
                <div class="grid-two">
                    <div>
                        <p>PT BPR Karawang Jabar (Perseroda) merupakan bank perkreditan rakyat milik daerah yang hadir untuk memperluas akses layanan keuangan bagi masyarakat, khususnya di wilayah Karawang dan sekitarnya. Sebagai institusi keuangan daerah, perusahaan menjalankan peran strategis dalam menghimpun dana masyarakat melalui produk simpanan serta menyalurkannya kembali dalam bentuk pembiayaan yang produktif, sehat, dan bertanggung jawab.</p>
                        <p>Dengan mandat pelayanan yang kuat, perusahaan tidak sekadar menjalankan fungsi perbankan, tetapi juga mengambil bagian dalam mendorong pemerataan pertumbuhan ekonomi. Fokus pelayanan diarahkan pada kebutuhan masyarakat dan pelaku UMKM yang memerlukan solusi keuangan yang lebih dekat, lebih memahami konteks lokal, dan lebih adaptif terhadap dinamika usaha di daerah.</p>
                    </div>
                    <aside class="panel">
                        <h3>Tujuan Perusahaan</h3>
                        <p>Menyediakan layanan perbankan yang aman, mudah diakses, dan bernilai tambah bagi masyarakat, sekaligus mendukung kesejahteraan sosial serta pertumbuhan ekonomi daerah secara berkelanjutan.</p>
                    </aside>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">02</span>
                    <h2>Sejarah Singkat</h2>
                </div>
                <p>PT BPR Karawang Jabar (Perseroda) lahir dari proses transformasi kelembagaan PD Bank Perkreditan Rakyat BKPD Cilamaya. Transformasi tersebut merupakan langkah strategis untuk memperkuat struktur perusahaan, menyesuaikan dengan perkembangan regulasi, serta meningkatkan kapasitas institusi dalam menjawab kebutuhan masyarakat dan dunia usaha yang semakin dinamis.</p>
                <p>Perubahan menjadi Perseroan Daerah dilakukan berdasarkan regulasi pemerintah daerah dan persetujuan otoritas yang berwenang, termasuk Otoritas Jasa Keuangan. Perjalanan ini menandai komitmen perusahaan untuk beroperasi dengan tata kelola yang lebih modern, akuntabel, dan profesional, tanpa meninggalkan akar pengabdian kepada masyarakat yang telah menjadi fondasi sejak awal berdirinya lembaga.</p>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">03</span>
                    <h2>Visi &amp; Misi</h2>
                </div>
                <div class="statement-list">
                    <div class="statement-item">
                        <strong>Visi</strong>
                        Menjadi BPR milik daerah yang unggul, terpercaya, dan berdaya saing dalam mendukung inklusi keuangan serta pertumbuhan ekonomi lokal yang berkelanjutan.
                    </div>
                    <div class="statement-item">
                        <strong>Misi 1</strong>
                        Menyelenggarakan layanan perbankan yang profesional, aman, dan mudah diakses untuk memenuhi kebutuhan simpanan serta pembiayaan masyarakat.
                    </div>
                    <div class="statement-item">
                        <strong>Misi 2</strong>
                        Memperkuat peran perusahaan sebagai mitra strategis UMKM melalui pembiayaan produktif, pendampingan, dan pendekatan layanan yang memahami potensi ekonomi daerah.
                    </div>
                    <div class="statement-item">
                        <strong>Misi 3</strong>
                        Menerapkan prinsip tata kelola perusahaan yang baik, manajemen risiko yang sehat, dan budaya kerja berintegritas untuk menjaga kepercayaan seluruh pemangku kepentingan.
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">04</span>
                    <h2>Nilai-Nilai Perusahaan</h2>
                </div>
                <div class="quad-grid">
                    <div class="card">
                        <strong>Profesionalisme</strong>
                        Setiap layanan dijalankan dengan kompetensi, ketelitian, dan orientasi hasil yang mencerminkan standar perbankan yang sehat.
                    </div>
                    <div class="card">
                        <strong>Integritas dan Kepercayaan</strong>
                        Perusahaan menjaga amanah nasabah melalui perilaku yang jujur, transparan, dan konsisten dalam setiap pengambilan keputusan.
                    </div>
                    <div class="card">
                        <strong>Pelayanan Publik</strong>
                        Kepentingan masyarakat menjadi pusat perhatian, dengan pendekatan pelayanan yang responsif, ramah, dan solutif.
                    </div>
                    <div class="card">
                        <strong>Komitmen pada Daerah</strong>
                        Setiap langkah bisnis diarahkan untuk memperkuat perekonomian lokal serta menciptakan manfaat jangka panjang bagi lingkungan sekitar.
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">05</span>
                    <h2>Produk &amp; Layanan</h2>
                </div>
                <p class="lead">Portofolio layanan perusahaan dirancang untuk menjawab kebutuhan dasar masyarakat dan pelaku usaha dengan prinsip kemudahan, keamanan, dan kebermanfaatan ekonomi.</p>
                <div class="statement-list">
                    <div class="statement-item">
                        <strong>Layanan Simpanan</strong>
                        Produk simpanan disusun untuk mendorong kebiasaan menabung, pengelolaan keuangan yang sehat, serta perlindungan dana nasabah melalui mekanisme layanan yang tertib dan terpercaya.
                    </div>
                    <div class="statement-item">
                        <strong>Pembiayaan dan Kredit</strong>
                        Fasilitas pembiayaan diberikan untuk kebutuhan produktif maupun konsumtif yang terukur, dengan proses analisis yang prudent dan tetap mempertimbangkan kemampuan serta karakter usaha nasabah.
                    </div>
                    <div class="statement-item">
                        <strong>Layanan Nasabah</strong>
                        Perusahaan mengedepankan proses layanan yang jelas, pendampingan informatif, dan komunikasi yang terbuka agar setiap nasabah memperoleh pengalaman perbankan yang nyaman dan meyakinkan.
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">06</span>
                    <h2>Komitmen terhadap UMKM</h2>
                </div>
                <p>UMKM merupakan fondasi penting perekonomian daerah karena menjadi sumber produktivitas, penciptaan lapangan kerja, dan penggerak sirkulasi ekonomi di tingkat lokal. PT BPR Karawang Jabar (Perseroda) memandang sektor ini sebagai mitra pertumbuhan yang harus diperkuat secara berkesinambungan.</p>
                <p>Komitmen tersebut diwujudkan melalui penyediaan akses pembiayaan yang relevan dengan skala usaha, pendekatan pelayanan yang memahami karakter pasar lokal, serta semangat membangun hubungan jangka panjang dengan pelaku usaha. Perusahaan percaya bahwa dukungan keuangan yang tepat sasaran akan membantu UMKM meningkatkan kapasitas usaha, memperluas pasar, dan memperkuat daya tahan bisnis di tengah perubahan ekonomi.</p>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">07</span>
                    <h2>Tata Kelola Perusahaan</h2>
                </div>
                <p>Dalam menjalankan kegiatan usaha, perusahaan menempatkan Good Corporate Governance sebagai pilar utama. Penerapan tata kelola perusahaan yang baik tidak hanya dipahami sebagai kewajiban kepatuhan, melainkan sebagai fondasi untuk menjaga keberlanjutan, reputasi, dan kualitas pengambilan keputusan.</p>
                <div class="quad-grid">
                    <div class="card">
                        <strong>Transparansi</strong>
                        Menyampaikan informasi yang relevan secara jelas dan bertanggung jawab kepada pemangku kepentingan.
                    </div>
                    <div class="card">
                        <strong>Akuntabilitas</strong>
                        Menegaskan kejelasan fungsi, peran, dan pertanggungjawaban agar organisasi berjalan efektif.
                    </div>
                    <div class="card">
                        <strong>Tanggung Jawab</strong>
                        Menjalankan usaha sesuai peraturan perundang-undangan serta prinsip kehati-hatian perbankan.
                    </div>
                    <div class="card">
                        <strong>Kewajaran</strong>
                        Menjaga perlakuan yang adil bagi nasabah, mitra usaha, pemegang kepentingan, dan seluruh unsur organisasi.
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">08</span>
                    <h2>Keunggulan Kompetitif</h2>
                </div>
                <div class="statement-list">
                    <div class="statement-item">
                        <strong>Kedekatan dengan Masyarakat</strong>
                        Sebagai BPR milik daerah, perusahaan memiliki pemahaman yang kuat terhadap kebutuhan, potensi, dan karakter ekonomi masyarakat setempat.
                    </div>
                    <div class="statement-item">
                        <strong>Orientasi Pelayanan</strong>
                        Layanan tidak berhenti pada transaksi, tetapi diarahkan untuk membangun kepercayaan, memberikan kenyamanan, dan menciptakan hubungan jangka panjang.
                    </div>
                    <div class="statement-item">
                        <strong>Dukungan terhadap Ekonomi Lokal</strong>
                        Setiap aktivitas penghimpunan dan penyaluran dana dirancang untuk memberikan dampak riil terhadap penguatan ekosistem usaha daerah.
                    </div>
                    <div class="statement-item">
                        <strong>Tata Kelola yang Sehat</strong>
                        Komitmen pada GCG, kepatuhan, dan prudential banking menjadi pembeda utama dalam menjaga stabilitas serta kredibilitas perusahaan.
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="section-header">
                    <span class="section-number">09</span>
                    <h2>Penutup</h2>
                </div>
                <div class="closing">
                    <p>PT BPR Karawang Jabar (Perseroda) hadir sebagai institusi keuangan daerah yang tidak hanya melayani, tetapi juga membangun harapan dan peluang. Dengan semangat profesionalisme, pelayanan publik, dan tata kelola yang kuat, perusahaan berkomitmen menjadi mitra terpercaya bagi masyarakat dalam mewujudkan stabilitas keuangan dan pertumbuhan usaha.</p>
                    <p>Ke depan, perusahaan akan terus memperkuat peran strategisnya dalam mendukung inklusi keuangan, mendorong kemajuan UMKM, dan menciptakan nilai berkelanjutan bagi daerah. Melalui kepercayaan yang dijaga dengan integritas, PT BPR Karawang Jabar (Perseroda) siap tumbuh bersama masyarakat menuju masa depan ekonomi yang lebih kokoh, inklusif, dan bermartabat.</p>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
