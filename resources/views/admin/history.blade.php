@extends('layouts.admin')

@section('title', 'Lịch sử')

@section('content')
    <div class="box">
        <div class="box-title">
            Lịch sử {{ $prediction->name }}
        </div>
        <div class="box-content">
            <table class="table table-responsive-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ngày</th>
                        <th>Dự đoán</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    <tr>
                        <td>*<input type="hidden" value="{{ $prediction->id }}"></td>
                        <td><input type="date" id="date-history"></td>
                        <td><input type="text" placeholder="1000000"></td>
                        <td><input type="text" placeholder="1712727"></td>
                        <td><a href="{{ route('history.store') }}" class="btn-add btn btn-sm btn-block btn-primary" id="add">Thêm</a></td>
                    </tr>
                </thead>
                <tbody id="view-manager" class="manager">
                    @foreach($histories as $history)
                    <tr>
                        <td>1</td>
                        <td><input type="date" value="{{ $history->date }}"></td>
                        <td><input type="text" value="{{ $history->guess }}"></td>
                        <td><input type="text" value="{{ $history->status }}"></td>
                        <td><a href="{{ route('history.update',['id'=>$history->id]) }}" class="btn-edit btn btn-sm btn-secondary">Sửa</a> 
                            <a href="{{ route('history.destroy',['id'=>$history->id]) }}" class="btn-del btn btn-sm btn-danger">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/history.js') }}"></script>
@endsection