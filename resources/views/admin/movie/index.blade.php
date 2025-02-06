@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 ">


                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm Phim</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle" id="tablephim">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Tags</th>
                                <th>Thời lượng phim</th>
                                <th>Tên tiếng anh</th>
                                <th>Image</th>
                                <th>Phim Hot</th>
                                <th>Định Dạng</th>
                                <th>Phụ đề</th>
                                {{-- <th >Description</th> --}}
                                <th>Active/Inactive</th>
                                <th>Danh Mục</th>
                                <th>Thể Loại</th>
                                <th>Quốc Gia</th>
                                <th>Số Tập Phim</th>
                                <th>Năm Phim</th>
                                <th>Season</th>
                                <th>Phim Bộ/Lẻ</th>
                                <th>Top views</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $cate)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td class="text-wrap">{{ $cate->title }}</td>
                                    <td class="text-wrap">{{ $cate->tags }}</td>
                                    <td>{{ $cate->thoiluong }}</td>
                                    <td class="text-wrap">{{ $cate->name_eng }}</td>
                                    <td><img width="50px" src="{{ asset('/uploads/movie/' . $cate->image) }}"
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

                                    <td>
                                        @foreach ($cate->movie_genre as $gen)
                                            <span class="badge bg-dark">{{ $gen->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $cate->country->title }}</td>
                                    <td>{{ $cate->sotap }}</td>
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
                                        @if ($cate->thuocphim == 0)
                                            Phim Lẻ
                                        @else
                                            Phim Bộ
                                        @endif
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
    </div>
@endsection
