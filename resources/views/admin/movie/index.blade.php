@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm Phim</a>
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Thời lượng phim</th>
                            <th scope="col">Tên tiếng anh</th>
                            <th scope="col">Image</th>
                            <th scope="col">Phim Hot</th>
                            <th scope="col">Định Dạng</th>
                            <th scope="col">Phụ đề</th>
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Active/Inactive</th>
                            <th scope="col">Category</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Country</th>
                            <th scope="col">Năm phim</th>
                            <th scope="col">Season</th>
                            <th scope="col">Top views</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->tags }}</td>
                                <td>{{ $cate->thoiluong }}</td>
                                <td>{{ $cate->name_eng }}</td>
                                <td><img width="85px" src="{{ asset('/uploads/movie/' . $cate->image) }}"
                                        alt="Loading...">
                                </td>
                                <td>
                                    @if ($cate->phim_hot)
                                        Có
                                    @else
                                        Không
                                    @endif
                                </td>
                                <td>
                                    @switch($cate->resolution)
                                        @case(0)
                                            HD
                                        @break

                                        @case(1)
                                            SD
                                        @break

                                        @case(2)
                                            HD CAM
                                        @break

                                        @case(3)
                                            CAM
                                        @break

                                        @case(4)
                                            FullHD
                                        @break

                                        @case(5)
                                            Trailer
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>
                                    @if ($cate->phude == 0)
                                        Phụ đề
                                    @else
                                        Thuyết minh
                                    @endif
                                </td>
                                {{-- <td>{{$cate->description}}</td> --}}
                                <td>
                                    @if ($cate->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>{{ $cate->category->title }}</td>
                                <td>{{ $cate->genre->title }}</td>
                                <td>{{ $cate->country->title }}</td>
                                <td>
                                    <form method="POST">
                                        @csrf
                                        {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', [
                                            'class' => 'select-year',
                                            'id' => $cate->id,
                                        ]) !!}
                                    </form>
                                </td>
                                <td>
                                    <form method="POST">
                                        @csrf
                                        {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', [
                                            'class' => 'select-season',
                                            'id' => $cate->id,
                                        ]) !!}
                                    </form>
                                </td>
                                <td>
                                    {!! Form::select(
                                        'topview',
                                        ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'],
                                        isset($cate->topview) ? $cate->topview : '',
                                        [
                                            'class' => 'select-topview ',
                                            'id' => $cate->id,
                                        ],
                                    ) !!}
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
