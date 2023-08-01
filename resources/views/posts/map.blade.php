<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="font-semibold text-3xl text-yellow-400">GoogleMap</div>
        </div>
    </x-slot>
    <body>
        <link rel="stylesheet" type="text/css" href="{{ asset('/build/assets/map-f2ed8a0a.css') }}"> 
        <input
          id="pac-input"
          class="controls"
          type="text"
          placeholder="Search Box"
        />
        <div id="map" style="width:800px; height:800px; margin: auto"></div></br>
        <script src="{{ asset('/build/assets/map-be881f23.js') }}"></script>
        <script
          src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.google-map.apikey") }}&callback=initAutocomplete&libraries=places&v=weekly" 
          defer
        ></script>
    </body>
</x-app-layout>