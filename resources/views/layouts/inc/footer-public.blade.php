<footer class="footer-coffee text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="font-heading font-weight-bold mb-3">THE COFFEE HAVEN</h5>
                <p class="text-cream-muted small">
                    Kami menyajikan kopi dan camilan terbaik dengan bahan segar pilihan setiap hari.
                </p>
            </div>

            <div class="col-md-2 col-6 mb-4">
                <h6 class="font-weight-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('pelanggan.beranda') }}" class="footer-link">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('pelanggan.menu') }}" class="footer-link">Menu</a></li>
                    <li class="mb-2"><a href="{{ route('pelanggan.about') }}" class="footer-link">About</a></li>
                    <li class="mb-2"><a href="{{ route('pelanggan.contact') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <h6 class="font-weight-bold mb-3">Kategori</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2 text-cream-muted">Kopi</li>
                    <li class="mb-2 text-cream-muted">Non-Kopi</li>
                    <li class="mb-2 text-cream-muted">Pastry</li>
                    <li class="mb-2 text-cream-muted">Camilan</li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="font-weight-bold mb-3">Kontak</h6>
                <p class="text-cream-muted small mb-1">Jl. Serayu No. 23</p>
                <p class="text-cream-muted small mb-1">+62 812-xxxx-xxxx</p>
                <p class="text-cream-muted small mb-0">hello@coffeehaven.id</p>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center">
            <small class="text-cream-muted mb-2 mb-md-0">&copy; {{ date('Y') }} The Coffee Haven. All rights reserved.</small>

            <div class="text-cream-muted small">
    <span class="mr-3">IG: @coffeehaven.id</span>
    <span class="mr-3">TikTok: @coffeehaven.id</span>
    <span>FB: The Coffee Haven</span>
</div>
        </div>
    </div>
</footer>