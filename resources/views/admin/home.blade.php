<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- navbar --}}
            @include('admin.navbar')
            {{-- sidebar --}}
            @include('admin.sidebar')
            <!-- Main Content -->
            @include('admin.body')
            {{-- footer --}}
            @include('admin.footer')
        </div>
    </div>
    </div>
    {{-- Js --}}
    @include('admin.js')
</body>

</html>
