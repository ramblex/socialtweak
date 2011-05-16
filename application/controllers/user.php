<?php

  class User extends CI_Controller{
  
    function __construct(){
      parent::__construct();
    }
  
    function index(){
      header("Location: /home");
    }
    
    function login(){
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      
      $users = $this->db->get('users');
      
      foreach($users->result() as $user){
        $db_user = $user->username;
        $db_pass = $user->password;
        
        if($user == $db_user && $pass == $db_pass){
          setcookie('',$user,time()+3600,/,/,true)
          break;
        }
        else{
          header("Location: /home");
        }
        
      }
      
    }
    
    function logout(){
      header("Location: /home");
    }
    
    function signup(){
      header("Location: /home");
    }
    
    function invite(){
      header("Location: /home");
    }
  
  }
  
?>