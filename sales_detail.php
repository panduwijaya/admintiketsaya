<?php
    include 'includes/user_token.php';

    include 'includes/myfirebase.php';

    // dapatkan username dari url
    $username_url = $_GET['username'];

    // data detail user
    $path_user_details = 'Users/'.$username_url;
    $checkdata_user_details= $database->getReference($path_user_details)->getValue();

    // data wisata user
    $path_wisata_user_fb = 'MyTickets/'.$username_url.'/wisata';
    $checkdata_wisata = $database->getReference($path_wisata_user_fb)->getValue();

    // data admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];
?>

<html>

<head>
    <title>Sales Detail — TiketSaya</title>
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
                    <a href="dashboard.html">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="sales.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="customer.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.html">
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
                <a href="dashboard.html">
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="sales.html">
                    <li class="active-link">
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.html">
                    <li>
                        Manage Wisata
                    </li>
                </a>
                <a href="customer.html">
                    <li>
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary">96</span>
                    </li>
                </a>
                <a href="setting.html">
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

    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Details
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="sales.php">Sales</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_user_details['nama_lengkap']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="col-4">
                            <div class="wrap-user-picture-circle">
                                <img class="primary-user-picture-circle" src="images/user_1.png" />
                            </div>
                            <div style="margin-top: 16px;" class="user-info">
                                <p class="title">
                                <?php echo $checkdata_user_details['nama_lengkap']; ?>
                                </p>
                                <br>
                                <p class="sub-title">
                                <?php echo $checkdata_user_details['bio']; ?>
                                </p>

                            </div>
                        </div>
                        <div class="col-4">
                            <p class="total-balance">
                                Total Balance: <span class="value-balance">US$ <?php echo $checkdata_user_details['user_balance']; ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="row user-wisata-places">
                        <div class="col-md-12">
                            <p class="title">
                            <?php echo $checkdata_user_details['nama_lengkap']; ?>'s Wisata
                            </p>
                        </div>

                        <?php

                            foreach($checkdata_wisata as $checkdata_wisata_final => $checkdata_wisata_final_value) {

                                // data lengkap wisata
                                $path_wisata_details = 'Wisata/'.$checkdata_wisata_final_value['nama_wisata'];
                                $checkdata_wisata_details = $database->getReference($path_wisata_details)->getValue();

                                foreach($checkdata_wisata_details as $checkdata_wisata_details_final => $checkdata_wisata_details_value)
                                {}

                            ?>

                        <div class="item-wisata-place col-md-4">
                            <img src="images/img_wisata.png" alt="">
                            <p class="title-info-wisata-place">
                                <?php echo $checkdata_wisata_details['nama_wisata']; ?>
                            </p>
                            <p class="subtitle-info-wisata-place">
                            <?php echo $checkdata_wisata_details['lokasi']; ?>
                            </p>
                        </div>

                                <?php } ?>


                    </div>



                </div>



            </div>



        </div>
    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>