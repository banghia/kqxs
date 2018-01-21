@extends('layouts.admin') 
@section('title', 'Cấu hình thecaoplus') 
@section('content')
<div class="box">
    <div class="box-title">
        Cấu hình thecaoplus
    </div>
    <div class="box-content row justify-content-md-center">
        <div class="col-md-8 m-4">
            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
            @endif
            <form method="POST" action="{{ route('config') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="merchant_id">Merchant ID</label>
                    <input type="text" class="form-control{{ $errors->has('merchant_id')?' is-invalid':'' }}" id="merchant_id" placeholder="Merchant ID"
                        name="merchant_id" value="@print($config->merchant_id)">
                    @if ($errors->has('merchant_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('merchant_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="client_id">Client ID</label>
                    <input type="text" class="form-control{{ $errors->has('client_id')?' is-invalid':'' }}" id="client_id" placeholder="Client ID"
                        name="client_id" value="@print($config->client_id)">
                    @if ($errors->has('client_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="client_secret">Client Secret</label>
                    <input type="text" class="form-control{{ $errors->has('client_secret')?' is-invalid':'' }}" id="client_secret" placeholder="Client Secret"
                        name="client_secret" value="@print($config->client_secret)">
                    @if ($errors->has('client_secret'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client_secret') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Cấu hình</button>
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/prediction.js') }}"></script>
@endsection