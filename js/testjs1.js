    function sum(){
        var s = 0;
        var n = 1;
        var error = 0;
        $("[name=field]").each(function() {
          if (!error)  {
            var f = $(this).val(); 
            if (f.length == 0) {
                alert('Empty value in field '+n);
                error = 1;
            } else {
                f = parseInt(f);
                if (isNaN(f)) {
                    alert('Invalid value in field '+n);
                    $(this).val('');
                    error = 1;
                } else {
                    s =  s + f;
                }
            }
            n++;
          }  
        });
        if (!error) {
            $("#result").val(s);
        } else {
            $("[name=field]").each(function() {
                if (isNaN(parseInt($(this).val()))) {
                    $(this).val('');
                }    
            }); 
            alert('Please enter valid data again!');
        }
        console.log (s);
    }

    function sum_ajax() {
        field = [];
        $("[name=field]").each(function() {
            field.push($(this).val());
        });    
        console.log(field);
        $.ajax({
            url: "testjs1.php",
            type: "POST",
            data: {
                field: field
            },
            success: function(result){
                var a = result;
                console.log(a);
                if (result.status == 'ok') {
                     $("#result").val(result.data.sum);       
                } else {
                    alert(result.error_message);
                }
            },
            error: function(result){

            }
        });

    }

    function add_field() {
        var s = '';
        var n = $('[name=field]').length + 1;
        s += '<div class="field_row" data-num="' + n +'">';
        s += '<div  class="label">Field ' + n + '</div><input type="text" name="field" value="">';
        s += ' <input type="button" value="x" class="delete_row">';
        s += '</div>';
        console.log(s);
        $('#fields').append(s);
        $(".delete_row:last").click(function () {
            $(this).closest('.field_row').remove();
            renumerate();
        });
    }

    function delete_fields() {
        $('#fields').html('');
    }
 
    function clear_fields() {
        $('[name=field]').val('');
    }

    function hide(){
        $("#sum_form").hide();

    }
    
    function show(){
        $("#sum_form").show();
    }

    function renumerate() {
        var n = 1;
        $('[name=field]').each(function() {
            num = $(this).closest('.field_row').attr('data-num');
            $('[data-num='+num+'] .label').html('Field '+n);
            $('[data-num='+num+']').attr('data-num',n);
            n++;
        });
    }

    $(function() {
        $("#add_field").click(add_field);
        $("#delete_fields").click(delete_fields);
        $("#clear_fields").click(clear_fields);
        $("#sum_button").click(sum);
        $("#sum_ajax_button").click(sum_ajax);
        $("#show_button").click(show);
        $("#hide_button").click(hide);
        $(".delete_row").click(function () {
            $(this).closest('.field_row').remove();
            renumerate();
        });
    });
