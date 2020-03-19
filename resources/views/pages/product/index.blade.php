@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body ">
                    <h4 class="font-weight-bold text-center"> Daftar Nama Barang</h4>
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
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         @forelse ($items as $item)
                         <tr class="table-primary text-center">
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td >{{ $item->type }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <a href="{{ route('product.gallery', $item->id) }}"  class="btn btn-primary btn-sm"><i class="fa  fa-picture-o"></i></a>
                                <a href="{{ route('product.create', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a>
                                <form action="{{ route('product.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></button>
                                </form>
                                
                            </td>
                          </tr> 
                         @empty
                             <tr>
                                 <td class="text-center" colspan="6">Barang Tidak ditemukan</td>
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