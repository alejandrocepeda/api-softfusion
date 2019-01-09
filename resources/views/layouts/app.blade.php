<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-md bg-body">
<header>
    @include('template.header')
</header>
<main>
    <div class="container-fluid">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</main>
<!-- Scripts -->
@include('template.scripts')
<!-- End Scripts -->
</body>
</html>
