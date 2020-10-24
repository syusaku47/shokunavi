<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ユーザーとお店を繋ぐグルメサイトです">
    <meta name="author" content="" />
    <title>食なび</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <img src="{{ asset('images/icon_shokunavi.png') }}" alt="" height="32" width="32">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">食ナビ</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">ログイン</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">食ナビとは</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">理想の外食をしよう</h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">まだ、あなたの知らないお店を探そう</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">もっと詳しく</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">食ナビとは</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4">食ナビではあなた好みの外食、レストランを探す事ができます。<br>気になるお店があれば「いいね」をしてあなた好みのお店をリストアップしましょう！</p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('login') }}">はじめる</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">提供サービス</h2>
            <hr class="divider my-4" />
            <div class="row">

                <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">店舗検索</h3>
                        <p class="text-muted mb-0">お気に入りのお店を検索できます</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">お気に入り機能</h3>
                        <p class="text-muted mb-0">お気に入りのお店に「いいね」してリスト化できます</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/1.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/1.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/2.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/2.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/3.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/3.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/4.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/4.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/5.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/5.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/portfolio/fullsize/6.jpg') }}">
                        <img class="img-fluid" src="{{ asset('images/portfolio/thumbnails/6.jpg') }}" alt="" />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">お問い合わせ</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5">ご質問、ご不明点等ございましたら下記までご連絡お願い致します。</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 m-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">contact@shokunavi.co.jp</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2020 - SHOKUNAVI</div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js')}}"></script>



</body>

</html>