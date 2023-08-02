<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') - OnlineBazar</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/frontend/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    @include('frontend.layouts.includes.nav')

    <section class="content min-vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    {{-- side  --}}
                    @include('frontend.layouts.includes.side')
                </div>
                <div class="col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    @include('frontend.layouts.includes.footer')

    {{-- script  --}}
    @include('frontend.layouts.includes.script')
</body>

</html>
