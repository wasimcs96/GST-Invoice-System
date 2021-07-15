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
                <li><a href="#about">{{ __('bikin.about') }}</a></li>
                <li><a href="#what">{{ __('bikin.features') }}</a></li>
                <li><a href="#services">{{ __('bikin.services') }}</a></li>
                <li><a href="#pricing">{{ __('bikin.pricing') }}</a></li>
                <li><a href="#contact">{{ __('bikin.contact') }}</a></li>
                <li><a href="{{ route('login') }}">{{ __('bikin.login') }}</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    </header>

    <header id="showcase">
        <div class="showcase-content">
            <h1 class="l-heading">
                Best Invoice Management System
            </h1>
            <p class="lead">
                We are team of talanted engineers making applications at Varus Creative</p>
            <a href="{{ route('register') }}" class="btn">Get Started</a>
        </div>
    </header>
    {{-- <div class="container">
  <h1><b>Introduction</b></h1>
   <p> This notice applies across all websites that we own and operate and all services we provide, 
    including our online and mobile accounting and financial services products, and any other apps 
    or services we may offer in future (for example, events or training). 
    When we say ‘personal data’ we mean identifiable information about you, like your name, email,
     address, telephone number, bank account details, payment information, support queries, community 
     comments and so on. We may need to update this notice from time to time. Where a change is 
     significant, we’ll make sure we let you know – usually by sending you an email.</p>
     
    ________________________________________
     
    Who are ‘we’?
    When we refer to ‘we’ (or ‘our’ or ‘us’), that means Calcigo. Our headquarters are in Noida but we operateall over India. 
    We provide an easy-to-use global online platform for small businesses and their advisors. At the core of our platform is our beautiful cloud accounting software. If you want to find out more about what we do, see the (about page) page.
    ________________________________________
     
    Our principles of data protection
    Our approach to data protection is built around four key principles. They’re at the heart of everything we do relating to personal data.
    Transparency: We take a human approach to how we process personal data by being open, honest and transparent.
    Enablement: We enable connections and efficient use of personal data to empower productivity and growth.
    Security: We champion industry leading approaches to securing the personal data entrusted to us.
    Stewardship: We accept the responsibility that comes with processing personal data.
     
    ________________________________________
     
    How we collect your data
    When you visit our websites or use our services, we collect personal data. The ways we collect it can be broadly categorised into the following:
    Information you provide to us directly: When you visit or use some parts of our websites and/or services we might ask you to provide personal data to us. For example, we ask for your contact information when you sign up for a free trial, respond to a job application or an email offer, participate in community forums, join us on social media, take part in training and events, contact us with questions or request support. If you don’t want to provide us with personal data, you don’t have to, but it might mean you can’t use some parts of our websites or services.
    Information we collect automatically: We collect some information about you automatically when you visit our websites or use our services, like your IP address and device type. We also collect information when you navigate through our websites and services, including what pages you looked at and what links you clicked on. This information is useful for us as it helps us get a better understanding of how you’re using our websites and services so that we can continue to provide the best experience possible (e.g., by personalising the content you see).
    Information we get from third parties: The majority of information we collect, we collect directly from you. Sometimes we might collect personal data about you from other sources, such as publicly available materials or trusted third parties like our marketing and research partners. We use this information to supplement the personal data we already hold about you, in order to better inform, personalise and improve our services, and to validate the personal data you provide.
    Where we collect personal data, we’ll only process it:
    •	to perform a contract with you, or
    •	where we have legitimate interests to process the personal data and they’re not overridden by your rights, or
    •	in accordance with a legal obligation, or 
    •	where we have your consent.
    If we don’t collect your personal data, we may be unable to provide you with all our services, and some functions and features on our websites may not be available to you.   
    If you’re someone who doesn’t have a relationship with us, but believe that a Calcigo subscriber has entered your personal data into our websites or services, you’ll need to contact that Calcigo subscriber for any questions you have about your personal data (including where you want to access, correct, amend, or request that the user delete, your personal data).
     
    ________________________________________
     
    How we use your data
    First and foremost, we use your personal data to operate our websites and provide you with any services you’ve requested, and to manage our relationship with you. We also use your personal data for other purposes, which may include the following:
    To communicate with you. This may include:
    •	providing you with information you’ve requested from us (like training or education materials) or information we are required to send to you
    •	operational communications, like changes to our websites and services, security updates, or assistance with using our websites and services
    •	marketing communications (about Calcigo or another product or service we think you might be interested in) in accordance with your marketing preferences
    •	asking you for feedback or to take part in any research we are conducting (which we may engage a third party to assist with).
    To support you: This may include assisting with the resolution of technical support issues or other issues relating to the websites or services, whether by email, in-app support or otherwise.
    To enhance our websites and services and develop new ones: For example, by tracking and monitoring your use of websites and services so we can keep improving, or by carrying out technical analysis of our websites and services so that we can optimise your user experience and provide you with more efficient tools.
    To protect: So that we can detect and prevent any fraudulent or malicious activity, and make sure that everyone is using our websites and services fairly and in accordance with our terms of use. 
    To market to you: In addition to sending you marketing communications, we may also use your personal data to display targeted advertising to you online – through our own websites and services or through third party websites and their platforms.
    
    To analyse, aggregate and report: We may use the personal data we collect about you and other users of our websites and services (whether obtained directly or from third parties) to produce aggregated and anonymised analytics and reports, which we may share publicly or with third parties.
     
    ________________________________________
     
    How we can share your data
    There will be times when we need to share your personal data with third parties. We will only disclose your personal data to:
    •	other companies in the Calcigo group of companies
    •	third party service providers and partners who assist and enable us to use the personal data to, for example, support delivery of or provide functionality on the website or services, or to market or promote our goods and services to you
    •	regulators, law enforcement bodies, government agencies, courts or other third parties where we think it’s necessary to comply with applicable laws or regulations, or to exercise, establish or defend our legal rights. Where possible and appropriate, we will notify you of this type of disclosure
    •	an actual or potential buyer (and its agents and advisors) in connection with an actual or proposed purchase, merger or acquisition of any part of our business
    •	other people where we have your consent.
     
    ________________________________________
     
    Security
    Security is a priority for us when it comes to your personal data. We’re committed to protecting your personal data and have appropriate technical and organisational measures in place to make sure that happens. 
     
    ________________________________________
     
    Retention
    The length of time we keep your personal data depends on what it is and whether we have an ongoing business need to retain it (for example, to provide you with a service you’ve requested or to comply with applicable legal, tax or accounting requirements).
    We’ll retain your personal data for as long as we have a relationship with you and for a period of time afterwards where we have an ongoing business need to retain it, in accordance with our data retention policies and practices. Following that period, we’ll make sure it’s deleted or anonymised.
     
    ________________________________________
     
    Your rights
    It’s your personal data and you have certain rights relating to it. When it comes to marketing communications, you can ask us not to send you these at any time – just follow the unsubscribe instructions contained in the marketing communication.
    You also have rights to:
    •	know what personal data we hold about you, and to make sure it’s correct and up to date
    •	request a copy of your personal data, or ask us to restrict processing your personal data or delete it
    •	object to our continued processing of your personal data
    If you’re not happy with how we are processing your personal data, please let us know by getting in touch at legal@calcigo.com. We will review and investigate your complaint, and try to get back to you within a reasonable time frame. 
     
    ________________________________________
     
    How to contact us
    We’re always keen to hear from you. If you’re curious about what personal data we hold about you or you have a question or feedback for us on this notice, our websites or services, please get in touch.
    As a technology company, we prefer to communicate with you by email – this ensures that you’re put in contact with the right person, in the right location, and in accordance with any regulatory time frames.
</div>
    </p> --}}
    <div class="container mt-3">
        <br>
        <br>
        <h1 class="text-center"><b>Privacy Policy</b></h1>
        <br>
    <p><h3>Introduction</h3></p>
    <p>This notice applies across all websites that we own and operate and all services we provide, including our online
        and mobile accounting and financial services products, and any other apps or services we may offer in future
        (for example, events or training).&nbsp;</p>
    <p>When we say ‘personal data’ we mean identifiable information about you, like your name, email, address, telephone
        number, bank account details, payment information, support queries, community comments and so on. We may need to
        update this notice from time to time. Where a change is significant, we’ll make sure we let you know – usually
        by sending you an email.</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>Who are ‘we’?</h3></p>
    <p>When we refer to ‘we’ (or ‘our’ or ‘us’), that means Calcigo. Our headquarters are in Noida but we operate all
        over India.&nbsp;</p>
    <p>We provide an easy-to-use global online platform for small businesses and their advisors. At the core of our
        platform is our beautiful cloud accounting software. If you want to find out more about what we do, see the
        (about page) page.</p>
    <p><br></p>
    <p><br></p>
    <p><h3>Our principles of data protection</h3></p>
    <p>Our approach to data protection is built around four key principles. They’re at the heart of everything we do
        relating to personal data.</p>
    <p>Transparency: We take a human approach to how we process personal data by being open, honest and transparent.</p>
    <p>Enablement: We enable connections and efficient use of personal data to empower productivity and growth.</p>
    <p>Security: We champion industry leading approaches to securing the personal data entrusted to us.</p>
    <p>Stewardship: We accept the responsibility that comes with processing personal data.</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>How we collect your data</h3></p>
    <p>When you visit our websites or use our services, we collect personal data. The ways we collect it can be broadly
        categorised into the following:</p>
    <p>Information you provide to us directly: When you visit or use some parts of our websites and/or services we might
        ask you to provide personal data to us. For example, we ask for your contact information when you sign up for a
        free trial, respond to a job application or an email offer, participate in community forums, join us on social
        media, take part in training and events, contact us with questions or request support. If you don’t want to
        provide us with personal data, you don’t have to, but it might mean you can’t use some parts of our websites or
        services.</p>
    <p>Information we collect automatically: We collect some information about you automatically when you visit our
        websites or use our services, like your IP address and device type. We also collect information when you
        navigate through our websites and services, including what pages you looked at and what links you clicked on.
        This information is useful for us as it helps us get a better understanding of how you’re using our websites and
        services so that we can continue to provide the best experience possible (e.g., by personalising the content you
        see).</p>
    <p>Information we get from third parties: The majority of information we collect, we collect directly from you.
        Sometimes we might collect personal data about you from other sources, such as publicly available materials or
        trusted third parties like our marketing and research partners. We use this information to supplement the
        personal data we already hold about you, in order to better inform, personalise and improve our services, and to
        validate the personal data you provide.</p>
    <p><h3>Where we collect personal data, we’ll only process it:</h3></p>
    <p>⦁<span style="white-space:pre"> </span>to perform a contract with you, or</p>
    <p>⦁<span style="white-space:pre"> </span>where we have legitimate interests to process the personal data and
        they’re not overridden by your rights, or</p>
    <p>⦁<span style="white-space:pre"> </span>in accordance with a legal obligation, or&nbsp;</p>
    <p>⦁<span style="white-space:pre"> </span>where we have your consent.</p>
    <p>If we don’t collect your personal data, we may be unable to provide you with all our services, and some functions
        and features on our websites may not be available to you.&nbsp; &nbsp;</p>
    <p>If you’re someone who doesn’t have a relationship with us, but believe that a Calcigo subscriber has entered your
        personal data into our websites or services, you’ll need to contact that Calcigo subscriber for any questions
        you have about your personal data (including where you want to access, correct, amend, or request that the user
        delete, your personal data).</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>How we use your data</h3></p>
    <p>First and foremost, we use your personal data to operate our websites and provide you with any services you’ve
        requested, and to manage our relationship with you. We also use your personal data for other purposes, which may
        include the following:</p>
    <p>To communicate with you. This may include:</p>
    <p>⦁<span style="white-space:pre"> </span>providing you with information you’ve requested from us (like training or
        education materials) or information we are required to send to you</p>
    <p>⦁<span style="white-space:pre"> </span>operational communications, like changes to our websites and services,
        security updates, or assistance with using our websites and services</p>
    <p>⦁<span style="white-space:pre"> </span>marketing communications (about Calcigo or another product or service we
        think you might be interested in) in accordance with your marketing preferences</p>
    <p>⦁<span style="white-space:pre"> </span>asking you for feedback or to take part in any research we are conducting
        (which we may engage a third party to assist with).</p>
    <p>To support you: This may include assisting with the resolution of technical support issues or other issues
        relating to the websites or services, whether by email, in-app support or otherwise.</p>
    <p>To enhance our websites and services and develop new ones: For example, by tracking and monitoring your use of
        websites and services so we can keep improving, or by carrying out technical analysis of our websites and
        services so that we can optimise your user experience and provide you with more efficient tools.</p>
    <p>To protect: So that we can detect and prevent any fraudulent or malicious activity, and make sure that everyone
        is using our websites and services fairly and in accordance with our terms of use.&nbsp;</p>
    <p>To market to you: In addition to sending you marketing communications, we may also use your personal data to
        display targeted advertising to you online – through our own websites and services or through third party
        websites and their platforms.</p>
    <p><br></p>
    <p>To analyse, aggregate and report: We may use the personal data we collect about you and other users of our
        websites and services (whether obtained directly or from third parties) to produce aggregated and anonymised
        analytics and reports, which we may share publicly or with third parties.</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>How we can share your data</h3></p>
    <p>There will be times when we need to share your personal data with third parties. We will only disclose your
        personal data to:</p>
    <p>⦁<span style="white-space:pre"> </span>other companies in the Calcigo group of companies</p>
    <p>⦁<span style="white-space:pre"> </span>third party service providers and partners who assist and enable us to use
        the personal data to, for example, support delivery of or provide functionality on the website or services, or
        to market or promote our goods and services to you</p>
    <p>⦁<span style="white-space:pre"> </span>regulators, law enforcement bodies, government agencies, courts or other
        third parties where we think it’s necessary to comply with applicable laws or regulations, or to exercise,
        establish or defend our legal rights. Where possible and appropriate, we will notify you of this type of
        disclosure</p>
    <p>⦁<span style="white-space:pre"> </span>an actual or potential buyer (and its agents and advisors) in connection
        with an actual or proposed purchase, merger or acquisition of any part of our business</p>
    <p>⦁<span style="white-space:pre"> </span>other people where we have your consent.</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>Security</h3></p>
    <p>Security is a priority for us when it comes to your personal data. We’re committed to protecting your personal
        data and have appropriate technical and organisational measures in place to make sure that happens.&nbsp;</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>Retention</h3></p>
    <p>The length of time we keep your personal data depends on what it is and whether we have an ongoing business need
        to retain it (for example, to provide you with a service you’ve requested or to comply with applicable legal,
        tax or accounting requirements).</p>
    <p>We’ll retain your personal data for as long as we have a relationship with you and for a period of time
        afterwards where we have an ongoing business need to retain it, in accordance with our data retention policies
        and practices. Following that period, we’ll make sure it’s deleted or anonymised.</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>Your rights</h3></p>
    <p>It’s your personal data and you have certain rights relating to it. When it comes to marketing communications,
        you can ask us not to send you these at any time – just follow the unsubscribe instructions contained in the
        marketing communication.</p>
    <p>You also have rights to:</p>
    <p>⦁<span style="white-space:pre"> </span>know what personal data we hold about you, and to make sure it’s correct
        and up to date</p>
    <p>⦁<span style="white-space:pre"> </span>request a copy of your personal data, or ask us to restrict processing
        your personal data or delete it</p>
    <p>⦁<span style="white-space:pre"> </span>object to our continued processing of your personal data</p>
    <p>If you’re not happy with how we are processing your personal data, please let us know by getting in touch at
        legal@calcigo.com. We will review and investigate your complaint, and try to get back to you within a reasonable
        time frame.&nbsp;</p>
    <p>&nbsp;</p>
    <p><br></p>
    <p><br></p>
    <p><h3>How to contact us</h3></p>
    <p>We’re always keen to hear from you. If you’re curious about what personal data we hold about you or you have a
        question or feedback for us on this notice, our websites or services, please get in touch.</p>
    <p>As a technology company, we prefer to communicate with you by email – this ensures that you’re put in contact
        with the right person, in the right location, and in accordance with any regulatory time frames.</p>
    <div><br></div>
</div>
    <section id="contact">
        <div class="contact-form bg-primary p-2">
            {{-- <h2 class="m-heading text-center">{{ __('bikin.faq') }}</h2> --}}
            {{-- <hr size="6" width="100px" color="white" style="
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
            </div> --}}
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
