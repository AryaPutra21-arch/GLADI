@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $p)
            <div class="col-3 ms-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">{{$p->judul}}</h4>
                      <p class="card-title">Penulis :{{$p->penulis}} - Tanggal :{{$p->tgldibuat}}</p>
                      <p class="card-text">{{$p->isi}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($produk as $b)
                            <li class="list-group-item">Rekomendasi : {{$b->namaproduk}}</li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                      {{-- <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a> --}}
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
