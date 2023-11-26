@extends('admin.layout')

@section('content')
@if ($mess = Session()->get('yes'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $mess }}</strong>
    </div>
@endif
    
    <form action="{{ route('product.store') }}" method="POST" class="" style="width: 50%" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Detail</label>
            <textarea name="detail" id="" cols="30" rows="5" class="form-control"></textarea>
            @error('detail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="file">
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Category</label>
            <select name="cate_id" id="" class="form-control">
                @foreach ($cates as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
            @error('cate_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success">
            <a href="{{ route('product.index') }}" class="btn btn-warning">Back</a>
        </div>
    </form>
@endsection