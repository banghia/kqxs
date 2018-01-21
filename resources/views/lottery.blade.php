@extends('layouts.main')

@section('title', 'Trang kết quả sổ số')

@section('content')
    @include('components._lottery_result',['lottery' => $result[0]])

    @include('components._loto_live',['lotoLive' => $result[1]])

    @include('components._start_end',['startLoto' => $result[2], 'endLoto' => $result[3]])
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection