@extends('layouts.main')

@section('title', 'index')

@section('content')
    @include('partials._lottery_result')
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection