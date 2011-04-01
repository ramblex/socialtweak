<?php

require_once('lib/limonade.php');

// Gets executed before every view
function before()
{
  layout('layouts/default.html.php');
}

dispatch('/', 'index');
  function index()
  {
    return html('index.html.php');
  }

dispatch('/social', 'social');
  function social()
  {
    return html('social.html.php');
  }

dispatch('/entertainment', 'entertainment');
  function entertainment()
  {
    return html('entertainment.html.php');
  }

dispatch('/games', 'games');
  function games()
  {
    return html('games.html.php');
  }

dispatch('/videos', 'videos');
  function videos()
  {
    return html('videos.html.php');
  }

run();
