<?php
  include_once 'Controller/baseController.php';

  class Login extends Basecontroller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function login($sndemail,$sndpassword){
          $email = $this->help->validation($sndemail);
          $password = $this->help->validation($sndpassword);

          if(empty($email) || empty($password)){
            return 'empty';
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'emailprob';
          }
          else{
            $password = md5($password);

            $sql = "select * from user where email = :email and password = :password limit 1";
            $query = $this->db->link->prepare($sql);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            
            $type = '';
            $is_active = '0';
            if ($result) {
              $type = $result->user_type;
              $is_active = $result->isActive; 
            } else {
              return 'nouser';
            }
            

            if($result && ($type == 'renter' || ($type == 'owner' && $is_active == '1') )){
              Session::set('login',true);
              Session::set('user',$result->user_type);
              Session::set('user_id',$result->id);
              Session::set('email',$result->email);
              Session::set('fullname',$result->fullname);
              if (Session::get('path')) {
                //Header('Location:'.Session::get('path'));
                echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;
              }
              else{
                //Header('Location:index.php');
                echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;
              }
            }
            else if($result && $type == 'owner' && $is_active == '0'){
              return 'noactive';
            }
            else{
              return 'nouser';
            }

          }

    }
  }

 ?>
