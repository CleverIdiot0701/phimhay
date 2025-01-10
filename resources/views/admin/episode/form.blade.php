@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-primary">Liệt Danh Sách Tập Phim</a>
                    <div class="card-header">Quản lý Tập Phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype']) !!}
                        @else
                            {!! Form::open([
                                'route' => ['episode.update', $episode->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif

                        <div class="form-group mb-2 ">
                            {!! Form::label('movie', 'Chọn Phim', ['class' => 'mb-2']) !!}
                            {!! Form::select(
                                'movie_id',
                                ['0' => 'Chọn Phim', 'Phim Mới' => $list_movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control select-movie',
                                ],
                            ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link Phim', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu...',
                            ]) !!}
                        </div>
                        {{-- <div class="form-group mb-2">
                            {!! Form::label('episode', 'Tập Phim', ['class'=>'mb-2'] ) !!}
                            <select name="episode" class="form-control" id="episode" >
                                
                            </select>
                        </div> --}}
                        <div class="form-group mb-2">
                            {!! Form::label('episode', 'Tập Phim', []) !!}
                            @if (isset($episode))
                                {!! Form::text('episode', $episode->episode, ['class' => 'form-control', 'placeholder' => '...', 'readonly  ']) !!}
                            @else
                                <select name="episode" class="form-control" id="episode">

                                </select>
                            @endif
                        </div>
                        @if (!isset($episode))
                            {!! Form::submit('Thêm Tập Phim', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Tập Phim', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
