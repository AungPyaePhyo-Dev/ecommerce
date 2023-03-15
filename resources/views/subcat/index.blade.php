@extends('layout.base')

@section('title', 'All Sub Categories')

@section('content')
    <h1 class="text-center text-info my-5">All  Sub Categories</h1>

    <div class="col-md-8 mx-auto">

      <a href="{{ route('cat.sub.create', $cat->id) }}" class="btn btn-sm btn-primary"> Create <i class="material-icons">add</i> </a>
        <table class="table table-bordered">
            <thead>
              <tr class="bg-dark text-white">
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
            @foreach($subcats as $subcat)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $subcat->name }}</td>
                <td><img src="{{ asset('storage/uploads/'). '/' .$subcat->image }}" width=50 height=50 /></td>
                <td>
                  <a href="{{ route('sub.edit', $subcat->id )}}" class="btn btn-warning btn-sm"> 
                    <i class="material-icons">edit</i>  
                  </a>
                  <x-button :action="route('sub.destroy', $subcat->id)" />
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
@stop
