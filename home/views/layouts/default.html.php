<!doctype html>
<html>
  <head>
    <title>SocialTweak</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/screen.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
      <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascripts/slidedeck.jquery.lite.js"></script>
    <script type="text/javascript" src="javascripts/jquery.history.js"></script>
    <script type="text/javascript" src="javascripts/application.js"></script>
  </head>
  <body>
    <div id="header">
      <a href="/">
        <h1>SocialTweak</h1>
      </a>
      <ul id="nav">
        <li><a href="index.html" class="selected">Home</a></li>
        <li><a href="social.html">Social</a></li>
        <li><a href="entertainment.html">Entertainment</a></li>
        <li><a href="#">Favorites</a></li>
        <li><a href="#">Rewards</a></li>
      </ul>
    </div> <!-- end header -->

    <div id="content">
      <?php echo $content ?>
    </div> <!-- end content -->

    <div id="footer">
      <div id="closed-footer">
        <ul>
          <li><a href="#">contact</a></li>
          <li>-</li>
          <li><a href="#">about</a></li>
          <li>-</li>
          <li><a href="#">terms</a></li>
        </ul>
        <div id="points">521 <span>points</span></div>
        <a href="#" id="settings">Settings</a>
      </div> <!-- end closed-footer -->
      <div id="open-footer">
        <form id="quick-post" action="/quick_post" method="post">
          <textarea id="quick-post-content" name="quick_post[content]"></textarea>
          <input type="submit" value="Post" class="post-button" />
          <input type="button" value="Tweet" class="tweet-button" />
        </form>
        <div id="right-open-footer">
          <div id="progress">
            <div class="progress-bar">Unlock</div>
            <div class="progress-bar"><div id="current-progress"></div></div>
            <p>Watch, listen, tweet, post and play to make more progress and get points!</p>
          </div>
          <ul>
            <li><a href="#">Account</a></li>
            <li><a href="#">Logout</a></li>
            <li>Choose a background:</li>
            <li id="choose-background">
              <a href="#" name="grass"><img src="images/select-grass.png" alt="Grass background" /></a>
              <a href="#" name="water"><img src="images/select-water.png" alt="Water background" /></a>
              <a href="#" name="wood"><img src="images/select-wood.png" alt="Wood background" /></a>
            </li>
          </ul>
        </div> <!-- end right-open-footer -->
      </div> <!-- end open-footer -->
    </div> <!-- end footer -->
  </body>
</html>
