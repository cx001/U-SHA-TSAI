@extends('layouts.app')

@section('content')
<div class="container">

    <div id='content' class='row-fluid'>
        <div class='span9 main'>
            <h2>Main Content Section</h2>

            這邊放地圖API 
            從 farms 提取各Farm 經緯度資訊顯示於其上

            
            <div id="map"></div>
            <script>
                function initMap() {
                    var myLatLng = {lat: 24.0, lng: 121};

                    // Create a map object and specify the DOM element for display.
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: myLatLng,
                        scrollwheel: true,
                        zoom: 8
                    });
                    var geocoder = new google.maps.Geocoder();
                    @foreach ($farms as $farm)
                    // Create markers and set its position.
                        var eachFarmLatLng = {lat: {{ $farm->lati }}, lng: {{ $farm->lngi }}};
                
                        var marker = new google.maps.Marker({
                            map: map,
                            position: eachFarmLatLng,
                            title: '{{ $farm->name }}'
                        }); 
                    @endforeach
                             
                    @foreach ($nurs as $nur)
                        var address = "{{$nur->地址}}";
                    // Create markers and set its position.
                var b;
                   b= gg(address,map);
//                       geocoder.geocode({'address': address}, function(results, status) {
//                           if (status === google.maps.GeocoderStatus.OK) {
//                               map.setCenter(results[0].geometry.location);
//                               var marker = new google.maps.Marker({
//                                   map: map,
//                                   position: results[0].geometry.location,
//                                    title: '{{ $nur->育苗場名稱 }}'
//                               });
//                           }  else {
//                               alert('Geocode was not successful for the following reason: ' + status);
//                           }
//                       });
                    @endforeach
                }
                
                
                function gg(a,m) {
                     var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'address': a}, function(results, status) {
                           if (status === google.maps.GeocoderStatus.OK) {
                               m.setCenter(results[0].geometry.location);
                               var markers = new google.maps.Marker({
                                   map: m,
                                   position: results[0].geometry.location,
                                    title: '{{ $nur->育苗場名稱 }}'
                               });
                           } else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                               window.setTimeout(function() {gg(a,m);}, 200);
                           } else {
                               alert('Geocode was not successful for the following reason: ' + status);
                           }
                       });}

                
             
                
                
            </script>
        </div>
        <div class='span3 sidebar'>
            <h2>Sidebar</h2>

            這邊放作物選單或進階設定
            <ul class="nav nav-tabs nav-stacked">
                <li><a href={{url('/farms')}}>edit your own farm</a></li>
                <li><a href='#'>Another Link 2</a></li>
                <li><a href='#'>Another Link 3</a></li>
            </ul>	
        </div>
    </div>	


</div>
@endsection
