@extends('layouts/app')

@section('content')

    <card class="card card-default">
        <card class="card-header">
            <h2>
                Users
            </h2>
        </card>
        <card class="card-body">
            @if($users->count() > 0)
                <table class="table">
                    <thead>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td>
                                <img src="{{Gravatar::get($user->email)}}" width="40px" height="40px" style="border-radius: 50%" alt="">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                              {{$user->email}}
                            </td>
                            <td>{{$user->role}}</td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf
{{--                                        @method('PUT')--}}
                                        <button type="submit" class="btn btn-info btn-sm">Make Admin</button>
                                    </form>
                                    @endif
                            </td>
{{--                            <td><button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</button></td>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>{{'No tags yet!'}}</h2>
            @endif
        </card>
    </card>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="deleteTagForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1>ARE YOU SURE?</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(id) {

            var form = document.getElementById('deleteTagForm')
            form.action = '/users/' + id
            console.log('deletingg..', form)
            $('#deleteModal').modal('show')

        }
    </script>
@endsection

