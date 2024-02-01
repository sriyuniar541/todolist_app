<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Todo App - @yield('title')</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
      

    </head>

    <style>
        /* icon */
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

        #logo{
            width: 50px;
        }
    </style>
    <body>
        <div class="container">

            <!-- navbar -->
            <div class="row shadow-lg p-3 mb-2 bg-body-tertiary rounded d-flex">
                <ul class="nav">

                    {{-- link home --}}
                    <li class="nav-item">
                        <a
                            class="nav-link active fs-4 border rounded"
                            aria-current="page"
                            href="/todo"
                            >
                            <i class="bi bi-houses"></i>
                        </a>                      
                    </li>

                    @if (Auth::check())

                        {{-- todo --}}
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="{{ url('/todo') }}"
                                >Todo</a
                            >
                        </li>

                        {{-- logout --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/logout') }}"
                                >Logout</a
                            >
                        </li>
                   
                    @else 

                        {{-- login --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/login') }}"
                                >Login</a
                            >
                        </li>

                    @endif
                </ul>
            </div>
            <!-- akhir navbar -->

        @yield('content')
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
        ></script>

        {{-- sweet Allert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @include('sweetalert::alert')

    </body>
</html>