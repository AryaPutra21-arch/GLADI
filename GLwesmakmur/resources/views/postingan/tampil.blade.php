@extends('layouts.app')

@section('content')
<div clas="container">
    <div class="row">
        <div class= "col-md-10">

            <h1> Kategori</h1>
            <a href ="{{ url('postingan/create') }}" class="btn btn-primary">Tambah postingan</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope = "col">No</th>
                        <th scope = "col">Judul</th>
                        <th scope = "col">isi</th>
                        <th scope = "col">Penulis</th>
                        <th scope = "col">tgldibuat</th>
                        <th scope = "col">kategori</th>

                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $d)
                <tr>
                    <th scope="row"> {{$loop->iteration}}</th>
                    <td> {{$d->judul}} </td>
                    <td> {{$d->isi}} </td>
                    <td> {{$d->penulis}} </td>
                    <td> {{$d->tgldibuat}} </td>
                    <td> {{$d->kategori->name}} </td>
                    <td>
                        <div class="d-flex align-items-center list-user-action">
                            <a href="{{ route('postingan.edit', $d->id) }}" class="btn btn-primary">edit</a>
                                &nbsp;|&nbsp;
                                        <a>
                                            <form action="{{ route('postingan.destroy', $d->id) }}" method="POST">
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
