@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center container mt-5"><h3>ADD EMPLOYEE</h3></div>
<div class="d-flex justify-content-center align-items-center container mt-5">
    <div class="row ">
        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John">
                </div>
                <div class="form-group col-md-6">
                    <label label for="inputPassword4">Last Name</label>
                    <input type="text" class="form-control"  name="last_name" placeholder="Doe">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="ex. 09123456789">
                </div>
                <div class="form-group col-md-6">
                    <label label for="inputPassword4">Email</label>
                    <input type="email" class="form-control"  name="email" placeholder="mail@mail.com">
                </div>
            </div>
            <div class="form-group">
            <label for="inputState">Company</label>
                <select id="inputState" class="form-control" name="company_id">
                    <option selected>Choose...</option>
                    @foreach($company as $com)
                    <option value="{{$com->id}}">{{$com->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>





@endsection
