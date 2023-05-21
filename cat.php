<?php
require 'top.php';
require 'function.inc.php';
$cat_id = get_safe_vale($con, $_GET['id']);
if($cat_id>0){
    $get_data = get_product($con, '','', $cat_id);
}
else{
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}

?>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">

    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$105.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">Brone Candle</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$25.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">$130.00</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="cart.html">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <?php
            if (count($get_data)>0) { ?>
                <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <select class="ht__select">
                                    <option>Default softing</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                            </div>


                        </div>
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <div class="htc__product__container">

                                        <div class="row">
                                            <div class="product__list clearfix mt--30">

                                                <?php
                                                

                                                foreach ($get_data as $limit) {
                                                ?>

                                                    <!-- Start Single Category -->
                                                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                                        <div class="category">
                                                            <div class="ht__cat__thumb">
                                                                <a href="product.php?id=<?php echo $limit['id'] ?>">
                                                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $limit['image'] ?>" alt="product images">
                                                                </a>
                                                            </div>

                                                            <div class="fr__product__inner">
                                                                <h4><a href="product-details.html"><?php echo $limit['name'] ?></a></h4>
                                                                <ul class="fr__pro__prize">
                                                                    <li class="old__prize">MRP: $<?php echo $limit['mrp'] ?></li>
                                                                    <li>PRICE: $<?php echo $limit['price'] ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                        
                    </div>

                <?php } 
                else {
                    echo "No data exist";
                    }
                ?>
                </div>

        </div>
    </div>
</section>
<!-- End Product Grid -->

<?php require 'footer.php' ?>