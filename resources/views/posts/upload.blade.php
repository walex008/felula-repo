@extends('layouts.app')
    @section('content')
        <div class="card card-default">
            <a href="{{asset('excel/felula_template.xlsx')}}" class="btn btn-info" download>Click to download a template file</a>
            <div class="card-header">Upload File</div>
            <div class="card-body">
                <form action="{{route('posts.store-upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputfile">Upload</label>
                        <input type="file" class="form-control" id="inputfile" name="inputfile" accept=".xls,.xlsx,.csv">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
