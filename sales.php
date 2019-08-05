<?php
    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    // data admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];

    // data sales
    $path_sales_fb = 'MyTickets';
    $checkdata_sales= $database->getReference($path_sales_fb)->getValue();
?>

<html>

<head>
    <title>Sales — TiketSaya</title>
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

                <div class="item-menu">
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
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li class="active-link">
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
                    Ticket Sales
                </p>
                <p class="sub-header-title">
                    The items are bought around the world
                </p>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-12">


                    <table class="table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Picture</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jumlah Wisata</th>
                                <th scope="col">Sisa Balance</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            foreach($checkdata_sales as $data_sales_final => $data_print_sales) {

                                $path_data_based_on_username = 'Users/'.$data_print_sales['username'];
                                $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue();

                                foreach($print_data_user_profile as $print_data_user_profile_final => $value_data_user_profile)
                                {}

                                
                            // data place
                            $path_place_fb = 'MyTickets/'.$print_data_user_profile['username'].'/wisata';
                            $checkdata_place = $database->getReference($path_place_fb)->getValue();

                                   
                            

                    ?>

                            <tr>
                                <td scope="row user-table-item">
                                    <img class="user-table-item" src="images/user_1.png" />
                                </td>
                                <td><?php echo $print_data_user_profile['nama_lengkap']; ?></td>
                                <td><?php echo count($checkdata_place); ?> Place</td>
                                <td>US$ <?php echo $print_data_user_profile['user_balance']; ?></td>
                                <td>
                                    <a href="sales_detail.php?username=<?php echo $print_data_user_profile['username']; ?>" class="btn btn-small-table btn-primary ">Details</a>
                                </td>
                            </tr>

                                <?php } ?>

                        </tbody>
                    </table>


                </div>



            </div>



        </div>
    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>