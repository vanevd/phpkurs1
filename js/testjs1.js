
    var c=8;
    function sum1(a,b){
        var c=a+b;
        console.log(c);
    }

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

    function hide(){
        $("#sum_form").hide();

    }
    function show(){
        $("#sum_form").show();
    }

    $(function() {
        $("#sum_button").click(sum);
        $("#sum_ajax_button").click(sum_ajax);
        $("#show_button").click(show);
        $("#hide_button").click(hide);
    });
