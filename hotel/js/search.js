
var hotels = [];

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

    loadHotels();
});       


function loadHotels() {
    $.ajax({
        url: "loadHotels.php",
        type: "GET",
        data: {
        },
        success: function(result){
            hotels=result;
            var hotel_id;
            console.log(hotels);
            $('#hotels').html('');
            for (key in hotels) {
                html = $('#hotel-template').html();
                html = html.replace('{hotel-id}',hotels[key].id);
                $('#hotels').append(html);
                $('[data-hotel-id='+hotels[key].id+'] [data="hotel-name"]').html(hotels[key].name);

                hotel_id = hotels[key].id;
                console.log(hotel_id);
                $('[data-hotel-id='+hotels[key].id+'] [data="hotel-name"]').click(hotels[key].id, loadHotel);
                $('[data-hotel-id='+hotels[key].id+'] [data="hotel-pic"]').attr('src', hotels[key].pic);
                $('[data-hotel-id='+hotels[key].id+'] [data="city"]').html(hotels[key].city);
                $('[data-hotel-id='+hotels[key].id+'] [data="address"]').html(hotels[key].address);
                $('[data-hotel-id='+hotels[key].id+'] [data="tel"]').html(hotels[key].tel);
                $('[data-hotel-id='+hotels[key].id+'] [data="email"]').html(hotels[key].email);
            }    
            $('#hotel-details').hide();
            $('#hotel-list').show();
        },
        error: function(result){
        }
    });   
}     

function loadHotel(hotel_id) {
    console.log(hotel_id);
    console.log(hotels)
    $('#hotel-list').hide();
    $('#hotel-details').show();
}

function showHotels() {
    $('#hotel-details').hide();
    $('#hotel-list').show();
}
