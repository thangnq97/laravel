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
                <th>Email</th>
                <th>Token</th>
                <th>Role</th>
                <th>Is_active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->token }}</td>
                    <td>
                        @if ($user->role == 1)
                            admin
                        @else
                            user
                        @endif
                    </td>
                    <td>
                        @if ($user->is_active)
                            active
                        @else
                            in-active
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" id="check">
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