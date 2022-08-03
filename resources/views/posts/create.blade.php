@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h2>{{isset($post) ? 'Edit Post' : 'Add Post'}}</h2>
        </div>
        <div class="card-body">
            @include('partials.formErrors')
            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{isset($post) ? $post->title : ''}}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Post description</label>
                    <textarea name="description" class="form-control" id="description" cols="5" rows="5" required>{{isset($post) ? $post->description : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">Post content</label>
                    <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}" required>
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="published_at" class="form-label">Publish Post</label>
                    <input type="text"  class="form-control" name="published_at" class="form-control" id="published_at" value="{{isset($post) ? $post->published_at : ''}}" required>
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/'.$post->image)}}" width="100%" alt="">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" class="form-control" name="image" class="form-control" id="image" value="{{isset($post) ? $post->image : ''}}">
                </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Post Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                               @if(isset($post))
                                    @if($category->id == $post->category_id)
                                        selected
                                    @endif
                                @endif
                            >{{$category->name}}</option>

                        @endforeach
                    </select>
                </div>
{{--                display tags if they exist in the DB--}}
                @if($tags->count() > 0)

                    <div class="form-group">
                        <label for="tags" class="form-label">Tags</label>
                        <select name="tags[]" id="" class="tag-selector form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                        @if(isset($post))
                                            @if($post->hasTag($tag->id))
                                                selected
                                                @endif
                                            @endif

                                >{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-success">{{isset($post) ? 'Update Post' : 'Save Post'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script !src="">
        flatpickr("#published_at");

        $(document).ready(function() {
            $('.tag-selector').select2();
        });
    </script>

@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
