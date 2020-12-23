<?php
  include_once 'admincontroller/Admincontroller.php';

  class Login extends Admincontroller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function login($sndusername,$sndpassword){
          $username = $this->help->validation($sndusername);
          $password = $this->help->validation($sndpassword);

          if(empty($username) || empty($password)){
            return 'empty';
          }
          else{
            $password = md5($password);

            $sql = "select * from admin where username = :username and password = :password limit 1";
            $query = $this->db->link->prepare($sql);
            $query->bindValue(':username',$username);
            $query->bindValue(':password',$password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);

            if($result){
              Session::set('login',true);
              Session::set('user','admin');
              Session::set('user_id',$result->id);
              Session::set('email',$result->email);
              Session::set('username',$result->username);
              // this->detailLogin($result->id);
              $sql2 = "INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES (NULL, :id, current_timestamp())" ;
              $query2 = $this->db->link->prepare($sql2);
              $query2->bindValue(':id',$result->id);
              $query2->execute();
              Header('Location:index.php');
            }
            else{
              return 'nouser';
            }

          }

    }
    public   function detailLogin($id){
      $sql2 = "INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES (NULL, :id, current_timestamp())" ;
      $query2 = $this->db->link->prepare($sql2);
      $query2->bindValue(':id',$id);
      $query2->execute();
    }
  }

 ?>
