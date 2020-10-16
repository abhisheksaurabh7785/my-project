<?php
include ('config.php');
$errors = array();
$message = '';
if(isset($_POST['submit'])){

$username = isset($_POST['name'])?$_POST['name']:'';
$price = isset($_POST['price'])?$_POST['price']:'';
//   $image = isset($_POST['small-medium'])?$_POST['small-medium']:'';
$category = isset($_POST['dropdown'])?$_POST['dropdown']:'';
$Tags = isset($_POST['Tags'])?$_POST['Tags']:'';
$description = isset($_POST['description'])?$_POST['description']:'';
$image = $_FILES['image']['name'];
$source = $_FILES['image']['tmp_name'];
// echo $Price;
// echo $username;
// echo "uname:".$username.", " . $price .", " . $category .", " . $description .", " .$image; 
// die();
if (move_uploaded_file($source, "productImage/".$image)) {

$sql = "INSERT INTO product(`name`,`price`,`image`,`long_description`,`category_id`)VALUES('$username', '$price' , '$image', '$description',  '$category')" ;
//echo $sql;
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
<?php        endforeach;  ?>
</ul>
<?php endif; ?>
