<!doctype html>
<html>
  <head>
    <title>SocialTweak</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="http://socialtweak.ramblexdesigns.com/css/splash.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
      <link href="/css/splash-ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript" src="http://socialtweak.ramblexdesigns.com/javascripts/jquery.js"></script>
    <script type="text/javascript" src="http://socialtweak.ramblexdesigns.com/javascripts/jquery.roundabout.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        // Allow dots to switch between slides
        $("#roundabout li").each(function(index, element) {
          $('<li><a href="#"></a></li>')
            .appendTo("#dots")
            .click(function() {
              // Subtract 1 since there is a previous arrow
              $('#roundabout ul').roundabout_animateToChild(index);
              // Selected class is handled in focus callback below
              return false;
            });
        });

        $("#dots").prepend('<li id="previous"><a href="#"></a></li>');
        $("#dots").append('<li id="next"><a href="#"></a></li>');

        // Work out width for #dots
        $("#dots").css('width', $("#dots li").length * $("#dots li:first").outerWidth(true));

        // Whenever the slide is changed update the dots
        $("#roundabout ul").focus(function() {
          var selected_image = $('.roundabout-in-focus');
          var idx = $("#roundabout ul li").index(selected_image);
          var selected_dot = $("#dots li").get(idx + 1);
          $("#dots li").removeClass('selected');
          $(selected_dot).addClass('selected');
        });

        var interval;
        $("#roundabout ul")
          .roundabout({
            btnNext: '#next',
            btnPrev: '#previous',
            reflect: true
          })
          .hover(
            function() {
              clearInterval(interval);
            },
            function() {
              interval = startAutoPlay();
            }
          );

          interval = startAutoPlay();
      });

      function startAutoPlay() {
        return setInterval(function() {
          $('#roundabout ul').roundabout_animateToNextChild();
        }, 5000);
      }
    </script>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <a href="http://socialtweak.com/">
          <h1>SocialTweak</h1>
        </a>
        <form action="http://socialtweak.ramblexdesigns.com/login" method="post">
          <p>
            <label for="user-socialname">Socialname:</label>
            <input type="text" name="socialname" id="user-socialname" />
          </p>
          <p>
            <label for="user-password">Password:</label>
            <input type="password" name="password" id="user-password" />
          </p>
          <p>
            <input type="submit" value="LOGIN" id="login-btn" />
          </p>
          <div id="form-links">
            <span><a href="http://socialtweak.ramblexdesigns.com/forgot">Forgot your password?</a></span>
            <span><a href="http://socialtweak.ramblexdesigns.com/sign-up">Not a member yet?</a></span>
          </div>
        </form>
      </div> <!-- end header -->

      <div id="content">
        <h2>Getting social, in a whole new way</h2>
        <div id="roundabout">
          <ul>
            <li><img src="http://socialtweak.ramblexdesigns.com/images/splash/slides/1wel.jpg" alt="Welcome" width="524" height="318" /></li>
            <li><img src="http://socialtweak.ramblexdesigns.com/images/splash/slides/2gamesslide.jpg" alt="Games" width="524" height="318" /></li>
            <li><img src="http://socialtweak.ramblexdesigns.com/images/splash/slides/3videoslide.jpg" alt="Videos" width="524" height="318" /></li>
            <li><img src="http://socialtweak.ramblexdesigns.com/images/splash/slides/4musicslide.jpg" alt="Music" width="524" height="318" /></li>
            <li><img src="http://socialtweak.ramblexdesigns.com/images/splash/slides/5auctions.jpg" alt="Auctions" width="524" height="318" /></li>
          </ul>
        </div> <!-- end roundabout -->
        <div id="dots"></div>
      </div> <!-- end content -->
    </div> <!-- end container -->

    <div id="footer">
      <div id="footer-content">
        <div class="section" id="news">
          <h3>Latest News</h3>
          <p>We just launched the first beta</p>
          <p id="via">via Twitter</p>
        </div> <!-- end section -->
        <div class="section" id="social">
          <h3>We're social too!</h3>
          <a href="#" id="facebook">Facebook</a>
          <a href="http://twitter.com/socialtweak" id="twitter">Twitter</a>
        </div> <!-- end section -->
        <div class="section">
          <h3>Get inside!</h3>
          <p>Our members will be happy to invite you!</p>
          <p><a href="http://socialtweak.ramblexdesigns.com/invite">Click here</a> and request an invite</p>
        </div> <!-- end section -->
        <div class="section" id="misc">
          <ul>
            <li><a href="http://socialtweak.ramblexdesigns.com/home/contact">contact</a></li>
            <li><a href="http://socialtweak.ramblexdesigns.com/home/about">about</a></li>
            <li><a href="http://socialtweak.ramblexdesigns.com/home/terms">terms</a></li>
          </ul>
        </div> <!-- end section -->
      </div> <!-- end footer content -->
    </div> <!-- end footer -->
  </body>
</html>
