@extends('layouts.admin') 
@section('title', 'Đổi mật khẩu') 
@section('content')
<div class="box">
    <div class="box-title">
        Đổi mật khẩu
    </div>
    <div class="box-content row justify-content-md-center">
        <div class="col-md-8 m-4">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('postChangePassword') }}"> 
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="oldPassword">Mật khẩu cũ</label>
                    <input type="password" class="form-control{{ $errors->has('oldPassword')?' is-invalid':'' }}" id="oldPassword" placeholder="Mật khẩu cũ" name="oldPassword">
                    @if ($errors->has('oldPassword'))
                        <div class="invalid-feedback">
                            {{ $errors->first('oldPassword') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="newPassword">Mật khẩu mới</label>
                    <input type="password" class="form-control{{ $errors->has('newPassword')?' is-invalid':'' }}" id="newPassword" placeholder="Mật Khẩu mới" name="newPassword">
                    @if ($errors->has('newPassword'))
                        <div class="invalid-feedback">
                            {{ $errors->first('newPassword') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="newPassword_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" placeholder="Nhập lại mật khẩu">
                 </div>

                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/prediction.js') }}"></script>
@endsection