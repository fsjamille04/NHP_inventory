<?php
include ('dbconnection.php');

    session_start();
  $id = $_SESSION['pdid'];
   if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: login.php");
      exit();
   }


   $sql = "SELECT * FROM member WHERE uid = '$id'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  

      $uname= $row['uname'];
    }
?>



<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Natural Herbs</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <link rel="stylesheet" href="dist/bootstrap-datepicker.min.css">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Add Member</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Add Member</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="login.php" class="dropdown-toggle">
            
              
            </a>
            
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Natures ID</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  Natural Herbs - Member
                  <small>Active Member</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
                </div>
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="login.php"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $uname;  ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="updatenew.php"><i class="fa fa-gears"></i> <span>Edit Account</span></a></li>
        <li><a href="direct.php"><i class="fa fa-link"></i> <span>Direct Recruit</span></a></li>
        <li><a href="indirect.php"><i class="fa fa-group"></i> <span>Unilevel tree</span></a></li>
        <li class="active"><a href="register.php"><i class="fa fa-table"></i> <span>Register</span></a></li>
        <li><a href="login.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register New Members
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="box">
            <div class="box-header">
            <div class="box-body">



         


          <div class="register-box">
  <div class="register-logo">
    <h1>Natural Herbs Pharm</h1>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
     <small>ID # : <?php echo $id; ?></small> <br><br>
    <form method="post">

    <div class="form-group has-feedback">
        <input type="text" placeholder="Sponsor ID" required="" value="" name="ref_id" id="ref_id" class="form-control">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" placeholder="" value="" name="sname" id="sname" class="form-control" readonly>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>



      <div class="form-group has-feedback">
        <input type="text"placeholder="Firstname" value="" id="first_name" class="form-control" name="first_name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text"placeholder="Middlename" value="" id="mid_name" class="form-control" name="mid_name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" value=""placeholder="Lastname" id="last_name" class="form-control" name="last_name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text"placeholder="Address" value="" id="address1" class="form-control" name="address1" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select name="stat"id="stat"class="form-control" style="width: 100%" required="">                       
                                                 <option value="Single">Single</option>
                                                 <option value="Married">Married</option>
                                                <option value="Others">Others</option>
                                               
                                                </select>
      </div>
      <div class="form-group has-feedback">
        <input type="text" value="" id="phone" class="form-control" name="phone" required="" placeholder="Phonenumber">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="" value="" id="" class="form-control" name="" required="" placeholder="Age">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="" value="" id="" class="form-control" name="" required="" placeholder="Birthday">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>




      <div class="form-group has-feedback">
        <input type="text" value="" id="user_name" class="form-control" name="user_name" required="" placeholder="Usernname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" value="" id="ajax_username" class="form-control" name="ajax_username" placeholder="" readonly>
         <span class="fa fa-bell-o form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" value="" id="user_pass" class="form-control" name="user_pass" required="" placeholder="Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" value="" id="user_id" class="form-control" name="user_id" required="" Placeholder="UserID">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" value="" id="security_pin" class="form-control" name="security_pin" required="" Placeholder="Userpin">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" value="" id="code" class="form-control" name="code" required="" Placeholder="" readonly>
        <span class="fa fa-bell-o form-control-feedback"></span>
      </div>


      <!-- <div class="form-group has-feedback">
        <select name="" id="" class="form-control" style="width: 100%" required="">                       
                                                 <option value="Single">Kit A</option>
                                                 <option value="Married">Kit B</option>
                                                <option value="Others">Kit C</option>
                                                <option value="Others">Kit D</option>
                                               
                                                </select>
      </div> -->
      
       <div class="form-group has-feedback">
        <select name="" id="" class="form-control" style="width: 100%" required="">                       
                                                 <option value="Single">Pick Up Place</option>
                                                 <option value="">Tagum City</option>
                                                <option value="">Davao City</option>
                                                <option value="">Panabo City</option>
                                                 <option value="">Mati City</option>
                                                <option value="">Butuan City</option>
                                                <option value="">Kapalong</option> 
                                                <option value="">Sorigao City</option>
                                                <option value="">Nabunturan</option>
                                                <option value="">Manila</option>
                                                <option value="">Caloocan</option>  
                                                <option value="">Baculod</option>
                                                <option value="">Sto.tomas</option>
                                                <option value="">Digos City</option>                                             
                                                </select>
      </div>


      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"name="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
