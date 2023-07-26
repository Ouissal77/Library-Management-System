@extends('layout.main')
@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{route('categories.create')}}" class="btn btn-primary btn-md"><i class="fa-solid fa-plus" style="color: #d8dee8;"></i> Ajouter Une categorie</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Category name</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-icon btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger btn-icon btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-info btn-icon btn-sm"><i class="fa-solid fa-bars"></i></a>


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
