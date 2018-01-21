@extends('layouts.admin') 
@section('title', 'Dự đoán') 
@section('content')
<div class="box">
    <div class="box-title">
        Quản lí dự đoán
    </div>
    <div class="box-content">
        <table class="table table-responsive-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th>Xem</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Dự đoán</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="view-manager" class="manager">
                @foreach($predictions as $prediction)
                <tr>
                    <td><a href="{{ route('prediction.show',['id' => $prediction->id]) }}" class="btn btn-sm btn-success">>></a></td>
                    <td><input type="text" value="{{ $prediction->name }}"></td>
                    <td><input type="number" value="{{ $prediction->price }}"></td>
                    <td><input type="text" value="{{ $prediction->guess }}"></td>
                    <td><a href="{{ route('prediction.update',['id' => $prediction->id]) }}" class="btn-edit btn btn-sm btn-secondary">Sửa</a> 
                        <a href="{{ route('prediction.destroy',['id' => $prediction->id]) }}" class="btn-del btn btn-sm btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>*</td>
                    <td><input type="text" placeholder="Tên dự đoán"></td>
                    <td><input type="number" placeholder="Giá"></td>
                    <td><input type="text" placeholder="Dự đoán"></td>
                    <td><a href="{{ route('prediction.store') }}" class="btn-add btn btn-sm btn-block btn-primary" id="add">Thêm</a></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/prediction.js') }}"></script>
@endsection