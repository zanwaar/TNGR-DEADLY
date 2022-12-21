<x-admin-layout>
    <div class="container col-xxl-8 px-4 ">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ url('/1.jpg') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">TNGR DEADLY, pakaian dan aksesoris </h1>
                <p class="lead">TNGR DEADLY yang beralamat di Jl. Cendrawasih No.27a Demangan,
                    Yogyakarta, sudah berdiri sejak tahun 2009 adalah jenis usaha yang bergerak di
                    bidang penjualan yang menjual berbagai jenis pakaian dan aksesoris.</p>
            </div>
        </div>
    </div>
    <livewire:product.home-product />
    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </p>
    </footer>
</x-admin-layout>
