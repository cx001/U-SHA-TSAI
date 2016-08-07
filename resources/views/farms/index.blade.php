@extends('layouts.app')

@section('content')
<div class="container">
    <div id='content' class='row-fluid'>
        <div class='span9 main'>
            <div class="panel-heading">
                設定農場
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="{{ url('farm') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group">

                        <label for="farm-name" class="col-sm-3 control-label">設定農場位置及光照</label><br><br>


                        農場名稱
                        <input type="text" name="name" id="farm-name" class="form-control">
                        經度
                        <input type="text" id="lati" name="lati" id="farm-lat" class="form-control">
                        緯度
                        <input type="text" id="lngi" name="lngi" id="farm-lng" class="form-control">

                       
                        <script>
                            function initMap() {
                                var myLatLng = {lat: 24.0, lng: 121};

                                // Create a map object and specify the DOM element for display.
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: myLatLng,
                                    scrollwheel: true,
                                    zoom: 8
                                });
                                map.addListener('click', function(e) {
                                    var i = e.latLng.toString().search(",");
                                    var j = e.latLng.toString().length;
                                    document.getElementById('lati').value = e.latLng.toString().substring(1,i);
                                    document.getElementById('lngi').value = e.latLng.toString().substring(i+2,j-1);
                                    placeMarkerAndPanTo(e.latLng, map);    
                                });
                                //代辦：點第二次之後移除舊的MARKER
                                function placeMarkerAndPanTo(latLng, map) {

                                    var marker = new google.maps.Marker({
                                        position: latLng,
                                        map: map
                                    });
                                    map.panTo(latLng);
                                }}
                        </script>

                        <div id="map"></div>


                        <div class="col-sm-6">
                            <input type="radio" name="lightness" value=3 checked>全日照<br>
                            <input type="radio" name="lightness" value=2> 半日照<br>
                            <input type="radio" name="lightness" value=1>低光
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>確定
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>      
        <div class='span3 sidebar'>
            <!-- CurrentFarms -->
            @if (count($farms) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    農場資訊
                </div>

                <div >
                    <table>
                        <thead>
                            <th>Farm</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($farms as $farm)
                            <tr>
                                <td ><div>{{ $farm->name }}</div>
                                    <div>

                                    </div>
                                </td>

                                <!-- Task Delete Button -->
                                <td>
                                    <form action="{{url('farm/' . $farm->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-farm-{{ $farm->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @endsection   </div>