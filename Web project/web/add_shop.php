<?php
 include_once 'Db.php';
$errors=[];
$success=false;
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $Category = $_POST['category'];
    

    

    
    if (empty($name)){
       $errors['name_error']="Name is Requird plase fill it";
    }
    if (empty($phone)){
      $errors['phone_error']="phone is Requird plase fill it";
    }
    if (empty($address)){
    $errors['address_error']="address is Requird plase fill it";
    }
    // if (empty($image)){
    //   $errors['image_error']="image is Requird plase fill it";
    // }
    if (empty($Category)){
      $errors['Category_error']="Category is Requird plase fill it";
    }
    

   if(count($errors)>0){
    $errors['general_error']="plase fix all error";
   }else{
    $file_name=$_FILES['logo']['name'];
    $file_size=$_FILES['logo']['size'];
    $file_type=$_FILES['logo']['type'];
    $file_tmp_name=$_FILES['logo']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_new_name = time() .rand(1,1000).".$file_ext";

    $upload_path='../upload/images/'. $file_new_name;   
     move_uploaded_file($file_tmp_name,$upload_path);

   $query="INSERT INTO shops
    (name,phone,categories,address,description,image )
   VALUES('$name','$phone','$Category','$address','$description','$file_new_name')";
   $result = mysqli_query( $c, $query);
    if($result){
      $errors=[];
      $success=true;
      header('location:show_shops.php'); 
    }else{
      $errors['general_error']= mysqli_error($c);
  }
}
   }
  
  
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
include "../partial/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
  data-col="2-columns">
  <!-- fixed-top-->
  <?php
include "../partial/nav.php";
?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php
 include "../partial/sidebar.php";
?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
      <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">shop Info</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                  <?php
                              if(!empty($errors['general_error'])){
                                echo"<div class='alert alert-danger'>".$errors['general_error']."</div>";
                              }elseif($success){
                                echo"<div class='alert alert-success'> Product added successfully </div>";

                              }
                            
                              ?>
                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Add shop</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Name</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="product Name" ruquired name="name">
                              <?php
                              if(!empty($errors['name_error'])){
                                echo"<span class='text-danger'>".$errors['name_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">phone</label>
                              <input type="number" id="projectinput2" class="form-control" placeholder="phone" name="phone">
                              <?php
                              if(!empty($errors['phone_error'])){
                                echo"<span class='text-danger'>".$errors['phone_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">address</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="address" ruquired name="address">
                              <?php
                              if(!empty($errors['address_error'])){
                                echo"<span class='text-danger'>".$errors['address_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">description</label>
                              <input type="text" multiple id="projectinput2" class="form-control" placeholder="description" name="description">
                              <?php
                              if(!empty($errors['description_error'])){
                                echo"<span class='text-danger'>".$errors['description_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Category</label>
                              <select size='' name="category" id="projectinput2">
                                <option  selected>chooes</option>
                                <?php
                                  include_once 'Db.php';
                                  $query="SELECT*FROM categories";
                                  $result=mysqli_query($c,$query);
                                  if(mysqli_num_rows($result)>0){
                                      while($row=mysqli_fetch_assoc($result)){
                                        echo "<option value= '$row[id]'>".$row['name']."</option>";

                                      }
                                  }
                                ?>
                             </select>

                              <?php
                              if(!empty($errors['Category_error'])){
                                echo"<span class='text-danger'>".$errors['Category_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">logo</label>
                              <input type="file" multiple id="projectinput2" class="form-control" placeholder="logo" name="logo">
                              <?php
                              if(!empty($errors['Image_error'])){
                                echo"<span class='text-danger'>".$errors['Image_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php
include "../partial/footer.php";
?>
</body>

</html>