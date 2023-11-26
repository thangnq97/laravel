<div>
    <h2>Xin chào {{ $mailData['name'] }}.</h2>
    <p>Bạn đang gặp vấn đề về mật khẩu.</p>
    <p>Để đặt lại mật khẩu vui lòng nhấn vào đường dẫn phía dưới.</p>
    <a href="{{ route('user.repassword', ['user' => $mailData['id'], 'token' => $mailData['token']]) }}">Thay đổi mật khẩu</a>
</div>