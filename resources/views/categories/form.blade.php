@extends('layouts.app')
@section('content')
    <form action="{{$action}}" method="post" class="row g-3">
        @csrf
    <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input name="name" type="text" class="form-control" id="validationDefault01" required value="{{old('name',$model->name)}}" >
    </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
@endsection