<?php
     if (isset($_POST['register'])) {
                                        $sid = $_POST['ref_id'];                                        
                                        $fn = $_POST['first_name'];
                                        $mn = $_POST['mid_name'];
                                        $ln = $_POST['last_name'];
                                        $ad = $_POST['address1'];       
                                        $uname = $_POST['user_name'];
                                        $uid = $_POST['user_id'];
                                        $upass = $_POST['user_pass'];
                                        $upin = $_POST['security_pin'];
                                        $stat = $_POST['stat'];
                                        $phone = $_POST['phone'];
                                      
                                        $stat = $_POST['stat'];
                                        $phone = $_POST['phone'];
                                         $upin  = $_POST['security_pin'];
                                        
                                       
                                        saveval();

                                    }

        


        function saveval(){
      include("dbconnection.php");   
      global $sid,$fn,$mn,$ln,$ad,$uname,$uid,$upass,$phone,$stat,$package1,$upin;


      if ($result = $conn->query("SELECT * FROM tbpin WHERE id = '".$uid."'")) {
          if($result->num_rows ==0){
             echo "<script>alert('Invalid UserID!');</script>";
       
          }else{
            
            if ($result2 = $conn->query("SELECT * FROM member WHERE uid = '".$uid."'")) {
              if($result2->num_rows ==0){
              
                          if ($result3 = $conn->query("SELECT * FROM member WHERE uname = '".$uname."'")) {
                          if($result3->num_rows ==0){                       
                            
                   
                  

                            if ($result11 = $conn->query("SELECT * FROM tbpin WHERE id = '".$uid."' and pin ='".$upin."'")) {
                            if($result11->num_rows ==0){
                            echo "<script>alert('Invalid Security Code!');</script>";
                            }else{
                            save();
                             $stat='used';
                              $results = $conn->query("UPDATE tbpin SET stat='$stat' where id='$uid'");
                              echo "<script> window.location.href = 'dashboard.php'; </script>";
                            }
                            $result11->close();    
                            }
                   

                
                                                      
                            }else{
                               echo "<script>alert('Username Not Available!');</script>";                             
                               }
            
                          $result3->close();    
                        }

              }else{
              
                echo "<script>alert('UserID Already exist');</script>"; 
                }

              $result2->close();    
          }

          }

        $result->close();    
    }

  mysqli_close($conn);
    }









        function save(){
 
       include("dbconnection.php"); 
       global $sid,$fn,$mn,$ln,$ad,$uname,$uid,$upass,$phone,$stat,$package1;
     
        $hdat = gmdate("Y-m-d");

        $sql = "INSERT IGNORE INTO member (sid,uname,uid,upass,fn,mn,ln,ad,package,phone,stat,dat)
        VALUES ('$sid','$uname','$uid','$upass','$fn','$mn','$ln','$ad','$package1','$phone','$stat','$hdat')";
        if ($conn->query($sql) === TRUE) { 

        $hid=$uid;    
        $x = 1; 
      
        while($x <= 5) {
            $query = "SELECT * FROM member where uid='$hid'";
            $result = mysqli_query ($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                    $hid=$row['sid'];
      }  

            if($hid=='2'){
                              $x=5;
                              }else{
                                          $hdat = gmdate("Y-m-d");
                                          $time=strtotime($hdat);

                                          $month=date("m",$time);
                                          $year=date("Y",$time);
                                 
                                

                                         if($x==2){
                                          $query2 = "SELECT * FROM indirect where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                          $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                          $sumra = $row2['one'] + 25;
                                         $results = $conn->query("UPDATE indirect SET one='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT IGNORE INTO indirect (one,two,three,four,id,dat,level)
                                          VALUES ('25','0','0','0','$hid','$hdat','2')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }
                                       } 

                                         if($x==3){
                                         $query2 = "SELECT * FROM indirect where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                          $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                          $sumra = $row2['two'] + 15;
                                         $results = $conn->query("UPDATE indirect SET two='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          }        
                                          }else{
                                          $sql = "INSERT IGNORE INTO indirect (one,two,three,four,id,dat,level)
                                          VALUES ('0','15','0','0','$hid','$hdat','3')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }
                                      }

                                         if($x==4){
                                           $query2 = "SELECT * FROM indirect where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                          $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                          $sumra = $row2['three'] + 5;
                                         $results = $conn->query("UPDATE indirect SET three='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          }        
                                          }else{
                                          $sql = "INSERT IGNORE INTO indirect (one,two,three,four,id,dat,level)
                                          VALUES ('0','0','5','0','$hid','$hdat','4')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }
                                      }


                                      if($x==5){
                                          $query2 = "SELECT * FROM indirect where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                          $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                          $sumra = $row2['four'] + 5;
                                         $results = $conn->query("UPDATE indirect SET four='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          }        
                                          }else{
                                       
                                          $sql = "INSERT IGNORE INTO indirect (one,two,three,four,id,dat,level)
                                          VALUES ('0','0','0','5','$hid','$hdat','5')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }
                                      }


                                           


                              }
               $x++;                    
           }
           
}
}








                                    ?>

    </form>

    
  <!-- /.form-box -->
