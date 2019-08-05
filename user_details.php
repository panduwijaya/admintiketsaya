<?php
    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    // data admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];

    // dapatkan nama wisata dari url
    $username_url = $_GET['username'];

    // data detail wisata
    $path_user_details = 'Users/'.$username_url;
    $checkdata_user_details = $database->getReference($path_user_details)->getValue();

    
?>

<html>

<head>
    <title>Profile Details — TiketSaya</title>
    <meta charset="UTF-8">
    <meta name="description" content="Login TiketSaya Admin">
    <meta name="keywords" content="TiketSaya, Web Dashboard TiketSaya, Login TiketSaya">
    <meta name="author" content="BWA Team">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>


    <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblemapp">
                <img src="images/emblemapp.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu inactive">
                    <a href="dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="sales.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="customer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-cog"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="#">
                        <p class="icon-item-menu">
                            <i class="fas fa-power-off"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
            <div class="admin-picture">
                <img src="images/admin_picture.png" alt="">
            </div>
            <p class="admin-name">
            <?php echo $nama_admin_f; ?> 
            </p>
            <p class="admin-level">
                Super Admin
            </p>
            <ul class="admin-menus">
                <a href="dashboard.php">
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li>
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.php">
                    <li>
                        Manage Wisata
                    </li>
                </a>
                <a href="customer.php">
                    <li class="active-link">
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary">96</span>
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Account Settings
                    </li>
                </a>
                <a href="#">
                    <li style="padding-top: 120px;">
                        Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main-content-user-details main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Fynn Lee
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="customer.php">Customer</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">
                            Profile Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="row report-group">

                    <div class="col-md-12">
                        <div class="item-big-report col-md-12">

                            <div class="row">
                                <div class="col-4">
                                    <div class="wrap-user-picture-circle">
                                        <img class="primary-user-picture-circle" src="images/user_1.png" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-8">
                                <form method="POST" action="includes/data_model.php">

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Username</label>
                                            <input name="username" disabled value="<?php echo $checkdata_user_details['username']; ?>" type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Nama User">
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama
                                                Pengguna</label>
                                            <input name="nama_lengkap" value="<?php echo $checkdata_user_details['nama_lengkap']; ?>" type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Alamat Email</label>
                                            <input name="email_address" value="<?php echo $checkdata_user_details['email_address']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Kata Sandi</label>
                                            <input name="password" value="<?php echo $checkdata_user_details['password']; ?>" type="password" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Bio</label>
                                                    <input name="bio" value="<?php echo $checkdata_user_details['bio']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                        id="exampleInputPassword1" placeholder="Harga">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Balance (US$)</label>
                                                    <input name="user_balance" disabled value="<?php echo $checkdata_user_details['user_balance']; ?>" type="number"
                                                        class="form-control input-type-primary-tiketsaya"
                                                        id="exampleInputPassword1" placeholder="Tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-bottom: -40px; visibility: hidden;"
                                            class="form-group content-sign-in">
                                            <input id="image_file" type="file" />
                                        </div>
                                        <input type="hidden" name="username" value="<?php echo $username_url; ?>" />
                                        <button name="updateProfile" type="submit" class="btn btn-primary btn-primary-tiketsaya">Save
                                            Now</button>
                                        <a href="customer.php" style="margin-left: 10px;"
                                            class="btn btn-cancel-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>

                        </div>



                    </div>



                </div>
            </div>

            <div class="col-md-5">
                <div class="item-danger-zone">
                    <p class="title">
                        Danger Zone
                    </p>
                    <p class="desc">
                        You are able to delete the user and
                        once you deleted it — it is gone
                    </p>
                    <form method="POST" action="includes/data_model.php">
                    <input type="hidden" name="username" value="<?php echo $username_url; ?>" />
                    <button name="deleteUser" type="submit" data-toggle="modal" data-target="#exampleModal" class="btn-delete btn btn-primary">
                        Delete User
                    </button>
                    </form>
                </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete <?php echo $checkdata_user_details['nama_lengkap']; ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sekali terhapus tidak dapat dikembalikan lagi
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete Now</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>