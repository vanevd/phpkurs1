
$(function() {
 $('.tab-item').click(function() {
        $('.tab-item').removeClass('active');
        $(this).addClass('active');
        return false;
    });
});    