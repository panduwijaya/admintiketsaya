<?php


    include 'myfirebase.php';

    if(isset($_POST['signin'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if($username != null){
            if($password != null){
                $reference = 'Admin/'.$username;
                $checkdata = $database->getReference($reference)->getValue();
                if($checkdata != null){
                    if($password != null)
                    {
                        
                        // ambil data
                        $password_admin_saat_ini = $checkdata['password'];

                        if($password == $password_admin_saat_ini) {
                            // jawaban benar
                            session_start();
                            $_SESSION['username'] = $username;
                            header('location: ../dashboard.php');
                        }
                        else {
                            echo 'password salah';
                        }

                        
                    }
                    else {
                        echo 'password salah';
                    }
                }
                else {
                    echo 'data tidak ada!';
                }
            }
        }

    }
    
    else if(isset($_POST['updateWisata'])){

        $nama_wisata_url = htmlspecialchars($_POST['nama_wisata_url']);

        $nama_wisata = htmlspecialchars($_POST['nama_wisata_url']);
        $lokasi = htmlspecialchars($_POST['lokasi']);
        $date_wisata = htmlspecialchars($_POST['date_wisata']);
        $harga_tiket = htmlspecialchars($_POST['harga_tiket']);
        $ketentuan = htmlspecialchars($_POST['ketentuan']);
        $short_desc = htmlspecialchars($_POST['short_desc']);
        $is_wifi = htmlspecialchars($_POST['is_wifi']);
        $is_photo_spot = htmlspecialchars($_POST['is_photo_spot']);
        $is_festival = htmlspecialchars($_POST['is_festival']);

        $reference = 'Wisata/'.$nama_wisata_url;

        $data = [
            'nama_wisata' => $nama_wisata,
            'lokasi' => $lokasi,
            'date_wisata' => $date_wisata,

            'harga_tiket' => $harga_tiket,
            'ketentuan' => $ketentuan,
            'short_desc' => $short_desc,

            'is_wifi' => $is_wifi,
            'is_photo_spot' => $is_photo_spot,
            'is_festival' => $is_festival
        ];

        // upload to server
        $pushData = $database->getReference($reference)->update($data);

        header('location: ../wisata.php');



    }

    else if(isset($_POST['updateProfile'])){

        $username_url = htmlspecialchars($_POST['username']);

        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $email_address = htmlspecialchars($_POST['email_address']);
        $bio = htmlspecialchars($_POST['bio']);
        $password = htmlspecialchars($_POST['password']);

        $reference = 'Users/'.$username_url;

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email_address' => $email_address,
            'bio' => $bio,
            'password' => $password
        ];

        // upload to server
        $pushData = $database->getReference($reference)->update($data);


        // lempar ke customer.php
        header('location: ../customer.php');

    }

    else if(isset($_POST['updateAdmin'])){

        $username_admin_url = htmlspecialchars($_POST['username_admin_url']);

        $nama_admin = htmlspecialchars($_POST['nama_admin']);
        $email_admin = htmlspecialchars($_POST['email_admin']);
        $password = htmlspecialchars($_POST['password']);

        $reference = 'Admin/'.$username_admin_url;

        $data = [
            'username' => $username_admin_url,
            'nama_admin' => $nama_admin,
            'email_admin' => $email_admin,
            'password' => $password
        ];

        // upload to server
        $pushData = $database->getReference($reference)->update($data);


        // lempar ke customer.php
        header('location: ../dashboard.php');

    }

    else if(isset($_POST['deleteUser'])){

        $username_url = htmlspecialchars($_POST['username']);

        $reference = 'Users/'.$username_url;
        $reference_ticket = 'MyTickets/'.$username_url;

        // upload to server
        $pushData = $database->getReference($reference)->remove();
        $removeTicket = $database->getReference($reference_ticket)->remove();


        // lempar ke customer.php
        header('location: ../customer.php');

    }

    else if(isset($_POST['addUser'])){

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $email_address = htmlspecialchars($_POST['email_address']);
        $bio = htmlspecialchars($_POST['bio']);
        $user_balance = htmlspecialchars($_POST['user_balance']);

        $reference = 'Users/'.$username;
        

        $data = [
            'username' => $username,
            'password' => $password,
            'nama_lengkap' => $nama_lengkap,

            'email_address' => $email_address,
            'bio' => $bio,
            'user_balance' => $user_balance
        ];

        // upload to server
        $pushData = $database->getReference($reference)->set($data);


        // lempar ke customer.php
        header('location: ../customer.php');
        

    }


?>