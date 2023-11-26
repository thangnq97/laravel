@extends('admin.layout')

@section('content')
@if ($mess = Session()->get('yes'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $mess }}</strong>
    </div>
@endif
    
    <form action="{{ route('color.update', $color->id) }}" method="POST" class="" style="width: 50%">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $color->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success">
            <a href="{{ route('color.index') }}" class="btn btn-warning">Back</a>
        </div>
    </form>
@endsection