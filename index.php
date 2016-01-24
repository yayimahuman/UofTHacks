<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Le website</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="lmao.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body id="page-top" data-spy="scroll">

    <div id="map"></div>

    <div id="menu">
        <div class="col-sm-12">

            <h1>Accounted Itinerant</h1>
            <p>Compare the costs of getting to your destination</p>
            <br>
            <form id="initial-form" class="form-horizontal" role="form">

                <div id="form-group-1" class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 input-group input-group-lg">

                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-record" aria-hidden="true"></span></span>

                        <input type="text" class="form-control" id="origin" placeholder="Enter your starting point, or leave this blank for current location" aria-describedby="basic-addon1">

                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="form-group-2" class="form-group">
                    <!--<label class="control-label col-sm-2 col-sm-offset-1" for="destination">Destination:</label>-->
                    <div class="col-sm-6 col-sm-offset-3 input-group input-group-lg">

                        <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>

                        <input type="text" class="form-control" id="destination" placeholder="Enter your destination, or leave this blank for your current location" aria-describedby="basic-addon2">

                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="form-group-3" class="form-group" style="text-align:center">

                    <button type="submit" class="btn btn-default btn-lg">Submit</button>

                </div>

            </form>

        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>


<script>
$( "#origin" ).focus(function() {
    //add fancy stuff
});
$( "#destination" ).focus(function() {
    //add fancy stuff
});
$( "#initial-form" ).submit(function() {
    var origin = $('#origin').val(function(){
        var destination = $('#destination').val(function(){
            $("#menu").remove();//make sure values are collected before removal
        });
    });
    //add logic here to dfault to current location when field is blank
});


jQuery(document).ready(function () {
    var map;

    var style =
[{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}]

    var options = {
        zoom: 11,
        center:  new google.maps.LatLng(43.7000, -79.4000),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
    };

    map = new google.maps.Map($('#map')[0], options);
    map.setOptions({
        styles: style
    });

});
</script>
</body>

</html>
