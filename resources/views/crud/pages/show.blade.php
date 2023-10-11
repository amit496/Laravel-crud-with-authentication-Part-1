@extends('crud.layout')
@section('content')
    <div class="container mt-5 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card align-middle">
                    <div class="card-header">
                        <div class="col-lg-6">
                            <h4>Crud Operation In Laravel - Crud Table</h4>
                        </div>
                        <div class="col-lg-6 aling">
                            <a class="add_link" href="{{route('form')}}">Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped table-bordered table-hover table-responsive table-lg-responsive align-middle">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>S NO</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Profile</th>
                                    <th>Update Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $numver = 1;
                                @endphp
                                @foreach ($cruddata as  $keys => $cruddata_val)
                                    <tr>
                                        <td>{{$numver++}}</td>
                                        <td>{{$cruddata_val->name}}</td>
                                        <td>{{$cruddata_val->email}}</td>
                                        <td>{{$cruddata_val->contact}}</td>
                                        <td>
                                            <img class="img-fluid img-thumbnail"  src="{{asset('crud_asset/image/'). '/'. $cruddata_val->profile}}" style="width: 100px; height:50px">
                                        </td>
                                        <td><a href="{{route('passwordview.data', ['id' => $cruddata_val->id])}}" class="password_update_link">Update Password</a></td>
                                        <td>
                                            <a href="{{route('updateview.data', ['id' => $cruddata_val->id])}}" class="update_link">Update</a>
                                            <a href="{{route('delete.data', ['id' => $cruddata_val->id])}}" class="delete_link">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
