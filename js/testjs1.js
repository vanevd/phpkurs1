
    var c=8;
    function sum1(a,b){
        var c=a+b;
        console.log(c);
    }
    function sum(){
        var c=$("#field1").val();
        var d=$("#field2").val();
        var a=parseInt(c) + parseInt(d);
        $("#result").val(a);
        console.log (a);
    }
    function hide(){
        $("#sum_form").hide();

    }
    function show(){
        $("#sum_form").show();
    }

    $(function() {
        $("#sum_button").click(sum);
        $("#show_button").click(show);
        $("#hide_button").click(hide);
    });
