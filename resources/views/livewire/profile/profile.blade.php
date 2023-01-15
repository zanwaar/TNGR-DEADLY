<div>
    <div class="@role('user') container  @endrole d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h2">Profile</h1>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class=" card shadow-sm bg-light">
                    <div class="card-body box-profile">
                        <h3 class="my-0"> {{ Auth::user()->name }}</h3>
                        <small> {{ Auth::user()->email }}</small>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <!-- Profile Image -->
                <div class=" card shadow-sm">
                    <div class="card-header">

                    </div>
                    <div class="card-body box-profile">
                        <form wire:submit.prevent="update">
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">

                                    <input id="email" type="email" class="form-control bg-light" name="email" value="{{ Auth::user()->email  }}" readonly>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('No Telepon') }}</label>

                                <div class="col-md-6">
                                    <input type="text" wire:model.defer="state.nohp" class="form-control @error('nohp') is-invalid @enderror" id="nohp" placeholder="Masukan nohp ">
                                    @error('nohp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Alamat') }}</label>

                                <div class="col-md-10">
                                    <textarea wire:model.defer="state.alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-end"></label>

                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary btn-block px-5">Save</button>
                                </div>
                            </div>





                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>


            <!-- /.col -->
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
    window.addEventListener("hide-form", function(event) {
        toastr.success(event.detail.message, 'Success!');
    });
</script>
@endpush