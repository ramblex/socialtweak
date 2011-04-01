<div id="banner">
  <div id="current-video"></div>
</div> <!-- end banner -->
<div class="frame" id="videos">
  <div class="content clearfix">
    <div id="left-col">
      <ul class="button-block">
        <li><a href="#">Favorites</a></li>
        <li><a href="#">Popular</a></li>
        <li>
          <form method="post" action="/search" class="search-form">
            <input type="text" name="search[query]" id="search-query" />
            <input type="submit" value="Search" id="search-submit" />
          </form>
        </li>
      </ul>
      <div id="sponsored">
        <?php echo render($featured_videos, 'media'); ?>
      </div>
      <p id="sponsored-title">SPONSORED</p>
      <?php echo render($videos, 'media'); ?>
    </div>
    <div id="right-col">
      <h2>CHANNELS</h2>
      <ul id="channels">
        <li><a href="#"><img src="images/channel-one.png" alt="Channel one" /></a></li>
      </ul>
    </div>
  </div> <!-- end games and frame-content -->
  <div class="footer"></div>
</div> <!-- end frame -->
