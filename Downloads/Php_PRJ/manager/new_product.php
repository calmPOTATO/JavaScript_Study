<?php 

$conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');

//이미지 넣기
$iname = $_FILES['product_img']['name'];
$isize = $_FILES['product_img']['size'];
$itype = $_FILES['product_img']['type'];

$uploads_dir = '../product_img/';

if(!is_dir($uploads_dir)) {
    mkdir($uploads_dir);
}

$upload_file = $uploads_dir.basename($iname);



$sql = "insert into product_img(img_name, img_type, img_size, img_path) value('$iname', '$itype', '$isize', '$upload_file')";
mysqli_query($conn, $sql);


//다른 정보 넣기
$p_name = $_POST['name'];

$p_price = $_POST['price'];
$p_category = $_POST['category'];
$p_number = $_POST['number'];

if($p_number=="direct") {
    $p_number=$_POST['direct_num'];
}

$sql2 = "insert into product_info(name, price, category, number) values ('$p_name', '$p_price', '$p_category', '$p_number')";
mysqli_query($conn, $sql2);


echo "<script>alert(\"상품을 성공적으로 등록하였습니다.\");</script>";
echo "<script>location.replace('manage_product.html')</script>";


?>