<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Trojan Joy</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    <link rel="stylesheet" href="<% elixir('css/all.css') %>"/>
</head>
<body>
@include('layouts.default-navbar')

<div class="">
    @yield('content')
    //TODO: Remove below html and move it to a view


</div>

</body>
</html>
