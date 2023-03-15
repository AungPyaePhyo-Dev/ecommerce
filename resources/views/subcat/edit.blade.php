@extends('layout.base')

@section('title', 'All Categories')

@section('content')
    <h1 class="text-center text-info my-5">Edit Category</h1>
    <div class="col-md-6 mx-auto">
        <form action="{{ route('sub.update', $subcat->id) }}" method="post" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="_method" value="PATCH"/>
            <x-input type="text" name="name" :value="$subcat->name" r="required"/>
            <p>Current Image => 
                <a href="{{ asset('storage/uploads/' . '/' . $subcat->image) }}">{{ $subcat->image }}</a>
            </p>
            <x-input type="file" name="image" />
            <button type="submit" class="btn btn-primary float-end">Update</button>            
        </form>
    </div>

@stop