<?php include('inc/user__header.php'); ?>
<section class="user__dashboard">
    <div class="container">
        <div class="user__dash-top">
            <div class="user__image">
                <img src="img/a.jpg" alt="user image" class="user__image-img">
            </div>
            <div class="dashboard__title">
                <span href="user.php" class="dashboard__title-a">Dashboard</span>
            </div>
            <div class="user__title">
                <h3>Babu Rao <i class="fa logout__icon fa-chevron-down"></i></h3>
                <div class="options" style="display:none">
                    <ul>
                        <li>
                            <a href="#"> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="user__main__section">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab">
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"><i
                            class="fa fa-user-circle" aria-hidden="true"></i> Profile</a>
                    <a class="nav-link" id="v-pills-cart-tab" data-toggle="pill" href="#v-pills-cart"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i> View cart</a>
                    <a class="nav-link" id="v-pills-cart-tab" data-toggle="pill" href="#v-pills-track"><i
                            class="fa fa-first-order" aria-hidden="true"></i> Track My
                        Order</a>
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile">
                        <div class="user__info">
                            <h2>My Profile</h2>
                            <div class="form-row mh__inherit">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Full name</label>
                                        <input class="form-control" id="name" type="text" disabled
                                            placeholder="Babu Rao">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" type="email" disabled
                                            placeholder="babu@gmail.com">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="user">User name</label>
                                        <input class="form-control" id="user" type="text" disabled
                                            placeholder="@baburao">
                                    </div>
                                </div>
                                <div class="col-lg-4 align-self-end">
                                    <div class="edit__form">
                                        <a href="edit.php" class="btn">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-cart">
                        <section class="cart__inner__seciton">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <section class="bg__white">
                                            <?php include('inc/cart__only.php'); ?>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane" id="v-pills-track">
                        <div class="user__info">
                            <h2>Track Order</h2>
                            <p>To track your order please enter your Order ID in the box below and press the "Track"
                                button. This was given to you on your receipt and in the confirmation email you
                                should have received.</p>
                            <form action="#">
                                <div class="form-row mh__inherit">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="orderid">Order Id</label>
                                            <input class="form-control" id="orderid" type="text" placeholder="Order Id">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="edit__form">
                                            <label class="d-block">Track</label>
                                            <a type="submit" class="btn track-order">Track</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('inc/user__footer.php'); ?>