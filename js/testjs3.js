var cities = [
    {
        id: 1,
        name: 'Varna'
    },
    {
        id: 2,
        name: 'Burgas'
    },
    {
        id: 3,
        name: 'Sofia'
    },
    {
        id: 4,
        name: 'Plovdiv'
    },
    {
        id: 5,
        name: 'Pleven'
    },
    {
        id: 6,
        name: 'Solun'
    },
    {
        id: 7,
        name: 'Sozopol'
    }
];

var city_selected = 0;

function city_input_change(k) {
    if (k.which == 40) {
        if ($('#city_select option:selected').val() != $('#city_select option:last').val()) {
            $('#city_select').val($('#city_select option:selected').next().val());
        }    
        return;
    }
    if (k.which == 38) {
        if ($('#city_select option:selected').val() != $('#city_select option:first').val()) {
            $('#city_select').val($('#city_select option:selected').prev().val());
        }    
        return;
    }
    if (k.which == 13) {
        if ($('#city_select option').length > 0) {
            city_select_click();
        } else {
            if ($('#city_input').val().length > 0) {
                var new_city = {};
                new_city.id = cities[cities.length - 1].id + 1;
                new_city.name = $('#city_input').val();
                cities.push(new_city);
            }
        }    
        return;
    }
    var city = $('#city_input').val();
    $('#city_select option').remove();
    $('#city_select').attr('size',0);
    $('#city_select').hide();
    if (city.length > 1) {
        for (key in cities) {
            if (cities[key].name.toLowerCase().search(city.toLowerCase()) > -1) {
                $('#city_select').append($('<option>', {
                    value: cities[key].id,
                    text: cities[key].name
                }));
            }
        }
        var length = $('#city_select option').length;
        if (length == 1) {
            length = 2;
        }
        $('#city_select').attr('size', length);
        if (length > 0) {
            $('#city_select').show();
        }
    }
}

function city_select_change() {

}

function city_select_click() {
    city_selected = $('#city_select option:selected').val();
    $('#city_input').val($('#city_select option:selected').text());
    $('#city_select').hide();
}


    $(function() {
        $("#city_input").keyup(city_input_change);
        $("#city_select").change(city_select_change);
        $("#city_select").click(city_select_click);
    });
