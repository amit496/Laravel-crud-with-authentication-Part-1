@extends('crud.layout')
@section('content')
    <div class="container mt-5 p-0 " style="width: 40%">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crud Operation In Laravel - Password Update</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('passwordupdatesubmit.data', ['id' => $update_view->id])}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- row-1 --}}
                            <div class="row m-2">
                                <div class="col-lg-12">
                                    <input type="password" name="oldpassword"  class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                    @error('oldpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <input type="password" name="newpassword"  class="form-control" autocomplete="off" placeholder="Enter New Password">
                                    @error('newpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <input type="password" name="newconfirmpassword"  class="form-control" autocomplete="off" placeholder="Confirm Password" >
                                    @error('newconfirmpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- row-4 --}}
                            <div class="row m-2">
                                <div class="col-lg-12">
                                    <button type="submit" class="submitbutton">SUBMIT</button>
                                    <a href="{{route('view.data')}}" class="cancel_link">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
