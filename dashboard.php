<?php
    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    // data admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // data turis
    $path_turis_fb = 'Users';
    $checkdata_turis = $database->getReference($path_turis_fb)->getValue();

    // data sales
    $path_sales_fb = 'MyTickets';
    $checkdata_sales= $database->getReference($path_sales_fb)->getValue();

    // data wisata
    $path_wisata_fb = 'Wisata';
    $checkdata_wisata = $database->getReference($path_wisata_fb)->getValue();

    // cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];

    

?>

<html>

<head>
    <title>Dashboard — TiketSaya</title>
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

                <div class="item-menu">
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

                <div class="item-menu inactive">
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
                    <li class="active-link">
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
                    <li>
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary">96</span>
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Account Settings
                    </li>
                </a>
                <a href="includes/user_destroy.php">
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
                    My Dashboard
                </p>
                <p class="sub-header-title">
                    Latest report updated this week and on
                </p>
            </div>
        </div>
        <div class="row report-group">

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_pengguna.png" alt="">
                            <p class="title-item">
                                TOURIST
                            </p>
                            <p class="subtitle-item">
                                USERS LIFETIME
                            </p>
                            <p class="value-item">
                                <?php echo count($checkdata_turis); ?>
                            </p>
                            <p class="desc-item">
                                around the earth
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_sales.png" alt="">
                            <p class="title-item">
                                SALES
                            </p>
                            <p class="subtitle-item">
                                TICKET BEING SOLD
                            </p>
                            <p class="value-item">
                            <?php echo count($checkdata_sales); ?>
                            </p>
                            <p class="desc-item">
                                around the world
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_wisata.png" alt="">
                            <p class="title-item">
                                WISATA
                            </p>
                            <p class="subtitle-item">
                                PLACE THAT AVAILABLE
                            </p>
                            <p class="value-item">
                            <?php echo count($checkdata_wisata); ?>
                            </p>
                            <p class="desc-item">
                                around the Indonesia
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row report-group">

            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">NEWEST</span> USERS
                    </p>
                    <p class="sub-title">
                        USER THAT SIGN UP NOWADAYS
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>

                    <?php
                        foreach($checkdata_turis as $checkdata_turis_value){
                            
                        
                        
                        
                    ?>

                    <div class="user-item">
                        <div class="user-picture">
                            <img src="<?php echo $checkdata_turis_value['url_photo_profile']; ?>" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                                <?php echo $checkdata_turis_value['nama_lengkap']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $checkdata_turis_value['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary ">View Profile</a>
                    </div>

                        <?php } ?>
                

                </div>



            </div>

            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">TICKETS</span> SOLD
                    </p>
                    <p class="sub-title">
                        USERS JUST BOUGHT TICKET
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>


                    <?php

                            // extrac data
                            foreach($checkdata_sales as $data_sales_final => $data_print_sales) {

                                $path_data_based_on_username = 'Users/'.$data_print_sales['username'];
                                $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue();

                                foreach($print_data_user_profile as $print_data_user_profile_final => $value_data_user_profile)
                                {}

                                
                            

                    ?>


                    <div class="user-item">
                        <div class="user-picture">
                            <img src="<?php echo $print_data_user_profile['url_photo_profile']; ?>" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                                <?php echo $print_data_user_profile['nama_lengkap']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $print_data_user_profile['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary ">View Profile</a>
                    </div>


                            <?php } ?>


                </div>



            </div>



        </div>
    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>