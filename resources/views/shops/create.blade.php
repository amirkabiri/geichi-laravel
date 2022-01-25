@extends('master')

@section('body')
    <div class="my-container grid grid-cols-1 md:grid-cols-2 py-10 gap-10">
        <form class="flex-col flex justify-center" action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <h3 class="text-heading">Show Your Art To The World!</h3>
                <p>Register your barbershop on Geichi</p>
            </div>
            <label class="mt-4 block">
                <small>Shop name</small>
                <input type="text" class="input" placeholder="Name" name="name" value="{{ old('name') }}">
            </label>
            <input type="hidden" name="lat" value="{{ old('lat') }}">
            <input type="hidden" name="lng" value="{{ old('lng') }}">
            <button class="btn btn-primary mt-4">Register!</button>
        </form>
        <div>
            <p class="mb-2">Choose your barbershop's location on map</p>
            <div id="map" class="h-96"></div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        (function() {
            const selector = key => document.querySelector(`input[name="${key}"]`);
            const createMarker = (lat, lng) => {
                const marker = new L.marker([lat, lng]);
                marker.addTo(map)
                return marker;
            };

            const initialLat = selector('lat').value;
            const initialLng = selector('lng').value;

            const map = createMap('map');
            let marker;

            if(initialLat && initialLng) marker = createMarker(initialLat, initialLng);

            map.on('click', e => {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;

                for(const key of ['lat', 'lng'])
                    selector(key).value = e.latlng[key];

                if(!marker){
                    marker = createMarker(lat, lng);
                }else{
                    marker.setLatLng(new L.LatLng(lat, lng));
                }
            });
        })();
    </script>
@endsection
