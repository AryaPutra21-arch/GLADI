@extends('layouts.app')

@section('content')
<div clas="container">
    <div class="row">
        <div class= "col-md-10">

            <h1> Kategori</h1>
            <a href ="{{ url('produk/create') }}" class="btn btn-primary">Tambah postingan</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope = "col">No</th>
                        <th scope = "col">Nama Produk</th>
                        <th scope = "col">foto</th>
                        <th scope = "col">harga</th>
                        <th scope = "col">Deskripsi Produk</th>
                        <th scope = "col">Kategori</th>

                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $d)
                <tr>
                    <th scope="row"> {{$loop->iteration}}</th>
                    <td> {{$d->namaproduk}} </td>
                    <td>
                        <img src="{{asset('storage/' .$d->foto)}}" alt="" width="100px">
                    </td>
                    <td> {{$d->harga}} </td>
                    <td> {{$d->descproduk}} </td>
                    <td> {{$d->kategori->name}} </td>
                    <td>
                        <div class="d-flex align-items-center list-user-action">
                            <a href="{{ route('produk.edit', $d->id) }}" class="btn btn-primary">edit</a>
                                &nbsp;|&nbsp;
                                        <a>
                                            <form action="{{ route('produk.destroy', $d->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-light" onclick="return confirm('Are you sure you want to delete this item ?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </a>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </div>
        </div>
    </div>
@endsection
