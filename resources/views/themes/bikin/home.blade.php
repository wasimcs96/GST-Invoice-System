{{-- <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ get_system_setting('application_name') }}</title>
  <meta content="{{ get_system_setting('meta_description') }}" name="description">
  <meta content="{{ get_system_setting('meta_keywords') }}" name="keywords">

  @if (get_system_setting('application_favicon'))
    <link rel="icon" href="{{ get_system_setting('application_favicon') }}">
  @endif

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('themes/bikin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/bikin/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/bikin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/bikin/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/bikin/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/bikin/vendor/aos/aos.css') }}" rel="stylesheet">

  <link href="{{ asset('themes/bikin/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
 
      @if (get_system_setting('application_logo'))
        <a href="/" class="logo mr-auto"><img src="{{ get_system_setting('application_logo') }}" alt="{{ get_system_setting('application_name') }}" class="img-fluid"></a>

      @else
        <h1 class="logo mr-auto"><a href="/">{{ get_system_setting('application_name') }}</a></h1>
      @endif

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">{{ __('bikin.home') }}</a></li>
          <li><a href="#about">{{ __('bikin.about') }}</a></li>
          <li><a href="#features">{{ __('bikin.features') }}</a></li>
          <li><a href="#services">{{ __('bikin.services') }}</a></li>
          <li><a href="#pricing">{{ __('bikin.pricing') }}</a></li>
          <li><a href="#contact">{{ __('bikin.contact') }}</a></li>
          <li><a href="{{ route('login') }}">{{ __('bikin.login') }}</a></li>
        </ul>
      </nav>

      <a href="{{ route('register') }}" class="get-started-btn">{{ __('bikin.get_started') }}</a>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>Calcigo</h1>
      <h2>{{ get_theme_setting('bikin', 'hero_description') }}</h2>
      <a href="{{ route('register') }}" class="btn-get-started scrollto">{{ __('bikin.get_started') }}</a>
      <img src="{{ asset('themes/bikin/img/hero-img.png') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
    </div>
  </section>

  <main id="main">
    <section id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>{{ get_theme_setting('bikin', 'about_title') }}</h3>
              <p>
                {{ get_theme_setting('bikin', 'about_description') }}
              </p>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>{{ get_theme_setting('bikin', 'about_1_title') }}</h4>
                  <p>{{ get_theme_setting('bikin', 'about_1_description') }}</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>{{ get_theme_setting('bikin', 'about_2_title') }}</h4>
                  <p>{{ get_theme_setting('bikin', 'about_2_description') }}</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>{{ get_theme_setting('bikin', 'about_3_title') }}</h4>
                  <p>{{ get_theme_setting('bikin', 'about_3_description') }}</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>{{ get_theme_setting('bikin', 'about_4_title') }}</h4>
                  <p>{{ get_theme_setting('bikin', 'about_4_description') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="features" class="features" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2>{{ get_theme_setting('bikin', 'features_title') }}</h2>
          <p>{{ get_theme_setting('bikin', 'features_description') }}</p>
        </div>

        <div class="row content mt-5">
          <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('themes/bikin/img/features-1.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
            <h3>{{ get_theme_setting('bikin', 'features_1_title') }}</h3>
            <p>{{ get_theme_setting('bikin', 'features_1_description') }}</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ asset('themes/bikin/img/features-2.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>{{ get_theme_setting('bikin', 'features_2_title') }}</h3>
            <p>{{ get_theme_setting('bikin', 'features_2_description') }}</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="{{ asset('themes/bikin/img/features-3.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5" data-aos="fade-left">
            <h3>{{ get_theme_setting('bikin', 'features_3_title') }}</h3>
            <p>{{ get_theme_setting('bikin', 'features_3_description') }}</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ asset('themes/bikin/img/features-4.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>{{ get_theme_setting('bikin', 'features_4_title') }}</h3>
            <p>{{ get_theme_setting('bikin', 'features_4_description') }}</p>
          </div>
        </div>

      </div>
    </section>

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ get_theme_setting('bikin', 'services_title') }}</h2>
          <p>{{ get_theme_setting('bikin', 'services_description') }}</p>
        </div>

        <div class="row">
          @if (get_theme_setting('bikin', 'services_1_title'))
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4 class="title"><a>{{ get_theme_setting('bikin', 'services_1_title') }}</a></h4>
                <p class="description">{{ get_theme_setting('bikin', 'services_1_description') }}</p>
              </div>
            </div>
          @endif

          @if (get_theme_setting('bikin', 'services_2_title'))
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title"><a>{{ get_theme_setting('bikin', 'services_2_title') }}</a></h4>
                <p class="description">{{ get_theme_setting('bikin', 'services_2_description') }}</p>
              </div>
            </div>
          @endif

          @if (get_theme_setting('bikin', 'services_3_title'))
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a>{{ get_theme_setting('bikin', 'services_3_title') }}</a></h4>
                <p class="description">{{ get_theme_setting('bikin', 'services_3_description') }}</p>
              </div>
            </div>
          @endif

          @if (get_theme_setting('bikin', 'services_4_title'))
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-layer"></i></div>
                <h4 class="title"><a>{{ get_theme_setting('bikin', 'services_4_title') }}</a></h4>
                <p class="description">{{ get_theme_setting('bikin', 'services_4_description') }}</p>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{ __('bikin.pricing') }}</h2>
        </div>

        <div class="row">
          @foreach (\App\Models\Plan::orderBy('order', 'asc')->get() as $plan)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                  <h3>{{ $plan->name }}</h3>
                  @if ($plan->isFree())
                    <h4>{{ __('bikin.free') }}</span></h4>
                  @else
                    <h4>{!! money($plan->price, $plan->currency) !!}<span> / {{ $plan->invoice_interval }}</span></h4>
                  @endif
                  <ul>
                    @if ($plan->getFeatureBySlug('customers')->value === '-1')
                      <li>{{ __('bikin.unlimited_customers') }}</li>
                    @else
                      <li>{{ __('bikin.x_customers', ['count' => $plan->getFeatureBySlug('customers')->value]) }}</li>
                    @endif

                    @if ($plan->getFeatureBySlug('products')->value === '-1')
                      <li>{{ __('bikin.unlimited_products') }}</li>
                    @else
                      <li>{{ __('bikin.x_products', ['count' => $plan->getFeatureBySlug('products')->value]) }}</li>
                    @endif

                    @if ($plan->getFeatureBySlug('invoices_per_month')->value === '-1')
                      <li>{{ __('bikin.unlimited_invoices_per_month') }}</li>
                    @else
                      <li>{{ __('bikin.x_invoices', ['count' => $plan->getFeatureBySlug('invoices_per_month')->value]) }}</li>
                    @endif

                    @if ($plan->getFeatureBySlug('estimates_per_month')->value === '-1')
                      <li>{{ __('bikin.unlimited_estimates_per_month') }}</li>
                    @else
                      <li>{{ __('bikin.x_estimates', ['count' => $plan->getFeatureBySlug('estimates_per_month')->value]) }}</li>
                    @endif

                    @if ($plan->getFeatureBySlug('view_reports')->value)
                      <li>{{ __('bikin.custom_reports') }}</li>
                    @else
                      <li class="na">{{ __('bikin.custom_reports') }}</li>
                    @endif

                    @if ($plan->getFeatureBySlug('advertisement_on_mails')->value)
                      <li>{{ __('bikin.advertisement_on_mails') }}</li>
                    @else
                      <li class="na">{{ __('bikin.advertisement_on_mails') }}</li>
                    @endif

                    @if ($plan->hasTrial())
                      <li>{{ __('bikin.trial_text', ['day' => $plan->trial_period]) }}</li>
                    @endif
                  </ul>
                  <div class="btn-wrap">
                    <a href="{{ route('register', ['plan' => $plan->slug]) }}" class="btn-buy">{{ __('bikin.get_started') }}</a>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ __('bikin.faq') }}</h2>
        </div>

        <ul class="faq-list">
          @if (get_theme_setting('bikin', 'faq_1_title'))
            <li data-aos="fade-up" data-aos-delay="100">
              <a data-toggle="collapse" class="" href="#faq1">{{ get_theme_setting('bikin', 'faq_1_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq1" class="collapse show" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_1_description') }}</p>
              </div>
            </li>
          @endif

          @if (get_theme_setting('bikin', 'faq_2_title'))
            <li data-aos="fade-up" data-aos-delay="200">
              <a data-toggle="collapse" class="collapsed" href="#faq2">{{ get_theme_setting('bikin', 'faq_2_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq2" class="collapse" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_2_description') }}</p>
              </div>
            </li>
          @endif

          @if (get_theme_setting('bikin', 'faq_3_title'))
            <li data-aos="fade-up" data-aos-delay="300">
              <a data-toggle="collapse" class="collapsed" href="#faq3">{{ get_theme_setting('bikin', 'faq_3_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq3" class="collapse" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_3_description') }}</p>
              </div>
            </li>
          @endif

          @if (get_theme_setting('bikin', 'faq_4_title'))
            <li data-aos="fade-up" data-aos-delay="400">
              <a data-toggle="collapse" class="collapsed" href="#faq4">{{ get_theme_setting('bikin', 'faq_4_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq4" class="collapse" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_4_description') }}</p>
              </div>
            </li>
          @endif


          @if (get_theme_setting('bikin', 'faq_5_title'))
            <li data-aos="fade-up" data-aos-delay="500">
              <a data-toggle="collapse" class="collapsed" href="#faq5">{{ get_theme_setting('bikin', 'faq_5_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq5" class="collapse" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_5_description') }}</p>
              </div>
            </li>
          @endif

          @if (get_theme_setting('bikin', 'faq_6_title'))
            <li data-aos="fade-up" data-aos-delay="600">
              <a data-toggle="collapse" class="collapsed" href="#faq6">{{ get_theme_setting('bikin', 'faq_6_title') }} <i class="icofont-simple-up"></i></a>
              <div id="faq6" class="collapse" data-parent=".faq-list">
                <p>{{ get_theme_setting('bikin', 'faq_6_description') }}</p>
              </div>
            </li>
          @endif

        </ul>
      </div>
    </section>

    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{ __('bikin.contact') }}</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              @if (get_theme_setting('bikin', 'contact_address'))
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>{{ __('bikin.our_address') }}</h3>
                    <p>{{ get_theme_setting('bikin', 'contact_address') }}</p>
                  </div>
                </div>
              @endif

              @if (get_theme_setting('bikin', 'contact_email'))
                <div class="col">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>{{ __('bikin.email_us') }}</h3>
                    <p>{{ get_theme_setting('bikin', 'contact_email') }}</p>
                  </div>
                </div>
              @endif

              @if (get_theme_setting('bikin', 'contact_phone'))
                <div class="col">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>{{ __('bikin.call_us') }}</h3>
                    <p>{{ get_theme_setting('bikin', 'contact_phone') }}</p>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright {{ date('Y') }} <strong><span>{{ get_system_setting('application_name') }}</span></strong>. All Rights Reserved.
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        @if (get_theme_setting('bikin', 'social_twitter_link'))
          <a href="{{ get_theme_setting('bikin', 'social_twitter_link') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        @endif

        @if (get_theme_setting('bikin', 'social_facebook_link'))
          <a href="{{ get_theme_setting('bikin', 'social_facebook_link') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        @endif

        @if (get_theme_setting('bikin', 'social_instagram_link'))
          <a href="{{ get_theme_setting('bikin', 'social_instagram_link') }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        @endif

        @if (get_theme_setting('bikin', 'social_linkedin_link'))
          <a href="{{ get_theme_setting('bikin', 'social_linkedin_link') }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        @endif
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <script src="{{ asset('themes/bikin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('themes/bikin/vendor/aos/aos.js') }}"></script>

  <script src="{{ asset('themes/bikin/js/main.js') }}"></script>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ get_system_setting('application_name') }}</title>
    <meta content="{{ get_system_setting('meta_description') }}" name="description">
    <meta content="{{ get_system_setting('meta_keywords') }}" name="keywords">

    @if (get_system_setting('application_favicon'))
        <link rel="icon" href="{{ get_system_setting('application_favicon') }}">
    @endif

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- <link href="{{ asset('themes/bikin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('themes/bikin/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/bikin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/bikin/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/bikin/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/bikin/vendor/aos/aos.css') }}" rel="stylesheet">

    <link href="{{ asset('themes/bikin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" media="screen and (min-width:900px)" href="{{ asset('css/widescreen.css') }}">
    <script src="https://kit.fontawesome.com/a11a486dee.js" crossorigin="anonymous"></script>
