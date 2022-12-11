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
                    <a class="nav-link active"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a>
                </div>
            </div>
            <div class="col-10">
                <div class="user__info">
                    <h2>My Profile</h2>
                    <div class="form-row mh__inherit">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input class="form-control" id="name" type="text" placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="user">User name</label>
                                <input class="form-control" id="user" type="text" placeholder="Enter username">
                            </div>
                        </div>
                        <div class="col-lg-4 align-self-end mb-3">
                            <div class="edit__form">
                                <a type="submit" href="edit.php" class="btn w-100">Save Changes</a>
                            </div>
                        </div>
                        <div class="col-lg-4 align-self-end mb-3">
                            <div class="edit__form">
                                <a href="user.php" class="btn w-100"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                    Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('inc/user__footer.php'); ?>
