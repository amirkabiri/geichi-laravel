<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="map-api-key" content="{{ env('NESHAN_API_KEY') }}">

    <title>@yield('title', 'Geichi')</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body class="@yield('body-class', 'pb-16 sm:pb-10')">
    <div class="bg-yellow-400 py-2 text-white shadow-lg z-20 relative">
        <div class="my-container flex flex-row justify-between items-center">
            <a href="{{url('/')}}" class="font-black text-4xl sm:text-5xl">Geichi</a>
            <a href="{{ route('shops.create') }}" class="btn btn-white">Register Barbershop</a>
        </div>
    </div>

    <div class="z-10 relative">
        @yield('body')
    </div>

    @section('footer')
        <footer class="w-100 text-white py-4 bg-neutral-700 absolute w-full" style="bottom: 0;">
            <div class="my-container flex flex-col sm:flex-row justify-between items-center">
                <div>
                    Created By <a class="font-bold text-yellow-400 text-lg" href="https://akdev.ir">Amir Kabiri</a>
                </div>
                <div>
                    <a href="https://github.com/amirkabiri/geichi-laravel" class="text-yellow-400">Github Repository</a>
                </div>
            </div>
        </footer>
    @endsection
    @yield('footer')

    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @if(session('msg'))
        <script>
            iziToast.{{session('msg')[0]}}({message: '{{session('msg')[1]}}'})
        </script>
    @endif
    @if($errors->any())
        <script>
            @foreach($errors->all() as $error)
                iziToast.error({message: '{{$error}}'})
            @endforeach
        </script>
    @endif
    @yield('script')
</body>
</html>
