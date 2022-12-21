<div>
    <div class="container col-xxl-8 px-4 py-5 ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold "><a href="#" class="text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">Product Detail</li>
            </ol>
        </nav>
        <div class="row align-items-center g-5 ">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ url('/1.jpg') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                    width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h4 class="text-uppercase text-black-50">Kategori Product</h4>
                <h1 class="display-5">Nama Product</h1>
                <h3 class="dispaly-6 fw-bold my-3">Rp 99.000</h3>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, aut.</p>
                
                <div class="btn-group">
                    <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button>
                    <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button>
                    <button  class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $counter }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
