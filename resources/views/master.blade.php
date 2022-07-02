<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.header')

</head>

<body class="bg-primary">

    @include('layouts.nav')

    @yield('content')

    @include('layouts.scripts')

    @include('layouts.footer')

</body>

</html>
