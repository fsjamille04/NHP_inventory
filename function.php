<?php


if(isset($_POST['action'])){
	$function = $_POST['action'];
	$function();
}
 
function add_product_func(){ 
	include("dbconnection.php"); 
	$prod = $_POST['prod']; 
	$prods = $conn->query("SELECT * FROM product WHERE ProductName = '".$prod."'"); 
	if ($prods->num_rows == 0) {
		$save = $conn->query("INSERT INTO product (ProductName ) VALUES ('".$prod."' )"); 
	}

	if(!empty($save)){
		echo "success";
	}else{
		echo "fail";
	}
}
function add_beginning_func(){
	include("dbconnection.php");  
	$prod_select = $_POST['prod_select'];
	$quantity = $_POST['quantity']; 
	$date = $_POST['date'];

	$val= 0;
	 
	$beg_prod = $conn->query("SELECT Id,ProductName,SUM(Beginning) as sum  FROM total WHERE ProductName = '".$prod_select."' "); 
 	while($val=mysqli_fetch_assoc($beg_prod)){
 		$res = $conn->query("INSERT INTO beginning (ProductName, Quantity,DateSpecific) VALUES ('".$prod_select."','".$quantity."','".$date."')"); 
 		if($val['ProductName'] === $prod_select){  
			$quantity += $val['sum'];
	 		$res = $conn->query("UPDATE total SET Beginning =".$quantity." WHERE ProductName ='".$prod_select."'");  
	 	}else{
	 		$res = $conn->query("INSERT INTO total (ProductName, Beginning ) VALUES ('".$prod_select."','".$quantity."' )");   
	 	}  
 	}
	
	if(!empty($res)){
		echo "success";
	}else{
		echo "fail";
	}
}

function add_delivery_func(){
	include("dbconnection.php"); 
	$prod_select = $_POST['prod_select'];
	$quantity = $_POST['quantity']; 
	$date = $_POST['date'];
	$val= 0;
	$del_prod = $conn->query("SELECT Id,ProductName,SUM(Delivery) as sum  FROM total WHERE ProductName = '".$prod_select."' ");    
	$ress = $conn->query("INSERT INTO history (ProductName, Quantity,DateSpecific) VALUES ('".$prod_select."','".$quantity."','".$date."')");  
	while($val=mysqli_fetch_assoc($del_prod)){ 
 		$res = $conn->query("INSERT INTO delivery (ProductName, Quantity,DateSpecific) VALUES ('".$prod_select."','".$quantity."','".$date."')"); 
 		if($val['ProductName'] === $prod_select){  
			$quantity += $val['sum']; 
	 		$res = $conn->query("UPDATE total SET Delivery =".$quantity." WHERE ProductName ='".$prod_select."'");  
	 	}else{  
	 		$res = $conn->query("INSERT INTO total (ProductName, Delivery ) VALUES ('".$prod_select."','".$quantity."' )");   
	 	}  
 	}
	
	if(!empty($res)){
		echo "success";
	}else{
		echo "fail";
	}
	 
}

function add_sold_func(){
	
	include("dbconnection.php");
	$prod_select = $_POST['prod_select'];
	$quantity_srp = $_POST['quantity_srp'];   
	$quantity_dst = $_POST['quantity_dst']; 
	$free_quantity = $_POST['free_quantity'];
	$quantity_kit = $_POST['quantity_kit'];
	$totalold = $quantity_dst + $quantity_srp + $free_quantity + $quantity_kit;
	$date = $_POST['date']; 
	$val= 0; 
	// new 
	$checkboxes = ( isset($_POST['checkbox']) ) ? $_POST['checkbox'] : 0;
	$quantity_kit_pick = ( isset($_POST['quantity_kit_pick']) ) ? $_POST['quantity_kit_pick'] : 0; 
 
	if( $checkboxes !== 0 ){
			foreach ($checkboxes as $key => $checkbox) { 
			if( $checkbox != 'KIT' && $checkbox != 'KIT 700' ){ 
 				$res = $conn->query("INSERT INTO sold (ProductName, Quantity, Type, DateSpecific) VALUES ('".$checkbox."','".$quantity_kit_pick."','KIT700 - PICK','".$date."')");  
			} 
		} 
	} 
	 

	$sold_prod = $conn->query("SELECT Id,ProductName,SUM(Sold) as sum FROM total WHERE ProductName = '".$prod_select."' ");    
	if( $quantity_srp != 0 ){
		$res = $conn->query("INSERT INTO sold (ProductName, Quantity, Type, DateSpecific) VALUES ('".$prod_select."','".$quantity_srp."','SRP','".$date."')");  
	}
	if( $quantity_dst != 0 ){
		$res = $conn->query("INSERT INTO sold (ProductName, Quantity, Type, DateSpecific) VALUES ('".$prod_select."','".$quantity_dst."','DST','".$date."')");  
	}
	if( $free_quantity != 0 ){
		$res = $conn->query("INSERT INTO sold (ProductName, Quantity, Type, DateSpecific) VALUES ('".$prod_select."','".$free_quantity."','FREE','".$date."')");  
	}
	if( $quantity_kit != 0 ){
		
		$res = $conn->query("INSERT INTO sold (ProductName, Quantity, Type, DateSpecific) VALUES ('".$prod_select."','".$quantity_kit."','KIT','".$date."')");  
  
	} 
	if(!empty($res)){
		echo "success";
	}else{
		echo "fail";
	}
	 
}

