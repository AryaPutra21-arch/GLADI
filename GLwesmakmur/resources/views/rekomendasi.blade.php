@extends('welcome')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col -md-10">
            <div class="card">
                <div class="card-header">{{__('Rekomendasi')}}</div>
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-warning" style="border-radius: 40px" href="{{url('/rekomendasi')}}">Kembali</a>
                    <form action="{{route('rekom')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <div class="col pe-1">
                                <label> Keluhan anda: </label>
                                <input class="form-control" type="text" name="keluhan">
                            </div>
                            <div class="col pe-1">
                                <label> Tahun lahir: </label>
                                <input class="form-control" type="number" name="tahunlahir">
                            </div>
                        </div>
                        <input class="btn btn-success btn-sm mt-3" type="submit" id="submit" value="submit">
                    </form>
                </div>
                <div>
                @isset($data)
                <table class="table table-hover">
                    <tr>
                        <th>Nama Jamu</th>
                        <td>{{$data['jamu']}}</td>
                    </tr>
                    <tr>
                        <th>Khasiat</th>
                        <td>?</td>
                    </tr>
                    <tr>
                        <th>Keluhan</th>
                        <td>{{$data['keluhan']}}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{$data['umur']}}</td>
                    </tr>
                    <tr>
                        <th>Saran Penggunaan</th>
                        <td>{{$data['saran']}}</td>
                    </tr>
                </table>
                @endisset
             </div>
            </div>
        </div>
    </div>
</div>




@endsection
