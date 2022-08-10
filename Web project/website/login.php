<?php
include_once '../web/Db.php';
$errors=[];
$success=false;

if($_SERVER['REQUEST_METHOD']== "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)){
        $errors['email']="email is Requird plase fill it";
     }
     if (empty($password)){
       $errors['password']="password is Requird plase fill it";
     }

     if(count($errors)>0){
        $errors['general_error']="plase fix all error";

    }else{
        $query2="SELECT*FROM managers where email ='$email' AND password= '$password'";
        $sss=mysqli_query($c,$query2);
        //$shop2=mysqli_fetch_assoc($sss);
        if(mysqli_num_rows($sss)>0){
            session_start();
            $_SESSION['is_login']=true;
            $errors=[];
            $success=true;
            header('location:index.php');

        }else{
            
            $errors['general_error']=mysqli_error($c);
       }
    }
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN
        
    </title>
</head>
<body>
    <div class="contanier">
       <div class="title">
        <h1>LOGIN</h1>
        <P>WE MISS YOU!
        
        </P>
       </div>
       <div class="ifram">
       <form  method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <p class="NAME">YOUR EMAIL</p>
            <input  type="email" placeholder="EMAIL" autofocus name='email' reguired>
            <div class="clear"></div>
            
            <p class="YOUR">YOUR PASSWORD</p>
            <input class="t" type="password" placeholder="PASSWORD" name='password' reguired >
            <div class="clear"></div>
            
            
            <div class="clear"></div>
            <button class="button1  ">LOGIN</button>
            <div class="clear"></div>
           
           </form>
           <br>
        
       </div>
       

       </div>
    </div>
    <style>
        body{
            
            height: 88vh;
            margin-bottom: 50px;
                    }
        *{
            box-sizing: border-box;
        }
        .contanier{
            font-family: sans-serif;
            margin-top: 0px;
            margin-bottom: 30px;
            position: absolute;
            left: 50%;
            top: 50%;
            text-align: center;
            transform: translate(-50%, -50%);
        }
        p{
            margin-bottom: 10px;
        }
        .clear{
            clear: both;
        }
        .title{
            margin-bottom: 75px;
        }
        .title h1 {
            letter-spacing: 5px;
            margin-top: 50px;
            color: white;
        }
        .title h1+p{
            letter-spacing: 3px;
            color:  rgb(156, 148, 148);
        }
        .ifram .NAME{
            position: relative;
            left: -126px;
            color: rgb(156, 148, 148);
        }
        .YOUR{
            position: relative;
            left: -105px;
            color: rgb(156, 148, 148);
        }
        input {
            background-color:#505050f6 ;
            border-style: none;
            height: 50px;
            width: 350px;
            padding: 15px;
            color: white;
            font-size: medium;
        }
        .LINK{
            left: 270px;
            bottom: 185px;
            color:  rgb(156, 148, 148);
            position:absolute;
        }
        a{
            text-decoration: none;
        }
        button{
            border: 1px solid #918e8e;
            background-color:rgb(224, 98, 98);
            color: rgb(0, 0, 0);
            width: 350px;
            height: 50px;
        }
        .button1,.button1 a{
            background-color:rgb(239, 161, 161);
            margin-top: 20px;
            color: black;
            font-size: 15px;
            font-weight: 600;
        }
       
        
        
        .button2,.button2 a{
            background-color:black;
            color: white;
            margin-top: 50px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 4px;
        }
        .button2:hover  a{
            color: black;
            background-color: white;
        }
        .button2:hover{
            background-color:white;
            color: black;
        }
    </style>
</body>
</html>