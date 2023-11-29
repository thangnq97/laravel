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
                <th>Fullname</th>
                <th>Phone</th>
                <th style="width: 25%">Address</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Voucher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $bill)
                <tr>
                    <td>{{ $bill->fullname }}</td>
                    <td>{{ $bill->phone }}</td>
                    <td>{{ $bill->address }}</td>
                    <td>{{ $bill->total_price }}</td>
                    <form action="{{ route('bill.update', $bill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>
                                <select name="status" id="" class="form-control">
                                    @foreach ($status as $item)
                                        <option @selected($bill->status == $item) value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            
                        </td>
                        <td>
                            @isset($bill->voucher->discount)
                                {{ $bill->voucher->discount }}
                            @else
                                0
                            @endisset
                        </td>
                        <td>
                            <a href="{{ route('bill.show', $bill->id) }}" class="btn btn-success">Show</a>
                            <input type="submit" class="btn btn-info" value="Update">
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection