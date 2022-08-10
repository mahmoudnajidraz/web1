<?php
 include_once 'Db.php';
 $Search=0;
if($_SERVER['REQUEST_METHOD']== "POST"){
    $Search = $_POST['Search'];
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
     </div>
     <div class="content-header row">
     </div>
        <div class="content-body">
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All shops </h4>
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
                                <div class="card-body card-dashboard">
                                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <div class="form-body"> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Search by name</label>
                                                        <input type="text" id="projectinput1" class="form-control"  name="Search">                    
                                                    </div>
                                                </div>  
                                                <div class="col-md-6">
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Search </button>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                    <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>phone</th>
                                                <th>address</th>
                                                <th>description</th>
                                                <th>Category</th>
                                                <th>image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                include_once 'Db.php';                                          
                                                $limit=3;
                                            $page=$_GET['page'] ?? 1;
                                            $offset=($page-1)*$limit;
                                           $query="SELECT*FROM shops  ORDER BY ID ASC 
                                           limit $limit offset $offset ";

                                                
                                                $result=mysqli_query($c,$query);
                                                if(mysqli_num_rows($result) >0){
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        if($Search != 0 ){
                                                            if($row['name'] == $Search){
                                                                echo "<tr>".
                                                                "<td>".$row['id']."</td>".
                                                                "<td>".$row['name']."</td>".
                                                                "<td>".$row['phone']."</td>".
                                                                "<td>".$row['address']."</td>".
                                                                "<td>".$row['description']."</td>";
                                                                $query1="SELECT*FROM Categories";
                                                                $result1=mysqli_query($c,$query1);
                                                                if(mysqli_num_rows($result1) >0){
                                                                    while($row1=mysqli_fetch_assoc($result1)){
                                                                        if($row['Categories']==$row1['id']){
                                                                            echo "<td>".$row1['name']."</td>";
                                                                        }
                                                                    }
                                                                }
                                                                     echo"<td><img width='100px' height='100px' src='http://localhost/php/Project2/upload/images/".$row['image']."'></td>";
                                                                     echo "</tr>";
                                                           }
                                                                
                                                        }else{
                                                            echo "<tr>".
                                                            "<td>".$row['id']."</td>".
                                                            "<td>".$row['name']."</td>".
                                                            "<td>".$row['phone']."</td>".
                                                            "<td>".$row['address']."</td>".
                                                            "<td>".$row['description']."</td>";
                                                            $query1="SELECT*FROM Categories";
                                                            $result1=mysqli_query($c,$query1);
                                                            if(mysqli_num_rows($result1) >0){
                                                                while($row1=mysqli_fetch_assoc($result1)){
                                                                    if($row['Categories']==$row1['id']){
                                                                        echo "<td>".$row1['name']."</td>";
                                                                    }
                                                                }
                                                            }
                                                          echo  "<td><img width='100px' height='100px' src='http://localhost/php/Project2/upload/images/".$row['image']."'></td>";
                                                        }
                                                    }  
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php
                                                    $query="SELECT count(id) as row_no FROM shops";
                                                    $result=mysqli_query($c,$query);
                                                    $row=mysqli_fetch_assoc($result);
                                                    $page_count=ceil($row['row_no']/$limit);
                                                    echo "<ul class ='pagination'>";
                                                    for($i=1;$i<=$page_count;$i++){
                                                        echo "<li class='page-itme'> <a class='page-link' href='show_shops.php?page=".$i."'>$i</a></li>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
 <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    include "../partial/footer.php";
    ?>


</body>

</html>