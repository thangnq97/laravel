@extends('admin.layout')

@section('content')
@if ($mess = Session()->get('yes'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $mess }}</strong>
    </div>
@endif
    
    <form action="{{ route('voucher.update', $voucher->id) }}" method="POST" class="" style="width: 50%">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $voucher->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Discount</label>
            <input type="number" class="form-control" name="discount" value="{{ $voucher->discount }}">
            @error('discount')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Expiry</label>
            <input type="date" class="form-control" name="expiry" value="{{ $voucher->expiry }}">
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