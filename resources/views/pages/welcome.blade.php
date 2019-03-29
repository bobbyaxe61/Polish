<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Polish') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" />
    
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Squadfree
      Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
      Primary Author: BootstrapMade
      Primary Author URL: https://bootstrapmade.com
      Secondary Author: Bobbyaxe61
      Secondary Author URL: https://github.com/bobbyaxe61
    ======================================================= -->
  </head>

  <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="#intro">
            <h1>{{ config('app.name', 'Polish') }}</h1>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#intro">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#contact">Contact</a></li>
            @if (Route::has('login'))
              @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a><li>
              @else
                <li><a href="{{ route('login') }}">Login</a><li>
                @if (Route::has('register'))
                  <li><a href="{{ route('register') }}">Register</a><li>
                @endif
              @endauth
            @endif
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>



    <!-- Section: intro -->
    <section id="intro" class="intro">

      <div class="slogan">
        <h2> <span class="text_color">{{ config('app.name', 'Polish') }}</span> </h2>
        <h4>WE WILL PROOF READ YOUR WORK IN 30 MINUTES</h4>
      </div>
      <div class="page-scroll">
        <a href="#service" class="btn btn-circle">
  				<i class="fa fa-angle-double-down animated"></i>
  			</a>
      </div>
    </section>
    <!-- /Section: intro -->



    <!-- Section: about -->
    <section id="about" class="home-section text-center">
      <div class="heading-about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="wow bounceInDown" data-wow-delay="0.4s">
                <div class="section-heading">
                  <h2>About us</h2>
                  <i class="fa fa-2x fa-angle-down"></i>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div class="team boxed-grey">
                <div class="inner">
                  <h5>Jennifer Njoku</h5>
                  <p class="subtitle">Chief Proofreader</p>
                  <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="wow bounceInUp" data-wow-delay="0.5s">
              <div class="team boxed-grey">
                <div class="inner">
                  <h5>Our Goals</h5>
                  <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quia consequuntur accusamus ratione, exercitationem illum atque iusto vel amet repellendus. Id quas fuga minus optio neque, delectus mollitia similique ipsum suscipit officiis consequuntur quibusdam totam! Odio illo quo eum nisi ducimus natus iste praesentium, id dolorum fugiat sapiente ipsam quam! Incidunt porro asperiores corporis aperiam quo sed ducimus veritatis impedit, facere eaque vitae sapiente tenetur maxime accusamus recusandae ab atque fugit expedita itaque ipsam. Placeat natus facere nobis, harum delectus.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum voluptate vel eveniet labore suscipit dicta iusto, eum nam assumenda? Libero.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: about -->



    <!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
      <div class="heading-about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="wow bounceInDown" data-wow-delay="0.4s">
                <div class="section-heading">
                  <h2>Our Services</h2>
                  <i class="fa fa-2x fa-angle-down"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="wow fadeInLeft" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <img src="img/icons/service-icon-3.png" alt="" />
                </div>
                <div class="service-desc">
                  <h5>Copy Editing</h5>
                  <p>We would check the technical consistency of spelling, capitalization, font usage, numerals and hyphenation in submitted scripts based on preferred supported language structure.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <img src="img/icons/service-icon-2.png" alt="" />
                </div>
                <div class="service-desc">
                  <h5>Proofreading</h5>
                  <p>All scripts submitted will be proof read and corrections made based on preferred supported language structure. Any additional requirements can be negotiated.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <img src="img/icons/service-icon-1.png" alt="" />
                </div>
                <div class="service-desc">
                  <h5>Publishing</h5>
                  <p>Worried about publishing? cut out the stress and let us handle the rest. We can get your work published by a reputable publisher who accepts your terms and is willing to work with you.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <img src="img/icons/service-icon-4.png" alt="" />
                </div>
                <div class="service-desc">
                  <h5>Cloud System</h5>
                  <p>We can store your text documents on the cloud for an infinite time. Provided you remain an active user other terms and conditions may apply.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: services -->



    <!-- Section: contact -->
    <section id="contact" class="home-section text-center">
      <div class="heading-contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="wow bounceInDown" data-wow-delay="0.4s">
                <div class="section-heading">
                  <h2>Get in touch</h2>
                  <i class="fa fa-2x fa-angle-down"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="boxed-grey">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage">We are unable to send your message.</div>
              <form id="contact-form" action="{{ url('/contact_us') }}" method="post" role="form" class="contactForm">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">
                                  Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <label for="email">
                                  Email Address</label>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subject">
                                  Subject</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">
                                  Message</label>
                      <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="widget-contact">
              <h5>Main Office</h5>
              <address>
      				  <strong>{{ config('app.name', 'Polish') }} Works Inc.</strong><br>
      				  Office 795 Rimsom Ave, Beautiful Suite Estate<br>
      				  Abuja City, Nigeria<br>
      				  <abbr title="Phone">Phone:</abbr> (123) 456-7890
      				</address>

              <address>
  				      <strong>Email</strong><br>
  				      <a href="mailto:#">{{ env('APP_EMAIL', 'Polish@gmail.com') }}</a>
  				    </address>
              
              <address>
  				      <strong>We're on social networks</strong><br>
               	<ul class="company-social">
                    <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                    <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                </ul>
  				    </address>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: contact -->



    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="wow shake" data-wow-delay="0.4s">
              <div class="page-scroll marginbot-10">
                <a href="#intro" id="totop" class="btn btn-circle">
                 <i class="fa fa-angle-double-up animated"></i>
                </a>
              </div>
            </div>
            <span>&copy; {{ config('app.name', 'Polish') }} All Rights Reserved.</span>
            <div class="credits">
              Designed By <a href="https://github.com/bobbyaxe61">Bobbyaxe61</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/contactform.js"></script>

  </body>
</html>