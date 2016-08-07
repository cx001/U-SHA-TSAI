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
                    @foreach ($farms as $farm)
                    // Create markers and set its position.
                        var eachFarmLatLng = {lat: {{ $farm->lati }}, lng: {{ $farm->lngi }}};
                        var marker = new google.maps.Marker({
                    map: map,
                    position: eachFarmLatLng,
                    title: '{{ $farm->name }}'
                }); 
                @endforeach
                }
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
