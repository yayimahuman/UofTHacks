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


$( "#initial-form" ).submit(function() {
    var origin = $('#origin').val(function(){
        var destination = $('#destination').val(function(){
            $("#menu").remove();//make sure values are collected before removal

        });
    });
    //add logic here to dfault to current location when field is blank
    submit();
});

function submit(){
    //sidd's code
    //var origin = new google.maps.LatLng(55.930385, -3.118425),
    var origin = "Toronto, ON",
        destination = "Pickering, ON",
        service = new google.maps.DistanceMatrixService();

    service.getDistanceMatrix(
        {
            origins: [origin],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            avoidHighways: false,
            avoidTolls: false
        },
        callback
    );

    function callback(response, status) {
        var orig = document.getElementById("orig"),
            dest = document.getElementById("dest"),
            dist = document.getElementById("dist"),
    		price = document.getElementById("price");
        if(status=="OK") {
            orig.value = response.destinationAddresses[0];
            dest.value = response.originAddresses[0];
            dist.value = response.rows[0].elements[0].distance.text;
            var totdist = dist.value.slice(0, dist.value.length-3);
            totdist = parseFloat(dist.value);

           //dist.value = 9;
            var a = totdist/1.6;
            var mileage = 24;
            var befgal = a/mileage;
            var liters = befgal*3.78541;
            var p = liters *0.95;
            var sum = 0;
            var deci = false;
            /*if(dist.value[i] >= 0 && dist.value[i] <= 9){
            			sum += 1;
            	}*/
            /*for(var i = (dist.value.length-1); i >= 0; i--){
            	if(dist.value[i] == 'k' || dist.value[i] == 'm'){
            		dist = dist.value.slice(0, dist.value.length-2);
            	}
            	if(dist.value[i] == '.'){
            		counter = true;
            	}
            }*/

            /*for(var i = (dist.value.length-1); i >= 0; i--){
            	if(dist.value[i] == '.'){
            		counter = true;
            	}
            }*/
            price.value = p.toFixed(2);;//dist.value.length;

        } else {
            alert("Error: " + status);
        }
    }
}


</script>
</body>

</html>
