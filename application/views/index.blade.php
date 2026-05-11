@layout('template.master')

@section('title', 'Company Profile')

@section('content')
    <?php
    $appDescription = trim(strip_tags(Helper::setting('app-deskripsi') ?: 'Sistem company profile untuk mengelola informasi perusahaan, media, menu, pengguna, role, dan permission melalui panel administrator.'));
    $companyName = 'PT BPR Karawang Jabar (Perseroda)';
    $heroImage = 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';
    ?>

    <section id="beranda" class="relative isolate min-h-[calc(100vh-5rem)] overflow-hidden bg-brand-950 text-white">
        <img src="{{ $heroImage }}" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-brand-950 via-brand-950/85 to-brand-950/35"></div>
        <div class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-gold-500 via-brand-500 to-emerald-500"></div>

        <div class="mx-auto flex min-h-[calc(100vh-5rem)] max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p class="mb-6 flex items-center gap-3 text-xs font-black uppercase tracking-[0.22em] text-gold-100 before:h-px before:w-10 before:bg-gold-100">
                    Company Profile
                </p>
                <h1 class="max-w-5xl text-5xl font-black leading-[0.98] tracking-tight sm:text-6xl lg:text-7xl">
                    Mitra keuangan daerah yang dekat, aman, dan produktif.
                </h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-white/85 sm:text-xl">
                    {{ $companyName }} hadir untuk memperluas akses layanan perbankan, memperkuat budaya menabung, dan mendukung pertumbuhan ekonomi masyarakat Karawang.
                </p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#tentang" class="inline-flex h-12 items-center justify-center rounded-app bg-white px-5 text-sm font-black text-brand-950 shadow-xl transition hover:bg-brand-50">
                        Lihat Profil
                    </a>
                    <a href="#layanan" class="inline-flex h-12 items-center justify-center rounded-app border border-white/30 bg-white/10 px-5 text-sm font-black text-white transition hover:bg-white/15">
                        Produk Layanan
                    </a>
                </div>

                <div class="mt-14 grid overflow-hidden rounded-app border border-white/20 bg-white/10 backdrop-blur-xl sm:grid-cols-3">
                    <div class="border-b border-white/15 p-5 sm:border-b-0 sm:border-r">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Fokus</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">Simpanan, tabungan berencana, dan kredit produktif.</p>
                    </div>
                    <div class="border-b border-white/15 p-5 sm:border-b-0 sm:border-r">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Wilayah</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">Melayani masyarakat dan pelaku usaha di Karawang.</p>
                    </div>
                    <div class="p-5">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Komitmen</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">Pelayanan terpercaya dengan tata kelola yang baik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Tentang Perusahaan</p>
                    <h2 class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        Menghubungkan layanan keuangan dengan kebutuhan masyarakat lokal.
                    </h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">{{ $appDescription }}</p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-[1fr_0.8fr]">
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <div class="prose max-w-none prose-slate dark:prose-invert">
                        <p><strong>{{ $companyName }}</strong> adalah lembaga perbankan daerah yang berorientasi pada pelayanan masyarakat, penguatan UMKM, dan pengelolaan keuangan yang sehat.</p>
                        <p>Melalui layanan yang mudah dijangkau, perusahaan berupaya menjadi mitra yang membantu nasabah menyimpan dana, merencanakan kebutuhan, dan memperoleh dukungan pembiayaan produktif.</p>
                        <p>Setiap aktivitas perusahaan diarahkan pada prinsip kehati-hatian, pelayanan yang ramah, serta tata kelola yang transparan dan akuntabel.</p>
                    </div>
                </article>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-app bg-brand-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-brand-700 dark:text-brand-100">01</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Layanan dekat dengan masyarakat daerah.</p>
                    </div>
                    <div class="rounded-app bg-gold-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-gold-600">02</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Produk simpanan dan pembiayaan produktif.</p>
                    </div>
                    <div class="rounded-app bg-emerald-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-emerald-700 dark:text-emerald-300">03</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Tata kelola berbasis kepatuhan.</p>
                    </div>
                    <div class="rounded-app bg-slate-100 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-slate-800 dark:text-white">04</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Dukungan untuk ekonomi lokal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="border-y border-slate-200 bg-white py-20 dark:border-white/10 dark:bg-slate-900 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Produk dan Layanan</p>
                    <h2 class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        Solusi perbankan yang sederhana, aman, dan tepat guna.
                    </h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">Produk disusun untuk membantu nasabah mengelola simpanan, merencanakan kebutuhan, dan mengembangkan usaha secara berkelanjutan.</p>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-slate-950">
                    <span class="grid size-10 place-items-center rounded-app bg-gold-50 text-sm font-black text-gold-600">01</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Tabungan</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Simpanan harian untuk membantu nasabah menabung secara aman dengan layanan yang mudah dijangkau.</p>
                </article>
                <article class="rounded-app border border-brand-900 bg-brand-950 p-7 text-white shadow-soft transition hover:-translate-y-1">
                    <span class="grid size-10 place-items-center rounded-app bg-white/10 text-sm font-black text-gold-100">02</span>
                    <h3 class="mt-8 text-2xl font-black">TAHARA</h3>
                    <p class="mt-3 leading-7 text-white/75">Tabungan Hari Raya untuk membantu perencanaan kebutuhan dengan setoran yang lebih disiplin.</p>
                </article>
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-slate-950">
                    <span class="grid size-10 place-items-center rounded-app bg-emerald-50 text-sm font-black text-emerald-700">03</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Kredit Produktif</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Pembiayaan bagi masyarakat dan pelaku usaha untuk mendukung kegiatan ekonomi yang sehat.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl overflow-hidden rounded-app bg-brand-950 shadow-soft sm:grid sm:grid-cols-2">
            <div class="bg-gradient-to-br from-brand-700 to-brand-950 p-8 text-white sm:p-10 lg:p-12">
                <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Visi</p>
                <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight sm:text-4xl">
                    Menjadi BPR daerah yang sehat, profesional, terpercaya, dan berperan aktif dalam peningkatan kesejahteraan masyarakat.
                </h2>
            </div>
            <div class="p-8 text-white sm:p-10 lg:p-12">
                <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Misi</p>
                <div class="mt-6 grid gap-3">
                    <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app border border-white/10 bg-white/5 p-4"><span class="font-black text-gold-100">01</span><p class="text-white/80">Menyediakan layanan keuangan yang aman, cepat, dan berorientasi pada kebutuhan nasabah.</p></div>
                    <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app border border-white/10 bg-white/5 p-4"><span class="font-black text-gold-100">02</span><p class="text-white/80">Mendukung pembiayaan sektor produktif, khususnya UMKM dan masyarakat daerah.</p></div>
                    <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app border border-white/10 bg-white/5 p-4"><span class="font-black text-gold-100">03</span><p class="text-white/80">Menerapkan tata kelola perusahaan yang transparan, akuntabel, dan patuh regulasi.</p></div>
                    <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app border border-white/10 bg-white/5 p-4"><span class="font-black text-gold-100">04</span><p class="text-white/80">Meningkatkan kualitas sumber daya manusia untuk pelayanan yang profesional.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section id="nilai" class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Nilai Perusahaan</p>
                    <h2 class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        Fondasi kerja yang menjaga kepercayaan nasabah.
                    </h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">Kepercayaan dibangun melalui konsistensi layanan, pengambilan keputusan yang hati-hati, dan tanggung jawab kepada pemangku kepentingan.</p>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span class="grid size-10 place-items-center rounded-app bg-brand-50 text-sm font-black text-brand-700 dark:bg-white/10 dark:text-brand-100">A</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Amanah</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Menjaga dana dan kepercayaan nasabah dengan integritas dalam setiap proses layanan.</p>
                </article>
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span class="grid size-10 place-items-center rounded-app bg-gold-50 text-sm font-black text-gold-600">P</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Profesional</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Bekerja dengan kompetensi, disiplin, dan standar pelayanan yang jelas.</p>
                </article>
                <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span class="grid size-10 place-items-center rounded-app bg-emerald-50 text-sm font-black text-emerald-700">T</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Tumbuh Bersama</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Mendorong kemajuan nasabah, pelaku usaha, dan ekonomi daerah secara berkelanjutan.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="kontak" class="pt-10">
        <div class="mx-auto max-w-7xl rounded-t-app bg-brand-950 px-4 py-12 text-white shadow-soft sm:px-8 lg:px-12">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Kontak</p>
            <h2 class="mt-4 max-w-3xl text-4xl font-black tracking-tight sm:text-5xl">Siap melayani kebutuhan perbankan Anda.</h2>
            <p class="mt-5 max-w-2xl leading-8 text-white/75">Hubungi kantor {{ $companyName }} untuk informasi produk, layanan, dan kebutuhan kerja sama.</p>

            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Alamat</p>
                    <p class="mt-2 font-bold">Jln Raya Cilamaya, Komplek Kantor Kecamatan Cilamaya Wetan</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Telepon</p>
                    <p class="mt-2 font-bold">(0264) 8380203</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Email</p>
                    <p class="mt-2 font-bold">ptbptkarawang@gmail.com</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Jam Layanan</p>
                    <p class="mt-2 font-bold">Senin - Jumat, 08.00 - 14.00</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Panel Admin</p>
                    <a class="mt-2 inline-flex font-bold underline decoration-white/30 underline-offset-4" href="{{ url('admin/signin') }}">Masuk dashboard administrator</a>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Status</p>
                    <p class="mt-2 font-bold">Company profile aktif dan siap dikembangkan.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
