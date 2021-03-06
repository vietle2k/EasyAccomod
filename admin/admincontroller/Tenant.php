<?php
include_once 'Admincontroller.php';
class Tenant extends Admincontroller
{

  function __construct()
  {
    parent::__construct();
  }

  public function alltenant()
  {
    $usertype = 'renter';
    $sql = "SELECT * FROM user WHERE user_type = :user";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':user',$usertype);
    $query->execute();
    // $query->debugDumpParams();
    $result = $query->fetchAll();
    if(count($result) > 0){
      return $result;
    }
    else{
      return false;
    }
  }

  public function singletenant($id)
  {
    $sql = "SELECT * FROM user WHERE id = :id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    // $query->debugDumpParams();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if(count($result) > 0){
      return $result;
    }
    else{
      return false;
    }
  }
  public function deltenant($id)
  {
    $sql = "delete from user where id=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    Header('Location:alltenant.php');
    // echo "<meta http-equiv='refresh' content='0'>";
  }

  public function deleteOwner($id)
  {
    $sql = "delete from user where id=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    // Header('Location:alltenant.php');
    echo "<meta http-equiv='refresh' content='0'>";
  }

  public function delmessage($id)
  {
    $sql = "delete from tbl_message where id=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }

  public function getMessage()
  {
    $sql = "SELECT * FROM tbl_message";
    $query = $this->db->link->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    if(count($result) > 0){
      return $result;
    }
    else{
      return false;
    }
  }

}
 ?>
