<!DOCTYPE html>
<html lang="en">

<head>
    <title>Qisa Nursery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    @include('layouts.css')
    @stack('css-custom')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('layouts.navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('layouts.sidebar')

                    <div class="pcoded-content">
                        @yield('isi-content')
                        {{ isset($slot) ? $slot : null }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    @include('layouts.js')
    <script>
        $(document).ready(function() {
            setInterval(() => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('statusKoneksiSystem') }}",
                    success: function(data) {
                        if (data.status == 'online') {
                            $("body").append(
                                `<div class="fixed-button active" id="statuskoneksi">
                                    <lottie-player src="{{ asset('admin/js/dotonlinegreen.json') }}" background="transparent"
                                        speed="1" style="width: 50px; height: 50px;" loop autoplay>
                                    </lottie-player>
                                </div>`
                            );
                            var $window = $(window),
                                nav = $(".fixed-button");
                        } else {
                            $("#statuskoneksi").remove();
                        }
                    }
                });
            }, 5000);
        });
    </script>
    @stack('js-custom')
</body>

</html>
