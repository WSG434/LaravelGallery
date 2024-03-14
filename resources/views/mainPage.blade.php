@extends('layout')

@section('content')

    <div class="container">
        <h1 align="center">Blog</h1>
        <div class="row">
            @foreach($imagesInView as $image)
                <div class="col-md-3 gallery-item">
                    <div>
                        <img src="/{{$image->image}}" class="img-thumbnail rounded mx-auto d-block" alt="Изображение">
                    </div>
                    <a href="/show/{{$image->id}}" class="btn btn-stretched btn-outline-dark">Show</a>
                    <a href="/edit/{{$image->id}}" class="btn btn-stretched btn-outline-dark">Edit</a>
                    <a href="/delete/{{$image->id}}" onclick="return confirm('are u sure?')" class="btn btn-stretched btn-outline-dark">Delete</a>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, asperiores atque cumque deleniti doloremque excepturi exercitationem, facilis hic illum iure magni odio placeat provident quia quis similique tempore temporibus vitae.
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
