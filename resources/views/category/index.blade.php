@extends('layout.base')

@section('title', 'All Categories')

@section('content')
    <h1 class="text-center text-info my-5">All Categories</h1>

    <div class="col-md-8 mx-auto">

      <a href="{{ route('cats.create') }}" class="btn btn-sm btn-primary"> Create <i class="material-icons">add</i> </a>
        <table class="table table-bordered">
            <thead>
              <tr class="bg-dark text-white">
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Child</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
            @foreach($cats as $cat)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $cat->name }}</td>
                <td><img src="{{ asset('storage/uploads/'). '/' .$cat->image }}" width=50 height=50 /></td>
                {{-- url('/uploads/' . $cat->image) --}}
                <td>
                  <a href="{{ route('cat.sub.index', $cat->id) }}" class="btn btn-info btn-sm"><i class="material-icons">visibility</i> </a>
                </td>
                <td>
                  <a href="{{ route('cats.edit', $cat->id )}}" class="btn btn-warning btn-sm"> 
                    <i class="material-icons">edit</i>  
                  </a>
                  <x-button :action="route('cats.destroy', $cat->id)" />
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
@stop
