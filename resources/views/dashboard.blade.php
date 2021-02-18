@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div><h2>Company List</h2></div>
        <div><a href="{{route('create.company')}}" class="btn btn-success">New Company</a></div>
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
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($company as $com)
                    <tr>
                        <td>
                            <img src="{{URL::to($com->logo)}}" height="40px" width="40px"  class="rounded-circle"/>   
                        </td>
                        <td>{{$com->name}}</td>
                        <td>{{$com->email}}</td>
                        <td>{{$com->website}}</td>
                        <td>
                            <a href="" class="btn btn-warning"><span class="oi oi-eye"></span></a>
                            <a href="{{URL::to('edit/company/'.$com->id)}}" class="btn btn-primary"><span class="oi oi-pencil"></span></a>
                            <a href="{{URL::to('delete/company/'.$com->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><span class="oi oi-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
