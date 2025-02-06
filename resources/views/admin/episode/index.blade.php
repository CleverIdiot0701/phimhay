@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                
                <table class="table table table-bordered table-hover text-center align-middle" id="tablephim" >
                    <thead class="table-dark">
                        <tr>
                            <th >#</th>
                            <th >Tên Phim</th>
                            <th >Hình Ảnh Phim</th>
                            <th >Tập Phim</th>
                            <th >Link Phim</th>
                            <th >Trạng Thái</th>
                            <th >Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_episode as $key => $episode)
                            <tr>
                                <th >{{ $key }}</th>
                                <td >{{ $episode->movie->title }}</td>
                                <td ><img width="100px" src="{{ asset('/uploads/movie/' . $episode->movie->image) }}"
                                        alt="Loading..."></td>
                                <td>{{ $episode->episode }}</td>
                                <td>
                                    <div style="width: 300px; height: 200px;">
                                        {!! $episode->linkphim !!}
                                    </div>
                                </td>
                                <td>
                                    @if ($episode->movie->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>

                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['episode.destroy', $episode->id],
                                        'onsubmit' => 'return confirm("Xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('episode.edit', $episode->id) }}" id="edit"
                                        class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
