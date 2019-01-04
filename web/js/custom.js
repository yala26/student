$(document).ready(function () {
        console.log('hello world');
        $(document).on('click', '#add', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'get',
                url: 'addtable',
                dataType: 'json',
                data: {
                    "task": $('#task').val(),
                    "id": $('#id').val()
                },
                success: function (data) {
                    console.log(data);
                    $('#tasksTbl').append("<tr> \
                <td>" + data.id + "</td> \
                <td>" + data.tasks + "</td> \
                <td>" + data.data + "</td> \
                <td>" + data.users_id + "</td> \
                <td><button data-id='" + data.id + "' class = 'delete' >x</button></td> \
                </tr>"
                    );
                }
            });
        });

    $(document).on('click', '.delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var elem = this;
        console.log(id);
        $.ajax({
            type: 'get',
            url: 'delete',
            data: {
                "id": id
            },
            success: function (data) {
                $(elem).parent().parent().remove();
            },
            error: function (error) {
                console.log('error');
            }
        });
    });

    $(document).on('click', '#sign', function (event){
        event.preventDefault();
        $.ajax({
            type: 'get',
            url: 'adduser',
            dataType: 'json',
            data: {
                "login": $('#login2').val(),
                "pass": $('#pass').val(),
                "name": $('#name').val()
            },
            success: function (data) {
                var div = document.getElementById('div');

                div.innerHTML = data.name;

            }
        })
    });

})