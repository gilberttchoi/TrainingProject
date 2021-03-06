<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/style.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Styles -->

    <header class="jumbotron">
        <h2>The Mini API Training Project</h2>
            <nav class="navbar navbar-light bg-faded">


                <ul class="">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/seeTasks" class="nav-link">See Tasks</a></li>
                    <li class="nav-item"><a href="addTask" class="nav-link">Add Data</a></li>
                </ul> 
            </nav>
        </header> 

    </head>
    <body class="container">
        @yield('title')


        @yield('content')
    </body>
    </html>
