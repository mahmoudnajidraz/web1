<?php
 include_once 'Db.php';
$errors=[];
$success=false;
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name = $_POST['c-name'];
    $description = $_POST['c-Description'];
    if (empty($name)){
       $errors['name_error']="Name is Requird plase fill it";
    }
    if (empty($description)){
      $errors['description_error']="description is Requird plase fill it";
   }

   if(count($errors)>0){
    $errors['general_error']="plase fix all error";
   }else{
    $query="INSERT INTO Categories
    (Name,Description)
   VALUES('$name','$description')";
   $result = mysqli_query( $c, $query);
    if($result){
      $errors=[];
      $success=true;
      header('location:show- Category.php');
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
                  <h4 class="card-title" id="basic-layout-form">Category Info</h4>
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
                                echo"<div class='alert alert-success'> Category added successfully </div>";

                              }
                            
                              ?>
                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Add Category</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Category Name</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="Category Name" ruquired name="c-name">
                              <?php
                              if(!empty($errors['name_error'])){
                                echo"<span class='text-danger'>".$errors['name_error']."</span>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Category Description</label>
                              <input type="text" id="projectinput2" class="form-control" placeholder="Category Description" name="c-Description">
                              <?php
                              if(!empty($errors['description_error'])){
                                echo"<span class='text-danger'>".$errors['description_error']."</span>";
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