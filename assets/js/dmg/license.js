//Calculate Reserve Year
$("#reserve_year").focus(function() {
    var reserve = $('#reserve').val();
    var production_per_day = $('#production_per_day').val();
    var working_days = $('#working_days').val();
    if(reserve == '') {
        alert('Please Enter Reserve');
        $('#reserve').focus();
    } else if(production_per_day == '') {
        alert('Please Enter Production per Day');
        $('#production_per_day').focus();
    } else if(working_days == '') {
        alert('Please Enter Working Days');
        $('#working_days').focus();
    } else {
        var reserve_year = parseFloat(reserve) / (parseFloat(production_per_day) * parseFloat(working_days));
        $('#reserve_year').val(reserve_year);   
    }
});

//Calculate Total Area
$("#total_area").focus(function() {
    var east = $('#east').val();
    var west = $('#west').val();
    var north = $('#north').val();
    var south = $('#south').val();
    if(east == '') {
        alert('Please Enter East');
        $('#east').focus();
    } else if(west == '') {
        alert('Please Enter West');
        $('#west').focus();
    } else if(north == '') {
        alert('Please Enter North');
        $('#north').focus();
    } else if(south == '') {
        alert('Please Enter South');
        $('#south').focus();
    } else {
        var total_area = ( (parseFloat(east) + parseFloat(west)) * (parseFloat(north) + parseFloat(south) ) ) / 1000000;
        $('#total_area').val(total_area);
    }
});

//Calculate Easting From, Easting To, Northing From, Northing To
$("#easting_from").focus(function() {
    var east = $('#east').val();
    var west = $('#west').val();
    var north = $('#north').val();
    var south = $('#south').val();
    var easting = $('#easting').val();
    var northing = $('#northing').val();
    if(east == '') {
        alert('Please Enter East');
        $('#east').focus();
    } else if(west == '') {
        alert('Please Enter West');
        $('#west').focus();
    } else if(north == '') {
        alert('Please Enter North');
        $('#north').focus();
    } else if(south == '') {
        alert('Please Enter South');
        $('#south').focus();
    } else if(easting == '') {
        alert('Please Enter Easting');
        $('#easting').focus();
    } else if(northing == '') {
        alert('Please Enter Northing');
        $('#northing').focus();
    } else {
        $('#easting_from').val(parseFloat(easting) - parseFloat(west));
        $('#northing_from').val(parseFloat(northing) - parseFloat(south));
        $('#easting_to').val(parseFloat(easting) + parseFloat(east));
        $('#northing_to').val(parseFloat(northing) + parseFloat(north));
    }
});