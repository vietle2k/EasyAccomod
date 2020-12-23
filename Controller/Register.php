<?php
  include_once 'Controller/baseController.php';
  class Register extends Basecontroller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function checkemail(){

    }

    public function register($data){
          $user = $this->help->validation($data['user']);
          $fullname = $this->help->validation($data['fullname']);
          $email = $this->help->validation($data['email']);
          $password = $this->help->validation($data['password']);
          $gender = $this->help->validation($data['gender']);
          //$birthday = $this->help->validation($data['birthday']);
          //$cmnd = $this->help->validation($data['cmnd']);
          //$address = $this->help->validation($data['address']);
          //$phone = $this->help->validation($data['phone']);

          if(empty($user) || empty($fullname) || empty($email) || empty($password)){
            return 'empty';
          }
          else if(strlen($password) < 6){
            return 'smallpass';
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'emailprob';
          }
          else{
            $password = md5($password);

            $sql = "INSERT INTO user(user_type,fullname,gender,email,password) VALUES (:user,:fullname,:gender,:email,:password)";
            $query = $this->db->link->prepare($sql);
            $query->bindValue(':user',$user);
            $query->bindValue(':fullname',$fullname);
            $query->bindValue(':gender',$gender);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $insert = $query->execute();

            if($insert){
              $sql = "select * from user where email = :email and password = :password limit 1";
              $query = $this->db->link->prepare($sql);
              $query->bindValue(':email',$email);
              $query->bindValue(':password',$password);
              $query->execute();
              $result = $query->fetch(PDO::FETCH_OBJ);

              if($result){
                Session::set('login',true);
                Session::set('user',$result->user_type);
                Session::set('user_id',$result->id);
                Session::set('email',$result->email);
                Session::set('fullname',$result->fullname);
                Header('Location:index.php');
                exit();
              }
              else{
                return 'nouser';
              }
            }
            else{
              return 'fail';
            }

          }

    }




    public function registerTenant($data){

          $fname = $this->help->validation($data['fname']);
          $lname = $this->help->validation($data['lname']);
          $email = $this->help->validation($data['email']);
          $password = $this->help->validation($data['password']);

          if(empty($fname) || empty($lname) || empty($email) || empty($password)){
            return 'empty';
          }
          else if(strlen($password) < 6){
            return 'smallpass';
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'emailprob';
          }
          else{
            $password = md5($password);

            $sql = "INSERT INTO tbl_tenant(fname,lname, email, password) VALUES (:fname,:lname,:email,:password)";
            $query = $this->db->link->prepare($sql);
            $query->bindValue(':fname',$fname);
            $query->bindValue(':lname',$lname);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $insert = $query->execute();

            if($insert){
              if(empty($email) || empty($password)){
                return 'empty';
              }
              else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return 'emailprob';
              }
              else{
                $sql = "select * from tbl_tenant where email = :email and password = :password limit 1";
                $query = $this->db->link->prepare($sql);
                $query->bindValue(':email',$email);
                $query->bindValue(':password',$password);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);

                if($result){
                  Session::set('login',true);
                  Session::set('user','tenant');
                  Session::set('email',$result->email);
                  Session::set('lname',$result->lname);
                  Session::set('fname',$result->fname);
                  //Header('Location:index.php');
                  echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;
                }
                else{
                  return 'nouser';
                }

              }
            }
            else{
              return 'fail';
            }

          }

    }
  }

 ?>
