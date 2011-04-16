<div id="spinner">
  <ul id="wheel">
    <li class="blue">
      <p>Use <strong>100</strong> points</p>
      <span>You are now using 100 more points on this item</span>
    </li>
    <li class="pink">
      <p>This is another</p>
      <span>Another description</span>
    </li>
    <li class="green">
      <p>You got green</p>
      <span>Nice!</span>
    </li>
    <li class="blue">
      <p>Use <strong>100</strong> points</p>
      <span></span>
    </li>
    <li class="pink">
      <p>This is yet another thing</p>
      <span>Another description</span>
    </li>
    <li class="green">
      <p>You got the second green</p>
      <span>Nice!</span>
    </li>
    <li class="red">
      <p>Game over</p>
      <span>Bad luck :(</span>
    </li>
    <li class="blue">
      <p>Use <strong>100</strong> points</p>
      <span></span>
    </li>
    <li class="green">
      <p>You win</p>
      <span>Congratulations</span>
    </li>
  </ul>
  <a href="#" id="spin"><span>Spin</span> for 5 points</a>
</div>

<section id="redeem-content">
  <div class="redeem-content">
    <img src="/images/<?php echo $reward['img'] ?>" alt="<?php echo $reward['name'] ?>" />
    <p>You are playing for a <?php echo $reward['name'] ?></p>
  </div>

  <div id="last-spin" class="redeem-content">
    <h2>Last spin:</h2>
    <div>
      <h3>You've got: "<span>use 100</span>"!</h3>
      <p>You are now using 100 more points on this item</p>
    </div>
    <p>The more points you use on this item, the more chances you have to win!</p>
  </div>

  <div class="redeem-content">
    <p id="num-points">
      You are using
      <span>100</span>
      points on this item.
    </p>
    <p>
      Spin to use more!
    </p>
  </div>
</section> <!-- end redeem-content -->
