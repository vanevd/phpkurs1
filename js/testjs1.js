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
        if ($('#set').val() !== null) {
            var fields = [];
            $("[name=field]").each(function() {
                fields.push(parseInt($(this).val()));
            });
            var id = $('#set').val();
            var name = $('#set_name').val();
            $('#set option:selected').text(name);
            sets[id].name = name;
            sets[id].fields = fields;
            sum();
        }   
    }
    
    function new_set() {
        $('#fields').html('');
        var name = 'Set ' + ($('#set option').length+1);
        $('#set_name').val(name)
        var set = {
            name: name,
            fields: []
        }
        sets.push(set);
        $('#set').append($('<option>', {
            value: sets.length-1,
            text: name
        }));
        $('#set').val(sets.length-1);
    }

    function new_random_set() {
        $('#fields').html('');
        var fields = [];
        var n = Math.floor(Math.random()*7)+3;
        var i;
        for (i=0; i<n; i++) {
            fields.push(Math.floor(Math.random()*99)+1);
        }
        var name = 'Set ' + ($('#set option').length+1);
        var set = {
            name: name,
            fields: fields
        }
        sets.push(set);
        $('#set_name').val(name);
        $('#set').append($('<option>', {
            value: sets.length-1,
            text: name
        }));
        $('#set').val(sets.length-1);
        load_set();
    }

    function load_set() {
        var id = $('#set').val();
        $('#set_name').val(sets[id].name);
        $('#result').val('');
        $('#fields').html('');
        for (key=0; key < sets[id].fields.length; key++) {
            add_field(sets[id].fields[key]);
        }
        sum();
        export_set();
    }

    function delete_set() {
        var id = $('#set').val();
        sets.splice(id, 1);
        $('#set option:selected').remove();
        var n = 0;
        $('#set option').each(function() {
            $(this).val(n);
            n++;
        });   
        if (id <= n-1) {
            $('#set').val(id);
        } else {
            $('#set').val(n-1);
        }    
        if (n > 0) {
            load_set();
        } else {
            $('#result').val('');
            $('#set_name').val('');
            $('#fields').html('');
        }    
    }

    function import_set() {
        var s = $('#set_list').val();
        var fields = s.split(',');
        for (key in fields) {
            fields[key] = parseInt(fields[key]);
        }
        /*
        fields.forEach(function(value,key,array) {
            array[key] = parseInt(value);
        });
        */
        var id = $('#set').val();
        if (id !== null) {
            sets[id].fields = fields;
            load_set();
        }
    }

    function export_set() {
        var fields  = [];
        $("[name=field]").each(function() {
            fields.push($(this).val());
        });
        $('#set_list').val(fields.toString());
    }

    $(function() {
        $("#add_field").click(add_field);
        $("#delete_fields").click(delete_fields);
        $("#clear_fields").click(clear_fields);
        $("#new_set").click(new_set);
        $("#new_random_set").click(new_random_set);
        $("#save_set").click(save_set);
        $("#sum_button").click(sum);
        $("#import_button").click(import_set);
        $("#export_button").click(export_set);
        $("#sum_ajax_button").click(sum_ajax);
        $("#show_button").click(show);
        $("#hide_button").click(hide);
        $(".delete_row").click(function () {
            $(this).closest('.field_row').remove();
            renumerate();
        });
        $("#delete_set").click(delete_set);
        $("#set").change(load_set);
        $('#set').val(0);
        load_set();
    });
