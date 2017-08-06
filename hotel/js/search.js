
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
            console.log(result);
            if (result.status == 'ok') {
                hotels = result.data;
                $('#hotels').html('');
                for (key in hotels) {
                    html = $('#hotel-template').html();
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
                $('#hotel-details').hide();
                $('#error-details').hide();
                $('#hotel-list').show();
            } else if (result.status == 'error') {
                $('#error-details .alert').html(result.error);
                $('#hotel-details').hide();
                $('#hotel-list').hide();
                $('#error-details').show();
            } else {
                $('#error-details .alert').html('Internal Server Error!');
                $('#hotel-details').hide();
                $('#hotel-list').hide();
                $('#error-details').show();
            }    
        },
        error: function(result){
        }
    });   
}     

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
