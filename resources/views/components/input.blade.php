<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ ucfirst($name) }}</label>
    <input type="{{ $type }}" class="form-control @if($errors->has($name)) is-invalid @endif" value="{{ $value ?? old($name) }}" name="{{ $name }}" {{ $r ?? ""}}>
    @error($name)
      <div id="{{$name}}Help" class="form-text text-danger">{{ $errors->first($name) }}</div>
    @enderror
  </div>