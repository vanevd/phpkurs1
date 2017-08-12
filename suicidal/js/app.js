 $(function() {
    $('[data-provide="datapicker"]').datepicker({
        autoclose: true,
        format: 'dd.mm.yyyy'
    });

    $('.more_options_link').click(function() {
        $('.more_options').toggle();
        return false;
    });  

    $('.more_options').hide();   


    loadAlbum();
});       


function loadAlbum() {
    $.ajax({
        url: "loadAlbum.php",
        type: "GET",
        data: {
        },
        success: function(result){
            albums=result;
            console.log(albums);
            $('#albums').html('');
            for (key in albums) {
                html = $('#album-template').html();
                html = html.replace('{album-id}',albums[key].id);
                $('#albums').append(html);
                $('[data-album-id='+hotels[key].id+'] [data="hotel-name"]').html(hotels[key].name);
                $('[data-album-id='+hotels[key].id+'] [data="hotel-pic"]').attr('src', hotels[key].pic);
                $('[data-album-id='+hotels[key].id+'] [data="year"]').html(hotels[key].city);
            }   
        },
        error: function(result){
        }
    });    
}

