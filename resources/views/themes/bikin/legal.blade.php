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
   
    <div class="container mt-3">
        <br>
        <br>
        <h1 class="text-center"><b>Legal</b></h1>
        <br>
        <p><h3>Introduction</h3></p>
        <p>Welcome to Calcigo! We’re excited to have you here but before you start using Calcigo, we want you to look
            through and accept these terms and conditions. We’ve done our best to explain it all without using too much
            jargon, so it’s clear what we expect from you and what you can expect from us.&nbsp;</p>
        <p>These are your legal rights and obligations, so please do read everything. If you can’t agree to our terms,
            then we are really sorry and you can’t use our services.</p>
        <p><h3>Joining and using Calcigo</h3></p>
        <p><h4>In this section we explain how to subscribe to Calcigo and use our services.&nbsp;</h4></p>
        <p>1. You and Calcigo: When we say you or your, we mean both you and any entity or firm you’re authorised to
            represent. When we say Calcigo, we, our or us, we’re talking about the Calcigo entity you contract with and
            pay fees to, based on the edition of the Calcigo product you’re using with.&nbsp;</p>
        <p>2. Our services: Our services consist of all the services we provide now or in the future, including our
            online and mobile accounting and financial products.</p>
        <p>3. Creating a subscription: When you create a subscription to use our services and accept these terms, you
            become a subscriber. If you’re the subscriber, you’re the one responsible for paying for your
            subscription.&nbsp;&nbsp;</p>
        <p>7. The right to use our services: Whether you’re a subscriber, we grant you the right to use our services
            (based on your subscription type, your user role and the level of access you’ve been granted) for as long as
            the subscriber continues to pay for the subscription, until the subscription is terminated.</p>
        <p>8. Subscriber role: As a subscriber, you take responsibility for fully controlling how your subscription is
            managed and who can access it.&nbsp;</p>
        <p>9. Rules: Whatever your role, when you use Calcigo you agree to follow the rules outlined below. Please read
            them and make sure you understand what you should and shouldn’t do.&nbsp;</p>
        <p>While we can’t cover everything here we will give you a highlights of what we mean when we say you should
            follow the rules.</p>
        <p>⦁<span style="white-space:pre"> </span>Undermine the security or integrity of our computing systems or
            networks.</p>
        <p>⦁<span style="white-space:pre"> </span>Use our services in any way that might impair functionality or
            interfere with other people’s use.</p>
        <p>⦁<span style="white-space:pre"> </span>Access any system without permission.</p>
        <p>⦁<span style="white-space:pre"> </span>Introduce or upload anything to our services that includes viruses or
            other malicious code.&nbsp;</p>
        <p>⦁<span style="white-space:pre"> </span>Share anything that may be offensive, violates any law, or infringes
            on the rights of others.</p>
        <p>⦁<span style="white-space:pre"> </span>Modify, copy, adapt, reproduce, disassemble, decompile, reverse
            engineer or extract the source code of any part of our services.</p>
        <p>⦁<span style="white-space:pre"> </span>Resell, lease or provide our services in any way not expressly
            permitted through our services.</p>
        <p>⦁<span style="white-space:pre"> </span>Repackage, resell, or sublicense any leads or data accessed through
            our services.</p>
        <p>⦁<span style="white-space:pre"> </span>Commit fraud or other illegal acts through our services.</p>
        <p>⦁<span style="white-space:pre"> </span>Act in a manner that is abusive or disrespectful to a Xero employee,
            partner, or other Xero customer. We will not tolerate any abuse or bullying of our Xero employees in any
            situation and that includes interaction with our support teams.</p>
        <p><br></p>
        <p>10. Your responsibilities: You promise that you’ll keep your information (including a current email address)
            up to date. You’re responsible for providing true, accurate and complete information and for verifying the
            accuracy of any information that you use from our services for your legal, tax and compliance obligations.
            You’re also responsible for protecting your username and password from getting stolen or misused. Our
            service has minimum password standards but you will ensure that passwords are very strong and not easily
            guessable. The stronger the password the better!&nbsp;</p>
        <p>11. When we introduce new or revised services: Since we’re always thinking about how to make Calcigo the best
            it can be – seriously, we’ve got teams dedicated to it – we regularly expand our services. For new or
            updated services, there might be additional terms. We’ll let you know what those terms are before you start
            using those services.</p>
        <p>12. What we own: We own everything we’ve put into our services unless otherwise stated and excluding content
            owned by others. This includes rights in the design, compilation, and look and feel of our services. It also
            includes rights in all copyrighted works, trademarks, designs, inventions, and other intellectual property.
            You agree not to copy, distribute, modify or make derivative works of any of our content or use any of our
            intellectual property rights in any way not expressly permitted by us.</p>
        <p><h3>Pricing</h3></p>
        <p>Unless you’re in a free trial or other offer period, you’ll need to pay for a subscription based on the
            pricing of your selected plan. The pricing details and other terms of your subscription are explained when
            you select your plan.</p>
        <p>13. Trial subscriptions: When you first sign up, you can opt for a free trial, based on the terms specified
            at the time. If you choose to continue using our services after the trial, you’ll be billed when you add
            your billing details into our services, explained in more detail in the pricinge. If you choose not to
            continue using our services following a trial, you may delete your organisation.</p>
        <p>14. Calcigo pricing plans: Your use of our services generally requires you to pay a monthly subscription fee
            based on your subscription type (the subscription fee). The pricing plan consists of the subscription and
            subscription fees we offered you, including invoicing, payment, auto-renewal and cancellation terms. The
            pricing plan may vary by region and includes information set out in the offer details and pricing page. We
            may update or amend the pricing plan from time to time. The terms of the pricing plan form part of these
            terms. As with any other changes to our terms, changes to the pricing plan won’t apply retrospectively and,
            if we make changes and you’re a subscriber, we’ll make every effort to let you know.</p>
        <p>15. Taxes for your use of our services: You’re responsible for paying all other external fees and taxes
            associated with your use of our services wherever levied.&nbsp;</p>
        <p>16. Additional services: Depending on where you’re based and how you use our services, you may be able to
            take advantage of additional services that Calcigo offers – like payroll, expenses or projects. These might
            incur an additional fee that we’ll let you know about when you sign up for those services.</p>
        <p>17. Importance of timely payments: In order to continue accessing our services, you need to make timely
            payments based on the pricing plan you selected. To avoid delayed or missed payments, please make sure we
            have accurate payment information. If we don’t receive timely payments, we may suspend access to your
            subscription until the payment is made.</p>
        <p><h3>Data use and privacy</h3></p>
        <p>18. Use of data: When you enter or upload your data into our services, we don’t own that data but you grant
            us a licence to use, copy, transmit, store, analyse, and back up all data you submit to us through our
            services, including personal data of yourself and others, to: enable you to use our services; allow us to
            improve, develop and protect our services; create new services; communicate with you about your
            subscription; and send you information we think may be of interest to you based on your marketing
            preferences.</p>
        <p>21. Anonymised statistical data: When you use our services, we may create anonymised statistical data from
            your data and usage of our services, including through aggregation. Once anonymised, we may use it for our
            own purposes, such as to provide and improve our services, to develop new services or product offerings, to
            identify business trends, and for other uses we communicate to you.</p>
        <p>22. Data breach notifications: Where we think there has been unauthorised access to personal data inside your
            subscription, we’ll let you know and give you information about what has happened. Depending on the nature
            of the unauthorised access, and the location of your affected contacts, you may be required to assess
            whether the unauthorised access must be reported to the contact and/or a relevant authority. We think you’re
            best placed to make this decision, because you’ll have the most knowledge about the personal data stored in
            your subscription.</p>
        <p><h3>Confidential information</h3></p>
        <p><h4>We take reasonable precautions to protect your confidential information and expect that you’ll do the same
            for ours.</h4></p>
        <p>23. Keeping it confidential: While using our services, you may share confidential information with us, and
            you may become aware of confidential information about us. You and we both agree to take reasonable steps to
            protect the other party’s confidential information from being accessed by unauthorised individuals. You or
            we may share each other’s confidential information with legal or regulatory authorities if required to do
            so.</p>
        <p><h3>Security</h3></p>
        <p><h4>We take security seriously and you should too! To help protect our services and your data, we offer added
            security features such as multi-factor authentication.&nbsp;</h4></p>
        <p>24. Security safeguards: We’ve invested in technical, physical and administrative safeguards to do our part
            to help keep your data safe and secure. While we’ve taken steps to help protect your data, no method of
            electronic storage is completely secure and we cannot guarantee absolute security. We may notify you if we
            have reason to believe that someone has accessed (or may be able to access) your account without
            authorisation and we may also restrict access to certain parts of our services until you verify that access
            was by an authorised user.</p>
        <p>25. Account security features: We may introduce security features to make your account more secure, such as
            multi-factor authentication. Depending on where you are in the world or what services you’re using, we may
            require you to adopt some of these features. Where we make the use of security features optional, you’re
            responsible (meaning we’re not liable) for any consequences of not using those features. We strongly
            encourage you to use all optional security features.</p>
        <p>26. Playing your part to secure your data: You have an important part to play by keeping your login details
            secure, not letting any other person use them, and by making sure you have strong security on your own
            systems. If you realise there’s been any unauthorised use of your password or any breach of security to your
            account or email address linked to your account, you need to let us know immediately. You also agree not to
            use free-form fields in any of Calcigo’s systems or services to store personal data (unless it’s a field
            explicitly asking for personal data - like a first name or a last name), credit card details, tax
            identifiers or bank account details.&nbsp;</p>
        <p>32. Payments to Calcigo: Just so you know, some third-party providers may pay Calcigo a fee that may be
            related to: referrals from Calcigo; revenue made by the provider; or data that the providers access about
            you through our services with your consent. One example would be you applying for a loan with a third-party
            lender using your Calcigo data.</p>
        <p><h4>Maintenance, downtime and data loss</h4></p>
        <p>We really try to minimise any downtime, but sometimes it’s necessary so we can keep our services updated and
            secure. You also may have occasional access issues and may experience data loss, so backing up your data is
            important.</p>
        <p>33. Availability: We strive to maintain the availability of our services, and provide online support, 24
            hours a day. On occasion, we need to perform maintenance on our services, and this may require a period of
            downtime. We try to minimise any such downtime. Where planned maintenance is being undertaken, we’ll attempt
            to notify you in advance but can’t guarantee it.</p>
        <p>34. Access issues: You know how the internet works – occasionally you might not be able to access our
            services and your data. This might happen for any number of reasons, at any time.&nbsp;</p>
        <p>35. Data loss: Data loss is an unavoidable risk when using any technology. You’re responsible for maintaining
            copies of your data entered into our services.&nbsp;</p>
        <p>36. No compensation: Whatever the cause of any downtime, access issues or data loss, your only recourse is to
            discontinue using our services.</p>
        <p>37. Problems and support: If you have a problem, we have excellent support articles available through -------
            that should help you with most situations. If you’ve tried Calcigo Central and still need help, you can
            contact our support team by scrolling to the bottom of any -----</p>
        <p>38. Modifications: We frequently release new updates, modifications and enhancements to our services, and in
            some cases discontinue features. Where this occurs, we’ll endeavour to notify you where practical (for
            example, by email, on our blog, or within our services when you log in).&nbsp;</p>
        <p><h3>Do’s and don’ts</h3></p>
        <p><h4>This section is super important because it outlines how you can (and can’t) use our services.&nbsp; Much of
            it will be common sense. For more details, go to our guidelines on Calcigo Central.&nbsp;</h4></p>
        <p>39. Feedback: We love your feedback and may use it without restriction.</p>
        <p>40. Help using our services: We provide a lot of guidance and support to help you use our services. You agree
            to use our services only for lawful business purposes and in line with the instructions and guidance we
            provide.</p>
        <p>42. Limitations: Some of our services may be subject to limits such as a cap on the number of monthly
            transactions.</p>
        <p>43. No-charge or beta services: Occasionally we may offer a service at no charge – for example an upgraded
            service, or a time-limited trial account. Because of the nature of these services, you use them at your own
            risk.</p>
        <p><h3>Termination</h3></p>
        <p><h4>You can easily terminate your subscription with one month’s written notice. We may terminate your
            subscription as well with the same notice. If you violate these terms, we may terminate your subscription
            immediately.</h4></p>
        <p>45. Subscription period: Your subscription continues for the period covered by the subscription fee paid or
            payable. At the end of each billing period, these terms automatically continue for a further period of the
            same duration as the previous one, provided you continue to pay the subscription fee in accordance with the
            pricing plan. You may choose to terminate your subscription at any time by providing one month’s written
            notice in advance. You’ll still need to pay all relevant subscription fees up to and including the day of
            termination.&nbsp;</p>
        <p>46. Termination by Calcigo: Calcigo may choose to terminate your subscription at any time by providing you
            with one month’s written notice in advance. Calcigo may also terminate or suspend your subscription or
            access to all or any data immediately if:&nbsp;</p>
        <p>⦁<span style="white-space:pre"> </span>you breach any of these terms and do not remedy the breach within 14
            days after receiving notice of the breach,</p>
        <p>⦁<span style="white-space:pre"> </span>you breach any of these terms and the breach cannot be remedied,&nbsp;
        </p>
        <p>⦁<span style="white-space:pre"> </span>you fail to pay subscription fees, or&nbsp;</p>
        <p>47. No refunds: No refund is due to you if you terminate your subscription or Calcigo terminates it in
            accordance with these terms.</p>
        <p>48. Retention of your data: Once a subscription is terminated by you or us, it is archived and the data
            submitted or created by you is no longer available to you. We retain it for a period of time consistent with
            our data retention policy, during which, as a subscriber, you can reactivate your subscription and once
            again access your data by paying the subscription fees.We retain data in case you need it as part of your
            record retention obligations, but you can get in touch with us to have your data removed completely if you
            wish.</p>
        <p><h3>Liability and indemnity</h3></p>
        <p><h4>This section is important as it outlines liability terms between us and both, so we urge you to read it
            closely and in full.</h4></p>
        <p>49. You indemnify us: You indemnify us against all losses, costs (including legal costs), expenses, demands
            or liability that we incur arising out of, or in connection with, a third-party claim against us relating to
            your use of our services or any third-party product (except as far as we’re at fault).</p>
        <p>51. Limitation of liability: Other than liability that we can’t exclude or limit by law, our liability to you
            in connection with our services or these terms, in contract, tort (including negligence) or otherwise, is
            limited as follows:</p>
        <p>⦁<span style="white-space:pre"> </span>We have no liability arising from your use of our services for any
            loss of revenue or profit, loss of goodwill, loss of customers, loss of capital, loss of anticipated
            savings, legal, tax or accounting compliance issues, damage to reputation, loss in connection with any other
            contract, or indirect, consequential, incidental, punitive, exemplary or special loss, damage or expense.
        </p>
        <p>⦁<span style="white-space:pre"> </span>For loss or corruption of your data, our liability will be limited to
            taking reasonable steps to try and recover that data from our available backups.</p>
        <p>⦁<span style="white-space:pre"> </span>Our total aggregate liability to you in any circumstances is limited
            to the total amount you paid us for your subscription in the 6 months immediately preceding the date on
            which the claim giving rise to the liability arose.</p>
        <p><h3>Disputes</h3></p>
        <p><h4>This section outlines how disputes may be resolved.</h4></p>
        <p>52. Dispute resolution: Most of your concerns can be resolved quickly and to everyone’s satisfaction by
            contacting our support team. If we’re unable to resolve your complaint to your satisfaction (or if we
            haven’t been able to resolve a dispute we have with you after attempting to do so informally), you and we
            agree to resolve those disputes through binding arbitration or small claims court instead of in courts of
            general jurisdiction. You and we agree that any dispute must be brought in the parties’ individual capacity
            and not as a plaintiff or class member in any purported class or representative proceeding.</p>
        <p><h3>Important housekeeping</h3></p>
        <p><h4>Here we set out some additional terms. Take a read as they cover important issues.</h4></p>
        <p>53. No professional advice: Just to be clear, Calcigo isn’t a professional services firm of any sort, and
            isn’t in the business of giving any kind of professional advice. We may provide you with information we
            think might be useful in running a small business, but this should not be seen as a substitute for
            professional advice and we aren’t liable for your use of the information in that way.&nbsp;&nbsp;</p>
        <p>54. Events outside our control: We do our best to control the controllables. We aren’t liable to you for any
            failure or delay in performance of any of our obligations under these terms arising out of any event or
            circumstance beyond our reasonable control.</p>
        <p>55. Notices: Any notice you send to Calcigo must be sent to admin@calcigo.com. Any notices we send to you
            will be sent to the email address you’ve provided us through your subscription.</p>
        <p>61. Changes to these terms: We sometimes will decide to change these terms of use. But don’t worry, changes
            won’t apply retrospectively and, if we make changes, we’ll make every effort to let you know. You can keep
            track of changes to our terms by referring to the version and the date last updated at the top of the terms.
            Generally, we endeavour to provide you with 45 days’ notice of material changes before they become
            effective, unless we need to make immediate changes for reasons we don’t have control over. When we notify
            you, we’ll do it by email or by posting a visible notice through our services. If a change isn’t material,
            we may not notify you. If you find a modified term unacceptable, you may terminate your subscription by
            giving the standard advance notice to Calcigo.&nbsp;</p>
        <p>62. Enforcement of terms: If there’s any part of these terms that either one of us is unable to enforce,
            we’ll ignore that part but everything else will remain enforceable.</p>
        <p>63. Interpretation: Words like ‘include’ and ‘including’ are not words of limitation and where anything is
            within our discretion we mean our sole discretion.</p>
        <div><br></div>
    </div>
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
