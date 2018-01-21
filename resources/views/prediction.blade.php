@extends('layouts.main') 
@section('title', $prediction->name) 
@section('content')
<div class="box">
    <div class="box-title">
        Lấy kết quả
    </div>
    <div class="box-content m-3">
        @if(session()->has('result'))
            <div class="alert alert-success result-gold" role="alert">
                Dự đoán <strong>{{ session()->get('result') }}</strong>
            </div>
        @endif
        @if(session()->has('money'))
            <div class="alert alert-success" role="alert">
                Số tiền hiện tại <strong>{{ session()->get('money') }}</strong>
            </div>
        @endif
        <div class="alert alert-light" role="alert">
            Bạn cần <strong>{{ $prediction->price }}</strong> để có được kết quả. Nạp thẻ sẽ được <strong>cộng dồn</strong>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-warning" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="POST" acion="{{ route('payPrediction',['id' => $prediction->id]) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Loại thẻ</label>
                <select class="form-control" id="type" name="type">
                    <option value="VTT">Viettel</option>
                    <option value="VNP">Vinaphone</option>
                    <option value="VMS">Mobiphone</option>
                    <option value="ZING">Zing card</option>
                    <option value="ONC">Oncash</option>
                    <option value="MGC">Megacard</option>
                    <option value="FPT">FPT Gate</option>
                </select>
            </div>
            <div class="form-group">
                <label for="serial">Số seri</label>
                <input type="text" class="form-control" id="serial" name="serial" placeholder="Số seri">
            </div>
            <div class="form-group">
                <label for="code">Mã thẻ</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Mã thẻ">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Nạp thẻ</button>
        </form>
    </div>
</div>
<div class="box">
    <div class="box-title">
        Lịch sử dự đoán
    </div>
    <div class="box-content">
        <table class="table table-responsive-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ngày</th>
                    <th>Dự đoán</th>
                    <th>Trạng thái</th>
                </tr>
                <tbody id="view-manager" class="manager">
                    @foreach($histories as $history)
                    <tr>
                        <td>1</td>
                        <td>{{ date('d-m-yy',strtotime($history->date)) }}</td>
                        <td>{{ $history->guess }}</td>
                        <td>{{ $history->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endsection