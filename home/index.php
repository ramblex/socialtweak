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

run();
