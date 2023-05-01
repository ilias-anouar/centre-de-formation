<?php
session_start();
// echo "<pre>";
// var_dump($_SESSION);
// echo "<pre/>";
require("connect.php");
include("class.php");
$cat = "SELECT DISTINCT categorie FROM formation_";
$cat = $conn->query($cat);
$cat = $cat->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"
                    style="background: #957DAD;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-intersect" style="font-size: 24px;">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2h5z">
                        </path>
                    </svg></span><span><span style="color: rgb(149, 125, 173);">E</span>duSphere</span></a><button
                data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex">
                        <form action="" method="post">
                            <div class="searchBox">
                                <input class="searchInput" type="text" name="subject_like" placeholder="Search">
                                <button class="searchButton" type="submit" name="seach_btn">
                                    <i class="material-icons">
                                        search
                                    </i>
                                </button>
                            </div>
                        </form>

                        <form style="padding-top: 0px;margin-top: 6px;" method="post">
                            <div class="field">
                                <select class="form-select" name="cat">
                                    <optgroup label="This is a group">
                                        <?php
                                        foreach ($cat as $key) {
                                            ?>
                                            <option value="<?php echo $key['categorie'] ?>"><?php echo $key['categorie'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </optgroup>
                                </select><label class="form-label mb-0" for="float-input"></label>
                            </div>
                            <button type="submit" name="filter_cat">Filter</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="sidenavAccordion" class="sb-sidenav accordion  " style="background-color: rgb(149, 125, 173);">
                <div class="sb-sidenav-menu">
                    <!-- <div class="nav">
                        <div>
                            <div class="sb-sidenav-menu-heading"></div><a data-bss-hover-animate="rubberBand"
                                class="nav-link collapsed" href="#" aria-expanded="false"
                                aria-controls="collapseLayouts" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div><span>Formation</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#">Session</a></div>
                            </div>
                        </div>
                        <div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-bs-parent="#sidenavAccordion">
                                <div id="sidenavAccordionPages" class="sb-sidenav-menu-nested nav accordion"><a
                                        class="nav-link collapsed" href="#" aria-expanded="false"
                                        aria-controls="pagesCollapseAuth" data-bs-toggle="collapse"
                                        data-bs-target="#pagesCollapseAuth"><span>Menu Item</span>
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div id="pagesCollapseAuth" class="collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordionPages"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#"><i class="fa fa-user"
                                style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Profil</a></div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#"><i class="fa fa-pencil"
                                style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Inscriptions</a></div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="#"><i class="fa fa-th-list"
                                style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Historique</a></div>
                </div>
                <div class="sb-sidenav-footer"></div>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main class="d-flex flex-wrap p-5 gap-5">
                <?php
                $formation = new Formation;
                if (isset($_POST['seach_btn'])) {
                    ?>
                    <p>Your search result</p><br>
                    <?php
                    $value = $_POST['subject_like'];
                    $result = $formation->searsh_subject($conn, $value);
                    $formation->Creat_card($result);
                } elseif (isset($_POST['filter_cat'])) {
                    $cat = $_POST['cat'];
                    ?>
                    <p>all formations in
                        <?php echo $cat ?> category
                    </p><br>
                    <?php
                    $result = $formation->sort($conn, $cat);
                    $formation->Creat_card($result);
                } else {
                    $result = $formation->formation($conn);
                    $formation->Creat_card($result);
                }
                ?>
            </main>
        </div>
    </div>
    <div id="wrapper"></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Sidebar-Menu-sidebar.js"></script>
</body>

</html>