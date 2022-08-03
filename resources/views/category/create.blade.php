@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h2>{{isset($category) ? 'Edit Category' : 'Add Category'}}</h2>
        </div>
        <div class="card-body">
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
            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group mb-2">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{isset($category) ? $category->name : ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Save Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
