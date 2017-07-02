
$(function() {
 $('.my-tab-item').click(function() {
        $('.my-tab-item').removeClass('active');
        $(this).addClass('active');
        return false;
    });
});    