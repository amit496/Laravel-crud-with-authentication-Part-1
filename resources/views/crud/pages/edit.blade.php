@extends('crud.layout')
@section('content')
    <div class="container mt-5 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crud Operation In Laravel - Edit</h4>
                    </div>
                    <div class="card-body">
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
                        <form action="{{route('updatesubmit.data', ['id' => $update->id])}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            {{-- row-1 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <input type="text" name="username"  class="form-control" autocomplete="off" placeholder="Enter Your Name" value="{{$update->name}}">
                                    @error('username')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="useremail"  class="form-control" autocomplete="off" placeholder="Enter Your Email" value="{{$update->email}}">
                                    @error('useremail')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-2 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <input type="text" name="usercontact" class="form-control" autocomplete="off" placeholder="Enter Contact Number" value="{{$update->contact}}">
                                    @error('usercontact')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="userprofile"  class="form-control" autocomplete="off" value="{{$update->profile}}">
                                    @error('userprofile')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-3 --}}
                            {{-- <div class="row m-2">
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
                            </div> --}}
                            {{-- row-4 --}}
                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <button type="submit" class="submitbutton">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                        <img src="{{asset('crud_asset/image/'). '/' .$update->profile}}" alt="" style="height:100px;" class=" mt-2 img-fluid img-thumbnail">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
