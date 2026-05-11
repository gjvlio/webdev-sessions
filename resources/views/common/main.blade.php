<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .aero-nav,
        .aero-footer {
            position: relative;
            width: 100% !important;
            max-width: 100% !important;
            background: linear-gradient(
                180deg,
                rgba(255, 255, 255, 0.45) 0%,
                rgba(255, 255, 255, 0.1) 100%
            ) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.15),
                inset 0 2px 5px rgba(255, 255, 255, 0.9),
                inset 0 -2px 5px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .aero-footer {
            overflow: hidden;
        }
        .aero-nav::before,
        .aero-footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(
                180deg,
                rgba(255, 255, 255, 0.8) 0%,
                rgba(255, 255, 255, 0.0) 100%
            );
            pointer-events: none;
            z-index: 0;
        }
        .aero-nav > *,
        .aero-footer > * {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    @include('common.header')
    @yield('content')
    @include('common.footer')
</body>
</html>