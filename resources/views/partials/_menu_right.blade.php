<div class="box">
    <div class="box-title">
        Dự đoán
    </div>
    <div class="box-content">
        <ul class="list list-cata list-pre">
            @foreach($predictions as $prediction)
            <li><a href="{{ route('prediction',['id' => $prediction->id]) }}">{{ $prediction->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>