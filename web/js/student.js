$(document).ready(function () {
    $(document).on('click', '.td', function (event) {

        var t = event.target || event.srcElement;
        var elm_name = t.tagName.toLowerCase();
        if (elm_name === 'input') {
            return false;
        }
        var val = $(this).html();
        var code = '<input type="text" class="td" value="' + val + '" />';
        $(this).empty().append(code);
        $('.td').focus();
        $('.td').blur(function () {
            $.ajax({
                type: 'post',
                url: '/courses/update_value',
                dataType: 'json',
                data: {
                    "id": $(this).parent().siblings(":first").text(),
                    "value": $(this).val()
                },
                success: function (data) {
                    console.log(data);
                }
            });
            var val = $(this).val();
            $(this).parent().empty().html(val);
        });
    });

    $(document).on('click', '.td2', function (event) {

        var t = event.target || event.srcElement;
        var elm_name = t.tagName.toLowerCase();
        if (elm_name === 'input') {
            return false;
        }
        var val = $(this).html();
        var code = '<input type="text" class="td2" value="' + val + '" />';
        $(this).empty().append(code);
        $('.td2').focus();
        $('.td2').blur(function () {
            $.ajax({
                type: 'post',
                url: '/courses/update_commit',
                dataType: 'json',
                data: {
                    "id": $(this).parent().siblings(":first").text(),
                    "commit":$(this).val()
                },
                success: function (data) {
                    console.log(data);
                }
            });
            var val = $(this).val();
            $(this).parent().empty().html(val);
        });
    });
});
