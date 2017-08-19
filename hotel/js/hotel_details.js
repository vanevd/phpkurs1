function loadHotel() {
    hotel_key = $(this).closest('.panel').attr('data-hotel-key');
    showHotelDetails();
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
