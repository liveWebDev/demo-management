@extends("layouts.app")

@section("content")
    <div class="home-banner">
        @include("layouts.slide")
        <div class="login-panel">
            <svg id="loginsvg" version="1.0" xmlns="http://www.w3.org/2000/svg"
                 width="1333.000000pt" height="1074.000000pt" viewBox="0 0 1333.000000 1074.000000"
                 preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,1074.000000) scale(0.100000,-0.100000)"
                   fill="#000000" stroke="none" fill-opacity="0.8">
                    <path d="M4015 6730 l-4010 -4010 1360 -1360 1360 -1360 7000 0 7000 0 0 7000
                              0 7000 -2653 0 -2652 0 -4010 -4010z"/>
                </g>
            </svg>
            <div class="form-container">
                <div class="row">
                    <div class="col-lg-6"><a href="javascript:void (0);" id="selfDrive">Self drive</a> </div>
                    <div class="col-lg-6"><a href="javascript:void (0);" id="withDriver">With Driver</a> </div>
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
@endsection
