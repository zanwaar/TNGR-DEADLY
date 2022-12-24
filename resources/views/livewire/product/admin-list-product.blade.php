<div>
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Kategori</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Nama Product </label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Harga</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Deskripsi">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d" width="20%">
                                <select wire:change="row($event.target.value)"
                                    class="form-control rounded shadow-sm mr-3">
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
                                    <th scope="col">Nama Product</th>
                                    <th scope="col">deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Foto</th>
                                    <th style="width: 8px;">Options</th>
                                </tr>
                            </thead>
                            <tbody wire:loading.class="text-muted">
                                @forelse ($product as $index => $bg)
                                    <tr>

                                        <td>{{ $product->firstItem() + $index }}</td>
                                        <td>{{ $bg->nama }}</td>
                                        <td>{{ $bg->deskripsi }}</td>
                                        <td>{{ $bg->harga }}</td>
                                        <td>{{ $bg->foto }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" wire:click.prevent="edit({{ $bg }})"
                                                    class="btn btn-info btn-sm text-white"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="#"
                                                    wire:click.prevent=" confirmRemoval({{ $bg }})"
                                                    class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">
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
                        {!! $product->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
