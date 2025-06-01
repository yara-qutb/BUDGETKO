<!DOCTYPE html>
<html lang="{{ trans('message.lang') }}"
      dir="{{ trans('message.dir') }}"
>
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- LOGO -->
    <link rel="icon" type="image/svg" href="{{ asset('img/nav/Group.svg')}}" />
    <!-- main css -->
    @yield('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/nav.css') }}" />
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset("asset/css/all.min.css") }}" />
    <!-- Font awesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <!-- ICONSCOUT CDN -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
</head>

  <body>