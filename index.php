<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cebu Restaurant Tracker</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <script src="js/markerclusterer.js" type="text/javascript"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .getdirection-content {
        padding-top: 7px;
        padding-left: 10px;
    }

    .btnVisit {
        margin-top: 20px;
    }

    .content_other_info {
        margin-top: 35px;
    }

    #totalvisits {
        margin-top: 10px;
    }

    #filter-locations {
        padding-top: 10px;
    }

    #sort-by {
        padding-left: 40px;
    }

    /* Get Location */
    .custom-map-control-button {
        position: relative;
        margin-top: 5px;
        z-index: 9;
        padding: 5px;
        margin-left: 5px;
        background: #a81167;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Get Location End */
    /*Popup Start*/
    .popup-overlay {
        /*Hides pop-up when there is no "active" class*/
        visibility: hidden;
        position: absolute;
        background: #ffffff;
        border: 3px solid #666666;
        width: 50%;
        height: 50%;
        left: 25%;
    }

    .popup-overlay-getdirection {
        /*Hides pop-up when there is no "active" class*/
        visibility: hidden;
        position: absolute;
        background: #ffffff;
        border: 3px solid #666666;
        width: 52%;
        height: 52%;
        left: 25%;
    }

    .popup-overlay.active {
        /*displays pop-up when "active" class is present*/
        visibility: visible;
        text-align: center;
    }

    .popup-overlay-getdirection {
        visibility: hidden;
    }

    .popup-overlay-getdirection.active {
        /*Shows pop-up content when "active" class is present */
        visibility: visible;
    }

    .popup-content {
        /*Hides pop-up content when there is no "active" class */
        visibility: hidden;
    }

    .popup-content.active {
        /*Shows pop-up content when "active" class is present */
        visibility: visible;
    }

    /*Pupup End*/
    #accordionSidebar {
        width: 500px !important;
    }

    html,
    body {
        background-color: #ccc;
        padding: 0;
        margin: 0;
        height: 100%;
    }

    .google-map {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 0;
    }

    #search-container {
        height: 100%;
        position: absolute;
        z-index: 1;
        max-width: 404px;
        margin-left: 10%;
    }

    .search-header {
        /* background-color: #525157; */
        background-color: #6782ad;
        color: #fff;
        padding: 26px 21px 19px;
    }

    .search-header h3 {
        font-size: 1.25rem;
    }

    .search-header a {
        color: #b1daec;
    }

    #search-container .search-header a:hover {
        color: white;
    }

    #search-container .search-header .input-group .input-group-label {
        border: none;
        background-color: #fff;
        color: #9b9b9b;
        padding: 0px 1rem;
    }

    #search-container .search-header .input-group .input-group-field {
        border: none;
        box-shadow: none;
        width: 95%;
        padding-left: 0px;
    }

    #search-container .search-header .input-group .button {
        background-color: #349ec8;
        font-weight: bold;
        padding: 0.85em 2em;
    }

    #search-container .search-header .input-group .button:hover {
        background-color: #0084ad;
    }

    #search-container #filter-locations .accordion-title {
        color: #339ec8;
        font-weight: bold;
        border: none;
        padding: 1.25rem 21px;
    }

    #search-container #filter-locations .accordion-title:hover,
    #search-container #filter-locations .accordion-title:focus,
    #search-container #filter-locations .accordion-title:active {
        background-color: transparent;
    }

    #search-container #filter-locations .accordion-title:before {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 1px solid #93cbe2;
        text-align: center;
        line-height: 13px;
        color: #93cbe2;
        font-weight: normal;
    }

    #search-container #filter-locations .accordion-content {
        border: none;
        padding: 0rem 21px;
    }

    #search-container #filter-locations .accordion-content input[type='checkbox'] {
        border-radius: none;
        border: 1px solid #ccc;
        height: 15px;
        width: 15px;
    }

    #search-container #filter-locations .accordion-content p {
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 0px;
    }

    #search-container #filter-locations .accordion-content label {
        color: #4a494e;
        margin-left: 4px;
    }

    #search-container .medium-4.columns {
        height: 100%;
    }

    #search-container #sort-by {
        padding: 5px 8px;
        font-size: 0.9rem;
        border-top: 1px solid #cbcbcb;
        border-bottom: 1px solid #cbcbcb;
        margin: 0px 21px 35px;
        color: #605f64;
    }

    #search-container #sort-by a {
        margin-left: 25px;
        color: #5eb2d6;
    }

    #search-container #sort-by a:hover {
        color: #0084ad;
    }

    .location-table {
        background-color: transparent !important;
        border: none;
        color: #4d4d4d;
        width: 90%;
        margin: 0px 21px;
        margin-top: 5px;
    }

    .location-table tbody {
        border: none;

    }

    .locations {
        border-top: 2px solid #e7e7e7;
        border-bottom: 2px solid #e7e7e7;
    }

    .location-table tr {
        background-color: transparent !important;
        border: none;
    }

    .location-table tr td {
        background-color: transparent !important;
        border: none;
        vertical-align: top;
        font-size: 12px;
    }

    .location-table tr td .location-header {
        font-size: 1rem;
        line-height: 1;
    }

    .location-table tr td .location-type {
        font-size: 11px;
        color: #9a9a9a;
    }

    .location-table tr td .location-address {
        font-size: 11px;
        color: #9a9a9a;
        line-height: 1.1;
    }

    .location-table tr td .location-number {
        color: #5eb2d6;
        font-size: 10px;
    }

    .location-table tr td .location-distance {
        line-height: 1;
        font-weight: bold;
        font-size: 11px;
    }

    .location-table tr td .location-lobby-header {
        line-height: 1;
        font-weight: bold;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .location-table tr td .location-driveup-header {
        line-height: 1;
        font-weight: bold;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .location-table tr td .location-driveup-hours,
    .location-table tr td .location-lobby-hours {
        font-size: 13px;
    }

    .location-table tr td .make-my-location a {
        color: #349ec8;
    }

    .location-table tr td .make-my-location a:hover {
        color: #0084ad;
    }

    .location-table tr td .location-more-info a {
        color: #349ec8;
        font-weight: bold;
    }

    .location-table tr td .location-more-info a:hover {
        color: #0084ad;
    }

    .location-table tr td .location-more-info a:last-child {
        padding-left: 15px;
    }

    #my_view {
        width: 100%;
        border-right: 1px solid #979797;
        height: 100%;
        background-color: #fff;
        box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, .5);
    }

    ul {
        list-style: none;
        margin: 0;
    }

    #map {
        position: relative;
        width: auto;
        overflow: hidden;
        height: 600px;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Cebu Restaurant Tracker</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">

            </div>

            <div id="my_view">
                <div class="search-header">
                    <h3>Find an Restaurant near you</h3>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div><a class="accordion-title" id="get-current-location">Use current location</a>
                    </div>
                </div>
                <ul id="filter-locations" class="accordion" data-accordion="" data-allow-all-closed="true">
                    <li class="accordion-item" data-accordion-item="">
                        <a class="accordion-title">FILTER LOCATIONS</a>
                        <div class="accordion-content" data-tab-content="">
                            <p>Rating</p>
                            <input type="checkbox" name="location_atm" class="rating" checked value="5 Star"> <label
                                for="location_atm"><i class="glyphicon glyphicon-star"></i>5 Star </label>
                            <input type="checkbox" name="location_branch" class="rating" checked value="4 Star">
                            <label for="location_branch">4 Star</label>
                            <input type="checkbox" name="shared_branch" class="rating" checked value="3 Star"> <label
                                for="shared_branch">3 Star</label>
                            <input type="checkbox" name="shared_branch" class="rating" checked value="2 Star"> <label
                                for="shared_branch">2 Star</label>
                            <input type="checkbox" name="shared_branch" class="rating" checked value="1 Star"> <label
                                for="shared_branch">1 Star</label>
                            <p>Speciality</p>
                            <input type="checkbox" name="location_247" class="speciality" checked value="Seafood">
                            <label for="location_247">Seafood</label>
                            <input type="checkbox" name="location_drive_thru" class="speciality" checked value="Cafe">
                            <label for="location_drive_thru">Cafe</label>
                            <input type="checkbox" name="location_drive_thru" class="speciality" checked value="Korean">
                            <label for="location_drive_thru">Korean</label>
                            <input type="checkbox" name="location_drive_thru" class="speciality" checked
                                value="Japanese"> <label for="location_drive_thru">Japanese</label>
                            <input type="checkbox" name="location_drive_thru" class="speciality" checked value="Pizza">
                            <label for="location_drive_thru">Pizza</label>
                        </div>
                    </li>
                </ul>
                <div id="sort-by">Sort By: <a href="">Distance</a> <a>A-Z</a></div>
                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">AA BBQ</div>
                                    <div class="location-type">Restaurant | Speciality Seafood   </div>
                                </td>
                                <td>
                                    <div class="location-address">Salinas Dr, <br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end of AABQ -->
                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">Abaca Baking Company</div>
                                    <div class="location-type">Restaurant | Speciality Cafe</div>
                                </td>
                                <td>
                                    <div class="location-address">Cebu, <br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">Ilaputi</div>
                                    <div class="location-type">Restaurant | Speciality Korean</div>
                                </td>
                                <td>
                                    <div class="location-address">Cebu, <br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">Cafe Marco</div>
                                    <div class="location-type">Restaurant | Speciality Cafe</div>
                                </td>
                                <td>
                                    <div class="location-address">Cebu Veterans Dr, <br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">Pizzera Michelangelo</div>
                                    <div class="location-type">Restaurant | Speciality Pizza</div>
                                </td>
                                <td>
                                    <div class="location-address">Paseo Saturnino<br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                                <div class="locations">
                    <table class="location-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="location-icon text-center">1</div>
                                </td>
                                <td>
                                    <div class="location-header">Vikings Luxury Buffet</div>
                                    <div class="location-type">Restaurant | Speciality Pasta</div>
                                </td>
                                <td>
                                    <div class="location-address">Salinas Dr, <br> Cebu City</div>
                                    <div class="location-number">512-302-3881</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <div class="location-distance text-center">0.86 <br>mi</div></td> -->
                                <td>
                                    <div class="location-lobby-header">Lobby Hours</div>
                                    <div class="location-lobby-hours">Mon-Fri 10:00-7:00 <br>Sat 10:00-4:00 <br>Sun
                                        Closed</div>
                                </td>
                                <td>
                                    <div class="location-driveup-header">Drive-up Hours</div>
                                    <div class="location-driveup-hours">Mon-Fri 8:00-6:00 <br>Sat-Sun Closed</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="make-my-location"><a href="">Make My Location</a></div>
                                </td>
                                <td>
                                    <div class="location-more-info"><a href="">Learn More</a> <a href="">Directions</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Van Anthony S. Valencia</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <div class="row">
                        <!-- map container -->


                        <!-- marker popup detail end -->
                        <div class="col-xl-12 col-lg-12">

                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Google Map</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="map">
                                        <div class="line"></div>
                                    </div>
                                </div>
                                <!-- Get Direction Popup -->
                                <div class="popup-overlay-getdirection" style="height: 50px;">
                                    <div class="content getdirection-content">
                                        <form>
                                            <label>From: </label>
                                            <input class="textbox" id="start" type="text">
                                            <label>To: </label>
                                            <input class="textbox" readonly="readonly" id="end" type="text">
                                            <button id="btn-g" class="map-button btn-success">Click</button>
                                            <button stlyle="margin-top: 3px; margin-right: 4px;"
                                                class="close">X</button>
                                        </form>
                                    </div>

                                </div>



                                <!-- Get Direction Popup End -->
                                <!-- marker popup detail -->
                                <div class="popup-overlay">
                                    <!--Creates the popup content-->
                                    <div class="popup-content">

                                        <div class="content">

                                            <div class="content_title">&nbsp;</div>

                                            <button style="margin-right: 22px; margin-top: -8px;" class="close">X</button>
                                            <div class="content_desc">&nbsp;</div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <img class="img-fluid mt-3 mb-4" style="width: 21rem;"
                                                            src="img/restauranticon.jpg" alt="...">
                                                    </div>

                                                    <div class="col-sm">
                                                        <div class="content_other_info">&nbsp;</div>

                                                        <a href="#" class="btn btn-success btn-icon-split btnVisit">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Visit Us</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Data Visualization Chart -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Weekly Earnings Overview</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="ChartWeeklyEarning"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daily Top Visitor</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie">
                                        <canvas id="oilChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>

                        <!-- Data Visualization -->

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; Cebu Restaurant Tracker 2023</span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Map API -->
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZBdbvczlz2tZl7KMokuobfLk6q6Us_no&libraries=drawing&callback=initMap">
                </script>
                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
            -->
                <!-- jQuery Version (V3) -->
                <link rel="stylesheet" href="css/jquery.raty.css">
                <script src="//code.jquery.com/jquery.min.js"></script>
                <script src="js/jquery.raty.js"></script>
                <!-- Map Js -->
                <script src="js/map.js"></script>

                <!-- Other jQuery Stuff -->
                <script type="text/javascript">
                $(document).ready(function() {
                    // let score = 3;

                    $(document).on('change', 'input.speciality', function(e) {

                        var allchecked = [];

                        // capture all checked checkboxes in an array
                        $.each($('.speciality:checkbox:checked'), function(i, v) {
                            allchecked.push($(v).val());
                        });

                        setTimeout(applyFilter(allchecked, 'set', 'speciality'), 1000);

                    });

                    $(document).on('change', 'input.rating', function(e) {

                        var allchecked = [];

                        // capture all checked checkboxes in an array
                        $.each($('.rating:checkbox:checked'), function(i, v) {
                            allchecked.push($(v).val());
                        });

                        setTimeout(applyFilter(allchecked, 'set', 'rating'), 1000);

                    });


                });
                </script>

</body>

</html>