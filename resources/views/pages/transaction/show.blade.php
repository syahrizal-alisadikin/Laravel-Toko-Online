<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $items->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $items->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $items->addres }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $items->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Type</th>
                    <th>Harga</th>
                </tr>
                @foreach ($items->details as $detail)
              
                    <tr>
                        <td>{{ $detail->product->name}}</td>
                        <td>{{ $detail->product->type}}</td>
                        <td>{{ $detail->product->price}}</td>
                    </tr>
                    
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row text-center">
    <div class="col-md-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Set Success
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=PENDING" class="btn btn-success btn-info">
            <i class="fa fa-times"></i>Set Pending
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=FAILED" class="btn btn-success btn-danger">
            <i class="fa fa-spinner"></i>Set Failed
        </a>
    </div>
</div>
