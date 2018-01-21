<div class="box">
    <div class="box-title">
        {{ preg_replace('/<[^>]*>/',' ',$lottery[0]) }}
    </div>
    <div class="box-content">
        @if(count($lottery) > 30)
        <table class="table tb-result text-center table-bordered">
            <tbody>
                <tr>
                    <td class="prize">@print($lottery[1])</td>
                    <td colspan="12">@print($lottery[2])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[3])</td>
                    <td colspan="12">@print($lottery[4])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[5])</td>
                    <td colspan="6">@print($lottery[6])</td>
                    <td colspan="6">@print($lottery[7])</td>
                </tr>
                <tr>
                    <td class="prize" rowspan="2">@print($lottery[8])</td>
                    <td colspan="4">@print($lottery[9])</td>
                    <td colspan="4">@print($lottery[10])</td>
                    <td colspan="4">@print($lottery[11])</td>
                </tr>
                <tr>
                    <td colspan="4">@print($lottery[13])</td>
                    <td colspan="4">@print($lottery[14])</td>
                    <td colspan="4">@print($lottery[15])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[16])</td>
                    <td colspan="3">@print($lottery[17])</td>
                    <td colspan="3">@print($lottery[18])</td>
                    <td colspan="3">@print($lottery[19])</td>
                    <td colspan="3">@print($lottery[20])</td>
                </tr>
                <tr>
                    <td class="prize" rowspan="2">@print($lottery[21])</td>
                    <td colspan="4">@print($lottery[22])</td>
                    <td colspan="4">@print($lottery[23])</td>
                    <td colspan="4">@print($lottery[24])</td>
                </tr>
                <tr>
                    <td colspan="4">@print($lottery[26])</td>
                    <td colspan="4">@print($lottery[27])</td>
                    <td colspan="4">@print($lottery[28])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[29])</td>
                    <td colspan="4">@print($lottery[30])</td>
                    <td colspan="4">@print($lottery[31])</td>
                    <td colspan="4">@print($lottery[32])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[33])</td>
                    <td colspan="3">@print($lottery[34])</td>
                    <td colspan="3">@print($lottery[35])</td>
                    <td colspan="3">@print($lottery[36])</td>
                    <td colspan="3">@print($lottery[37])</td>
                </tr>
            </tbody>
        </table>
        @else
        <table class="table tb-result text-center table-bordered">
            <tbody>
                <tr>
                    <td class="prize">@print($lottery[1])</td>
                    <td colspan="12">@print($lottery[2])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[3])</td>
                    <td colspan="12">@print($lottery[4])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[5])</td>
                    <td colspan="12">@print($lottery[6])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[7])</td>
                    <td colspan="6">@print($lottery[8])</td>
                    <td colspan="6">@print($lottery[9])</td>
                </tr>
                <tr>
                    <td class="prize" rowspan="2">@print($lottery[10])</td>
                    <td colspan="3">@print($lottery[11])</td>
                    <td colspan="3">@print($lottery[12])</td>
                    <td colspan="3">@print($lottery[13])</td>
                    <td colspan="3">@print($lottery[14])</td>
                </tr>
                <tr>
                    <td colspan="4">@print($lottery[16])</td>
                    <td colspan="4">@print($lottery[17])</td>
                    <td colspan="4">@print($lottery[18])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[19])</td>
                    <td colspan="12">@print($lottery[20])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[21])</td>
                    <td colspan="4">@print($lottery[22])</td>
                    <td colspan="4">@print($lottery[23])</td>
                    <td colspan="4">@print($lottery[24])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[25])</td>
                    <td colspan="12">@print($lottery[26])</td>
                </tr>
                <tr>
                    <td class="prize">@print($lottery[27])</td>
                    <td colspan="12">@print($lottery[28])</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</div>