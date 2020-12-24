<?php
include_once 'admincontroller/Admincontroller.php';
class Owner extends Admincontroller
{

  function __construct()
  {
    parent::__construct();
  }

  public function allowner()
  {
    $usertype = 'owner';
    // $sql = "SELECT tbl_user.*, count(tbl_house.id) AS house_number FROM tbl_user FULL JOIN tbl_house ON tbl_user.id = tbl_house.owner_id WHERE tbl_user.user = :user";
    // $query = $this->db->link->prepare($sql);
    // $query->bindValue(':user',$usertype);
    // $query->execute();
    $sql = "SELECT user.* from user where user_type = :user and isActive = 1";
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

  public function singleowner($id)
  {
    $sql = "SELECT user.*, count(post.id_post) AS house_number FROM user LEFT JOIN post ON user.id = post.owner_id WHERE user.id = :id";
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

  public function delowner($id)
  {
    $sql = "delete from user where id=':id'";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    Header('Location:allowner.php');
  }

  public function deleteOwner($id)
  {
    $sql = "delete from user where id= :id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    // Header('Location:allowner.php');
    echo "<meta http-equiv='refresh' content='0'>";
  }

  public function inactiveOwner($id)
  {
    $sql = "UPDATE `user` SET `isActive` = '0' WHERE `user`.`id` = :id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    // Header('Location:allowner.php');
    echo "<meta http-equiv='refresh' content='0'>";
  }

  public function getabout(){
    $sql  = "select * from about where id=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',1);
    $query->execute();
    $result = $query->fetchObject(__CLASS__);
  }

  public function about($data){
    $sql  = "update about set about=:about where id=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$data['about']);
    $query->bindValue(':id',1);
    $query->execute();
  }

}
 ?>
