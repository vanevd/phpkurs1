var sets = [];

set = {
    name: 'Set 1',
    fields: [10,15,20,30,40]
}
sets.push(set);
set = {
    name: 'Set 2',
    fields: [11,22,33,43,50,60]
}
sets.push(set);

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

    function add_field(value) {
        if (typeof value != 'number') {
            value = '';
        }
        var s = '';
        var n = $('[name=field]').length + 1;
        s += '<div class="field_row" data-num="' + n +'">';
        s += '<div  class="label">Field ' + n + '</div><input type="text" name="field" value="'+value+'">';
        s += ' <input type="button" value="x" class="delete_row">';
        s += '</div>';
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

    function save_set() {
        var fields = [];
        $("[name=field]").each(function() {
            fields.push($(this).val());
        });
        var set = {
            name: $('#set_name').val(),
            fields: fields
        }
        sets.push(set);
    }

    function load_set(id) {
        $('#set_name').val(sets[id].name);
        $('#fields').html('');
        for (key=0; key < sets[id].fields.length; key++) {
            add_field(sets[id].fields[key]);
        }        
    }

    $(function() {
        $("#add_field").click(add_field);
        $("#delete_fields").click(delete_fields);
        $("#clear_fields").click(clear_fields);
        $("#save_set").click(save_set);
        $("#sum_button").click(sum);
        $("#sum_ajax_button").click(sum_ajax);
        $("#show_button").click(show);
        $("#hide_button").click(hide);
        $(".delete_row").click(function () {
            $(this).closest('.field_row').remove();
            renumerate();
        });
        $("#set").change(load_set);
    });
