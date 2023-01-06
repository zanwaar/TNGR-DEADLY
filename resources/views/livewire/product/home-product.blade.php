<div>
    <div class="container marketing">
        <p class="fs-1 text-center fw-bolder">Product</p>
        <div class="album pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group sticky-top ">
                            <p class="mt-2 fs-3 fw-bold">Kategori</p>

                            <li class="list-group-item @if($filter == null) active @endif  " wire:click=" filter" aria-current="true">All </li>
                            @foreach($kategori as $bg)
                            <li class="list-group-item  @if($filter == $bg->kategori) active @endif " wire:click="filter('{{ $bg->kategori }}')">{{ $bg->kategori  }}</li>
                            @endforeach
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
                                                <a href="{{ route('product-detail', $bg->id) }}" class="btn btn-sm btn-primary">Beli</a>

                                            </div>
                                            <h6 class="dispaly-6 fw-bold my-3">Rp @convert($bg->harga)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col">
                                <h3 class="mt-5">Product Tidak Ada</h3>
                            </div>
                            @endforelse

                        </div>
                        <div class="div mt-3">

                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>