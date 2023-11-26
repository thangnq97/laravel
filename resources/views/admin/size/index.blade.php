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
                <th>Name</th>
                <th>
                    <a href="{{ route('size.create') }}" class="btn btn-info">Add</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $size)
                <tr>
                    <td>{{ $size->name }}</td>
                    <td>
                        <form action="{{ route('size.destroy', $size->id) }}" method="POST" id="check">
                            <a href="{{route('size.edit', $size->id)}}" class="btn btn-success">Edit</a>
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