@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="namaproduk" value="{{ $produk->namaproduk}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">foto</label>
                    <input type="file" class="form-control" name="foto" value="{{ $produk->foto }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">harga</label>
                    <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">deskripsi produk</label>
                    <input type="date" class="form-control" name="descproduk" value="{{ $produk->descproduk }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Open this select menu</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @selected($produk->kategori_id==$k->id)>{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
