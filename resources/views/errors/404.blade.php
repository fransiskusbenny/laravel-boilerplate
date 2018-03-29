<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Blank Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="icon" href="pages/ico/60.png">
    <link rel="icon" sizes="76x76" href="/vendor/pages/ico/76.png">
    <link rel="icon" sizes="120x120" href="/vendor/pages/ico/120.png">
    <link rel="icon" sizes="152x152" href="/vendor/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Benny Halim" name="author" />
    <link href="/vendor/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="/vendor/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header error-page">
<div class="d-flex justify-content-center full-height full-width align-items-center">
    <div class="error-container text-center">
        <h1 class="error-number">404</h1>
        <h2 class="semi-bold">Sorry but we couldnt find this page</h2>
        <p class="p-b-10">This page you are looking for does not exsist
            <a href="{{ route('dashboard') }}">Go to dashboard</a>
        </p>
    </div>
</div>
</body>
</html>