<?php
$mrp='';
$categories_id='';
$name='';
$price='';
$qty='';
$image='';
$short_desc='';
$describes='';
$meta_title='';
$meta_desc='';
$meta_keyword='';

$catigeious = '';
$msg='';
$image_required = 'required';
require 'header.inc.php';
if (isset($_GET['id']) && $_GET['id']!='') {
    $image_required = '';
    $id = get_safe_vale($con,$_GET['id']);
    $sql = "select * from product where id='$id'";
    $res = mysqli_query($con,$sql);
    $check = mysqli_num_rows($res);
    if ($check>0 ) {
    $row = mysqli_fetch_assoc($res);
    
    $categories_id = $row['categories_id'];
    $name = $row['name'];
    $price = $row['price'];
    $mrp = $row['mrp'];
    $short_desc = $row['short_desc'];
    $describes = $row['describes'];
    $meta_title = $row['meta_title'];
    $meta_desc = $row['meta_desc'];
    $meta_keyword = $row['meta_keyword'];
    $qty = $row['qty'];
    }
    else{
    header('location:categ.php');
    }
}
if (isset($_POST['submit'])) {

    $categories_id = get_safe_vale($con,$_POST['categories_id']);
    $name = get_safe_vale($con,$_POST['name']);
    $price = get_safe_vale($con,$_POST['price']);
    $mrp = get_safe_vale($con,$_POST['mrp']);
    $short_desc = get_safe_vale($con,$_POST['short_desc']);
    $describes = get_safe_vale($con,$_POST['describes']);
    $meta_title = get_safe_vale($con,$_POST['meta_title']);
    $meta_desc = get_safe_vale($con,$_POST['meta_desc']);
    $meta_keyword = get_safe_vale($con,$_POST['meta_keyword']);
    $qty = get_safe_vale($con,$_POST['qty']);

    $sql = "select * from product where name = '$name'";
    $res = mysqli_query($con,$sql);
    $check = mysqli_num_rows($res);
    if ($check>0) {
        if (isset($_GET['id']) && $_GET['id']!='') {
            $getData= mysqli_fetch_assoc($res);
            if ($id== $getData['id']) {
                
            }
            else{
                $msg="this product is already exist ";
            }
        }
        else{
            $msg="this product is already exist ";
        }
    }
    if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!= 'image/jpeg')
    {
        $msg="please enter correct png & jpg and jpeg";
    }
    
    if($msg==''){
    if (isset($_GET['id']) && $_GET['id']!='') {
        if ($_FILES['image']['name']!='') {
            $image = rand(111111,999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            $sql = "update product set categories_id='$categories_id',name='$name',price='$price',mrp='$mrp',short_desc='$short_desc',
            describes='$describes',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',qty='$qty',image='$image' where id= '$id'" ;
           
        }
        else{
        $sql = "update product set categories_id='$categories_id',name='$name',price='$price',mrp='$mrp',short_desc='$short_desc',
        describes='$describes',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',qty='$qty' where id= '$id'" ;
        }
        $res = mysqli_query($con,$sql);
    }
    else {
        $image = rand(111111,999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
        $sql = "insert into product (categories_id,name,price,mrp,short_desc,describes,meta_title,meta_desc,meta_keyword,qty,image) VALUES ( '$categories_id','$name','$price','$mrp','$short_desc','$describes','$meta_title','$meta_desc','$meta_keyword','$qty','$image')";
        $res = mysqli_query($con,$sql);
    }
    header('location:product.php');
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add product</strong><small></small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">Categerious</label>
                                <select name="categories_id" class="form-control">
                                    <option>select Categerious</option>
                                    <?php
                                    $sql ="select id,categories from categories order by categories desc";
                                    $res = mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        if($row['id']==$categories_id){
                                            echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                        }
                                        else{
                                            echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">product name</label>
                                <input type="text" name="name" id="company" placeholder="Enter product name" class="form-control" required value="<?php echo  $name ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">Mrp</label>
                                <input type="text" name="mrp" id="company" placeholder="Enter mrp" class="form-control" required value="<?php echo  $mrp ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">Price</label>
                                <input type="text" name="price" id="company" placeholder="Enter price" class="form-control" required value="<?php echo  $price ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">qty</label>
                                <input type="text" name="qty" id="company" placeholder="Enter price" class="form-control" required value="<?php echo  $price ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label ">Image</label>
                                <input type="file" name="image" id="company" placeholder="Choose a file" class="form-control" <?php echo $image_required ?> >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">short_desc</label>
                                <textarea type="text" name="short_desc" id="company" placeholder="Enter short_desc" class="form-control" value=>"<?php echo  $short_desc ?>" </textarea>
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">describes</label>
                                <textarea type="text" name="describes" id="company" placeholder="Enter describes" class="form-control" value=>"<?php echo  $describes ?>"</textarea>
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">meta_title</label>
                                <input type="text" name="meta_title" id="company" placeholder="Enter meta_title " class="form-control" value="<?php echo  $meta_title ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">meta_desc</label>
                                <input type="text" name="meta_desc" id="company" placeholder="Enter meta_desc " class="form-control" value="<?php echo  $meta_desc ?>" >
                            </div>
                            <div class="form-group">
                                <label for="company"  class=" form-control-label">meta_keyword </label>
                                <input type="text" name="meta_keyword" id="company" placeholder="Enter meta_keyword " class="form-control" required value="<?php echo  $meta_keyword ?>" >
                            </div>
                            
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Add</span>
                                
                            </button>
                            <?php echo $msg ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.inc.php' ?>