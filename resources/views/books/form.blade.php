@extends('layouts.app')
@section('content')
    <form action="{{$action}}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="validationDefault01" required value="{{old('title',$model->title)}}" >
        </div>
         <div class="col-md-4">
            <label for="validationDefault01" class="form-label">description</label>
            <input name="description" type="text" class="form-control" id="validationDefault01" required value="{{old('description',$model->description)}}" >
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">published at</label>
            <input name="published_at" type="date" class="form-control" required value="{{old('published_at',$model->published_at)}}">
        </div>
        <div class="col-md-4">
            <label for="book_image" class="form-label">Book Image</label>
            <input type="file" class="form-control" id="book_image" name="book_image" required>
        </div>
        <div class="col-md-4">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" class="form-control" id="pages" name="pages" required>
        </div>
        <div class="col-md-4">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Author</label>
            <select name="author_id" class="form-select" id="validationDefault04" required>
                {{--                <option selected disabled value="">Choose...</option>--}}

                @foreach($authors as $author)

                    <option @if($model->author_id==$author->id) selected @endif value="{{$author->id}}"> {{$author->name}}</option>

                @endforeach

            </select>
        </div>


        <label>Categories:</label>
        <div class="categories row">
        @foreach($categories as $category)

                <div class="col-3 text-center p-3">
                    <input type="checkbox" name="categories[]" @if($model->categories->contains($category->id)) checked @endif value="{{ $category->id }}">
                    <label>{{ $category->name }}</label>
                </div>


        @endforeach
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
@endsection
