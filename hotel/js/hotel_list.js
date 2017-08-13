function loadHotels() {
    $.ajax({
        url: "loadHotels.php",
        type: "GET",
        data: {
        },
        success: function(result){
            console.log(result);
            if (result.status == 'ok') {
                hotels = result.data;
                showHotels();
            } else if (result.status == 'error') {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html(result.error);
            } else {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html('Internal Server Error! Please try later.');
            }    
        },
        error: function(result){
        }
    });   
}     

function showHotels() {
    $('#main-form').html(templates.hotel_list);
    $('#hotels').html('');
    for (key in hotels) {
        html = templates.hotel_list_item;
        html = html.replace('{hotel-id}',hotels[key].id);
        $('#hotels').append(html);
        $('[data-hotel-id='+hotels[key].id+'] [data="hotel-name"]').html(hotels[key].name);
        $('[data-hotel-id='+hotels[key].id+']').attr('data-hotel-key', key);
        $('[data-hotel-id='+hotels[key].id+'] [data="hotel-name"]').click(loadHotel);
        $('[data-hotel-id='+hotels[key].id+'] [data="hotel-pic"]').attr('src', hotels[key].pic);
        $('[data-hotel-id='+hotels[key].id+'] [data="city"]').html(hotels[key].city);
        $('[data-hotel-id='+hotels[key].id+'] [data="address"]').html(hotels[key].address);
        $('[data-hotel-id='+hotels[key].id+'] [data="tel"]').html(hotels[key].tel);
        $('[data-hotel-id='+hotels[key].id+'] [data="email"]').html(hotels[key].email);
    }    
}
