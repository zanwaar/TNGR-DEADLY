<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report</h1>
        <form class="col-5" autocomplete="off" wire:submit.prevent="fexcel">
            <div class="input-group shadow-sm">
                <input type="date" wire:model="dateawal" class="form-control" required>
                <input type="date" wire:model="dateakhir" class="form-control" required>
                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-primary" type="submit">Cetak Laporan</button>
                </div>
            </div>
        </form>

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
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ($transaksi as $index => $bg)
                    <tr>
                        <td style="vertical-align:middle;">{{ $transaksi->firstItem() + $index }}</td>
                        <td style="vertical-align:middle;">{{ $bg->invoice }}</td>
                        <td style="vertical-align:middle;">{{ $bg->user->name }}</td>
                        <td style="vertical-align:middle;">{{ $bg->user->email }}</td>
                        <td style="vertical-align:middle;">@convert($bg->total)</td>
                        <td style="vertical-align:middle;">{{ $bg->created_at }}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="8">
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
</script>
@endpush