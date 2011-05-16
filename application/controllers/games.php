<?php

  class Games extends CI_Controller{
  
    $content_dir = '/home/alexd/public_html/socialtweak/content/';
    
    function index(){
      $data = array(
        'content' => file($content_dir. 'games.php');
        
        'featured_games' => array(
          array('name' => 'Game one featured'),
          array('name' => 'GAME two'),
          array('name' => 'Third featured')
        );
        
        'games' => array(
          array('name' => 'Hello'),
          array('name' => 'World'),
          array('name' => 'Of'),
          array('name' => 'Games!'),
          array('name' => 'Hello'),
          array('name' => 'World'),
          array('name' => 'Of'),
          array('name' => 'Games!'),
        );
      );
      
      $this->load->view('default_view', $data);
    }
    
    function play(){
      $this->load->view('default_view', $data);
    }
  
  }
  
?>