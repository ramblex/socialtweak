<?php

  class Home extends CI_Controller{
  
    $content_dir = printf('%s\\content\\', getcwd());
  
    function index(){
      $data = array(
        'content' => file($content_dir. 'index.php');
      );
      $this->load->view('default_view', $data);
    }
    
    function social(){
      $data = array(
        'content' => file($content_dir. 'social.php');
      );
      $this->load->view('default_view', $data);
    }
    
    function entertainment(){
      $data = array(
        'content' => file($content_dir. 'entertainment.php');
      );
      $this->load->view('default_view', $data);
    }
    
    function contact(){
      $data = array(
        'content' => array('NOT FOUND');
      );
      $this->load->view('default_view', $data);
    }
    
    function about(){
      $data = array(
        'content' => array('NOT FOUND');
      );
      $this->load->view('default_view', $data);
    }
    
    function terms(){
      $data = array(
        'content' => array('NOT FOUND');
      );
      $this->load->view('default_view', $data);
    }
    
    // Rewards functions
    
    $reward_list = array(
      array('id' => 0, 'name' => 'Macbook Pro', 'participants' => 100, 'img' => 'http://socialtweak.ramblexdesigns.com/images/macbook-pro.png'),
      array('id' => 1, 'name' => 'Extra point bar for one week', 'participants' => 1029, 'img' => 'http://socialtweak.ramblexdesigns.com/images/extra-point-bar.png')
    );
      
    function rewards(){
      $data = array(
        'content' => file($content_dir. 'rewards.php');
        'reward_list' => $reward_list;
      );
      $this->load->view('default_view', $data);
    }
    
    function redeem(){
      $data = array(
        'content' => file($content_dir. 'redeem.php');
        'reward_list' => $reward_list;
      );
      $this->load->view('default_view', $data);
    }
  
  }
  
?>