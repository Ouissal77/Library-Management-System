@extends('layout.main')
@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{route('books.create')}}" class="btn btn-primary btn-md"><i class="fa-solid fa-plus" style="color: #d8dee8;"></i> Ajouter Un Livre</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Published at</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->published_at}}</td>
                @if($book->status) <td>available</td>
                @else
                    <td>borrowed</td>
                @endif



                <td>
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-warning btn-icon btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger btn-icon btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <a href="{{route('books.show',$book->id)}}" class="btn btn-info btn-icon btn-sm"><i class="fa-solid fa-bars"></i></a>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
