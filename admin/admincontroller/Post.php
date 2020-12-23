<?php
include_once 'admincontroller/Admincontroller.php';
class Post extends Admincontroller
{

  function __construct()
  {
    parent::__construct();
  }
  public function allpost()
  {
    $active_status = 'inactive';
    // $sql = "SELECT tbl_user.*, count(tbl_house.id) AS house_number FROM tbl_user FULL JOIN tbl_house ON tbl_user.id = tbl_house.owner_id WHERE tbl_user.user = :user";
    // $query = $this->db->link->prepare($sql);
    // $query->bindValue(':user',$usertype);
    // $query->execute();
    $sql = "SELECT post.* from post where active_status = :post";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':post',$active_status);
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
  public function acceptPost($id)
  {
    $sql = "UPDATE `post` SET `active_status` = 'active' where `post`.`id_post`=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }
  public function delpost($id)
  {
    $sql = "delete from post where id_post=:id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }
  public function declinePost($id)
  {
    $sql = "UPDATE `post` SET `active_status` = 'decline' WHERE `id_post` = :id";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }
  public function declineNotification($id)
  {
    $message = 'Your Post is Decline.' ;
    $sql = "INSERT INTO `notification` (`id`, `from_id`, `to_id`, `message`, `read_message`, `time`) VALUES (NULL, '1', :id, 'Your Post is Decline.', 'no', current_timestamp());";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->bindValue(':mess',$message);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }
  public function acceptNotification($id)
  {
    $message = 'Your Post is Accept.' ;
    $sql = "INSERT INTO `notification` (`id`, `from_id`, `to_id`, `message`, `read_message`, `time`) VALUES (NULL, '1', :id, :mess, 'no', current_timestamp());";
    $query = $this->db->link->prepare($sql);
    $query->bindValue(':id',$id);
    $query->bindValue(':mess',$message);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0'>";
  }
}
  ?>