<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$user_name = $_POST['user_name'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$street_address = $_POST['street_address'];
	$post_code = $_POST['post_code'];
	$city = $_POST['city'];
	$l_sphere = $_POST['l_sphere'];
	$l_cylinder = $_POST['l_cylinder'];
	$l_axis = $_POST['l_axis'];
	$r_sphere = $_POST['r_sphere'];
	$r_cylinder = $_POST['r_cylinder'];
	$r_axis = $_POST['r_axis'];
	$total_price = $_POST['total_price'];
	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("INSERT INTO order_record (user_id, user_name, contact_number,email,street_address,post_code,city,total_price,l_sphere, l_cylinder,l_axis,r_sphere,r_cylinder,r_axis) VALUES (:user_id, :user_name, :contact_number, :email,:street_address,:post_code,:city,:total_price, :l_sphere, :l_cylinder,:l_axis,:r_sphere,:r_cylinder,:r_axis)");
			$stmt->execute(['user_id'=>$user['id'], 'user_name'=>$user_name, 'contact_number'=>$contact_number,'email'=>$email,'street_address'=>$street_address,'post_code'=>$post_code,'city'=>$city,'total_price'=>$total_price,'l_sphere'=>$l_sphere,'l_cylinder'=>$l_cylinder,'l_axis'=>$l_axis,'r_sphere'=>$r_sphere,'r_cylinder'=>$r_cylinder,'r_axis'=>$r_axis,]);
			$output['message'] = 'Add';

			$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			$output['message'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		echo "Please Login";
	}

	$pdo->close();
	// echo json_encode($output);
	header('location: cart_view.php');
?>
