@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>User's Profile</h2></div>

                <div class="card-body">
                    @include('partials.formErrors')
                    <form action="{{route('users.profile-update', auth()->user()->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea type="text" name="about" id="about" class="form-control" rows="5" cols="5" required>{{$user->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-2">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
