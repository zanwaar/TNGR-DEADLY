<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row same-height">
        <div class="col-md-4">
            <a class="text-decoration-none" href=" {{route('orders')}}">
                <div class="card text-white bg-success shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_h}}</h5>
                        <p class="card-text">Total penjualan hari ini</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none" href="{{route('listproducts')}}">
                <div class="card text-white bg-primary shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_p}}</h5>
                        <p class="card-text">Product</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none" href=" {{route('listcustomers')}}">
                <div class="card text-white bg-dark shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_c}}</h5>
                        <p class="card-text">Total Customer</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <div class="card mb-5 shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary " href=" {{route('orders')}}">
                    List All Orders 
                </a>
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
                        <th scope="col">status</th>
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
                        <td style="vertical-align:middle;"><span class="badge badge text-bg-{{ $bg->status_badge }}">{{ $bg->status }}</span></td>
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
    </div>
</div>