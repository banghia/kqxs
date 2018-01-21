$(document).ready(function () {
    $(function () {
        $("#datepicker").datepicker({
            maxDate:'+0D',
            dateFormat: 'dd-mm-yy',
            onSelect: function(date){
                var href = location.href.split('?')[0];
                if(/lottery\/xo-so.*.php/){
                    location.href = href+'?ngay='+date;
                }else{
                    
                }
            }
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});