@extends('layouts.app')
@section('content')
    <form action="{{$action}}" method="post" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="validationDefault01" required value="{{old('name',$model->name)}}" >
        </div>
{{--         <div class="col-md-4">--}}
{{--            <label for="validationDefault01" class="form-label">Biography</label>--}}
{{--            <input name="Biography" type="text" class="form-control" id="validationDefault01" required value="{{old('description',$model->description)}}" >--}}
{{--        </div>--}}


        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Birth Date</label>
            <input name="birth_date" type="date" class="form-control" required value="{{old('birth_date',$model->birth_date)}}">
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">death Date</label>
            <input name="death_date" type="date" class="form-control"  value="{{old('death_date',$model->death_date)}}">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlTextarea1">Biography</label>
            <textarea name="Biography" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$model->Biography}}</textarea>
        </div>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
@endsection
