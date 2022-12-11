<?php require 'inc/header.php';?>
<link rel="stylesheet" href="css/innerpage.css">
<div class="breadcrumbs" data-stellar-background-ratio="0.7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__list--item"><a href="index.php">Home</a></li>
                    <li class="breadcrumbs__list--item breadcrumbs__active"><a>Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="cart__inner__seciton">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php include('inc/cart__only.php'); ?>
            </div>
            <div class="col-lg-4">
                <div class="Wrapper">
                    <div class="side__cart">
                        <h3 class="side__cart-title">cart total</h3>
                        <div class="side__cart-body">
                            <ul class="side__cart__list">
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item">
                                        subtotal
                                    </div>
                                    <div class="side__cart__list-li__item __price">
                                        Rs.1000
                                    </div>
                                </li>
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item">
                                        shipping
                                    </div>
                                    <div class="side__cart__list-li__item __price">
                                        Rs.400
                                    </div>
                                </li>
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item">
                                        flat rate
                                    </div>
                                    <div class="side__cart__list-li__item __price">
                                        Rs.10000
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="side__cart-reduce">
                            <ul class="side__cart__list">
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item">
                                        total
                                    </div>
                                    <div class="side__cart__list-li__item __price __large">
                                        Rs.1000
                                    </div>
                                </li>
                                <div class="cart__button">
                                    <div class="cart__button__item">
                                        <a href="checkout.php"
                                            class="cart__button__item-btn primary__button-cart d-block">proceed to
                                            checkout
                                        </a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'inc/footer.php';?>
<script>
$('.cart__dismiss').click(function() {
    $(this).closest('tr').remove();
});
</script>