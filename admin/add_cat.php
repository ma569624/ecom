<?php
$catigeious = '';
$msg = '';
require 'header.inc.php';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_vale($con, $_GET['id']);
    $sql = "select * from categories where id='$id'";
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $catigeious = $row['categories'];
    } else {
        header('location:categ.php');
    }
}
if (isset($_POST['submit'])) {

    $catigeious = get_safe_vale($con, $_POST['catigeious']);

    $sql = "select * from categories where categories = '$catigeious'";
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "this catagirous is already exist ";
            }
        } else {
            $msg = "this catagirous+++ is already exist ";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $sql = "update categories set categories = '$catigeious' where id= '$id'";
            $res = mysqli_query($con, $sql);
        } else {
            $sql = "insert into categories (categories,status) VALUES ( '$catigeious', '1')";
            $res = mysqli_query($con, $sql);
        }
        header('location:categ.php');
    }
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add Catigerious</strong><small></small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Name</label>
                                <input type="text" name="catigeious" id="company" placeholder="Enter Catigeious name" class="form-control" required value="<?php echo  $catigeious ?>">
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