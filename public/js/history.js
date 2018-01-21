var viewManager;

$(document).ready(function () {
    viewManager = document.getElementById('view-manager');
    addEvent();
    create();
});

function addEvent() {
    edit();
    del();
}

function create(){
    $('#add').click(function (event) {
        event.preventDefault();
        var row = $(this).parent().parent();
        var inputs = $(row).find('input');
        var href = $(this).attr('href');
        $.ajax({
            url: href,
            method: "POST",
            data: {
                prediction_id: inputs[0].value,
                date: inputs[1].value,
                guess: inputs[2].value,
                status: inputs[3].value
            },
            success: function(data){
                console.log(data);
                if(data.status){
                    $(viewManager).prepend(createRow(data.history,href));
                    addEvent();
                    $(inputs).val('');
                }
            }
        });
    });
}

function edit(){
    $(viewManager).find('.btn-edit').click(function (event) {
        event.preventDefault();
        var row = $(this).parent().parent();
        var inputs = $(row).find('input');
        var href = $(this).attr('href');
        $.ajax({
            url: href,
            method: "POST",
            data: {
                _method: 'PUT',
                name: inputs[0].value,
                price: inputs[1].value,
                guess: inputs[2].value
            },
            success: function(data){
                console.log(data);
                if(data.status){
                    alert('update thành công');
                }
            }
        });
    });
}

function del(){
    $(viewManager).find('.btn-del').click(function (event) {
        event.preventDefault();
        var row = $(this).parent().parent();
        var href = $(this).attr('href');
        $.ajax({
            url: href,
            method: "POST",
            data: {
                _method: 'DELETE'
            },
            success: function(data){
                console.log(data);
                if(data.status){
                    $(row).remove();
                }
            }
        });
    });
}

function createRow(data, href) {
    return `
        <tr>
            <td>1</td>
            <td><input type="date" value="${data.date}"></td>
            <td><input type="text" value="${data.guess}"></td>
            <td><input type="text" value="${data.status}"></td>
            <td><a href="${href}/${data.id}" class="btn-edit btn btn-sm btn-secondary">Sửa</a> 
                <a href="${href}/${data.id}" class="btn-del btn btn-sm btn-danger">Xóa</a></td>
        </tr>
    `;
}