@extends('master')

@section('body')
    <div class="my-container grid grid-cols-1 md:grid-cols-2 py-10">
        <ul>
            <li class="mb-8">
                <small>Shop Name:</small>
                <h2 class="text-heading">{{ $shop->name }}</h2>
            </li>
            <li class="mb-8">
                <small>Barbers Count:</small>
                <h2 class="text-heading">{{ count($shop->barbers) }}</h2>
            </li>
        </ul>
        <div id="map" class="h-96"></div>
    </div>

    <div class="divider my-container"></div>

    <div class="my-container grid grid-cols-1 md:grid-cols-2 py-10">
        <div>
            <h3 class="text-heading">Barbers</h3>
            <ul class="mt-5">
                @foreach($shop->barbers as $i => $barber)
                    <li class="mt-2">{{$i + 1}}) {{ $barber->fullName }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3 class="text-heading">Are you a barber in this barbershop?</h3>
            <p>so do not hesitate to register your information here !</p>
            <form action="{{ route('shops.barbers.store', ['shop' => $shop->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="mt-4 block">
                    <small>A picture of yourself</small>
                    {{-- TODO implement barber avatar --}}
                    <input type="file" class="block" placeholder="First name">
                </label>
                <label class="mt-4 block">
                    <small>First name</small>
                    <input type="text" class="input" placeholder="First name" name="first_name">
                </label>
                <label class="mt-4 block">
                    <small>Last name</small>
                    <input type="text" class="input" placeholder="Last name" name="last_name">
                </label>
                <button class="btn btn-primary mt-4">Register!</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const shop = JSON.parse('@json($shop)');

        const map = createMap('map', { center: [shop.lat, shop.lng], zoom: 13});

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
    </script>
@endsection
