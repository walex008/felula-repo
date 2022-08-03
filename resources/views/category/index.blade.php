@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            <h2>Categories</h2>
        </div>
        <div class="card-body">
            @if($categories->count() > 0)
                <table class="table">
                    <thead>
                    <th>Category Name</th>
                    <th>Post Count</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts->count()}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-success btn-sm">Edit</a></td>
                            <td><button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">No category yet</h3>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="deleteCategoryForm">
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

            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            console.log('deletingg..', form)
            $('#deleteModal').modal('show')

        }
    </script>
@endsection
