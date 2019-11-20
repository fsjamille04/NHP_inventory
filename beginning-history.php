<?php
include ('dbconnection.php');

    //   session_start();
    // $id = $_SESSION['pdid2'];
    // if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
    //    header("location: login1.php");
    //   exit();
    // }


$product = $conn->query("SELECT * FROM  product"); 
$product_deli = $conn->query("SELECT * FROM  product"); 
$product_sold = $conn->query("SELECT * FROM  product"); 

$table_data = $conn->query("SELECT * FROM beginning  ORDER BY DateSpecific DESC ");
 
?>




<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory | Natural Herbs Pharm</title>
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
  <!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

</head>
<style type="text/css">
	.box1{
    	background-color: #9B59B6 !important; 
  	}
  	.box2{
    	background-color: #2980B9 !important; 
  	}
  	.box3{
    	background-color: #1ABC9C !important; 
  	}
  	.box4{
    	background-color: #27AE60 !important; 
  	}
  	.form-control{
	    border-radius: 4px !important;
  	}
  	#example1_filter{
  		float: right;
  	}
</style>
<style type="text/css">
.glyphicon.spinning {
    animation: spin 1s infinite linear;
    -webkit-animation: spin2 1s infinite linear;
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg); }
    to { transform: scale(1) rotate(360deg); }
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
}
</style>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">  
  		<!-- Main Header -->
  		<header class="main-header"> 
		    <!-- Logo -->
		    <a href="index.html" class="logo">
		      <!-- mini logo for sidebar mini 50x50 pixels -->
		      <span class="logo-mini">Inventory</span>
		      <!-- logo for regular state and mobile devices -->
		      <span class="logo-lg">Inventory</span>
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
		          
		            
		          <!-- User Account Menu -->
		          <li class="dropdown user user-menu">
		            <!-- Menu Toggle Button -->
		           
		            <ul class="dropdown-menu">
		              <!-- The user image in the menu -->
		              
		              <!-- Menu Body -->
		              
		              <!-- Menu Footer-->
		              <li class="user-footer">
		                <div class="pull-left">
		                  <a href="dashboard-inventory.php" class="btn btn-default btn-flat">Dashboard</a>
		                </div>
		                <div class="pull-right">
		                  <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
		                </div>
		              </li>
		            </ul>
		          </li>
		          <!-- Control Sidebar Toggle Button -->
		          <li>
		            <!-- <a href="login.php"><i class="fa fa-gears"></i></a> -->
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
	          		<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	        	</div>
		        <div class="pull-left info">
		          	<p>Admin Personel</p>
		         	 <!-- Status -->
		          	<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		        </div>
	      	</div> 
     
	      	<ul class="sidebar-menu">
		        <li class="header">HEADER</li>
		        <!-- Optionally, you can add icons to the links -->
		        <li class=""><a href="dashboard-inventory.php"><i class="fa fa-home"></i> <span>Admin Dashboard</span></a></li>
		        <li class="active"><a href="beginning-history.php"><i class="fa fa-home"></i> <span>Beginning History</span></a></li> 
		        <li class=""><a href="delivery-history.php"><i class="fa fa-home"></i> <span>Delivery History</span></a></li>  
		        <li class=""><a href="sold-history.php"><i class="fa fa-home"></i> <span>Sold History</span></a></li>  
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
		        INVENTORY
		        <small></small>
	      	</h1> 
	    </section> 
    <!-- Main content --> 
    	<section class="content">  
	        <div class="row">
	        	 
	            <div class="col-lg-12  ">
		            <div class="box">
			            <div class="box-header">
				            <div class="box-body">
					            <div class="panel-body"> 
					                <table id="example1" class="table table-bordered table-striped">

						                <thead>
							                <tr>
							                    <th>Product</th>
							                    <th>Quantity</th>
							                    <th>Date</th>
							                    <th class="text-center">Action</th>
							                    
							                    <!-- <th>Action</th> -->
							                </tr>
						                </thead>
									 	<tbody>
										 	<?php  
										 	while( $vals_data = mysqli_fetch_assoc( $table_data ) ){ ?>
										 	<tr>
										 		<td><?php echo $vals_data['ProductName'] ?></td>
										 		<td><?php echo $vals_data['Quantity'] ?></td>
										 		<td><?php echo $vals_data['DateSpecific'] ?></td>  
										 		<td class="text-center"><button type="button" class="btn btn-primary btn_edit" value="<?php echo $vals_data['Id'] ?>" data-toggle="modal" data-target="#edit_modal" > <span class="glyphicon glyphicon-edit" ></span> Edit </button> | <button type="button" class="btn btn-danger btn_del "  data-amount = "<?php echo  $vals_data['Quantity'] ?>" value="<?php echo $vals_data['Id'] ?>"  data-prod = "<?php echo  $vals_data['ProductName']  ?>" > <span class="glyphicon glyphicon-trash" ></span> Delete </button></td>
										 	</tr>
										 	<?php } ?>
			                         	</tbody>   
					                             
					                  
				                    </table>
					                  

					 
				                </div>       
				            </div>
			        	</div>
		          	</div>
				</div>
			</div> 
		</section> 
	</div> 

 <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content"> 
          	<div class="modal-header">
                  <h4 class="modal-title">Edit</h4>
                  <small class="font-bold"></small>
          	</div> 
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 append_edit_body"> 
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
            	<input type="hidden" value="beginning" id="db_table">
                <button type="submit" class="btn btn-primary"  name="save_edit" id="save_edit"> <i id="loading"></i>Submit</button> 
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
          	</div>
      	</div>
  	</div>
