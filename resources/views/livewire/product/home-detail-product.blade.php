<div>
    <div class="container col-xxl-8 px-4 py-5 ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold "><a href="#" class="text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">Product Detail</li>
            </ol>
        </nav>
        <div class="row  g-5 ">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{$state['foto_url']}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h4 class="text-uppercase text-black-50">Kategori {{$ktg->kategori}}</h4>
                <h1 class="display-5">{{$state['nama']}}</h1>
                <h3 class="dispaly-6 fw-bold my-3">Rp @convert($state['harga'])</h3>
                <p class="lead">{{$state['deskripsi']}}</p>

                <div class="btn-group">
                    <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button>
                    <button class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $counter }}</button>
                    <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button>
                </div>
                <button wire:click="createChart" class="btn btn-sm btn-dark px-3">add to cart</button>
            </div>
        </div>
    </div>
</div>
@push('css')
<link href="{{ asset('toastr.min.css') }}" rel="stylesheet">
@endpush
@push('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="{{ asset('toastr.min.js') }}">
</script>

<script language="JavaScript">
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "progressBar": true
        };
    });

    window.addEventListener("alert-success", function(event) {
        toastr.success(event.detail.message, 'Success!');
    });
    window.addEventListener("alert-danger", function(event) {
        toastr.error(event.detail.message, 'Gagal!');
    });
</script>
@endpush