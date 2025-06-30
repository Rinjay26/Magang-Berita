<!DOCTYPE html>
<html lang="en">
    <head>        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="@isset($pageSubheading){{ $pageSubheading }}@else{{ getenv('APP_DESCRIPTION', '') }}@endisset" />
        <meta name="author" content="@isset($pageUser){{ $pageUser }}@else{{ getenv('APP_AUTHOR', '') }}@endisset" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@isset($pageTitle){{ $pageTitle." | " }}@endisset{{ getenv('APP_NAME') }}</title>
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:title" content="@isset($pageTitle){{ $pageTitle }}@else{{ getenv('APP_NAME') }}@endisset" />
        <meta property="og:description" content="@isset($pageSubheading){{ $pageSubheading }}@else{{ getenv('APP_DESCRIPTION', '') }}@endisset" />
        <meta property="og:image" content="@isset($pageBackground){{ $pageBackground }}@else{{ asset('assets/img/default-share.jpg') }}@endisset" />

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ url()->current() }}" />
        <meta name="twitter:title" content="@isset($pageTitle){{ $pageTitle }}@else{{ getenv('APP_NAME') }}@endisset" />
        <meta name="twitter:description" content="@isset($pageSubheading){{ $pageSubheading }}@else{{ getenv('APP_DESCRIPTION', '') }}@endisset" />
        <meta name="twitter:image" content="@isset($pageBackground){{ $pageBackground }}@else{{ asset('assets/img/default-share.jpg') }}@endisset" />
        
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/blog-thumbnails.css') }}" rel="stylesheet" />
        
        <!-- Social Share Buttons CSS -->
        <style>
            .social-share-container {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 5px;
            }
            
            .social-buttons {
                display: flex;
                flex-wrap: wrap;
            }
            
            .btn-facebook {
                background-color: #3b5998;
                color: white;
            }
            
            .btn-twitter {
                background-color: #1da1f2;
                color: white;
            }
              .btn-whatsapp {
                background-color: #25d366;
                color: white;
            }
            
            .btn-facebook:hover, .btn-twitter:hover, .btn-whatsapp:hover {
                opacity: 0.9;
                color: white;
            }
        </style>
    </head>

    <body>
        @include('components.front.navigation')
        <!-- Page Header-->
        @isset($pageHeader)
        <header class="masthead" style="background-image: url('{{ $pageBackground }}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <a href='{{ $pageHeaderLink }}' class="text-white">
                                <h1>{{ $pageHeader }}</h1>
                            </a>
                            @isset($pageSubheading)
                            <span class="subheading">{{ $pageSubheading }}</span>
                            @endisset                            @isset($pageUser)
                            <span class="meta">
                                Posted By {{ $pageUser }} on {{ $pageDate }}
                                @isset($pageCategory)
                                <span class="ms-2 badge bg-primary text-white">{{ $pageCategory }}</span>
                                @endisset
                            </span>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @endisset
        {{ $slot }}
        
                <!-- Footer-->
                <footer class="border-top">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-7">
                                {{-- <ul class="list-inline text-center">
                                    <li class="list-inline-item">
                                        <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul> --}}
                                <div class="small text-center text-muted fst-italic">Copyright By: Rinjay aka Restu</div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="{{ asset('js/scripts.js') }}"></script>
            </body>
        </html>