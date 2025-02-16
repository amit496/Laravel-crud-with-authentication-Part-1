@extends('crud.layout')
@section('content')
    <div class="container mt-5 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crud Operation In Laravel</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('submit.form')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            {{-- row-1 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <input type="text" name="username"  class="form-control" autocomplete="off" placeholder="Enter Your Name" value="{{old('username')}}">
                                    @error('username')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="useremail"  class="form-control" autocomplete="off" placeholder="Enter Your Email" value="{{old('useremail')}}">
                                    @error('useremail')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-2 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <input type="text" name="usercontact" class="form-control" autocomplete="off" placeholder="Enter Contact Number" value="{{old('usercontact')}}">
                                    @error('usercontact')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="userprofile"  class="form-control" autocomplete="off" value="{{old('userprofile')}}" id="userprofile">
                                    @error('userprofile')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-3 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <input type="password" name="userpassword" class="form-control" autocomplete="off" placeholder="Create Your Password" value="{{old('userpassword')}}">
                                    @error('userpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="userconfirmpassword" class="form-control" autocomplete="off" placeholder="Confirm Your Password" value="{{old('userconfirmpassword')}}">
                                    @error('userconfirmpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-4 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <button type="submit" class="submitbutton">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
