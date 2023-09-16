@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{route('admin.authors.create')}}" class="btn btn-primary btn-md"><i class="fa-solid fa-plus" style="color: #d8dee8;"></i> Ajouter Un auteur</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Birth date</th>
            <th scope="col">Actions</th>


        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->id}}</td>
                <td>{{$author->name}}</td>
                <td>{{$author->birth_date}}</td>





                <td>
                    <a href="{{route('admin.authors.edit',$author->id)}}" class="btn btn-warning btn-icon btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('admin.authors.delete',$author->id)}}" class="btn btn-danger btn-icon btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <a href="{{route('admin.authors.show',$author->id)}}" class="btn btn-info btn-icon btn-sm"><i class="fa-solid fa-bars"></i></a>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
