@extends('admin.layout')

@section('content')
@if ($mess = Session()->get('yes'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $mess }}</strong>
    </div>
@endif
    
    <form action="{{ route('voucher.store') }}" method="POST" class="" style="width: 50%">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Discount</label>
            <input type="number" class="form-control" name="discount">
            @error('discount')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Expiry</label>
            <input type="date" class="form-control" name="expiry">
            @error('expiry')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success">
            <a href="{{ route('voucher.index') }}" class="btn btn-warning">Back</a>
        </div>
    </form>
@endsection