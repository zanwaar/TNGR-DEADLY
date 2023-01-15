<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
    </div>
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
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ($customer as $index => $bg)
                    <tr>

                        <td>{{ $customer->firstItem() + $index }}</td>
                        <td>{{ $bg->name }}</td>
                        <td>{{ $bg->email }}</td>

                        @if (is_null($bg->customer))
                        <td><span class="badge badge text-bg-warning">Belum diisi</span></td>
                        <td><span class="badge badge text-bg-warning">Belum diisi</span></td>
                        @else
                        <td>{{ $bg->customer->nohp}}</td>
                        <td>{{ $bg->customer->alamat}}</td>
                        @endif



                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="4">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {!! $customer->links() !!}
        </div>
    </div>

</div>