<div id="rewards">
    <?php if (count($reward_list) > 0): ?>

  <img id="banner" src="images/rewards-banner.png" alt="Select a prize, use as many points as you can!" />

  <p id="blurb">The more points you use in each item, the more chances you have</p>
  <div id="countdown">
    <h2>Time left until we close today's rewards:</h2>
    <ul id="counter">
      <li>
        <span id="hours">22</span>
        <p>Hours</p>
      </li>
      <li>
        <span id="minutes">03</span>
        <p>Minutes</p>
      </li>
    </ul>
  </div>

  <ul id="reward-items" class="clearfix">
      <?php echo render($reward_list, 'reward'); ?>
  </ul>
  <?php else: ?>
  <?php echo 'Bah.' ?>
  <?php endif ?>
</div>
