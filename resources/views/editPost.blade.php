@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Edit Post</h1>
                <img src="/{{$imageInView->image}}" class="img-thumbnail rounded mx-auto d-block" alt="Изображение">
                <form action="/update/{{$imageInView->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
