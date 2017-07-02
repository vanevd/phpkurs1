    
$(function() {
    $('[data-provide="datepicker"]').datepicker({
        autoclose: true,
        format: 'dd.mm.yyyy'
    });

    $('.more_options_link').click(function() {
        $('.more_options').toggle();
        return false;
    });    

    $('.more_options').hide();
});       