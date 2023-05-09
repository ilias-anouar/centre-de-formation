<?php
session_start();
require("connect.php");
include("class.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EduSphere</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Hover-cards.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Rounded-Search-Input-field-untitled-2.css">
    <link rel="stylesheet" href="assets/css/Rounded-Search-Input-field.css">
    <link rel="stylesheet" href="assets/css/select.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Cool-SB-Admin-Inspirate.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3" style="background-color: #FFDFD3;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: #957DAD;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-intersect" style="font-size: 24px;">
                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2h5z">
                        </path>
                    </svg></span><span><span style="color: rgb(149, 125, 173);">E</span>duSphere</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
            </div>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="sidenavAccordion" class="sb-sidenav accordion  " style="background-color: rgb(149, 125, 173);">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div>
                            <div class="sb-sidenav-menu-heading"></div><a data-bss-hover-animate="rubberBand" class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div><span>Formation</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="apphome.php">Formation</a></div>
                            </div>
                        </div>
                        <div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-bs-parent="#sidenavAccordion">
                                <div id="sidenavAccordionPages" class="sb-sidenav-menu-nested nav accordion"><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="pagesCollapseAuth" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"><span>Menu Item</span>
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div id="pagesCollapseAuth" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="profile.php"><i class="fa fa-user" style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Profil</a></div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="inscription.php"><i class="fa fa-pencil" style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Inscriptions & History</a></div>

                </div>
                <div class="sb-sidenav-footer"></div>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main class="d-flex flex-wrap p-5 gap-5">
                <h2>History</h2>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Starting date</th>
                            <th>Finishing date</th>
                            <th>Teacher</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Id_apprenant = $_SESSION['Id_apprenant_'];
                        $user = new User();
                        $result = $user->user_history($conn, $Id_apprenant);
                        foreach ($result as $val) {
                            $user->show_history($val);
                        }
                        ?>
                    </tbody>
                </table>
                <h2>My Inscriptions</h2>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Starting date</th>
                            <th>Finishing date</th>
                            <th>Teacher</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Id_apprenant = $_SESSION['Id_apprenant_'];
                        $user = new User();
                        $insc = $user->User_inscription($conn, $Id_apprenant);
                        foreach ($insc as $key) {
                            $Id_session = $key['Id_session'];
                            $session = "SELECT * FROM session WHERE Id_session = $Id_session";
                            $session = $conn->query($session);
                            $session = $session->fetch(PDO::FETCH_ASSOC);
                            $Id_formation_ = $session['Id_formation_'];
                            $f_name = "SELECT sujet FROM formation_ WHERE Id_formation_ = $Id_formation_";
                            $f_name = $conn->query($f_name);
                            $f_name = $f_name->fetch(PDO::FETCH_ASSOC);
                            $f_name = $f_name['sujet'];
                            $user->show_table($session, $key, 'ilias', $f_name);
                        }
                        ?>
                    </tbody>
                </table>
                <h2> en cours</h2>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Starting date</th>
                            <th>Finishing date</th>
                            <th>Teacher</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $date_en_session;
                        $Id_apprenant = $_SESSION['Id_apprenant_'];
                        $user = new User();
                        $insc = $user->User_inscription($conn, $Id_apprenant);
                        foreach ($insc as $key) {
                            $Id_session = $key['Id_session'];
                            $session = "SELECT * FROM session WHERE Id_session  = $Id_session";
                            $session = $conn->query($session);
                            $session = $session->fetch(PDO::FETCH_ASSOC);
                            $today = date("Y-m-d");
                            if ($session['Date_debut'] < $today && $session['Date_fin'] > $today) {
                                $date_en_session = $session['Date_fin'];
                                $Id_formation_ = $session['Id_formation_'];
                                $f_name = "SELECT sujet FROM formation_ WHERE Id_formation_ = $Id_formation_";
                                $f_name = $conn->query($f_name);
                                $f_name = $f_name->fetch(PDO::FETCH_ASSOC); 
                                $f_name = $f_name['sujet'];
                                $user->show_table($session, $key, 'ilias', $f_name);
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h2>à venir </h2>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Starting date</th>
                            <th>Finishing date</th>
                            <th>Teacher</th>
                            <th>Status</th>
                        </tr>c
                    </thead>
                    <tbody>
                        <?php
                        $Id_apprenant = $_SESSION['Id_apprenant_'];
                        $user = new User();
                        $insc = $user->User_inscription($conn, $Id_apprenant);
                        foreach ($insc as $key) {
                            $Id_session = $key['Id_session'];
                            $session = "SELECT * FROM session WHERE Id_session  = $Id_session";
                            $session = $conn->query($session);
                            $session = $session->fetch(PDO::FETCH_ASSOC);
                            $today = date("Y-m-d");
                            if ($session['Date_debut'] > $date_en_session) {
                                $Id_formation_ = $session['Id_formation_'];
                                $f_name = "SELECT sujet FROM formation_ WHERE Id_formation_ = $Id_formation_";
                                $f_name = $conn->query($f_name);
                                $f_name = $f_name->fetch(PDO::FETCH_ASSOC); 
                                $f_name = $f_name['sujet'];
                                $user->show_table($session, $key, 'ilias', $f_name);
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <div id="wrapper"></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Sidebar-Menu-sidebar.js"></script>
</body>