<?php

require_once('lib/limonade.php');

// Gets executed before every view
function before()
{
  layout('layouts/default.html.php');
}

dispatch('/home', 'index');

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
    set('featured_games', array(
      array('name' => 'Game one featured'),
      array('name' => 'GAME two'),
      array('name' => 'Third featured')
    ));
    set('games', array(
      array('name' => 'Hello'),
      array('name' => 'World'),
      array('name' => 'Of'),
      array('name' => 'Games!'),
      array('name' => 'Hello'),
      array('name' => 'World'),
      array('name' => 'Of'),
      array('name' => 'Games!'),
    ));
    return html('games.html.php');
  }

dispatch('/videos', 'videos');
  function videos()
  {
    set('featured_videos', array(
      array('name' => 'video one featured'),
      array('name' => 'video two'),
    ));
    set('videos', array(
      array('name' => 'Hello'),
      array('name' => 'World'),
      array('name' => 'Of'),
      array('name' => 'Videos!'),
    ));
    return html('videos.html.php');
  }

run();
