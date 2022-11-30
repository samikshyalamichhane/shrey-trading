<?php require 'inc/header.php';?>
<link rel="stylesheet" href="css/jquery.exzoom.css">
<link rel="stylesheet" href="css/innerpage.css">

<section id="single__product__section">
    <div class="breadcrumbs" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumbs__list">
                        <li class="breadcrumbs__list--item"><a href="index.php">Home</a></li>
                        <li class="breadcrumbs__list--item"><a href="category.php">Category 01</a></li>
                        <li class="breadcrumbs__list--item breadcrumbs__active"><a href="#">Product 01</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bg__light">
            <div class="col-lg-4">
                <div class="Wrapper">
                    <div class="single__post">
                        <div class="exzoom hidden" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    <li><img src="img/p1.png" /></li>
                                    <li><img src="img/p2.png" /></li>
                                    <li><img src="img/p3.png" /></li>
                                    <li><img src="img/p4.png" /></li>
                                    <li><img src="img/p1.png" /></li>
                                    <li><img src="img/p1.png" /></li>
                                    <li><img src="img/p1.png" /></li>
                                    <li><img src="img/p1.png" /></li>
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a> <a href="javascript:void(0);" class="exzoom_next_btn"> >
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pl-60">
                <div class="Wrapper">
                    <div class="single__post">
                        <div class="single__post__Description">
                            <h3 class="single__post__Description-title">
                                Product 01
                            </h3>
                            <div class="single__post__Description-meta">
                                <small class="brand">Brand: <a href="category.php" class="brand__a">Nike</a> | <a href="category.php"
                                        class="brand__a">More Products from Nike</a>
                                </small>
                            </div>
                            <div class="single__post__Description__money">
                                <h2 class="single__post__Description__money-r">Rs. 1200</h2>
                                <h4 class="delta__price delta">Rs.1600</h4>
                                <h4 class="delta__discount delta">10% Off</h4>
                            </div>
                            <!-- <div class="single__post__Description__quantity">
                                <p class="single__post__Description__quantity-para">Quantity</p>
                                <div class="__quantity-btn">
                                    <a class="__quantity-btn__button btn__minus"><i class="fa fa-minus minus"></i></a>
                                </div>
                                <div class="input"><input value="1" class="input__value" type="text"></div>
                                <div class="__quantity-btn">
                                    <a onclick="increase();" class="__quantity-btn__button btn__plus"><i class="fa fa-plus plus"></i></a>
                                </div>
                            </div> -->
                            <div class="single__post__Description__hightlight">
                                <h4 class="text-uppercase single__post__Description__hightlight-title">hightlights</h4>
                                <ul class="single__post__Description__hightlight__list">
                                    <li class="single__post__Description__hightlight__list-item">Delivery time: 1 week
                                        from ordered date</li>
                                    <li class="single__post__Description__hightlight__list-item">Environment friendly
                                        especially designed for children and artists</li>
                                    <li class="single__post__Description__hightlight__list-item">With dark lead for
                                        smooth and beautiful writing </li>
                                    <li class="single__post__Description__hightlight__list-item">Delivery time: 1 week
                                        from ordered date</li>
                                    <li class="single__post__Description__hightlight__list-item">Delivery time: 1 week
                                        from ordered date</li>
                                </ul>
                            </div>
                            <div class="single__post__Description__shipping">
                                <div class="single__post__Description__shipping-btn">
                                    <a href="#" class="__button buy">buy now</a>
                                </div>
                                <div class="single__post__Description__shipping-btn">
                                    <a href="#" class="__button add">add to cart</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="product__title">Product details of Product 01</h3>
        <div class="row bg__light">
            <div class="col-12">
                <div class="Wrapper">
                    <div class="product__details__Description">
                        <ol class="product__details__Description__list">
                            <li class="product__details__Description__list-item">
                                This is a personal portable air cooler, effective distance between 40cm.
                            </li>
                            <li class="product__details__Description__list-item">
                                This is a personal portable air cooler, effective distance between 40cm.
                            </li>
                            <li class="product__details__Description__list-item">
                                This is a personal portable air cooler, effective distance between 40cm.
                            </li>
                            <li class="product__details__Description__list-item">
                                This is a personal portable air cooler, effective distance between 40cm.
                            </li>
                        </ol>
                        <h3 class="specification__title">Specifications of Product 01</h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="Wrapper">
                                    <div class="specification">
                                        <div class="sp__text">
                                            <h4 class="specification__inner-title">Brand</h4>
                                            <p class="specification__name text-uppercase">nike</p>
                                        </div>
                                        <div class="sp__text">
                                            <h4 class="specification__inner-title">model</h4>
                                            <p class="specification__name text-uppercase">4345-G</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="Wrapper">
                                    <div class="specification">
                                        <div class="sp__text">
                                            <h4 class="specification__inner-title">SKU</h4>
                                            <p class="specification__name text-uppercase">100772010_NP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="product__title mx--15 text-capitalize">People Who Viewed This Item Also Viewed</h3>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="Wrapper">
                    <div class="category__card">
                        <div class="category__card__image">
                            <a href="categoryInner.php"> <img src="img/p1.png" alt="products"
                                    class="category__card__image-img"></a>
                        </div>
                        <div class="category__card__body">
                            <h4 class="category__card__body-title">Product 01</h4>
                            <div class="category__card__body__money">
                                <span class="category__card__body__money-r">Rs.1000</span>
                            </div>
                            <div class="category__card__body__cart">
                                <a href="cart.php" class="category__card__body__cart-btn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="Wrapper">
                    <div class="category__card">
                        <div class="category__card__image">
                            <a href="categoryInner.php">
                                <img src="img/p2.png" alt="products" class="category__card__image-img">
                            </a>
                        </div>
                        <div class="category__card__body">
                            <h4 class="category__card__body-title">Product 02</h4>
                            <div class="category__card__body__money">
                                <span class="category__card__body__money-r">Rs.1200</span>
                            </div>
                            <div class="category__card__body__cart">
                                <a href="cart.php" class="category__card__body__cart-btn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="Wrapper">
                    <div class="category__card">
                        <div class="category__card__image">
                            <a href="categoryInner.php">
                                <img src="img/p3.png" alt="products" class="category__card__image-img">
                            </a>
                        </div>
                        <div class="category__card__body">
                            <h4 class="category__card__body-title">Product 03</h4>
                            <div class="category__card__body__money">
                                <span class="category__card__body__money-r">Rs.150</span>
                            </div>
                            <div class="category__card__body__cart">
                                <a href="cart.php" class="category__card__body__cart-btn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="Wrapper">
                    <div class="category__card">
                        <div class="category__card__image">
                            <a href="categoryInner.php">
                                <img src="img/p4.png" alt="products" class="category__card__image-img">
                            </a>
                        </div>
                        <div class="category__card__body">
                            <h4 class="category__card__body-title">Product 04</h4>
                            <div class="category__card__body__money">
                                <span class="category__card__body__money-r">Rs.1600</span>
                            </div>
                            <div class="category__card__body__cart">
                                <a href="cart.php" class="category__card__body__cart-btn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'inc/footer.php';?>