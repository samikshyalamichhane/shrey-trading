<?php include('inc/user__header.php'); ?>

<section class="user__dashboard">
    <div class="container">
        <div class="user__dash-top">
            <div class="user__image">
                <img src="img/a.jpg" alt="user image" class="user__image-img">
            </div>
            <div class="dashboard__title">
                <a href="user.php" class="dashboard__title-a">Dashboard</a>
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
                <div class="nav flex-column nav-pills">
                    <a class="nav-link active text-center">Track</a>
                </div>
            </div>
            <div class="col-10">
                <div class="user__info">
                    <h2>Track Orders: </h2>
                    <div class="overflow-x-auto">
                        <table class="table text-center table__track">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">98923</th>
                                    <td>2076-01-22</td>
                                    <td>Rs. 12000</td>
                                    <td> <span class="status">Verified <i class="fa check-o fa-check-circle"></i></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="added__cart">
                        <table class="table added__cart-table">
                            <thead>
                                <tr>
                                    <th scope="col">product</th>
                                    <th scope="col">price</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="list__cart">
                                            <div class="list__cart__image">
                                                <img src="img/tv.jpg" alt="cart product" class="list__cart__image-img">
                                            </div>
                                            <h3 class="list__cart-title">
                                                LCD Television and monitor
                                            </h3>
                                        </div>
                                    </th>
                                    <td>Rs. 1000</td>
                                    <td>1</td>
                                    <td>Rs. 1000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="list__cart">
                                            <div class="list__cart__image">
                                                <img src="img/tv.jpg" alt="cart product" class="list__cart__image-img">
                                            </div>
                                            <h3 class="list__cart-title">
                                                LCD Television and monitor
                                            </h3>
                                        </div>
                                    </th>
                                    <td>Rs. 8000</td>
                                    <td>2</td>
                                    <td>Rs. 16000</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('inc/user__footer.php'); ?>