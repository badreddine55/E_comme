<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  

<head>
  <title>@yield("title")</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com ">
  <link rel="preconnect" href="https://fonts.gstatic.com " crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400 ;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg " style="display: none;">
    <!-- SVG symbols here -->
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader"></div>
  </div>

  @yield("cart")

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ __('messages.close') }}"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">{{ __('messages.search_placeholder') }}</span>
        </h4>
        <form role="search" action="{{ route('home.index') }}" method="get" class="d-flex mt-3 gap-0">
          <input class="form-control rounded-start rounded-0 bg-light" type="text" placeholder="{{ __('messages.search_placeholder') }}" aria-label="{{ __('messages.search_placeholder') }}">
          <button class="btn btn-dark rounded-end rounded-0" type="submit">{{ __('messages.search') }}</button>
        </form>
      </div>
    </div>
  </div>

  <header>
    <div class="container-fluid">
      <div class="row py-3 border-bottom">
        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
          <div class="main-logo">
            <a href="/">
              <img src="/images/logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar row bg-light p-2 my-2 rounded-4">
            <div class="col-11 col-md-11">
              <form id="search-form" class="text-center" action="{{ route('home.index') }}" method="get">
                <input type="text" name="search" class="form-control border-0 bg-transparent" placeholder="{{ __('messages.search_placeholder') }}">
              </form>
            </div>
            <div class="col-1">
              <svg xmlns="http://www.w3.org/2000/svg " width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#search"></use>
              </svg>
            </div>
          </div>
        </div>

        <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
          <ul class="d-flex justify-content-end list-unstyled m-0">
          <li>
        <a href="/logout" class="rounded-circle bg-light p-2 mx-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </a>
    </li>
    <li>
    <a href="{{ route('changeLang', 'ar') }}" class="rounded-circle bg-light p-2 mx-1">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtCfBwFzhGfLmeQkuqsl9FkcbuPMuSSCeuXA&s" alt="Arabic" width="24" height="24">
    </a>
</li>
<li>
    <a href="{{ route('changeLang', 'en') }}" class="rounded-circle bg-light p-2 mx-1">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/United-kingdom_flag_icon_round.svg/1200px-United-kingdom_flag_icon_round.svg.png" alt="English" width="24" height="24">
    </a>
</li>
<li>
    <a href="{{ route('changeLang', 'fr') }}" class="rounded-circle bg-light p-2 mx-1">
        <img src="https://cdn-icons-png.flaticon.com/512/197/197560.png" alt="French" width="24" height="24">
    </a>
</li>
          </ul>
          <li class="d-lg-none">
            <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#cart"></use>
              </svg>
            </a>
          </li>
          <li class="d-lg-none">
            <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#search"></use>
              </svg>
            </a>
          </li>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ __('messages.home') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('messages.toggle_navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories.index') }}">{{ __('messages.categories') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('orders.index') }}">{{ __('messages.orders') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.create') }}">{{ __('messages.products') }}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield("content")

  <footer class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-menu">
            <img src="/images/logo.png" alt="logo">
            <div class="social-links mt-5">
              <ul class="d-flex list-unstyled gap-2">
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg xmlns="http://www.w3.org/2000/svg " width="16" height="16" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z" />
                    </svg>
                  </a>
                </li>
                <!-- Other social links -->
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-2 col-sm-6">
          <div class="footer-menu">
            <h5 class="widget-title">{{ __('messages.ultras') }}</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.about_us') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.conditions') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.our_journals') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.careers') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.affiliate_programme') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.ultras_press') }}</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-2 col-sm-6">
          <div class="footer-menu">
            <h5 class="widget-title">{{ __('messages.customer_service') }}</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.faq') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.contact') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.privacy_policy') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.returns_refunds') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.cookie_guidelines') }}</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">{{ __('messages.delivery_information') }}</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-menu">
            <h5 class="widget-title">{{ __('messages.subscribe_us') }}</h5>
            <p>{{ __('messages.subscribe_text') }}</p>
            <form class="d-flex mt-3 gap-0" role="newsletter">
              <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="{{ __('messages.subscribe_placeholder') }}" aria-label="{{ __('messages.subscribe_placeholder') }}">
              <button class="btn btn-dark rounded-end rounded-0" type="submit">{{ __('messages.subscribe_button') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js "></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>