@extends('layouts.app')
@section('content')
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


    <!-- Marketing messaging and featurettes
                                                  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <p class="fs-1 text-center fw-bolder">Product</p>


        <div class="album pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group sticky-top ">
                            <p class="mt-2 fs-3 fw-bold">Kategori</p>
                            <li class="list-group-item active " aria-current="true">Baju</li>
                            <li class="list-group-item">Celana</li>
                            <li class="list-group-item">Aksesoris</li>
                        </ul>

                    </div>
                    <div class="col-md-9">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/baju1.jpg') }}" alt="" width="100%" height="300px"
                                        srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/celana1.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/celana2.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/baju2.jpg') }}" alt="" width="100%" height="300px"
                                        srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/celana3.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/baju3.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/baju4.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/celana4.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/celana5.jpg') }}" alt="" width="100%"
                                        height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary">View</button>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
@endsection
