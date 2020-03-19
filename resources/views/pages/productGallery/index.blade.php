@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <h4 class="font-weight-bold text-center"> Daftar Foto Barang</h4>
                     @if (session('status'))
                        <div class="alert alert-success text-center mt-3">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="mytable">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Default</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         @forelse ($items as $item)
                       
                         <tr class="table-primary text-center">
                            <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->product->name }}</td>
                                <td >
                                    <img class="barang" src="{{ url($item->photo) }}" alt=""/>
                                </td>
                                <td>{{ $item->is_default ? 'ya' : 'tidak' }}</td>
                                <td>
                                
                                    <form action="{{ route('product-Gallery.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></button>
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