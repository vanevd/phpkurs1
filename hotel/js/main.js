
var hotels = [];
var templates;

$(function() {

    loadTemplates();

});       

function loadTemplates() {
    $.ajax({
        url: "loadTemplates.php",
        type: "GET",
        data: {
        },
        success: function(result){
            if (result.status == 'ok') {
                templates = result.data;
                $('#left-form').html(templates.hotel_search);
                hotel_search_init();
            } else if (result.status == 'error') {
            } else {
            }    
        },
        error: function(result){
        }
    });   
}     


