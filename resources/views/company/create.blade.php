@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center container mt-5"><h3>ADD COMPANY</h3></div>
@if($message = Session::get('error'))
    <div class="alert alert-success align-items-center">
        <p>{{$message}}</p>
    </div>
@endif
<div class="d-flex justify-content-center align-items-center container mt-5">
    <div class="row ">
        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company Name</label>
                    <input type="text" class="form-control" name="name" placeholder="XYZ Company">
                </div>
                <div class="form-group col-md-6">
                    <label label for="inputPassword4">email</label>
                    <input type="text" class="form-control"  name="email" placeholder="mail@mail.com">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Website</label>
                <input type="text" class="form-control"  name="website" placeholder="Ex. www.google.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Company Logo</label>
                <input type="file" class="form-control-file" name="logo">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>





@endsection
