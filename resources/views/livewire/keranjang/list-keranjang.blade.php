<div>
    <section class="py-3 container">
        <div class="row">
            <!-- <div class="col-md-5 col-lg-4 order-md-last"> -->
            <div class="col-md-7 col-lg-8">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
                    @foreach($list as $bg)
                    <div class="d-flex text-muted pt-3">
                        <img src="{{$bg->product->foto_url}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="110" height="80" alt="Bootstrap Themes" loading="lazy">
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">_{$bg->product->nama}}</strong>
                            Rp @convert($bg->product->harga) {
                        </p>
                    </div>
                    @endforeach
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#e83e8c" /><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
                        </svg>
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">@username</strong>
                            Some more representative placeholder content, related to this other user. Another status update, perhaps.
                        </p>
                    </div>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#6f42c1" /><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
                        </svg>
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">@username</strong>
                            This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
                        </p>
                    </div>
                    <small class="d-block text-end mt-3">
                        <a href="#">All updates</a>
                    </small>
                </div>

            </div>
            <div class="col-md-5 col-lg-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($list as $bg)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Rp @convert($bg->product->harga)</small>


                        </div>
                        <div class="div">
                            <span class="text-muted">Rp @convert($bg->product->harga * $bg->jumlah)</span>
                            <br>
                            <div class="btn-group btn-sm mt-2">
                                <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button>
                                <button class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $bg->jumlah }}</button>
                                <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button>
                            </div>
                        </div>

                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">−$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
                <div class="row">
                    @foreach($list as $bg)

                    <div class="col-md-4 mb-3">
                        <img src="{{$bg->product->foto_url}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">

                    </div>
                    <div class="col-md-8 mb-3">
                        <h5 class="">{{$bg->product->nama}}</h5>
                        <button disabled class="btn btn-sm btn-dark  px-3">Rp @convert($bg->product->harga)</button>
                        <button disabled class="btn btn-sm btn-dark px-3">x</button>
                        <div class="btn-group">
                            <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button>
                            <button class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $bg->jumlah }}</button>
                            <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button>
                        </div>
                        <button disabled class="btn btn-sm btn-dark px-3">Rp @convert($bg->product->harga * $bg->jumlah)</button>
                        <!-- <p>{{ $bg  }}</p> -->
                    </div>
                    @endforeach
                </div>

            </div>
        </div>


    </section>

</div>