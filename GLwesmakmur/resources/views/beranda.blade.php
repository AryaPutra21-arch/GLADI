@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $p)
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                    Postingan
                    </div>
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$p->judul}}</p>
                        <footer class="blockquote-footer">Postingan seputar<cite title="Source Title"> {{$p->kategori->name}}</cite></footer>
                    </blockquote>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
