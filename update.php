<?php
include ('config.php');
$errors = array();
$message = '';
if(isset($_POST['submit'])){

  $username = isset($_POST['medium-input'])?$_POST['medium-input']:'';
  $Price = isset($_POST['small-input'])?$_POST['small-input']:'';
//   $image = isset($_POST['small-medium'])?$_POST['small-medium']:'';
  $category = isset($_POST['dropdown'])?$_POST['dropdown']:'';
  $Tags = isset($_POST['Tags'])?$_POST['Tags']:'';
  $Description = isset($_POST['textfield'])?$_POST['textfield']:'';
  $image = $_FILES['small-medium']['name'];
  $source = $_FILES['small-medium']['tmp_name'];
// echo $Price;
// echo $username;
// die();
    if (move_uploaded_file($source, "productImage/".$image)) {
        
        $sql = "INSERT INTO product(`name`,`price`,`image`,`long_description`,`category_id`)VALUES('$username', '$Price' , '$image', '$Description',  '$category')" ;
    } else {
        echo "Image NOt Upload";
    }
// echo $sql;
  if ($conn->query($sql) === true) {
      header('location:index.php');
   "New record created successfully";
  } else {
    $errors[] = array('input'=>'form','msg'=>$conn->error);
   "Error: " . $sql . "<br>" . $conn->error;
  }
  
  
  $conn->close();


}
?>
   <?php if (sizeof($errors)>0): ?>
   <ul>
   <?php foreach ($errors as $error) : ?>
   <li><?php echo $error['msg']; ?></li>
   <?php endforeach; ?>
   </ul>
   <?php endif; ?>
 