<!DOCTYPE html>
<html lang="en">

@include('pages.front.header')
<body>
    <div id="dispar-wrap">
@include('pages.front.navbar')

<main>
    @yield('main')
</main>

@include('pages.front.footer')
</div>

@include('pages.front.scripts')
</body>
</html>