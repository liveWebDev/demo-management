@extends("layouts.app")

@section("content")

    <div class="home-banner">
        @include("layouts.slide")
        <div class="clearfix"></div>
        <div class="search-results">
            <svg id="searchsvg" version="1.0" xmlns="http://www.w3.org/2000/svg"
                 width="1333.000000pt" height="1074.000000pt" viewBox="0 0 1333.000000 1074.000000"
                 preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,1074.000000) scale(0.100000,-0.100000)"
                   fill="#000000" stroke="none" fill-opacity="0.8">
                    <path d="M4015 6730 l-4010 -4010 1360 -1360 1360 -1360 10000 0 10000 0 0 10000
                              0 10000 -2653 0 -2652 0 -4010 -4010z"/>
                </g>
            </svg>

            <div class="form-container search-container">
                <form class="form-primary filterform" method="POST" action="{!! url('/') !!}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#location-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="postcode" name="postcode" value="@if(isset($search['postcode'])) {!! $search['postcode'] !!} @endif">
                    </div>
                    <div class="form-group hide divDriver">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" class="svg-icon">
                                    <use xlink:href="#bottom-arrow-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input id="autocomplete" class="form-control" name="address_from" placeholder="Enter From address" onFocus="geolocate()" type="text" value="@if(isset($search['address_from'])) {!! $search['address_from'] !!} @endif" />
                    </div>
                    <div class="form-group hide divDriver">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" class="svg-icon">
                                    <use xlink:href="#bottom-arrow-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input id="autoCompleteTo" class="form-control" placeholder="Enter To address" name="address_to" onFocus="geolocate()" type="text" value="@if(isset($search['address_to'])) {!! $search['address_to'] !!} @endif"/>
                    </div>


                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" class="svg-icon">
                                    <use xlink:href="#bottom-arrow-icon"></use>
                                </svg>
                            </div>
                        </div>
                        {!! Form::select('body_type', $bodyType, (isset($search['body_type'])) ? $search['body_type'] : '', ['class' => 'form-control selectmenu']) !!}
                    </div>
                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#calendar-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input type="text" class="form-control date" placeholder="select booking date" name="date" value="@if(isset($search['date'])) {!! $search['date'] !!} @endif">
                    </div>
                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#clock-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input type="text" class="form-control time" placeholder="select pick up from time" name="from_time" value="@if(isset($search['from_time'])) {!! $search['from_time'] !!} @endif">
                    </div>
                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#clock-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <input type="text" class="form-control time" placeholder="select pick up to time" name="to_time" value="@if(isset($search['to_time'])) {!! $search['to_time'] !!} @endif">
                    </div>

                    <div class="clearfix"></div>
                    <div class="login-btns">
                        <button type="submit" class="btn-login search-icon">
                            <div class="square-shape">
                                <div class="shape-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                        <use xlink:href="#search-icon"></use>
                                    </svg>
                                </div>
                            </div>
                            <span>Search</span>
                        </button>
                    </div>

                </form>
                <div id="markerlist"></div>
                <div class="searchbox-content">
                    @include("layouts.search-cars")
                </div>
                {{ $records->appends(Request::input())->links() }}


                <div class="googlemap-svg">
                    <div class="map-content">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.966 52.966" class="svg-icon">
                                    <use xlink:href="#zoom-icon"/>
                                </svg>
                            </div>
                        </div>
                        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9435106.644315321!2d-5.980498619650345!3d54.73613528379796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited+Kingdom!5e0!3m2!1sen!2suk!4v1486635818379" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                        <div id="map" style="width: 600px;height: 450px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    @include("layouts.special")
    <div class="clearfix"></div>
    @include("layouts.work")
    <div class="clearfix"></div>
@endsection

@section('js')
    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete, autoCompleteTo;
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
          {types: ['geocode']});

        autoCompleteTo = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autoCompleteTo')),
          {types: ['geocode']});

        google.maps.event.addDomListener(window, 'load', carSearch.init);
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq5oGPoZ6LQcFgfyN-fD2DWC5dIJmG7OI&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script type="application/javascript">
        var records = JSON.stringify({!! $mapRecords !!});
        var count  = "{!! $countRecords !!}";
    </script>
    <script type="text/javascript" src="/js/markerclusterer.js"></script>
    <script src="/js/carSearch.js"></script>
@endsection
