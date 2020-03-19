@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Tambah Foto Barang</strong>
                </div>
                <div class="card-body ">
                <form action="{{ route('product-Gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
            
                    <div class="form-group">
                        <label for="product_id" class="form-control-label">Nama Foto Barang</label>
                       <select name="product_id" 
                               class="form-control @error('product_id') is-invalid @enderror">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                       </select>
                                @error('name')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="photo">Foto Barang</label>
                        <input type="file"
                                name="photo"
                                value="{{ old('photo')}}"
                                accept="img/*"
                                class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_default">Jadikan Default</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" value="1" name="is_default" class="custom-control-input @error('photo') is-invalid @enderror">
                            <label class="custom-control-label"  for="customRadioInline1">Ya</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" value="0" name="is_default" class="custom-control-input">
                            <label class="custom-control-label"  for="customRadioInline2">Tidak</label>
                          </div>
                        
                                @error('is_default')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah Foto Barang</button>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
