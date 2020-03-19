@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <h4 class="font-weight-bold text-center"> Daftar Transaction Masuk</h4>
                     @if (session('status'))
                        <div class="alert alert-success text-center mt-3">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('sweetalert::alert')

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="mytable">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Total Transaction</th>
                            <th scope="col">Status Transaction</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         @forelse ($items as $item)
                         <tr class="table-primary text-center">
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td >{{ $item->email }}</td>
                            <td>{{ $item->number }}</td>
                            <td>Rp {{ $item->transaction_total }}</td>
                            <td>
                            @if($item->transaction_status =='PENDING')
                                <span class="badge badge-info"> 
                            @elseif($item->transaction_status =='SUCCESS')
                                <span class="badge badge-success"> 
                            @elseif($item->transaction_status =='FAILED')
                                <span class="badge badge-danger"> 
                            @else
                             <span>
                            @endif
                                {{ $item->transaction_status }}
                             </span>
                            </td>

                            <td>
                                @if($item->transaction_status =='PENDING')
                                <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS"  
                                    class="btn btn-success btn-sm">
                                    <i class="fa  fa-check"></i>
                                </a>
                                <a href="{{ route('transaction.status', $item->id) }}?status=FAILED"  
                                    class="btn btn-danger btn-sm">
                                    <i class="fa  fa-times"></i>
                                </a>
                                @endif
                                <a  href="#mymodal"
                                    data-remote="{{ route('transaction.show', $item->id) }}"
                                    data-toggle="modal"
                                    data-target="#mymodal"
                                    data-title="Detail Transaction {{$item->uuid}}"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                 <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('transaction.destroy', $item->id) }}" 
                                      method="post" 
                                      class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></button>
                                </form>
                                
                            </td>
                          </tr> 
                         @empty
                             <tr>
                                 <td class="text-center" colspan="7">Barang Tidak ditemukan</td>
                             </tr>
                         @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection