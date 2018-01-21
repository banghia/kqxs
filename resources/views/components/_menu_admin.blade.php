<div class="box">
    <div class="box-title">
        Menu quản lí
    </div>
    <div class="box-content">
        <ul class="list list-cata">
            <li><a href="{{ route('admin') }}">Trang admin</a></li>
            <li><a href="{{ route('prediction.index') }}">Quản lí dự đoán</a></li>
            <li><a href="{{ route('config') }}">Cấu hình thecaoplus</a></li>
            <li><a href="{{ route('changePassword') }}">Đổi mật khẩu</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div>