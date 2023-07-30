<!DOCTYPE html>
<html lang="en">

<head>
    {{-- head  --}}
    @include('backend.layouts.includes.head')
</head>

<body class="sb-nav-fixed">
    {{-- top nav  --}}
    @include('backend.layouts.includes.top-nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            {{-- side nav  --}}
            @include('backend.layouts.includes.side-nav')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="my-4">@yield('title')</h1>

                    {{-- content  --}}
                    @yield('content')
                </div>
            </main>

            {{-- footer  --}}
            @include('backend.layouts.includes.footer')
        </div>
    </div>

    {{-- script  --}}
    @include('backend.layouts.includes.script')
</body>

</html>
