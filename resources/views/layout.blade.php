<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Trojan Joy</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="stylesheet" href="<% elixir('css/all.css') %>"/>
    <script>

    </script>
</head>
<body ng-app="myMarket">


<div class="container">
    <div class="jumbotron">
        <h1>Trojan Joy</h1>
        <p>Joy for Joy</p>
        <div ng-controller="LoginController">
            <a ng-click="login()" id="loginText"> <img src="images/usc_login.png"> </a>
        </div>

    </div>
</div>


</body>
</html>
