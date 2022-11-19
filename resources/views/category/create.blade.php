@extends('layout.base')

@section('title', 'All Categories')

@section('content')
    <h1 class="text-center text-info my-5">Create Category</h1>
    <div class="col-md-6 mx-auto">
        <form action="{{ route('cats.store') }}" method="post" enctype="multipart/form-data">
            @csrf 
            <x-input type="text" name="name" />
            <x-input type="file" name="image" />
            <button type="submit" class="btn btn-primary float-end">Create</button>            
        </form>
    </div>

@stop