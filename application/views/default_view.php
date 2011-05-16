<!doctype html>
<html>
  <head>
    <title>SocialTweak</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="/css/screen.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
      <link href="/css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/javascripts/jquery.js"></script>
    <script type="text/javascript" src="/javascripts/slidedeck.jquery.lite.js"></script>
    <script type="text/javascript" src="/javascripts/jquery.history.js"></script>
    <script type="text/javascript" src="/javascripts/jquery.path.js"></script>
    <script type="text/javascript" src="/javascripts/application.js"></script>
  </head>
  <body>
    <header>
      <a href="/"><h1>SocialTweak</h1></a>
      <ul id="nav">
        <li><a href="/home" class="selected">Home</a></li>
        <li><a href="/home/social">Social</a></li>
        <li><a href="/home/entertainment">Entertainment</a></li>
        <li><a href="/home/rewards">Rewards</a></li>
      </ul>
    </header>

    <div id="content">
      <?php 
        foreach($content as $line)
          echo $line;
        }
      ?>
    </div> <!-- end content -->

    <footer>
      <div id="closed-footer">
        <ul>
          <li><a href="#">contact</a></li>
          <li>-</li>
          <li><a href="#">about</a></li>
          <li>-</li>
          <li><a href="#">terms</a></li>
        </ul>
        <a id="points" href="/points">521 <span>points</span></a>
        <div id="progress">
          <h3>
            Interact and make progress on your bars. Fill them to get points.
            The more bars you have, the more points you earn
          </h3>
          <ul>
            <li>
              <span class="progress"></span>
              <h4>
                Standard Bar <span>Permanent</span>
              </h4>
            </li>
            <li>
              <span class="progress"></span>
              <h4>
                Buy for $2.99 USD <span>Duration: 1 month</span>
              </h4>
            </li>
            <li>
              <span class="progress"></span>
              <h4>
                Make 20 facebook friends register to unlock <span>Duration: 3 months</span>
              </h4>
            </li>
            <li>
              <span class="progress"></span>
              <h4>
               Hi there, another bar <span>Duration: 3 months</span>
              </h4>
            </li>
          </ul> <!-- end progress bars -->
        </div> <!-- end progress -->
        <a href="#" id="settings">Settings</a>
      </div> <!-- end closed-footer -->
      <div id="open-footer">
        <form id="quick-post" action="/quick_post" method="post">
          <textarea id="quick-post-content" name="quick_post[content]"></textarea>
          <input type="submit" value="Post" class="post-button" />
          <input type="button" value="Tweet" class="tweet-button" />
        </form>
        <div id="right-open-footer">
          <ul>
            <li><a href="#">Account</a></li>
            <li><a href="#">Logout</a></li>
            <li>Choose a background:</li>
            <li id="choose-background">
              <a href="#" id="grass"><img src="/images/select-grass.png" alt="Grass background" /></a>
              <a href="#" id="water"><img src="/images/select-water.png" alt="Water background" /></a>
              <a href="#" id="wood"><img src="/images/select-wood.png" alt="Wood background" /></a>
            </li>
          </ul>
        </div> <!-- end right-open-footer -->
      </div> <!-- end open-footer -->
    </footer>
  </body>
</html>
