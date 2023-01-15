<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">kategori</h1>
    </div>
    <form class="row g-3" autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'update' : 'create' }}">
        <div class="col-auto">
            <label class="visually-hidden">Password</label>
            <input type="text" wire:model.defer="state.kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="Nama Kategori">
            @error('kategori')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">
                @if($showEditModal)
                <span>Edit Kategori</span>
                @else
                <span>Add Kategori</span>
                @endif
            </button>
            @if($showEditModal)
            <button type="submit" class="btn btn-danger mb-3">Cancel</button>
            @endif
        </div>
    </form>
    <div class="card">
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
                        <th scope="col">Nama kategori</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ($kategori as $index => $bg)
                    <tr>

                        <td>{{ $kategori->firstItem() + $index }}</td>
                        <td>{{ $bg->kategori}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="#" wire:click.prevent="edit({{ $bg }})" class="btn btn-info btn-sm ">Edit Kategori</a>
                                <a href="#" wire:click.prevent=" confirmRemoval({{ $bg }})" class="btn btn-danger text-white">Hapus Kategori</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="3">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {!! $kategori->links() !!}
        </div>
    </div>

    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self tabindex="-1" role="dialog" id="modalChoice">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Apakah Benar Anda Ingin Menghapus Data?</h5>
                    <p class="mb-0">Hati Hati! Data Product Dengan Kategori ini, akan Ikut Terhapus juga.</p>
                    <p class="mb-0">Pastikan Data Product Tidak ada Terkait Dengan Kategori Ini</p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" wire:click.prevent="delete" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Ya, Hapus</strong></button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
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
    var myDelete = new bootstrap.Modal("#delete");

    window.addEventListener("show-delete-modal", function(event) {
        myDelete.show();
    });

    window.addEventListener("hide-delete-modal", function(event) {
        myDelete.hide();
        toastr.success(event.detail.message, 'Success!');
    });
    window.addEventListener("hide-form", function(event) {
        toastr.success(event.detail.message, 'Success!');
    });
</script>
@endpush