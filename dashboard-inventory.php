<?php
include ('dbconnection.php'); 

 $product = $conn->query("SELECT ProductName FROM  product"); 
  $all_product = $conn->query("SELECT ProductName FROM  product"); 
$product_deli = $conn->query("SELECT * FROM  product"); 
$product_sold = $conn->query("SELECT * FROM  product"); 
$checkbox_product = $conn->query("SELECT ProductName FROM  product"); 
$table_data = $conn->query("SELECT p.ProductName as prod, (SELECT SUM(b.Quantity) FROM beginning b WHERE b.ProductName = p.ProductName) beg, (SELECT SUM(d.Quantity) FROM delivery d WHERE d.ProductName = p.ProductName) deli, (SELECT SUM(s.Quantity) FROM sold s WHERE s.ProductName = p.ProductName   ) solds FROM product p GROUP BY ProductName"); 
// $kit0= mysqli_fetch_assoc($kit_query) ;
$janfeb_new = 0; 
$march_new = 0;
$march_new_700 = 0;
 

$bet_jan_feb  = $conn->query( 'SELECT ProductName, SUM(Quantity)  as janfeb_kit FROM sold WHERE ProductName IN ("KIT", "KIT 700") AND DateSpecific BETWEEN "01/01/2018" and "02/28/2018" GROUP BY ProductName ' ); 
while ( $kit_jan_feb = mysqli_fetch_assoc($bet_jan_feb) ) {
	if( $kit_jan_feb['ProductName'] == 'KIT'  ){
		$janfeb_new  = $kit_jan_feb['janfeb_kit'];
	}
}
$above_feb  = $conn->query( 'SELECT  ProductName, SUM(Quantity)  as march_kit FROM sold WHERE ProductName IN ("KIT", "KIT 700") AND DateSpecific >= "03/01/2018" GROUP BY ProductName  ' ); 
while ( $kit_march = mysqli_fetch_assoc($above_feb) ) {
	if( $kit_march['ProductName'] == 'KIT'  ){
		$march_new  = $kit_march['march_kit'];
	}
	if( $kit_march['ProductName'] == 'KIT 700' ){ 

		$march_new_700  = ( $kit_march['march_kit'] != 0 or isset($kit_march['march_kit']) ) ? $kit_march['march_kit'] : 0; 
	}

} 
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
		        <li class="active"><a href="dashboard-inventory.php"><i class="fa fa-home"></i> <span>Admin Dashboard</span></a></li> 
		        <li class=""><a href="beginning-history.php"><i class="fa fa-home"></i> <span>Beginning History</span></a></li> 
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
	        	<div class="col-lg-12"> 
		 			<div class="box">
			            <div class="box-header">
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          	<div class="small-box bg-blue box1" id="add_prod_btn">
						            <div class="inner">
						              <h3>Product</h3> 
						              <p>Add Products</p>
						            </div>
						            <div class="icon">
						              <i class="fa fa-shopping-bag"></i>
						            </div>
						            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          	</div>
					        </div>
			        <!-- ./col -->
			        		<div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          	<div class="small-box bg-blue box2" id="add_beg_btn">
						            <div class="inner">
						              <h3>Beginning</h3> 
						              <p>Add Beginning</p>
						            </div>
						            <div class="icon">
						              <i class="fa fa-hourglass-start"></i>
						            </div>
						            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          	</div>
					        </div> 
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          	<div class="small-box bg-blue box3" id="add_deli_btn">
						            <div class="inner">
						              <h3>Delivery</h3> 
						              <p>Add Delivery</p>
						            </div>
						            <div class="icon">
						              <i class="fa fa-truck"></i>
						            </div>
						            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          	</div>
					        </div> 
					        <div class="col-lg-3 col-xs-6">
					          <!-- small box -->
					          	<div class="small-box bg-blue box4" id="add_sold_btn">
						            <div class="inner">
						              <h3>Sold</h3> 
						              <p>Add Sold</p>
						            </div>
						            <div class="icon">
						              <i class="fa fa-shopping-cart"></i>
						            </div>
						            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					          	</div>
					        </div> 
			 		 	</div>
			 		</div>
		 		</div>
	            <div class="col-lg-12  ">
		            <div class="box">
			            <div class="box-header">
				            <div class="box-body">
					            <div class="panel-body"> 
					                <table id="example1" class="table table-bordered table-striped">

						                <thead>
							                <tr>
							                    <th>Product</th>
							                    <th>Beginning</th>
							                    <th>Delivery</th>
							                    <th>Sold</th>
							                    <th>Total</th>
							                    <!-- <th>Action</th> -->
							                </tr>
						                </thead>
									 	<tbody>
										 	<?php   
										 	while($vals_data = mysqli_fetch_assoc($table_data) ){  
										 		 
										 	  	 
										 	  	if($vals_data['prod'] =='Rub'){ 
										 	  		$sold  = ($march_new_700 * 1) + ($janfeb_new * 8) + ($march_new * 10) + $vals_data['solds'] ;  
										 	  	}elseif($vals_data['prod'] =='Rub for Kids'){
										 	  		$sold  = ($march_new_700 * 1) + ($janfeb_new *  2) + ($march_new *  2) + $vals_data['solds'] ;	 

										 	  	}elseif($vals_data['prod'] =='L/ Gel'){
										 	  		$sold  = ($march_new_700 * 1) + $vals_data['solds'] ;	 

										 	  	}elseif($vals_data['prod'] =='L/ Oil'){
										 	  		$sold  = ($march_new_700 * 1) + $vals_data['solds'] ;	 

										 	  	}elseif($vals_data['prod'] =='T/Oil'){
										 	  		$sold  = ($march_new_700 * 1) + $vals_data['solds'] ;	 

										 	  	}elseif($vals_data['prod'] =='Natural Soap'){
										 	  		$sold  = ($march_new_700 * 1) + $vals_data['solds'] ;	 

										 	  	}else{
										 	  		$sold =$vals_data['solds']; 
										 	  	} 
										 	  	$total = $vals_data['beg'] + $vals_data['deli'] - $sold;
										 		?> 
										 		<?php if( $vals_data['prod'] != 'KIT' && $vals_data['prod'] != 'KIT 700' ){ ?>
										 	<tr>
										 		
										 		<td><?php echo $vals_data['prod'] ?></td>
										 		<td><?php echo $vals_data['beg'] ?></td>
										 		<td><?php echo $vals_data['deli'] ?></td>
										 		<td><?php echo $sold ;  ?></td>
										 		<td><?php echo $total ?></td>
										 		<!-- <td class="text-center"><button type="button" class="btn btn-primary btn_edit"  > <span class="glyphicon glyphicon-edit"></span> Edit </button></td> -->
										 	
										 	</tr> 
										 		<?php } ?>
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

 
  <!-- /.content-wrapper -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content"> 
          	<div class="modal-header">
                  <h4 class="modal-title">Add Product</h4>
                  <small class="font-bold"></small>
          	</div> 
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label>Product Name:</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="save_addprod" id="save_addprod">Submit</button> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          	</div>
      	</div>
  	</div>
</div>  
<div class="modal fade" id="add_beginning" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
	    <div class="modal-content"> 
          	<div class="modal-header">
              	<h4 class="modal-title">Add Beginning</h4>
              	<small class="font-bold"></small>
          	</div> 
	        <div class="modal-body">
	            <div class="row">
	              	<div class="col-md-12 ">
		                <!-- <label>Select Product:</label> -->
		                <select class="form-control" name="prod_select" id="prod_select">
		                	<option>SELECT PRODUCT</option>
		                  <?php while($row = mysqli_fetch_assoc($product)) {
		                  	if( $row['ProductName'] !== 'KIT' && $row['ProductName'] !== 'KIT 700' ){ 
		                   ?>	 
		                  		<option value="<?php echo $row['ProductName']  ?>" data-id="<?php echo $row['Id'] ?>"><?php echo $row['ProductName']  ?></option>
		                  <?php } 
		              		}
		                  ?>
		                </select>
	                	 
		                <input type="hidden" name="prep1" id="prep1" value="0">
		                <label>Quantity:</label>
		                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
	                	<label>Date Beginning: </label>
	                    <input type='text' class="form-control datetimepicker1" id="datetimepicker1" />  
	              	</div>
	              	 
	              	
			         
            	</div> 
	        </div>
	        <div class="modal-footer">
	            <button type="submit" class="btn btn-primary" name="save_addbeg" id="save_addbeg">Submit</button> 
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          	</div>
      	</div>
  	</div>
</div>   
<div class="modal fade" id="add_delivery" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
		<div class="modal-content">
	        <div class="color-line"></div>
	          <div class="modal-header">
	              <h4 class="modal-title">Add Delivery</h4>
	              <small class="font-bold"></small>
	          </div> 
	        <div class="modal-body">
	            <div class="row">
	              <div class="col-md-12"> 
	                <label>Select Product:</label> 
	                <select class="form-control" name="prod_deli_select" id="prod_deli_select">
	                	<option>SELECT PRODUCT</option>
	                  <?php while($row_deli = mysqli_fetch_assoc($product_deli)) { 
	                  	if( $row_deli['ProductName'] !== 'KIT' && $row_deli['ProductName'] !== 'KIT 700' ){ 
	                  	?>

	                    <option value="<?php echo $row_deli['ProductName']; ?>" data-id="<?php echo $row['Id'] ?>"><?php echo $row_deli['ProductName']; ?></option>
	                  <?php }
	                  } ?>  
	                </select> 
	                <input type="hidden" name="prep2" id="prep2" value="0">
	                <label>Quantity:</label>
	                <input type="text" class="form-control" name="quantity_deli" id="quantity_deli" placeholder="Quantity">
	                <label>Date Delivery: </label>
                    <input type='text' class="form-control datetimepicker1" id="datetimepicker2" />  
	              </div>
	            </div> 
	        </div>
	        <div class="modal-footer">
	            <button type="submit" class="btn btn-primary" name="save_adddeli" id="save_adddeli">Submit</button> 
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          	</div>
      	</div>
  </div>
</div>
<div class="modal fade" id="add_sold" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="color-line"></div>
          <div class="modal-header">
              <h4 class="modal-title">Add Sold</h4>
              <small class="font-bold"></small>
          </div> 
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                 
                <label>Product:</label><p id="prepend3" value="0"></p>
                     <select class="form-control" name="prod_sold_select" id="prod_sold_select">
                     	<option value="">SELECT PRODUCT</option>
	                  <?php while($prods = mysqli_fetch_assoc($all_product)) { ?>
	                    <option value="<?php echo $prods['ProductName']; ?>" data-id="<?php echo $row['Id'] ?>"><?php echo $prods['ProductName']; ?></option>
	                  <?php } ?>
	              </select>
              <!--   <input type="hidden" name="prep3" id="prep3"  value="0">
                <input type="text" class="form-control" name="prod_sold_select" id="prod_sold_select" placeholder="Product Name"> -->
               <!-- new added -->
                <div id="kit_append"> 
                	
                	<br>
	                <select class="form-control normal_o_pick" name="normal_o_pick"  >
	                	<option>SELECT NORMAL OR PICK PRODUCT</option>
	                	<option value="normal">Normal</option>
	                	<option value="pick">PICK</option>
	                </select> 	
	                <div id="normal">
	                	<label>Quantity:</label>
	                	<input type="text" class="form-control" name="quantity_kit" id="quantity_kit" placeholder="KIT Quantity">	
	                </div>
	                <div id="pick">
	                	<label>Quantity:</label>
                		<input type="text" class="form-control" name="quantity_kit_pick" id="quantity_kit_pick" placeholder="KIT Quantity">	
	                	<?php while($checkbox = mysqli_fetch_assoc($checkbox_product)) { ?> 
	                	<?php if( $checkbox['ProductName'] != 'KIT' &&  $checkbox['ProductName'] != 'KIT 700' ){  ?>
	                     <div class="checkbox">
					  		<label><input type="checkbox" class="select_check" value="<?php echo $checkbox['ProductName']; ?>"><?php echo $checkbox['ProductName']; ?></label>
						</div>
						<?php } ?>
	                  <?php } ?> 
						
						 
	                </div>
                	 
                </div>
                <!-- !new added -->
                <div id="not_kit_append">
                	<label>Srp Quantity:</label>
	                <input type="text" class="form-control" name="quantity_srp" id="quantity_srp" placeholder="Srp Quantity">
	                <label>Dst Quantity:</label>
	                <input type="text" class="form-control" name="quantity_dst" id="quantity_dst" placeholder="Dst Quantity">
	                <label>Free Quantity:</label>
	                <input type="text" class="form-control" name="free_quantity" id="free_quantity" placeholder="Free Quantity">
	            </div>    
	                <label>Date Sold: </label>
	                <input type='text' class="form-control datetimepicker1" id="datetimepicker3" />  
                
                
              </div>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="save_sold" id="save_sold">Submit</button> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
   jQuery(document).ready(function(){
   		$('#pick').hide();
   		$(document).on('change','.normal_o_pick',function(){
   			var val = $(this).val(); 
   			if( val == "normal" ){
   				$('#normal').show();
   				$('#pick').hide();
   			}else{
   				$('#normal').hide();
   				$('#pick').show();
   			}
   		});
   		// $(document).on('change','.select_check',function(){
   			
   		// });
   		

   		$(document).on('change','#prod_select',function(){ 

	   		var product = $(this).val();
	   		// alert(product);
	   		$.ajax({
	   			url: 'function.php',
		        type: 'POST',
		        data:{
		          action:'check_product',
		          product:product, 
		        },
		        success:function(data){
		        	console.log(data);
		        	if(data=="true"){
		        		$('#prepend1').html('Checked'); 
		        		$('#prep1').val('1'); 
		        		$('#prepend1').css("color","green");
		        		$('#prod_select').css({"border-color": "green","border-style":"solid" ,"border-width":"2px" });
		        	}else{
		        		$('#prepend1').html('No Product Registered'); 
		        		$('#prep1').val('0'); 
		        		$('#prepend1').css("color","red");
		        		$('#prod_select').css({"border-color": "red","border-style":"solid","border-width":"2px" });
		        	}
		        }
	   		});	
   		});
   		$(document).on('change','#prod_deli_select',function(){ 
	   		var product = $(this).val();
	   		$.ajax({
	   			url: 'function.php',
		        type: 'POST',
		        data:{
		          action:'check_product',
		          product:product, 
		        },
		        success:function(data){
		        	if(data=="true"){
		        		$('#prepend2').html('Checked'); 
		        		$('#prepend2').css("color","green");
		        		$('#prep2').val('1'); 
		        		$('#prod_deli_select').css({"border-color": "green","border-style":"solid" ,"border-width":"2px" });
		        	}else{
		        		$('#prepend2').html('No Product Registered'); 
		        		$('#prepend2').css("color","red");
		        		$('#prep2').val('0'); 
		        		$('#prod_deli_select').css({"border-color": "red","border-style":"solid","border-width":"2px" });
		        	}
		        }
	   		});	
   		});
   		$('#kit_append').hide(); 
   		$(document).on('change','#prod_sold_select',function(){ 
	   		var product = $(this).val();
	   		if( product == 'KIT' || product == 'kit' || product == 'KIT 700' || product == 'kit 700' ){
	   			if( product == 'KIT' || product == 'kit' ){
	   				$('.normal_o_pick').hide(); 
	   				$('#not_kit_append').hide();  
	   			}else{
	   				$('#kit_append').show(); 
	   				$('.normal_o_pick').show(); 
	   				$('#not_kit_append').hide(); 	
	   			}
	   			$('#kit_append').show(); 
	   			$('#not_kit_append').hide(); 
	   		}else{
	   			$('#kit_append').hide(); 
	   			$('#not_kit_append').show(); 
	   		}
	   		$.ajax({
	   			url: 'function.php',
		        type: 'POST',
		        data:{
		          action:'check_product',
		          product:product, 
		        },
		        success:function(data){ 
		        	console.log(data); 
		        	if(data=="true"){
		        		$('#prepend3').html('Checked'); 
		        		$('#prepend3').css("color","green");
		        		$('#prep3').val('1'); 
		        		$('#prod_sold_select').css({"border-color": "green","border-style":"solid" ,"border-width":"2px" });
		        	}
		        	if(data=="false"){
		        		$('#prepend3').html('No Product Registered'); 
		        		$('#prepend3').css("color","red");
		        		$('#prep3').val('0'); 
		        		$('#prod_sold_select').css({"border-color": "red","border-style":"solid","border-width":"2px" });
		        	}
		        }
	   		});	
   		});

   		$(document).on('click','#add_prod_btn',function(){
	      	$('#add_product').modal('show');
	    });
	    $(document).on('click','#add_beg_btn',function(){
	      	$('#add_beginning').modal('show');
	    });
	    $(document).on('click','#add_deli_btn',function(){
	      	$('#add_delivery').modal('show');
	    }); 
	    $(document).on('click','#add_sold_btn',function(){
	      	$('#add_sold').modal('show');
	    });
	    $(document).on('click','#save_addprod',function(){ 
	      	var prod = $('#product_name').val(); 
	      	$.ajax({
		        url: 'function.php',
		        type: 'POST',
		        data:{
		          action:'add_product_func',
		          prod:prod, 
		        },
		        success:function(data){
		          if(data == "success"){
		           
		            swal({
						title: "Success!",
						text: 'New product has been added',
						type: "success"
						}).then(function() {
						// Redirect the user
						window.location.href = "dashboard-inventory.php"; 
					});
		            $('#add_product').modal('hide');
		          }else{
		            swal("Error", "Product is already exist", "warning");
		          }
		        }
	      	});
	    });
	    $(document).on('click','#save_addbeg',function(){ 

	      	var prod_select = $('#prod_select').val();
	      	var quantity = $('#quantity').val();
	      	var id = $('#prod_select').find(':selected').data('id');
	      	var date = $('#datetimepicker1').val();
	      	if(date != '' && $('#prep1').val() == 1){ 
		      	if($.isNumeric(quantity)){
		      		 $.ajax({
				        url: 'function.php',
				        type: 'POST',
				        data:{
				          action: 'add_beginning_func',
				          prod_select:prod_select,
				          date:date, 
				          quantity:quantity, 
				        },
			        success:function(data){
			          	if(data == "success"){
			            	swal({
								title: "Success!",
								text: 'Beginning product has been saved',
								type: "success"
								}).then(function() {
								// Redirect the user
								window.location.href = "dashboard-inventory.php"; 
							});
			            $('#add_beginning').modal('hide');
			          	}else{
			            	swal("Error", "Something wrong", "warning");
			          		}
			        	}
			      	});
		      	}else{
		      		swal("Error", "Please input numbers only", "warning");
		      	}
	      	}else{
	      		swal("Error", "Please fill Date before submit or No Product Registered", "warning");
	      	}
	      	
	      	
	      	 
	      	
	    });
	    $(document).on('click','#save_adddeli',function(){ 
	      	var prod_select = $('#prod_deli_select').val(); 
	      	var quantity = $('#quantity_deli').val();   
	      	var id = $('#prod_deli_select').find(':selected').data('id');
	      	var date = $('#datetimepicker2').val();
	      	if(date != '' && $('#prep2').val() == 1){ 
		      	if($.isNumeric(quantity)){
			      	$.ajax({
				        url: 'function.php',
				        type: 'POST',
				        data:{
				          action: 'add_delivery_func',
				          prod_select:prod_select,
				          date:date, 
				          quantity:quantity, 
				        },
			        success:function(data){
			          	if(data == "success"){
			            	swal({
								title: "Success!",
								text: 'Delivery product has been saved',
								type: "success"
								}).then(function() {
								// Redirect the user
								window.location.href = "dashboard-inventory.php"; 
							});
			            $('#add_delivery').modal('hide');
			          	}else{
			            	swal("Error", "Something wrong", "warning");
			          	}
			        	}
			      	});
			      }else{
			      	swal("Error", "Please input numbers only", "warning");
			      }
		  	}else{
			  	swal("Error", "Please fill Date before submit or No Product Registered", "warning");
		  	}	
	    });
	    
	    $(document).on('click','.select_check',function(){ 
        	if($('.select_check').filter(':checked').length == 6)
		        $('.select_check:not(:checked)').attr('disabled', 'disabled');
		    else
		        $('.select_check').removeAttr('disabled'); 
	    });

	    $(document).on('click','#save_sold',function(){  
	      	var prod_select = $('#prod_sold_select').val(); 
	      	if($('#quantity_srp').val() != ''){
	      		var quantity_srp = $('#quantity_srp').val();   
	      	}else{
	      		var quantity_srp = 0;
	      	}
	      	if($('#quantity_dst').val() != ''){
	      		var quantity_dst = $('#quantity_dst').val();   
	      	}else{
	      		var quantity_dst = 0;
	      	}
	      	if($('#free_quantity').val() != ''){
	      		var free_quantity = $('#free_quantity').val();   
	      	}else{
	      		var free_quantity = 0;
	      	} 
	      	if($('#quantity_kit').val() != ''){
	      		var quantity_kit = $('#quantity_kit').val();   
	      	}else{
	      		var quantity_kit = 0;
	      	} 
	      	//new added
	      	var checkbox = [];
	        $(':checkbox:checked').each(function(i){
	          checkbox[i] = $(this).val();
	        }); 
	        var newdatacheckboxes = JSON.stringify(checkbox); 
	        if($('#quantity_kit_pick').val() != ''){
	      		var quantity_kit_pick = $('#quantity_kit_pick').val();   
	      	}else{
	      		var quantity_kit_pick = 0;
	      	} 
	      	var id = $('#prod_sold_select').find(':selected').data('id');
	      	var date = $('#datetimepicker3').val(); 
	      	if(date != '' && prod_select != '' ){ 
		      	if($.isNumeric(quantity_srp) || $.isNumeric(quantity_dst) || $.isNumeric(free_quantity)){
			      	$.ajax({
				        url: 'function.php',
				        type: 'POST',
				        data:{
				          action: 'add_sold_func',
				          prod_select:prod_select, 
				          quantity_srp:quantity_srp,
				          quantity_kit: quantity_kit,
				          date:date, 
				          quantity_dst:quantity_dst, 
				          free_quantity:free_quantity,
				          //new added
				          checkbox : checkbox,
				          quantity_kit_pick : quantity_kit_pick
				        },
			        success:function(data){
			          	if(data == "success"){
			            	swal({
								title: "Success!",
								text: 'Sold product has been added',
								type: "success"
								}).then(function() {
								// Redirect the user
								window.location.href = "dashboard-inventory.php"; 
							});
			            $('#add_sold').modal('hide');
			          	}  
			        	}
			      	});
		      	 }else{
			      	swal("Error", "Please input numbers only", "warning");
			      }
			}else{
				swal("Error", "Please fill Date before submit or No Product Registered", "warning");
			}
	    });

   });
</script>



  <!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
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
$('.datetimepicker1').datepicker();

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
    
  });
</script>

</body>

</html>
