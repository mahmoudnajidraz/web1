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
                                <h4 class="card-title">All Managers </h4>
                                <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                </form>
                                <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>phone</th>
                                            <th>email</th>
                                            <th>password</th>
                                            <th>address</th>
                                            <th> description</th>
                                            <th>status</th>
                                            <th>Edit</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            include_once 'Db.php';
                                            $limit=3;
                                            $page=$_GET['page'] ?? 1;
                                            $offset=($page-1)*$limit; 
                                            $query="SELECT*FROM managers ORDER BY id ASC
                                            limit $limit offset $offset ";
                                            $result=mysqli_query($c,$query);
                                            if(mysqli_num_rows($result) >0){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    if($Search != 0 ){
                                                        if($row['name'] == $Search){
                                                            if($row['status']==1){
                                                                $status="<span class='badge badge-success'>Active</span>";
                                                            }else{
                                                            $status="<span class='badge badge-danger'>Block</span>";
                                                            }
                                                            echo "<tr>".
                                                            "<td>".$row['id']."</td>".
                                                            "<td>".$row['name']."</td>".
                                                            "<td>".$row['phone']."</td>".
                                                            "<td>".$row['email']."</td>".
                                                            "<td>".$row['password']."</td>".
                                                            "<td>".$row['address']."</td>".
                                                            "<td>".$row['description']."</td>".
                                                            "<td>".$status."</td>";
                                                                                                                
                                                            echo "<td><a href='edit_category.php?id=".$row['id']."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                            class='icon-eye'></i></a></td>".
                                                            "<td>
                                                                <form class ='c_form' action='delete_category.php' method='POST'>
                                                                    <input type='hidden'  value='".$row['id']."' name='id'>
                                                                    <button type='button' class='btn btn-danger delete_category' id='delete-btn'>
                                                                        DELETE
                                                                    </button>
                                                                </form>
                                                            </td>";
                                                        }
                                                            echo "</tr>";
                                                    }else{
                                                        if($row['status']==1){
                                                            $status="<span class='badge badge-success'>Active</span>";
                                                        }else{
                                                        $status="<span class='badge badge-danger'>Block</span>";
                                                        }
                                                        echo "<tr>".
                                                        "<td>".$row['id']."</td>".
                                                        "<td>".$row['name']."</td>".
                                                        "<td>".$row['phone']."</td>".
                                                        "<td>".$row['email']."</td>".
                                                        "<td>".$row['password']."</td>".
                                                        "<td>".$row['address']."</td>".
                                                        "<td>".$row['description']."</td>".
                                                        "<td>".$status."</td>";
                                    
                                                                
                                                        echo "<td><a href='edit_maneger.php?id=".$row['id']."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                        class='icon-eye'></i></a></td>".
                                                        "<td>
                                                            <form class ='c_form' action='delete_manager.php' method='POST'>
                                                            <input type='hidden'  value='".$row['id']."' name='id'>
                                                                <button type='button' class='btn btn-danger delete_category' id='delete-btn'>
                                                                    DELETE
                                                                </button>
                                                            </form>
                                                        </td>";
    
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
                                                $query2="SELECT count(id) as row_no FROM managers";
                                                $result2=mysqli_query($c,$query2);
                                                $row2=mysqli_fetch_assoc($result2);
                                                $page_count=ceil($row2['row_no']/$limit);
                                                echo "<ul class ='pagination'>";
                                                for($i=1;$i<=$page_count;$i++){
                                                    echo "<li class='page-itme'> <a class='page-link' href='show_Managers.php?page=".$i."'>$i</a></li>";
                                                }
                                            ?> 
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

<script>
    $('.delete_category').click(function(){
        var result=confirm('Are You !!!!');
        if(result){
            $('.c_form').submit();
        }
    })
</script>
</body>

</html>