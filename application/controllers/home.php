<?php

  class Home extends CI_Controller{
  
    function index(){
      $data = array(
        'content' => file('/content/index.php');
      );
      $this->load->view('default_view', $data);
    }
    
    function social(){
      $data = array(
        'content' => file('/content/social.php');
      );
      $this->load->view('default_view', $data);
    }
    
    function entertainment(){
      $data = array(
        'content' => file('/content/entertainment.php');
      );
      $this->load->view('default_view', $data);
    }
    
    // Rewards functions
    
    $reward_list = array(
      array('id' => 0, 'name' => 'Macbook Pro', 'participants' => 100, 'img' => '/images/macbook-pro.png'),
      array('id' => 1, 'name' => 'Extra point bar for one week', 'participants' => 1029, 'img' => '/images/extra-point-bar.png')
    );
      
    function rewards(){
      $data = array(
        'content' => file('/content/rewards.php');
        'reward_list' => $reward_list;
      );
      $this->load->view('default_view', $data);
    }
    
    function redeem(){
      $data = array(
        'content' => file('/content/redeem.php');
        'reward_list' => $reward_list;
      );
      $this->load->view('default_view', $data);
    }
  
  }
  
?>