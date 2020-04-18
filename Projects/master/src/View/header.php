<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>App Landing Page</title>
    <style>
        .color-white {
            color: #ddd !important;
        }

        .white a {
            color: #ddd !important;
        }

        .white a:hover {
            color: #4272ca !important;
        }

        .active a {
            color: #fff !important;
        }
    </style>
</head>

<body>

    <!-- nav start -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Image Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-warning" href="/upload">+ UPLOAD <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Images, gifs and more"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item m-1">
                    <a class="btn btn-danger" data-toggle="modal" data-target="#login-modal" href="#">Sign in</a>
                </li>
                <li class="nav-item m-1">
                    <a class="btn btn-danger" data-toggle="modal" data-target="#register-modal" href="#">Sign up</a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- nav end -->