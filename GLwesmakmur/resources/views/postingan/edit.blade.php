@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('postingan.update', $postingan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ $postingan->judul }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">isi</label>
                    <input type="text" class="form-control" name="isi" value="{{ $postingan->isi }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">penulis</label>
                    <input type="text" class="form-control" name="desc" value="{{ $postingan->penulis }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">tgldibuat</label>
                    <input type="date" class="form-control" name="desc" value="{{ $postingan->tgldibuat }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Open this select menu</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @selected($postingan->kategori_id==$k->id)>{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
