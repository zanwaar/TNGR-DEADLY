<div>
    <section class="py-3 container">
        <div class="row">
            <!-- <div class="col-md-5 col-lg-4 order-md-last"> -->

            <div class="col-md-7 col-lg-8">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">List Belanja</span>
                    <!-- <span class="badge bg-primary rounded-pill">3</span> -->
                </h4>
                <ul class="list-group mb-3">
                    @foreach($list as $bg)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <img src="{{$bg->product->foto_url}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="110" height="80" alt="Bootstrap Themes" loading="lazy">


                        </div>
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Rp @convert($bg->product->harga)</small>
                        </div>
                        <div>
                            <div class="btn-group btn-sm">
                                <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button>
                                <button class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $bg->jumlah }}</button>
                                <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button>
                            </div>
                        </div>
                        <div class="div">
                            <?php $total += ($bg->product->harga * $bg->jumlah); ?>
                            <strong>Rp @convert($bg->product->harga * $bg->jumlah)</strong>
                        </div>

                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-5 col-lg-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Pesan</span>
                </h4>
                <ul class="list-group mb-3">

                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="">
                            <h6 class="my-0">Reno</h6>
                            <small>081239981831</small>
                        </div>
                    </li>
                    <li class="list-group-item bg-light">
                        <div class="">
                            <h6 class="mb-3">Alamat</h6>
                            <textarea wire:model.defer="state.deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp @convert($total)</strong>
                    </li>

                </ul>
            </div>
        </div>


    </section>

</div>