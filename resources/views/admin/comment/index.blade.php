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
                <th>Content</th>
                <th>User</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cmt)
                <tr>
                    <td>{{ $cmt->content }}</td>
                    <td>{{ $cmt->user->name }}</td>
                    <td>{{ $cmt->user->name }}</td>
                    <td>{{ $cmt->product->name }}</td>
                    <td>
                        <form action="{{ route('comment.destroy', $cmt->id) }}" method="POST" id="check">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        const check = document.getElementById('check');
        // console.log(check);
    
        check.addEventListener('submit', function(e) {
        e.preventDefault();
        const is_check = confirm('Are you sure?');
        if(is_check) {
            check.submit();
        }
    })
    </script>
@endsection