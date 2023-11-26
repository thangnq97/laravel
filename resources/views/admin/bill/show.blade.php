@extends('admin.layout')

@section('content')
    @if (Session::has('yes'))
        <div class="alert alert-danger" role="alert">
            <strong>{{Session::get('yes')}}</strong>
        </div>
        
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Color</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $bill)
                <tr>
                    <td>{{ $bill->variant->product->name }}</td>
                    <td>{{ $bill->variant->color->name }}</td>
                    <td>{{ $bill->variant->price }}</td>
                    <td>{{ $bill->variant->size->name }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>
                        <a href="{{ route('bill.back') }}" class="btn btn-success">Back</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection