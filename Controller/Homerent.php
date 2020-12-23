
<?php
  include_once 'Controller/baseController.php';

  class Homerent extends baseController
  {

    function __construct()
    {
      parent::__construct();
    }

    public function addRent($value,$files)
    {
      $owner_id = Session::get('user_id');
      $address = $value['address'];
      $rental_value = $value['rental_value'];
      $dien_tich = $value['dien_tich'];
      $tien_dien = $value['tien_dien'];
      $tien_nuoc = $value['tien_nuoc'];
      $bathroom_nl = $value['bathroom_nl'];
      $air_condition = $value['air_condition'];

      if(stripos($rental_value,'-') == true){
        $arr = explode('-',$value['rental_value']);
        $range1 = substr($arr[0],1);
        $range2 = substr($arr[1],2);
        $rental_value = $range1.'-'.$range2;
      }

      $house_type = $value['house_type'];
      $bedroom = $value['bedroom'];
      $bathroom = $value['bathroom'];
      $kitchen = $value['kitchen'];
      $balconies = $value['balconies'];
      $description = $value['description'];
      $active_status = 'inactive';


      if($address == '' || $rental_value =='' || $house_type == '' || $tien_dien =='' || $tien_nuoc =='' || $bathroom_nl =='' || $air_condition == '' || $bedroom == '' || $bathroom == '' || $kitchen == '' || $balconies == ''){
        return 'notfill';
      }

      $sizenum = 0;
      $extnum = 0;

      $permited = array('jpg', 'jpeg', 'png', 'gif');

      if(isset($files['img_2'] ) && $files['img_2']['name'] != '') {

          $file_name = $files['img_2']['name'];
          $file_size = $files['img_2']['size'];
          $file_temp = $files['img_2']['tmp_name'];

          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

          if ($file_size>(10*1024*1024)){
              $sizenum++;
              Session::set('sizenum',$sizenum);
              $uploaded_image_2='';
          }
          else if(in_array($file_ext, $permited) === false) {
              $extnum++;
              Session::set('extnum',$extnum);
              $uploaded_image_2='';
          }
          else{
              $unique_image = substr(md5(microtime()), 0, 10) . '.' . $file_ext;
              $uploaded_image_2 = "uploads/" . $unique_image;
              move_uploaded_file($file_temp, $uploaded_image_2);
          }
      }
      else{
        $uploaded_image_2='';
      }


      if(isset($files['img_3']) && $files['img_3']['name'] != '') {

          $file_name = $files['img_3']['name'];
          $file_size = $files['img_3']['size'];
          $file_temp = $files['img_3']['tmp_name'];

          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);


          if ($file_size > (10*1024*1024)){
              $sizenum++;
              Session::set('sizenum',$sizenum);
              $uploaded_image_3='';
          }
          else if(in_array($file_ext, $permited) === false) {
              $extnum++;
              Session::set('extnum',$extnum);
              $uploaded_image_3='';
          }
          else{
            $unique_image = substr(md5( microtime()), 0, 10) . '.' . $file_ext;
            $uploaded_image_3 = "uploads/" . $unique_image;
            move_uploaded_file($file_temp, $uploaded_image_3);
          }
      }
      else{
        $uploaded_image_3='';
      }


      if(isset($files['img_1']) && $files['img_1']['name'] != '' ) {

          $file_name = $files['img_1']['name'];
          $file_size = $files['img_1']['size'];
          $file_temp = $files['img_1']['tmp_name'];

          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

          if ($file_size > (10*1024*1024)){
              $sizenum++;
              Session::set('sizenum',$sizenum);
              $uploaded_image_1='';
          }
          else if(in_array($file_ext, $permited) === false) {
              $extnum++;
              Session::set('extnum',$extnum);
              $uploaded_image_1='';
          }
          else{
            $unique_image = substr(md5( microtime()), 0, 10) . '.' . $file_ext;
            $uploaded_image_1 = "uploads/" . $unique_image;
            move_uploaded_file($file_temp, $uploaded_image_1);
          }
      }
      else{
        $uploaded_image_1='';
      }


      $sql = "INSERT INTO post(owner_id,address,house_type,price,dien_tich,bedroom,bathroom,bathroom_nl,kitchen,air_condition,balconies,tien_dien,tien_nuoc,description,img_1,img_2,img_3,active_status) VALUES(:owner_id,:address,:house_type,:rental_value,:dien_tich,:bedroom,:bathroom,:bathroom_nl,:kitchen,:air_condition,:balconies,:tien_dien,:tien_nuoc,:description,:img_1,:img_2,:img_3,:active_status)";
      $query = $this->db->link->prepare($sql);
      $query->bindValue(':owner_id',$owner_id);
      $query->bindValue(':address',$address);
      $query->bindValue(':house_type',$house_type);
      $query->bindValue(':rental_value',$rental_value);
      $query->bindValue(':dien_tich',$dien_tich);
      $query->bindValue(':bedroom',$bedroom);
      $query->bindValue(':bathroom',$bathroom);
      $query->bindValue(':bathroom_nl',$bathroom_nl);
      $query->bindValue(':kitchen',$kitchen);
      $query->bindValue(':air_condition',$air_condition);
      $query->bindValue(':balconies',$balconies);
      $query->bindValue(':tien_dien',$tien_dien);
      $query->bindValue(':tien_nuoc',$tien_nuoc);
      $query->bindValue(':description',$description);
      $query->bindValue(':img_1',$uploaded_image_1);
      $query->bindValue(':img_2',$uploaded_image_2);
      $query->bindValue(':img_3',$uploaded_image_3);
      $query->bindValue(':active_status',$active_status);
      $result = $query->execute();
      if($result){
        return 'success';
      }
      else{
        return 'fail';
      }
    }
  }



 ?>