function check_product(){
	include("dbconnection.php");
	$product = $_POST['product']; 
	$check =  $conn->query("SELECT ProductName FROM product WHERE ProductName ='".$product."'"); 

		if($check->num_rows > 0){
			echo "true";
		}else{
			echo "false";
		}
	 		 
}



//update
function edit_update_modal(){
	include( "dbconnection.php" );
	$id = $_POST['id'];  
	$tbl = $_POST['tbl']; 
	$check =  $conn->query( "SELECT * FROM ".$tbl." WHERE Id =  ".$id." " ); 

	$val = mysqli_fetch_assoc( $check ); 
	if( $val ){
		echo json_encode(array('val' => $val));
	}else{
		echo "false";
	} 		 
}

function save_edit(){
	include("dbconnection.php");
	$id = $_POST['id']; 
	$tbl = $_POST['tbl'];
	$prod = $_POST['prod'];
	$qty = $_POST['qty'];
	$date = $_POST['date'];

	$results  = $conn->query( "SELECT ProductName, SUM(Quantity) as quantity FROM ".$tbl." WHERE ProductName ='".$prod."' GROUP BY ProductName" );
	while( $ressss= mysqli_fetch_assoc($results)){
		if($tbl == 'beginning'){
			$column = 'Beginning';
		}elseif($tbl == 'delivery'){
			$column = 'Delivery';
		}else{
			$column = 'Sold';
		}
		 $prod_tot = $ressss['ProductName'];
		 $qty_tot = $ressss['quantity'];
		 
	}  
	$res6 = $conn->query("UPDATE total SET ".$column." = ".$qty_tot." WHERE ProductName ='".$prod_tot."'"); 
	 
	if($res6){
		$check =  mysqli_query( $conn, "UPDATE ".$tbl." SET ProductName = '".$prod."',Quantity =  ".$qty." ,DateSpecific =  '".$date."' WHERE Id = ".$id."  " );  
		if( $check ){
			echo "true";
		}else{
			echo "false";
		} 
	}
			 
} 

function delete_history(){
	include( "dbconnection.php" );
	$id = $_POST['id'];  
	$tbl = $_POST['tbl'];
	$amount = $_POST['amount'];
	$prod = $_POST['prod'];
	if($tbl == 'beginning'){
		$column = 'Beginning';
	}elseif($tbl == 'delivery'){
		$column = 'Delivery';
	}else{
		$column = 'Sold';
	}
	$res = $conn->query( "SELECT Id,  ".$column."  as quantity FROM total WHERE ProductName ='".$prod."'" ); 

	while ($row = mysqli_fetch_assoc($res)) {
		
		$new_qty = $row['quantity'] - $amount; 
		$total_id = $row['Id'];
	} 
	if($prod == 'KIT' ){
		$rub = mysqli_fetch_assoc($conn->query( "SELECT Id,  ".$column."  as quantity FROM total WHERE ProductName ='Rub'" )); 
		$rub_new_qty = $rub['quantity'] - ($amount * 10 ); 
		$conn->query( "UPDATE total SET ".$column." = ".$rub_new_qty." WHERE Id=".$rub['Id']."" ); 
		//kids
		$rub_kids = mysqli_fetch_assoc($conn->query( "SELECT Id,  ".$column."  as quantity FROM total WHERE ProductName ='Rub for Kids'" )); 
		$rubkids_new_qty = $rub_kids['quantity'] - ($amount * 2);
		$conn->query( "UPDATE total SET ".$column." = ".$rubkids_new_qty." WHERE Id=".$rub_kids['Id']."" ); 
	} 
	$update = $conn->query( "UPDATE total SET ".$column." = ".$new_qty." WHERE Id=".$total_id."" ); 
	if($update){
		$check =  mysqli_query( $conn, " DELETE FROM ".$tbl." WHERE Id = ".$id."  " );  
		if( $check ){
			echo "true";
		}else{
			echo "false";
		} 	
	}
		 
} 