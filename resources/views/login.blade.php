@extends('layout.base')

@section('title', 'Admin Login')

@section('content')

    <h1 class="text-info text-center my-5">Admin Login</h1>

    <div class="col-md-6 mx-auto">
       

      <form method="post">
          @csrf
          <x-input type="number" name="phone" value="09990990990" r="required"/>
          <x-input type="password" name="password" />
          <div class="row">
              <div class="col-md-6">
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
              </div>
              <div class="col-md-6 text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </form>
    </div>

@endsection