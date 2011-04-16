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
    layout('');
    return html('splash.html.php');
  }

dispatch('/home', 'home');
  function home()
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

$reward_list = array(
  array('id' => 0, 'name' => 'Macbook Pro', 'participants' => 100, 'img' => 'macbook-pro.png'),
  array('id' => 1, 'name' => 'Extra point bar for one week', 'participants' => 1029, 'img' => 'extra-point-bar.png')
);

dispatch('/rewards', 'rewards');
  function rewards()
  {
    global $reward_list;
    set('reward_list', $reward_list);
    return html('rewards.html.php');
  }

dispatch('/redeem/:reward_id', 'redeem');
  function redeem()
  {
    global $reward_list;
    if (params('reward_id') < count($reward_list))
    {
      set('reward', $reward_list[params('reward_id')]);
      return html('redeem.html.php');
    }
    else
    {
      halt(NOT_FOUND, 'reward does not exist.');
    }
  }

run();
