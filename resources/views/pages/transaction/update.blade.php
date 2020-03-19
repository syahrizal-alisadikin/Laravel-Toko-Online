@extends('layouts.index')

@section('Content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Update Transaksi</strong>
                </div>
                <div class="card-body ">
                <form action="{{ route('transaction.update', $items->id) }}" method="post">
                    @method('PUT')
                    @csrf
            
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Pemesan</label>
                        <input type="text"
                                name="name"
                                value="{{ old('name') ? old('name') : $items->name }}"
                                class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                                name="email"
                                value="{{ old('email') ? old('email') : $items->email }}"
                                class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="number">Nomor Hp</label>
                        <input type="number"
                                name="number"
                                value="{{ old('number') ? old('number') : $items->number }}"
                                class="form-control @error('number') is-invalid @enderror">
                                @error('number')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="addres">Alamat Pemesanan</label>
                        <input type="text"
                                name="addres"
                                value="{{ old('addres') ? old('addres') : $items->addres }}"
                                class="form-control @error('addres') is-invalid @enderror">
                                @error('addres')
                                <div class="text-muted">{{ $message }}</div>
                                @enderror
                    </div>
                  
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Transaksi</button>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
