@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm">Add Post</a>
        <a href="{{route('posts.upload')}}" class="btn btn-info btn-sm">Upload CSV/Excel</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            <h2>Posts</h2>
        </div>
        <div class="card-body">
            @if($posts->count() > 0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('storage/'.$post->image)}}" width="80px" height="80px" alt=""></td>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{route('categories.edit', $post->category->id)}}">{{$post->category->name}}</a>
                            </td>
                            <td>
                                @if($post->trashed())
                                    <form action="{{route('restore-posts', $post->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                    </form>

                                @else
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success btn-sm">Edit</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}"method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{$post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">No posts yet</h3>
            @endif
        </div>
    </div>

@endsection
