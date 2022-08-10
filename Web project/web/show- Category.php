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
                                <h4 class="card-title">All Categories </h4>
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
                                    <table style="width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th> Category Details</th>
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
                                           $query="SELECT*FROM Categories  ORDER BY ID ASC
                                           limit $limit offset $offset ";
                                            $result=mysqli_query($c,$query);
                                            if(mysqli_num_rows($result) >0){
                                                while($row=mysqli_fetch_assoc($result)){
                                                
                                                    echo "<tr>". 
                                                          "<td>".$row['id']."</td>".                                                      
                                                          "<td>".$row['name']."</td>".
                                                          "<td>".$row['description']."</td>".
                                                          "<td><a href='edit_category.php?id=".$row['id']."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                          class='icon-eye'></i></a></td>".
                                                          "<td>
                                                          <form class ='c_form' action='delete_category.php' method='POST'>
                                                              <input type='hidden'  value='".$row['id']."' name='ide'>
                                                                  <button type='button' class='btn btn-danger delete_category' id='delete-btn'>
                                                                      DELETE
                                                                  </button>
                                                              </form>
                                                          </td>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                          </table>
                                       <div class="justify-content-center d-flex">
                                         <div class="row">
                                         <div class="col-12">
                                             <?php
                                              $query="SELECT count(id) as row_no FROM Categories";
                                              $result=mysqli_query($c,$query);
                                              $row=mysqli_fetch_assoc($result);
                                              $page_count=ceil($row['row_no']/$limit);
                                              echo "<ul class ='pagination'>";
                                               for($i=1;$i<=$page_count;$i++){
                                                   echo "<li class='page-itme'> <a class='page-link' href='show- Category.php?page=".$i."'>$i</a></li>";
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