<?php

function pre($arr){
echo '<pre>';
print_r($arr);
}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_vale($con,$str){
    if($str!=''){
        $str = trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}
function get_product($con,$limit='',$cat_id='',$product_id=''){
    $sql = "select * from product where status=1 ";
    
    if($cat_id!='')
    {
        $sql.=" and categories_id=$cat_id";
    }
    if($product_id!='')
    {
        $sql.=" and id=$product_id";
    }
    $sql.=" order by id desc";
    
    if($limit!=''){
		$sql.=" limit $limit";
	}
     
    $res = mysqli_query($con,$sql);
    $getdata = array();
    while($row=mysqli_fetch_assoc($res))
    {
        $getdata[]= $row;
    }

    return $getdata;
}
?>