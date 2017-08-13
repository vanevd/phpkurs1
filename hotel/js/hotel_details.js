function loadHotel() {
    var key;
    key = $(this).closest('.panel').attr('data-hotel-key');
    current_hotel_id = hotels[key].id;
    $('#main-form').html(templates.hotel_details);
    $('[data="hotel-name"]').html(hotels[key].name);
    $('[data="hotel-pic"]').attr('src', hotels[key].pic);
    $('[data="city"]').html(hotels[key].city);
    $('[data="address"]').html(hotels[key].address);
    $('[data="tel"]').html(hotels[key].tel);
    $('[data="email"]').html(hotels[key].email);
    $('[data="hotel-description"]').html(hotels[key].description);
    $('[data="prices"]').html(renderPrices(hotels[key].rooms));

}

function renderPrices(rooms) {
    var response;
    response +='<thead>';
    response +='<tr>';
    for (key in rooms[0]) {
        response +='<th>'+rooms[0][key]+'</th>';
    }    
    response +='</tr>';
    response +='</thead>';
    response +='<tbody>';
    for (key1 in rooms) {
        response +='<tr>';
        if (key1 == 0) {
            continue;
        }
        for (key in rooms[key1]) {
            response +='<td>'+rooms[key1][key]+'</td>';
        }    
        response +='</tr>';
    }    
    response +='</tbody>';
    return response;
}
