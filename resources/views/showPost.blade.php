@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="/{{$imageInView}}" class="img-thumbnail rounded mx-auto d-block gallery-image" alt="Изображение">
            </div>
        </div>
    </div>
@endsection
