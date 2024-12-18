@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
            <table class="table" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)
                        
                    
                  <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$cate->title}}</td>
                    <td><img width="85px" src="{{asset('/uploads/movie/'.$cate->image)}}" alt="Loading..."></td>
                    {{-- <td>{{$cate->description}}</td> --}}
                    <td>
                        @if ($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>{{$cate->category->title}}</td>
                    <td>{{$cate->genre->title}}</td>
                    <td>{{$cate->country->title}}</td>
                    <td>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route'=>['movie.destroy', $cate->id],
                            'onsubmit'=>'return confirm("Xóa?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
