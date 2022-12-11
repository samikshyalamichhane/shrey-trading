<?php require 'inc/header.php';?>
<link rel="stylesheet" href="css/innerpage.css">
<div class="breadcrumbs" data-stellar-background-ratio="0.7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__list--item"><a href="index.php">Home</a></li>
                    <li class="breadcrumbs__list--item breadcrumbs__active"><a>checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="checkout__section">
    <div class="container">
        <form action="#" class="form-row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="fullName">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullName" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="streetAddress">Street Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="streetAddress" placeholder="Street Address">
                </div>
                <div class="form-group">
                    <label for="city">Town/City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="city" placeholder="City">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Email">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Email" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Order Notes</label>
                    <textarea type="text" class="form-control" id="message" placeholder="Notes about your order"></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Wrapper">
                    <div class="side__cart">
                        <h3 class="side__cart-title">your order</h3>
                        <div class="side__cart-body">
                            <ul class="side__cart__list">
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item font-weight-bold">
                                        product
                                    </div>
                                    <div class="side__cart__list-li__item __price">
                                        total
                                    </div>
                                </li>
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item">
                                        <span class="font-weight-bold">6</span> <span>*</span> <span>lcd television and
                                            monitor</span>
                                    </div>
                                    <div class="side__cart__list-li__item __price">
                                        Rs. 34000
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="side__cart-reduce side__cart-brb">
                            <ul class="side__cart__list">
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item subtotal-title">
                                        subtotal
                                    </div>
                                    <div class="side__cart__list-li__item __price __large">
                                        Rs.100000
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="side__cart-reduce">
                            <ul class="side__cart__list">
                                <li class="side__cart__list-li">
                                    <div class="side__cart__list-li__item total-title">
                                        total
                                    </div>
                                    <div class="side__cart__list-li__item __price __large">
                                        Rs.1000000
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1"> I’ve read and accept the terms &
                                conditions <span class="text-danger">*</span></label>
                        </div>
                        <div class="placeOrder">
                            <div class="cart__button">
                                <div class="cart__button__item">
                                    <a type="submit" href="#" class="cart__button__item-btn primary__button-cart d-block">place order
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php require 'inc/footer.php';?>