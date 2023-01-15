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
                                <!-- <button wire:click="increment" class="btn btn-sm btn-outline-dark px-3">+</button> -->
                                <button class="btn btn-sm btn-outline-dark px-3 fw-bold">{{ $bg->jumlah }}</button>
                                <!-- <button wire:click="decrement" class="btn btn-sm btn-outline-dark px-3">-</button> -->
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
                            <h3 class="my-0"> {{ Auth::user()->name }}</h3>
                            <small> {{ Auth::user()->email }}</small>
                        </div>
                    </li>
                    <li class="list-group-item bg-light">
                        <div class="">
                            <h6 class="mb-3">No Telepon</h6>
                            <input type="text" wire:model.defer="state.nohp" class="form-control bg-light" readonly id="nohp">
                            @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </li>
                    <li class="list-group-item bg-light">
                        <div class="">
                            <h6 class="mb-3">Alamat</h6>
                            <textarea wire:model.defer="state.alamat" class="form-control bg-light" readonly id="exampleFormControlTextarea1" rows="3"></textarea>

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">

                        <span>Total</span>
                        <strong>Rp @convert($total)</strong>
                    </li>
                    @if (count($list) !== 0)
                    <li class="list-group-item">
                        <form wire:submit.prevent="pesan">
                            <input type="hidden" id="total" value="{{$total}}">


                            <button type="submit" class="btn btn-primary btn-block px-5">Pesan</button>

                        </form>
                    </li>
                    @endif


                </ul>
            </div>
        </div>


    </section>

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

    window.addEventListener("alert-danger", function(event) {

        toastr.error(event.detail.message, 'Gagal!');
    });
    window.addEventListener("alert-success", function(event) {
        toastr.e(event.detail.message, 'Success!');
    });
    $('form').submit(function() {
        @this.set('total', $('#total').val());
    })
</script>
@endpush