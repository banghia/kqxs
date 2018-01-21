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
                name: inputs[0].value,
                price: inputs[1].value,
                guess: inputs[2].value
            },
            success: function(data){
                console.log(data);
                if(data.status){
                    $(viewManager).append(createRow(data.prediction,href));
                    addEvent();
                    $(row).find('input[type=text]').val('');
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
            <td><a href="${href}/${data.id}" class="btn btn-sm btn-success">>></a></td>
            <td><input type="text" value="${data.name}"></td>
            <td><input type="text" value="${data.price}"></td>
            <td><input type="text" value="${data.guess}"></td>
            <td><a href="${href}/${data.id}" class="btn-edit btn btn-sm btn-secondary">Sửa</a> <a href="${href}/${data.id}" class="btn-del btn btn-sm btn-danger">Xóa</a></td>
        </tr>
    `;
}