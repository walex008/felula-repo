@extends('layouts/app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{route('tags.create')}}" class="btn btn-success mb-2">Create Tag</a>
    </div>
    <card class="card card-default">
        <card class="card-header">
            <h2>
                Tags
            </h2>
        </card>
        <card class="card-body">
            @if($tags->count() > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Number of Post</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>

                            <td>
                                {{$tag->name}}
                            </td>
                            <td>
                                @if($tag->posts->count() > 0)
                                    {{$tag->posts->count() }}
                                    @else
                                    <p>No post</p>
                                    @endif
                            </td>
                            <td><a class="btn btn-info btn-sm" href="{{route('tags.edit', $tag->id)}}">Edit</a></td>
                            <td><button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</button></td>

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
            form.action = '/tags/' + id
            console.log('deletingg..', form)
            $('#deleteModal').modal('show')

        }
    </script>
@endsection

