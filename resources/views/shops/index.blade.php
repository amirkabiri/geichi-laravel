@extends('master')

@section('body')
    <div id="map" class="w-full" style="height:calc(100vh - 68px);"></div>
@endsection

@section('body-class', '')
@section('footer', '')

@section('script')
    <script type="text/javascript">
        const map = createMap('map');
        map.on('click', function (e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            console.log([lat, lng])
        });


        const shops = JSON.parse('@json($shops)');
        for (const shop of shops) {
            const marker = new L.marker([shop.lat, shop.lng]);
            // marker.bindPopup('Long description with extra formatting ...');
            marker.on('mouseover', function () {
                this.unbindTooltip();
                const tooltip = this.bindTooltip(shop.name, {
                    permanent: false,
                    className: "my-label",
                    offset: [0, 0]
                }).openTooltip();
            })
            marker.addTo(map);
            marker.on('click', function () {
                location.href = '{{route('shops.show', ['shop' => '%SHOP%'])}}'.replace('%SHOP%', shop.id);
            });
        }


        navigator.geolocation.getCurrentPosition(function (position) {
            const { latitude, longitude } = position.coords;

            map.panTo(new L.LatLng(latitude, longitude));
        });

    </script>
@endsection
