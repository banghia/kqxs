<div class="box">
    <div class="box-title">
            @print($lotoLive[0])
    </div>
    <div class="box-content">
        <table class="table tb-result text-center table-bordered">
            <tr>
                <td>@print($lotoLive[1])</td>
                <td>@print($lotoLive[2])</td>
                <td>@print($lotoLive[3])</td>
                <td>@print($lotoLive[4])</td>
                <td>@print($lotoLive[5])</td>
                <td>@print($lotoLive[6])</td>
                <td>@print($lotoLive[7])</td>
                <td>@print($lotoLive[8])</td>
                <td>@print($lotoLive[9])</td>
            </tr>
            <tr>
                <td>@print($lotoLive[10])</td>
                <td>@print($lotoLive[11])</td>
                <td>@print($lotoLive[12])</td>
                <td>@print($lotoLive[13])</td>
                <td>@print($lotoLive[14])</td>
                <td>@print($lotoLive[15])</td>
                <td>@print($lotoLive[16])</td>
                <td>@print($lotoLive[17])</td>
                <td>@print($lotoLive[18])</td>
            </tr>
            @if(count($lotoLive) > 20)  
            <tr>
                <td>@print($lotoLive[19])</td>
                <td>@print($lotoLive[20])</td>
                <td>@print($lotoLive[21])</td>
                <td>@print($lotoLive[22])</td>
                <td>@print($lotoLive[23])</td>
                <td>@print($lotoLive[24])</td>
                <td>@print($lotoLive[25])</td>
                <td>@print($lotoLive[26])</td>
                <td>@print($lotoLive[27])</td>
            </tr>
            @endif
        </table>
    </div>
</div>