</head>

<body id="home">
    <header id="navbar">
      {{-- @if (get_system_setting('application_logo'))
      <a href="/" class="logo mr-auto"><img src="{{ get_system_setting('application_logo') }}" alt="{{ get_system_setting('application_name') }}" class="img-fluid"></a>

    @else
      <h1 class="logo mr-auto"><a href="/">{{ get_system_setting('application_name') }}</a></h1>
    @endif --}}
        <div class="logo">CALCIGO</div>
        <nav>
            <ul>
                <li class="active"><a href="#">{{ __('bikin.home') }}</a></li>
                {{-- <li><a href="#about">{{ __('bikin.about') }}</a></li> --}}
                <li><a href="#">Product</a></li>
                {{-- <li><a href="#what">{{ __('bikin.features') }}</a></li>
                <li><a href="#services">{{ __('bikin.services') }}</a></li> --}}
                <li><a href="#pricing">{{ __('bikin.pricing') }}</a></li>
                {{-- <li><a href="#contact">{{ __('bikin.contact') }}</a></li> --}}
                <li><a href="#">Resources</a></li>
                <li><a href="{{ route('register') }}">Signup</a></li>
                <li><a href="{{ route('login') }}">{{ __('bikin.login') }}</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    </header>

    <header id="showcase">
        <div class="showcase-content">
            <h1 class="l-heading">
              {{ get_theme_setting('bikin', 'hero_description') }}
            </h1>
            <p class="lead">
                We are team of talanted engineers making applications at Varus Creative</p>
            <a href="{{ route('register') }}" class="btn">Get Started</a>
        </div>
    </header>

    <section id="about" class="about bg-light py-1">
        <div class="container">
            <h2 class="m-heading text-center">{{ get_theme_setting('bikin', 'about_title') }}</h2>
            <p class="text-center">{{ get_theme_setting('bikin', 'about_description') }}</p>

            <div class="items">
                <div class="item">
                    <i class="fas fa-file-alt fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'about_1_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'about_1_description') }}</p>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-cube fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'about_2_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'about_2_description') }}</p>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-images fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'about_3_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'about_3_description') }}</p>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-shield-alt fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'about_4_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'about_4_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="what" class="bg-blue py-1">
        <div class="container">
            <h2 class="m-heading text-center">{{ get_theme_setting('bikin', 'features_title') }}</h2>
            <hr size="6" width="100px" color="white" style="
            margin: auto;
        ">
            <p class="text-center">{{ get_theme_setting('bikin', 'features_description') }}
            </p>

            <div class="card-container">
                <div class="float-layout">
                    <div class="card-image">
                      <img src="{{ asset('themes/bikin/img/features-1.png') }}" class="img-fluid" alt="">
                        <div class="card">
                            <div class="card-title">{{ get_theme_setting('bikin', 'features_1_title') }}</div>
                            <div class="card-desc">
                              {{ get_theme_setting('bikin', 'features_1_description') }}
                            </div>
                            <a href="#" class="btn-1">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="float-layout">
                    <div class="card-image po">
                      <img src="{{ asset('themes/bikin/img/features-2.png') }}" class="img-fluid" alt="">
                        <div class="card">
                            <div class="card-title">{{ get_theme_setting('bikin', 'features_2_title') }}</div>
                            <div class="card-desc">
                              {{ get_theme_setting('bikin', 'features_2_description') }}
                            </div>
                            <a href="#" class="btn-1">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="float-layout">
                    <div class="card-image">
                      <img src="{{ asset('themes/bikin/img/features-3.png') }}" class="img-fluid" alt="">
                        <div class="card">
                            <div class="card-title">{{ get_theme_setting('bikin', 'features_3_title') }}</div>
                            <div class="card-desc">
                              {{ get_theme_setting('bikin', 'features_3_description') }}
                            </div>
                            <a href="#" class="btn-1">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="float-layout">
                    <div class="card-image po">
                      <img src="{{ asset('themes/bikin/img/features-4.png') }}" class="img-fluid" alt="">
                        <div class="card">
                            <div class="card-title">{{ get_theme_setting('bikin', 'features_4_title') }}</div>
                            <div class="card-desc">
                              {{ get_theme_setting('bikin', 'features_4_description') }}
                            </div>
                            <a href="#" class="btn-1">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="services" class="bg-services py-1">
        <div class="container">
            <h2 class="m-heading text-center">{{ get_theme_setting('bikin', 'services_title') }}</h2>
            <hr size="6" width="100px" color="white" style="
            margin: auto;
        ">
            <p class="text-center">{{ get_theme_setting('bikin', 'services_description') }}</p>
            <div class="itemss">
              @if (get_theme_setting('bikin', 'services_1_title'))
                <div class="items mb">
                    <i class="fas fa-basketball-ball fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'services_1_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'services_1_description') }}</p>
                    </div>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'services_2_title'))
                <div class="items mt">
                    <i class="fas fa-file-alt fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'services_2_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'services_2_description') }}</p>
                    </div>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'services_3_title'))
                <div class="items mb">
                    <i class="fas fa-tachometer-alt fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'services_3_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'services_3_description') }}</p>
                    </div>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'services_4_title'))
                <div class="items mt">
                    <i class="fas fa-layer-group fa-2x"></i>
                    <div>
                        <h3>{{ get_theme_setting('bikin', 'services_4_title') }}</h3>
                        <p>{{ get_theme_setting('bikin', 'services_4_description') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section id="pricing" class="bg-pricing py-1">
        <div class="container">
            <h2 class="m-heading text-center">{{ __('bikin.pricing') }}</h2>
            <hr size="6" width="100px" color="white" style="
                margin: auto;
            ">
            <div class="itemsp">
            @foreach (\App\Models\Plan::orderBy('order', 'asc')->get() as $plan)
                <div class="itemp mt">
                    <div>
                        <h1 class="plan">{{ $plan->name }}</h1>
                        @if ($plan->isFree())
                    <h4>{{ __('bikin.free') }}</span></h4>
                  @else
                        <p><span class="pricing"><b>{!! money($plan->price, $plan->currency) !!}</b></span> / {{ $plan->invoice_interval }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('customers')->value === '-1')
                        <p>{{ __('bikin.unlimited_customers') }}</p>
                        @else
                        <p>{{ __('bikin.x_customers', ['count' => $plan->getFeatureBySlug('customers')->value]) }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('products')->value === '-1')
                        <p>{{ __('bikin.unlimited_products') }}</p>
                        @else
                        <p>{{ __('bikin.x_products', ['count' => $plan->getFeatureBySlug('products')->value]) }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('invoices_per_month')->value === '-1')
                        <p>{{ __('bikin.unlimited_invoices_per_month') }}</p>
                        @else
                        <p>{{ __('bikin.x_invoices', ['count' => $plan->getFeatureBySlug('invoices_per_month')->value]) }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('estimates_per_month')->value === '-1')
                        <p>{{ __('bikin.unlimited_estimates_per_month') }}</p>
                        @else
                        <p>{{ __('bikin.x_estimates', ['count' => $plan->getFeatureBySlug('estimates_per_month')->value]) }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('view_reports')->value)
                        <p>{{ __('bikin.custom_reports') }}</p>
                        @else
                        <p>{{ __('bikin.custom_reports') }}</p>
                        @endif
                        @if ($plan->getFeatureBySlug('advertisement_on_mails')->value)
                        <p>{{ __('bikin.advertisement_on_mails') }}</p>
                        @else
                        <p>{{ __('bikin.advertisement_on_mails') }}</p>
                        @endif
                        @if ($plan->hasTrial())
                        <p>{{ __('bikin.trial_text', ['day' => $plan->trial_period]) }}</p>
                        @endif
                        <a href="{{ route('register', ['plan' => $plan->slug]) }}" class="btn-2"><b>{{ __('bikin.get_started') }}</b></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section id="pricing" class="bg-pricing py-1">
      <div class="container">
          <h2 class="m-heading text-center">Pricing</h2>
          <hr size="6" width="100px" color="white" style="
              margin: auto;
          ">
          <div class="itemsp">
              <div class="itemp mt">
                  <div>
                      <h1 class="plan">Startup</h1>
                      <p><span class="pricing"><b>$799</b></span>/month</p>
                      <p><span class="pricing"><b>$489</b></span>/year</p>
                      <p>50 Invoices</p>
                      <p>Chat and Email</p>
                      <p>Accountant access</p>
                      <a href="#" class="btn-2"><b>Get Started</b></a>
                  </div>
              </div>
              <div class="itemp mb">
                  <div>
                      <h1 class="plan">Enterprise</h1>
                      <p><span class="pricing"><b>$990</b></span>/month</p>
                      <p><span class="pricing"><b>$790</b></span>/year</p>

                      <p>500 Invoices</p>
                      <p>Chat, Email, Voice</p>
                      <p>Accountant access</p>
                      <a href="#" class="btn-2"><b>Get Started</b></a>
                  </div>
              </div>
              <div class="itemp mt">
                  <div>
                      <h1 class="plan">Ecommerce</h1>
                      <p><span class="pricing"><b>$1899</b></span>/month</p>
                      <p><span class="pricing"><b>$1499</b></span>/year</p>

                      <p>2000 Invoices</p>
                      <p>Chat, Email, Voice</p>
                      <p>Accountant access</p>
                      <a href="#" class="btn-2"><b>Get Started</b></a>
                  </div>
              </div>
          </div>
      </div>
  </section> --}}

    <section id="contact">
        <div class="contact-form bg-primary p-2">
            <h2 class="m-heading text-center">{{ __('bikin.faq') }}</h2>
            <hr size="6" width="100px" color="white" style="
                margin: auto;
            ">
            <div class="container">
              @if (get_theme_setting('bikin', 'faq_1_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_1_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_1_description') }}</p>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'faq_2_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_2_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_2_description') }}</p>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'faq_3_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_3_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_3_description') }}</p>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'faq_4_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_4_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_4_description') }}</p>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'faq_5_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_5_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_5_description') }}</p>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'faq_6_title'))
                <button class="accordion"><i class="fas fa-chevron-down" style="
                    margin-right: 10px;
                "></i>{{ get_theme_setting('bikin', 'faq_6_title') }}</button>
                <div class="panel">
                  <p>{{ get_theme_setting('bikin', 'faq_6_description') }}</p>
                </div>
                @endif
            </div>
            <h2 class="m-heading text-center" style="
            margin-top: 30px;
        ">{{ __('bikin.contact') }}</h2>
         @if (get_theme_setting('bikin', 'contact_email'))
            <div class="container">
                <div class="items bot">
                    <div class="item text-center">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <div>
                            <h3>{{ __('bikin.our_address') }}</h3>
                            <p style="
                            margin: 0px;
                        ">{{ get_theme_setting('bikin', 'contact_address') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="container fl">
              @if (get_theme_setting('bikin', 'contact_email'))
                <div class="items bots">
                    <div class="item text-center">
                        <i class="fas fa-envelope fa-2x"></i>
                        <div>
                          <h3>{{ __('bikin.email_us') }}</h3>
                            <p style="
                            margin: 0px;
                        ">{{ get_theme_setting('bikin', 'contact_email') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if (get_theme_setting('bikin', 'contact_phone'))
                <div class="items bots">
                    <div class="item text-center">
                        <i class="fas fa-phone-alt fa-2x"></i>
                        <div>
                          <h3>{{ __('bikin.call_us') }}</h3>
                            <p style="
                            margin: 0px;
                        ">{{ get_theme_setting('bikin', 'contact_phone') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>

<!--  -->