</div>  
  
  <!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Designed by <a href="https://www.facebook.com/myself.paul"> Jamille B. Tinaco</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">NaturalHerbsPharm Corp</a>.</strong> All rights reserved.
</footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> 
<script src="js/swal_javascript.js"></script>
<script>
  $(function () {


         $('#example1').dataTable( {

            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });


   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
 


<script>
jQuery(document).ready(function($){	 

	var admin_url = 'function.php';
	$(document).on("click",".btn_edit",function(){
		var id = $(this).val();
		var tbl = $('#db_table').val();
		$.ajax({
			url: admin_url,
			type: 'POST', 
			data: {
				id: id,
				tbl: tbl,
				action: 'edit_update_modal'
			},
			success: function(data){
				
				var html = '';
				$('.append_edit_body').html('');
				$.each(JSON.parse(data),function(index,val){
					console.log(val); 
					html = '<label>Product:</label></p>' +
	                '<input type="text" class="form-control" name="prod_select" id="prod_select" placeholder="Product Name" value ="'+val.ProductName+'">'+ 
	                '<label>Quantity:</label>' +
	                '<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value ="'+val.Quantity+'">' +
                	'<label>Date :  </label><label style="color: red;"> Note: month / day / year </label>' +
                    '<input type="text" class="form-control datetimepicker1" id="datetimepicker1"  value ="'+val.DateSpecific+'" > ';
                    $('#save_edit').val(val.Id);
				});
				$('.append_edit_body').prepend(html);
			}
		});
	});

	$(document).on("click","#save_edit",function(){ 
		$(this).html('<span class="glyphicon glyphicon-refresh spinning"></span> Updating... ');
		var id = $(this).val(); 
		var tbl = $('#db_table').val();
		var prod = $('#prod_select').val();
		var qty = $('#quantity').val();
		var date = $('#datetimepicker1').val();
		$.ajax({
			url : admin_url,
			type : 'post',
			data: {
				id : id ,
				tbl:tbl,
				prod : prod,
				qty : qty,
				date : date,
				action : 'save_edit'
			},
			success: function(data){
				console.log(data);
				if(data == 'true'){
					swal({
						title: "Success!",
						text: 'Success Update',
						type: "success"
						}).then(function() {
						// Redirect the user
						window.location.href = "beginning-history.php"; 
					});
				}else{
					swal({
						title: "Error",
						text: 'Error!',
						type: "warning"
						}).then(function() {
						// Redirect the user
						window.location.href = "beginning-history.php"; 
					});
				}
			 	
			}
		});
	});

	$(document).on("click",".btn_del",function(){
		var id = $(this).val(); 
		var tbl = $('#db_table').val();
		var amount = $(this).data('amount'); 
		var prod = $(this).data('prod');  
		var answer = confirm("Are you sure you want to delete?")
		if (answer) {
		  	$.ajax({
				url : admin_url,
				type : 'post',
				data: {
					id : id ,
					tbl:tbl, 
					amount:amount,
					prod:prod,
					action : 'delete_history'
				},
				success: function(data){ 
					if(data == 'true'){
						swal({
							title: "Success!",
							text: 'Success Delete',
							type: "success"
							}).then(function() {
							// Redirect the user
							window.location.href = "beginning-history.php"; 
						});
					}else{
						swal({
							title: "Error",
							text: 'Error!',
							type: "warning"
							}).then(function() {
							// Redirect the user
							window.location.href = "beginning-history.php"; 
						});
					}
				 	
				}
			}); 
		}
 
	});

});
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
	$('.datetimepicker2').datepicker();
  	$(function () {
	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
    });
    $('#datetimepicker1').datepicker();
  });
</script>

</body>

</html>
