@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Tambah Barang</strong>
                </div>
                <div class="card-body ">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
            
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Barang</label>
                        <input type="text"
                                name="name"
                                value="{{ old('name')}}"
                                class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type Barang</label>
                        <input type="text"
                                name="type"
                                value="{{ old('type')}}"
                                class="form-control @error('type') is-invalid @enderror">
                                @error('type')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Barang</label>
                       <textarea name="description" 
                                id="description"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description')}}
            
                       </textarea>
                                @error('type')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input type="number"
                                name="price"
                                value="{{ old('price')}}"
                                class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Kuantitas Barang</label>
                        <input type="number"
                                name="quantity"
                                value="{{ old('quantity')}}"
                                class="form-control @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah Barang</button>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
