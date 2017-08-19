
var hotels = [];
var templates = {
    error_details: '<div class="alert alert-danger"></div>'
};
var hotel_key;

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
                //$('#left-form').html(templates.hotel_search);
                //hotel_search_init();
            } else if (result.status == 'error') {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html(result.error);
            } else {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html('Internal Server Error! Please try later.');
            }    
        },
        error: function(result){
            $('#main-form').html(templates.error_details);
            $('#main-form .alert').html('Fatal Error! Please try later.');
        }
    });   
}     

function showLogin() {
    $('#left-form').html('');
    $('#main-form').html(templates.login);
}

function showEditHotel() {
    $('#main-form').html(templates.hotel_edit);
    $('#name').val(hotels[hotel_key].name);
    $('#city').val(hotels[hotel_key].city);
    $('#address').val(hotels[hotel_key].address);
    $('#tel').val(hotels[hotel_key].tel);
    $('#email').val(hotels[hotel_key].email);
    $('#description').val(hotels[hotel_key].description);
    $('#pic').val(hotels[hotel_key].pic);
}

function login() {
    $.ajax({
        url: "login.php",
        type: "GET",
        data: {
            username: $('#username').val(),
            password: $('#password').val()
        },
        success: function(result){
            if (result.status == 'ok') {
                $('#login_user_link').html('Logged user: ' + result.data.first_name+' '+result.data.last_name);
                $('#login_user').show();
                $('#login').hide();
                $('#logout').show();
                $('#left-form').html(templates.hotel_search);
                hotel_search_init();
                $('#main-form').html('');
            } else if (result.status == 'error') {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html(result.error);
            } else {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html('Internal Server Error! Please try later.');
            }    
        },
        error: function(result){
            $('#main-form').html(templates.error_details);
            $('#main-form .alert').html('Fatal Error! Please try later.');
        }
    });   

}

function logout() {
    $('#left-form').html('');
    $('#main-form').html('');
    $('#login_user_link').html('');
    $('#login_user').hide();
    $('#logout').hide();
    $('#login').show();
}

function saveHotel() {
    $.ajax({
        url: "saveHotel.php",
        type: "POST",
        data: {
            id: hotels[hotel_key].id,
            name: $('#name').val(),
            city: $('#city').val(),
            address: $('#address').val(),
            email: $('#email').val(),
            tel: $('#tel').val(),
            pic: $('#pic').val(),
            description: $('#description').val()
        },
        success: function(result){
            if (result.status == 'ok') {
                hotels[hotel_key].name = $('#name').val();
                hotels[hotel_key].city = $('#city').val();
                hotels[hotel_key].address = $('#address').val();
                hotels[hotel_key].tel = $('#tel').val();
                hotels[hotel_key].email = $('#email').val();
                hotels[hotel_key].description = $('#description').val();
                hotels[hotel_key].pic = $('#pic').val();                

                showHotelDetails();
                
            } else if (result.status == 'error') {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html(result.error);
            } else {
                $('#main-form').html(templates.error_details);
                $('#main-form .alert').html('Internal Server Error! Please try later.');
            }    
        },
        error: function(result){
            $('#main-form').html(templates.error_details);
            $('#main-form .alert').html('Fatal Error! Please try later.');
        }
    });
}

function showHotelDetails() {
    $('#main-form').html(templates.hotel_details);
    $('[data="hotel-name"]').html(hotels[hotel_key].name);
    $('[data="hotel-pic"]').attr('src', hotels[hotel_key].pic);
    $('[data="city"]').html(hotels[hotel_key].city);
    $('[data="address"]').html(hotels[hotel_key].address);
    $('[data="tel"]').html(hotels[hotel_key].tel);
    $('[data="email"]').html(hotels[hotel_key].email);
    $('[data="hotel-description"]').html(hotels[hotel_key].description);
    $('[data="prices"]').html(renderPrices(hotels[hotel_key].rooms));
}