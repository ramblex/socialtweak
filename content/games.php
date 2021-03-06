<div id="current-container">
  <div id="current-game"></div>
</div> <!-- end current-container -->
<div class="frame" id="games">
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
        <?php echo render($featured_games, 'media'); ?>
      </div>
      <p id="sponsored-title">SPONSORED</p>
      <?php echo render($games, 'media'); ?>
    </div> <!-- end left-col -->
    <div id="right-col">
      <h2>CATEGORIES</h2>
      <ul id="categories">
        <li><a href="#">Category here</a></li>
        <li><a href="#">Another Category here</a></li>
      </ul>
    </div>
  </div> <!-- end games and frame-content -->
  <div class="footer"></div>
</div> <!-- end frame -->
