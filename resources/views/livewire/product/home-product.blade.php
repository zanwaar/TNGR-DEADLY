<div>
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
                            @forelse ($data as $index => $bg)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{$bg->foto_url}}" alt="" width="100%" height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product-detail', $bg->id) }}" class="btn btn-sm btn-outline-secondary">View</a>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ url('/product/baju1.jpg') }}" alt="" width="100%" height="300px" srcset="">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product-detail') }}" class="btn btn-sm btn-outline-secondary">View</a>

                                            </div>
                                            <button type="button" class="btn btn-sm btn-secondary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>