@extends('admin.layout')

@section('content')
@if ($mess = Session()->get('yes'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $mess }}</strong>
    </div>
@endif
    
    <form action="{{ route('variant.update', $variant->id) }}" method="POST" class="" style="width: 50%">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label">Product</label>
            <select name="product_id" id="" class="form-control">
                <option selected disabled value="">--Chọn sản phẩm--</option>
                @foreach ($products as $item)
                    <option @selected($item->id === $variant->product_id) value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('product_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Color</label>
            <select name="color_id" id="" class="form-control">
                <option selected disabled value="">--Chọn màu sắc--</option>
                @foreach ($colors as $item)
                    <option @selected($item->id === $variant->color_id) value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('color_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Size</label>
            <select name="size_id" id="" class="form-control">
                <option selected disabled value="">--Chọn size--</option>
                @foreach ($sizes as $item)
                    <option @selected($item->id === $variant->size_id) value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('size_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="{{ $variant->price }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{ $variant->quantity }}">
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success">
            <a href="{{ route('variant.index') }}" class="btn btn-warning">Back</a>
        </div>
    </form>
@endsection