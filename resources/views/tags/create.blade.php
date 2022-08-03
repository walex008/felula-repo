@extends('layouts/app')

@section('content')
    <card class="card card-default">
        <card class="card-header">
            <h2>
                {{isset($tag) ? 'Update Tag' : 'Create Tag'}}
            </h2>
        </card>
        <card class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name" class="form-label">Tag Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{isset($tag) ? $tag->name : ''}}" required>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="form-control btn btn-success btn-sm">{{isset($tag) ? 'Update Tag' : 'Save Tag'}}</button>
                </div>
            </form>
        </card>
    </card>
@endsection
