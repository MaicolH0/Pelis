<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl,theme.default.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="container mt-5">
            @yield('content')
        </main>
    </div>

    {{-- scrips --}}
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 2
                    },
                    1000:{
                        items:3
                    }
                }
            });
            
            $('#photo').change(function(event) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('.btn-delete').click(function(event){
                Swal.fire({
                    icon: 'error',
                    title: '¿Está seguro?',
                    text: 'Desea eliminar este registro',
                    showCancelButton: true,
                    cancelButtonColor: '#D0211C',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2471A3',
                    confirmButtonText: 'Aceptar'
                }).then((result)=>{
                    if(result.value){
                        $(this).parent().submit();
                    }
                });
            });
            /* --- */
            @if(session('message'))
                Swal.fire({
                    icon: 'success',
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    confirmButtonColor: '#2471A3',
                    confirmButtonText: 'Aceptar'
                })
            @endif
            @if(session('error'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Acceso Denegado',
                    text: '{{ session('error') }}',
                    showConfirmButton:false,
                    timer: 2500
                })
            @endif
                
            /* --- */
            $('#filter').change(function(event){
                event.preventDefault();
                option = $(this).val();
                $t = $('meta[name="csrf-token"]').attr('content')
                $('.loader').removeClass('d-none');
                $('#list-filter').hide();
                $sto = setTimeout(function(){
                    clearTimeout($sto);
                    console.log(option);
                    $.post('category/filter', {category_id: option, _token: $t}, function(data){
                        $('.loader').addClass('d-none');
                        $('#list-filter').html(data);
                        $('#list-filter').fadeIn('slow');
                    });
                },1000);
            });
        });
    </script>

</body>
</html>
