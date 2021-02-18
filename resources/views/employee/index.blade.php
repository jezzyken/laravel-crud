@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div><h2>Employee List</h2></div>
        <div><a href="{{route('create.employee')}}" class="btn btn-success">New Employee</a></div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success align-items-center">
        <p>{{$message}}</p>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $emp)
                    <tr>
                        <td>{{$emp->first_name}}</td>
                        <td>{{$emp->last_name}}</td>
                        <td>{{$emp->email}}</td>
                        <td>{{$emp->phone}}</td>
                        <td>{{$emp->companies->name}}</td>
                        <td>
                            <a href="{{URL::to('edit/employee/'.$emp->id)}}" class="btn btn-primary"><span class="oi oi-pencil"></span></a>
                            <a href="{{URL::to('delete/employee/'.$emp->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><span class="oi oi-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $employee->links() !!}
        </div>
    </div>
</div>
@endsection
