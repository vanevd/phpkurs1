function loadHotel() {
    var key;
    key = $(this).closest('.panel').attr('data-hotel-key');
    $('#hotel-details [data="hotel-name"]').html(hotels[key].name);
    $('#hotel-details [data="hotel-pic"]').attr('src', hotels[key].pic);
    $('#hotel-details [data="city"]').html(hotels[key].city);
    $('#hotel-details [data="address"]').html(hotels[key].address);
    $('#hotel-details [data="tel"]').html(hotels[key].tel);
    $('#hotel-details [data="email"]').html(hotels[key].email);
    $('#hotel-details [data="hotel-description"]').html(hotels[key].description);
    $('#hotel-details [data="prices"]').html(renderPrices(hotels[key].rooms));

    $('#hotel-list').hide();
    $('#error-details').hide();
    $('#hotel-details').show();
}

function showHotels() {
    $('#hotel-details').hide();
    $('#error-details').hide();
    $('#hotel-list').show();
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
