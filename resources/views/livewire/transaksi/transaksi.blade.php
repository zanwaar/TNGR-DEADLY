<div>
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                            <td style="vertical-align:middle;"><span class="badge badge text-bg-{{ $bg->status_badge }}">{{ $bg->status }}</span></td>
                            <td style="vertical-align:middle;">{{ $bg->created_at }}</td>
                            <td style="vertical-align:middle;">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" wire:click.prevent="detail('{{ $bg->id }}')" class="btn btn-info btn-sm text-white">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="7">
                                <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
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


    <div class="modal fade" id="from" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
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
                        @for ($i = 1; $i <= $listcount; $i++) <li class="list-group-item d-flex justify-content-between ">
                            <div>
                                <img src="{{$list[$i - 1]->product->foto_url}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="110" height="80" alt="Bootstrap Themes" loading="lazy">
                            </div>
                            <div>
                                <h6 class="my-0">Product name</h6>
                                <small class="text-muted">Rp @convert($list[$i - 1]->product->harga) x {{ $list[$i - 1]->jumlah }}</small>
                            </div>
                            <div class="div">
                                <?php $total += ($list[$i - 1]->product->harga * $list[$i - 1]->jumlah); ?>
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
        toastr.e(event.detail.message, 'Success!');
    });
</script>
@endpush