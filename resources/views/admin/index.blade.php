@extends('layouts.admin') 
@section('title', 'Trang quản trị') 
@section('content')
<div class="box">
    <div class="box-title">
        Lịch sử nạp thẻ
    </div>
    <div class="box-content">
        <table class="table table-responsive-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ngày</th>
                    <th>Loại</th>
                    <th>Thẻ</th>
                    <th>Giá trị</th>
                </tr>
            </thead>
            <tbody id="view-manager" class="manager">
                @foreach($cards as $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->created_at }}</td>
                    <td>{{ $card->type }}</td>
                    <td>{{ $card->value }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/prediction.js') }}"></script>
@endsection