</div>        

</div>
</div>
</div>
      </div>

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Designed by <a href="https://www.facebook.com/myself.paul"> Paul A.</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">NaturalHerbsPharm Corp</a>.</strong> All rights reserved.
  </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>



jQuery(document).ready(function($){ 
   $('#user_name').blur(function(){
   var id=$("#user_name").val();


            


         $.ajax({
          type: "POST",
          async: "false",
          url: "checkuname.php",
          data: { text1: id },
          success: function(html) {                   
          var res = html; 


         

          var re = /^[\w ]+$/;

          if(!re.test(id)) {
          //document.getElementById("wrong").innerHTML = "Error: Input contains invalid characters!";
            $('#ajax_username').val('Error: Input contains invalid characters!');
            $("#user_name").val(' '); 
          }else{
         // document.getElementById("wrong").innerHTML = "";
            $('#ajax_username').val(html); 
           }
          }
        });
        
        
     });
   });






function ref(){
          

         var id=$("#ref_id").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "ref.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#sname").val(html); 
                           
                    }
                });   


        
     }


 jQuery(document).ready(function($){
ref();
pid();
pos();
 });



jQuery(document).ready(function($){ 
     $('#ref_id').blur(function(){
          

         var id=$("#ref_id").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "ref.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#sname").val(html); 
                           
                    }
                });   


         });
     });





    function pid(){
     var id=$("#nom_id").val();
     var id2=$("#ref_id").val();
     var id3=$("#sname").val();
        $.ajax({        
          type: "POST",
          async: "false",
          url: "checkpid.php",
          data: { text1: id, text2: id2, text3: id3 },
          success: function(html) {
          if(html)
            { 
              var val= html;
                                  
                $('#sponser_ajaxplace').val(html);        
            }
           else
           {
            return false; 
           }
         }
       });
    }







      // check for User pId
    jQuery(document).ready(function($){
    $('#nom_id').blur(function(){
     var id=$("#nom_id").val();
     var id2=$("#ref_id").val();
     var id3=$("#sname").val();
        $.ajax({        
          type: "POST",
          async: "false",
          url: "checkpid.php",
          data: { text1: id, text2: id2, text3: id3 },
          success: function(html) {
          if(html)
            { 
              var val= html;
                                  
                $('#sponser_ajaxplace').val(html);        
            }
           else
           {
            return false; 
           }
         }
       });
     });
   });




  jQuery(document).ready(function($){
      //setInterval(function() {
        $('#user_id').blur(function(){
       var id = $("#user_id").val();
       var pin = $("#security_pin").val();    
          $.ajax({
          type: "POST",
          async: "false",
          url: "checkcode.php",
          data: { text1: id, text2: pin },
          success: function(html) {
           if(html)
            { 
              var res = html;

              
              $('#code').val(res); 


              //$('#user_id').val(res); 
            }
           else
           {
            return false; 
           }
         }
       });
      });    

    //}, 500);    
   });



        jQuery(document).ready(function($){
      //setInterval(function() {
        $('#security_pin').blur(function(){
       var id = $("#user_id").val();
       var pin = $("#security_pin").val();    
          $.ajax({
          type: "POST",
          async: "false",
          url: "checkcode.php",
          data: { text1: id, text2: pin },
          success: function(html) {
           if(html)
            { 
              var res = html;

              
              $('#code').val(res); 


              //$('#user_id').val(res); 
            }
           else
           {
            return false; 
           }
         }
       });
      });    

    //}, 500);    
   });




    
    // check for User pos
    jQuery(document).ready(function($){
    $('#binary_pos').blur(function(){
     var id=$("#binary_pos").val();



     var id2=$("#nom_id").val();
  
        $.ajax({        
          type: "POST",
          async: "false",
          url: "checkpos.php",
          data: { text1: id, text2: id2 },
          success: function(html) {
          if(html)
            { 
              var val= html;
                                  
                $('#placement').val(val);        
            }
           else
           {
            return false; 
           }
         }
       });
     });
   });



 function pos(){
     var id=$("#binary_pos").val();
     var id2=$("#nom_id").val();
  
        $.ajax({        
          type: "POST",
          async: "false",
          url: "checkpos.php",
          data: { text1: id, text2: id2 },
          success: function(html) {
          if(html)
            { 
              var val= html;
                                  
                $('#placement').val(val);        
            }
           else
           {
            return false; 
           }
         }
       });
    
}





  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


</body>
</html>
