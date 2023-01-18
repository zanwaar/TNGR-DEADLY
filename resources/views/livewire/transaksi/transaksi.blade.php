<div>
    <div class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Transaksi</h1>
        </div>
        <div class="card mb-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="d" width="20%">
                        <select wire:change="row($event.target.value)" class="form-control rounded shadow-sm mr-3">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <div class=" input-group input-group-sm">
                            <x-search-input wire:model="searchTerm" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-md table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Total</th>
                            <th scope="col">status</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">opsi</th>
                    </thead>
                    <tbody wire:loading.class="text-muted">
                        @forelse ($transaksi as $index => $bg)
                            <tr>
                                <td style="vertical-align:middle;">{{ $transaksi->firstItem() + $index }}</td>
                                <td style="vertical-align:middle;">{{ $bg->invoice }}</td>
                                <td style="vertical-align:middle;">@convert($bg->total)</td>
                                <td style="vertical-align:middle;"><span
                                        class="badge badge text-bg-{{ $bg->status_badge }}">{{ $bg->status }}</span>
                                </td>
                                <td style="vertical-align:middle;">{{ $bg->created_at }}</td>
                                <td style="vertical-align:middle;">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" wire:click.prevent="detail('{{ $bg->id }}')"
                                            class="btn btn-info btn-sm text-white">Detail</a>
                                        <a href="#" wire:click.prevent="confir('{{ $bg->id }}')"
                                            class="btn btn-dark btn-sm text-white">Konfirmasi</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="7">
                                    <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg"
                                        alt="No results found">
                                    <p class="mt-2">No results found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                {!! $transaksi->links() !!}
            </div>
        </div>
    </div>


    <div class="modal fade" id="from" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        @isset($ts)
                            {{ $ts->invoice }}
                        @endisset
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group mb-3">
                        @isset($ts)
                            <li class="list-group-item d-flex justify-content-between bg-{{ $ts->status_badge }}">
                                <div class="div">
                                    <strong>{{ $ts->status }}</strong>
                                </div>

                            </li>
                        @endisset

                        @isset($list)
                            @for ($i = 1; $i <= $listcount; $i++)
                                <li class="list-group-item d-flex justify-content-between ">
                                    <div>
                                        <img src="{{ $list[$i - 1]->product->foto_url }}"
                                            class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="110"
                                            height="80" alt="Bootstrap Themes" loading="lazy">
                                    </div>
                                    <div>
                                        <h6 class="my-0">Product name</h6>
                                        <small class="text-muted">Rp @convert($list[$i - 1]->product->harga) x
                                            {{ $list[$i - 1]->jumlah }}</small>
                                    </div>
                                    <div class="div">
                                        <?php $total += $list[$i - 1]->product->harga * $list[$i - 1]->jumlah; ?>
                                        <strong>Rp @convert($list[$i - 1]->product->harga * $list[$i - 1]->jumlah)</strong>
                                    </div>
                                </li>
                            @endfor
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div>
                                    <h6 class="my-0">Total</h6>
                                </div>
                                <div class="div">
                                    <strong>Rp @convert($total)</strong>
                                </div>
                            </li>
                        @endisset
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <form wire:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            @isset($ts)
                                {{ $ts->invoice }}
                            @endisset
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Konfirmasi Pembayaran</h4>
                            <p>Silahkan Transfer</p>
                            <p>BRI 1265152757125</p>
                            <p>MANDIRI 1265152757125</p>
                            <hr>
                            @isset($list)
                                @for ($i = 1; $i <= $listcount; $i++)
                                    <?php $total += $list[$i - 1]->product->harga * $list[$i - 1]->jumlah; ?>
                                @endfor
                                <p class="mb-0">Dengan Total Pembayaran Rp @convert($total) </p>
                            @endisset
                        </div>
                        <div class="mb-3" x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label for="formFile" class="form-label">Upload Bukti Pembayran</label>
                            <input wire:model="bukti" class="form-control" type="file" id="formFile">
                            <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                    x-bind:style="`width: ${progress}%`">
                                    <span class="sr-only">100% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                        @error('bukti')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        @if ($bukti)
                            <img src="{{ $bukti->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded">
                        @else
                            <img src="{{ $state['bukti_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">
                        @endif
                        <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">foto </label>
                                    <input type="text" wire:model.defer="state.foto" class="form-control" id="exampleFormControlInput1" placeholder="00000">
                                </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@push('css')
    <link href="{{ asset('toastr.min.css') }}" rel="stylesheet">
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="{{ asset('toastr.min.js') }}"></script>

    <script language="JavaScript">
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-right",
                "progressBar": true
            };
        });
        var myFrom = new bootstrap.Modal("#from");
        var mycon = new bootstrap.Modal("#confir");

        window.addEventListener("show-form", function(event) {
            myFrom.show();
        });
        window.addEventListener("show-confir", function(event) {
            mycon.show();
        });
        window.addEventListener("close-confir", function(event) {
            mycon.hide();
        });
    </script>
@endpush
