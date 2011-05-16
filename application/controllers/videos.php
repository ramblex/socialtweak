<?php

  class Videos extends CI_Controller{
  
    function index(){
      $data = array(
        'content' => file('/content/media.php');
        
        'featured_videos' => array(
          array('name' => 'video one featured'),
          array('name' => 'video two'),
        );
        
        'videos' => array(
          array('name' => 'Hello'),
          array('name' => 'World'),
          array('name' => 'Of'),
          array('name' => 'Videos!'),
        );
      );
      
      $this->load->view('default_view', $data);
    }
    
    function watch(){
      $this->load->view('default_view', $data);
    }
  
  }
  
?>