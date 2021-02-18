@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center container mt-5"><h3>EDIT COMPANY INFO</h3></div>
<div class="d-flex justify-content-center align-items-center container mt-5">
    <div class="row ">
    <form action="{{url('update/company/'.$company->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company Name</label>
                    <input type="text" class="form-control" name="name" placeholder="XYZ Company" value="{{$company->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label label for="inputPassword4">email</label>
                    <input type="text" class="form-control"  name="email" placeholder="mail@mail.com" value="{{$company->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Website</label>
                <input type="text" class="form-control"  name="website" placeholder="Ex. www.google.com" value="{{$company->website}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Company Logo</label>
                <input type="file" class="form-control-file" name="logo">
            </div>

            <div class="form-group">
                <img src="{{URL::to($company->logo)}}" height="100px" width="100px" />  
                <input type="hidden" name="old_logo" value="{{$company->logo}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>





@endsection
