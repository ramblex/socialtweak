<?php

  class User extends CI_Controller{
  
    function __construct(){
      parent::__construct();
    }
  
    function index(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
    
    function login(){
      $user = $_POST['socialname'];
      $pass = $_POST['password'];
      
      $users = $this->db->get('users');
      
      foreach($users->result() as $user){
        $db_user = $user->username;
        $db_pass = $user->password;
        
        if($user == $db_user && $pass == $db_pass){
          setcookie('user', $user, time()+3600)
          break;
          header("Location: http://socialtweak.ramblexdesigns.com/home");
        }
        else{
          header("Location: http://socialtweak.ramblexdesigns.com/sign-in");
        }
        
      }
      
    }
    
    function logout(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
    
    // Page functions
    
    function sign-in(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
    
    function sign-up(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
    
    function forgot(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
    
    function invite(){
      header("Location: http://socialtweak.ramblexdesigns.com/home");
    }
  
  }
  
?>