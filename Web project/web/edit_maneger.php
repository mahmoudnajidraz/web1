<?php
 include_once 'Db.php';
$errors=[];
$success=false;
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $address = $_POST['address'];
    $description = $_POST['description'];
    isset($_POST['status'])?$status = $_POST['status']: $status = 0;

    

    
    if (empty($name)){
       $errors['name_error']="Name is Requird plase fill it";
    }
    if (empty($phone)){
      $errors['phone_error']="phone is Requird plase fill it";
    }
    if (empty($address)){
    $errors['address_error']="address is Requird plase fill it";
    }
    if (empty($email)){
      $errors['email_error']="email is Requird plase fill it";
    }
    if (empty($password)){
      $errors['password_error']="password is Requird plase fill it";
    }
    

   if(count($errors)>0){
    $errors['general_error']="plase fix all error";
   }else{
     $query="update managers set name='$name',phone='$phone',email='$email',password='$password',status='$status',address='$address',description='$description' 
     where id= '".$_GET['id']."'";
     $result = mysqli_query( $c, $query);
        if($result){
         $errors=[];
         $success=true;
         header('location:show_Managers.php');
        }else{
         $errors['general_error']= mysqli_error($c);
        }
    }
   }
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT*FROM managers where id=$id";
    $result=mysqli_query($c,$query);
    $row=mysqli_fetch_assoc($result);
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
                  <h4 class="card-title" id="basic-layout-form">Manager Info</h4>
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
                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=$id"?>" enctype="multipart/data-form">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>edit Manager</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Name</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder=" Name" ruquired name="name"
                              value="<?php echo $row['name']?>">
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
                              <input type="number" id="projectinput2" class="form-control" placeholder="phone" name="phone"
                              value="<?php echo $row['phone']?>">
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
                              <label for="projectinput1">email</label>
                              <input type="email" id="projectinput1" class="form-control" placeholder="email" ruquired name="email"
                              value="<?php echo $row['email']?>">
                              <?php
                              if(!empty($errors['email_error'])){
                                echo"<span class='text-danger'>".$errors['email_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">password</label>
                              <input type="password" id="projectinput2" class="form-control" placeholder="password" name="password"
                              value="<?php echo $row['password']?>">
                              <?php
                              if(!empty($errors['password_error'])){
                                echo"<span class='text-danger'>".$errors['password_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">address</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="address" ruquired name="address"
                              value="<?php echo $row['address']?>">
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
                              <input type="text" multiple id="projectinput2" class="form-control" placeholder="description" name="description"
                              value="<?php echo $row['description']?>">
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
                              <input type="checkbox" id="projectinput3" value="1" name="status"
                              <?php 
                               if($row['status']==1){
                                 echo 'checked';
                               }
                              ?>
                              >
                              <label for="projectinput3">stutas</label>
     
                            </div>
                          </div>
                        </div> 
                      <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> update
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