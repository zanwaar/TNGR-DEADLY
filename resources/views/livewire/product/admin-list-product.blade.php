<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button wire:click.prevent="addNew" type="button" class="btn btn-sm btn-primary shadow-sm">Add New Products</button>
            </div>
        </div>
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
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Product</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Foto</th>
                        <th style="width: 8px;">Options</th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ($product as $index => $bg)
                    <tr>

                        <td style="vertical-align:middle;">{{ $product->firstItem() + $index }}</td>
                        <td style="vertical-align:middle;">{{ $bg->kategori->kategori }}</td>
                        <td style="vertical-align:middle;">{{ $bg->nama }}</td>
                        <td style="vertical-align:middle;">{{ $bg->deskripsi }}</td>
                        <td style="vertical-align:middle;">Rp @convert($bg->harga)</td>
                        <td style="vertical-align:middle;">
                            <img src="{{$bg->foto_url}}" class="img d-block mt-2 rounded" width="100" height="">
                        </td>
                        <td style="vertical-align:middle;">
                            <div class="btn-group btn-group-sm">
                                <a href="#" wire:click.prevent="edit({{ $bg }})" class="btn btn-info btn-sm text-white">Edit</a>
                                <a href="#" wire:click.prevent=" confirmRemoval({{ $bg }})" class="btn btn-danger text-white">Hapus</a>
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
            {!! $product->links() !!}
        </div>
    </div>


    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self tabindex="-1" role="dialog" id="modalChoice">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Apakah Benar Anda Ingin Menghapus Data Ini?</h5>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" wire:click.prevent="delete" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Ya, Hapus</strong></button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="from" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'update' : 'create' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            @if($showEditModal)
                            <span>Edit Product</span>
                            @else
                            <span>Add New Product</span>
                            @endif
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kategori Product</label>
                                    <select wire:model.defer="state.kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($kategori as $bg)
                                        <option value="{{ $bg->id }}">{{ $bg->kategori  }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                    <div class="invalid-feedback mb-3">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Product</label>
                                    <input type="text" wire:model.defer="state.nama" class="form-control @error('nama') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nama Product">
                                    @error('nama')
                                    <div class="invalid-feedback mb-3">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                    <textarea wire:model.defer="state.deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback mb-3">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga Product</label>
                                    <input type="text" wire:model.defer="state.harga" class="form-control @error('harga') is-invalid @enderror " id="exampleFormControlInput1" placeholder="00000">
                                    @error('harga')
                                    <div class="invalid-feedback mb-3">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3" x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label for="formFile" class="form-label">Gambar Product</label>
                                    <input wire:model="photo" class="form-control" type="file" id="formFile">
                                    <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                            <span class="sr-only">100% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded">
                                @else
                                <img src="{{ $state['foto_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">
                                @endif
                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">foto </label>
                                    <input type="text" wire:model.defer="state.foto" class="form-control" id="exampleFormControlInput1" placeholder="00000">
                                </div> -->
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            @if($showEditModal)
                            <span>Save Changes</span>
                            @else
                            <span>Save</span>
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@push('js')
<script language="JavaScript">
    var myFrom = new bootstrap.Modal("#from");
    var myDelete = new bootstrap.Modal("#delete");

    window.addEventListener("show-form", function(event) {
        myFrom.show();
    });

    window.addEventListener("show-delete-modal", function(event) {
        myDelete.show();
    });

    window.addEventListener("hide-form", function(event) {
        myFrom.hide();
    });
    window.addEventListener("hide-delete-modal", function(event) {
        myDelete.hide();
    });
</script>
@endpush