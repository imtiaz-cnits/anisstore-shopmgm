<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Sign In | Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- App favicon -->
    <link rel="icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />

    <!-- Bootstrap Css -->
    <link
      href="{{asset('back-end/assets/css/vendor/bootstrap.min.css')}}"
      id="bootstrap-style"
      rel="stylesheet"
      type="text/css"
    />

    <!-- CSS Link-->
    <link rel="stylesheet" href="{{asset('back-end/assets/css/style.css')}}" />
    <link href="{{ asset('back-end/assets/css/vendor/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back-end/assets/js/vendor/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/vendor/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>

    <!-- Tailwind CSS v4 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>


    <script src="{{asset('back-end/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('back-end/assets/js/app.js')}}"></script>
  </body>
</html>
