@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">

                <table class="table table table-bordered table-hover text-center align-middle" id="tablephim">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tên Phim</th>
                            <th>Tên Chính Thức</th>
                            <th>Hình Ảnh Phim</th>
                            <th>Hình Ảnh Poster</th>
                            <th>Slug</th>
                            <th>ID</th>
                            <th>Year</th>
                            <th>Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resp['items'] as $key => $res)
                            <tr >
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $res['name'] }}</td>
                                <td>{{ $res['origin_name'] }}</td>
                                <td> <img src="{{$resp['pathImage'].$res['thumb_url']}}" height="80" width="80" alt=""></td>
                                <td><img src="{{$resp['pathImage'].$res['poster_url']}}" height="80" width="80" alt=""></td>
                                <td>{{ $res['slug'] }}</td>
                                <td>{{ $res['_id'] }}</td>
                                <td>{{ $res['year'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
