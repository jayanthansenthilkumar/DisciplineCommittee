<?php
include("config.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIC</title>
    <link rel="icon" type="image/png" sizes="32x32" href="image/icons/mkce_s.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --topbar-height: 60px;
            --footer-height: 60px;
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --dark-bg: #1a1c23;
            --light-bg: #f8f9fc;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* General Styles with Enhanced Typography */

        /* Content Area Styles */
        .content {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* Content Navigation */
        .content-nav {
            background: linear-gradient(45deg, #4e73df, #1cc88a);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .content-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
            overflow-x: auto;
        }

        .content-nav li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .content-nav li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar.collapsed+.content {
            margin-left: var(--sidebar-collapsed-width);
        }

        .breadcrumb-area {
            background: white;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            margin: 20px;
            padding: 15px 20px;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb-item a:hover {
            color: #224abe;
        }



        /* Table Styles */



        .gradient-header {
            --bs-table-bg: transparent;
            --bs-table-color: white;
            background: linear-gradient(135deg, #4CAF50, #2196F3) !important;

            text-align: center;
            font-size: 0.9em;


        }


        td {
            text-align: left;
            font-size: 0.9em;
            vertical-align: middle;
            /* For vertical alignment */
        }






        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width) !important;
            }

            .sidebar.mobile-show {
                transform: translateX(0);
            }

            .topbar {
                left: 0 !important;
            }

            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .mobile-overlay.show {
                display: block;
            }

            .content {
                margin-left: 0 !important;
            }

            .brand-logo {
                display: block;
            }

            .user-profile {
                margin-left: 0;
            }

            .sidebar .logo {
                justify-content: center;
            }

            .sidebar .menu-item span,
            .sidebar .has-submenu::after {
                display: block !important;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            .footer {
                left: 0 !important;
            }

            .content-nav ul {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 5px;
            }

            .content-nav ul::-webkit-scrollbar {
                height: 4px;
            }

            .content-nav ul::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3);
                border-radius: 2px;
            }
        }

        .container-fluid {
            padding: 20px;
        }


        /* loader */
        .loader-container {
            position: fixed;
            left: var(--sidebar-width);
            right: 0;
            top: var(--topbar-height);
            bottom: var(--footer-height);
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            /* Changed from 'none' to show by default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            transition: left 0.3s ease;
        }

        .sidebar.collapsed+.content .loader-container {
            left: var(--sidebar-collapsed-width);
        }

        @media (max-width: 768px) {
            .loader-container {
                left: 0;
            }
        }

        /* Hide loader when done */
        .loader-container.hide {
            display: none;
        }

        /* Loader Animation */
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid var(--primary-color);
            border-right: 5px solid var(--success-color);
            border-bottom: 5px solid var(--primary-color);
            border-left: 5px solid var(--success-color);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .breadcrumb-area {
            background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            margin: 20px;
            padding: 15px 20px;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb-item a:hover {
            color: #224abe;
        }
    </style>
    <style>
        /* Unique styling for the download button */
        .btnDownload {
            position: absolute;
            top: 0;
            right: 0;
        }

        /* Media query for responsiveness */
        @media screen and (max-width: 768px) {
            .btnDownload {
                position: absolute;
                top: 0;
                right: 0;
            }
        }

        .btndownload {
            position: absolute;
            right: 35px;
            bottom: 15px;
        }

        /* Media query for responsiveness */
        @media screen and (max-width: 768px) {
            .btndownload {
                position: absolute;
                right: 25px;
                bottom: 15px;
            }
        }
    </style>

    <style>
        /* Hide the content initially */
        #pdf-content {
            display: none;
        }

        /* Custom table styling */
        .custom-table th,
        .custom-table td {
            padding: 5px;
            font-size: 12px;
            text-align: center;
        }

        /* Chart Styling */
        .chart {
            width: 300px;
            height: 210px;
            margin: 20px auto;
            border: 1px solid #ccc;
            text-align: center;
        }

        .bar {
            display: inline-block;
            width: 21px;
            margin-top: 25px;
            margin-right: 1px;
            margin-left: 3px;
            position: relative;
            margin-bottom: 28px;
            background-color: #3498db;
        }

        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            font-weight: bold;
        }

        /* Flexbox Layout */
        .row {
            display: flex;
        }

        .column {
            flex: 1;
            padding: 10px;
        }

        #pdf-content {
            display: none;
        }

        /* Updated table styling specifically for table1 */
        #table1 th {
            background-color: #ddd !important;
            color: #000;
            border: 1px solid #000;
            padding: 8px;
            font-size: 13px;
            text-align: center;
            font-weight: bold;
        }

        #table1 td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12px;
            text-align: center;
            font-weight: bold;
        }

        #table1 {
            border-collapse: collapse;
            width: 99%;
        }

        /* Keep other styles as needed */
        .chart {
            width: 300px;
            height: 210px;
            margin: 20px auto;
            border: 1px solid #ccc;
            text-align: center;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 1;
            padding: 10px;
        }
    </style>



</head>

<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="content">

        <div class="loader-container" id="loaderContainer">
            <div class="loader"></div>
        </div>

        <!-- Topbar -->
        <?php include 'topbar.php'; ?>
        <!-- Replace both breadcrumb sections with this unified one -->
        <div class="breadcrumb-area custom-gradient">
            <nav aria-label="breadcrumb">
                <div class="row mx-2">
                    <div class="col-12 d-flex align-items-center justify-content-between position-relative">
                        <h4 class="page-title mb-0">Discipline Committee</h4>
                        <button onclick="generatePDF()" class="btn btn-rounded btn-outline-success shadow"
                            style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%);">
                            Download Report
                        </button>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Content Area -->
        <div class="container-fluid">
            <div class="custom-tabs">
                <div class="page-wrapper">

                    <div class="container text-center"><br>
                        <br>
                        <!-- Search Button -->
                        <button class="btn btn-rounded btn-outline-success shadow" id="myButton" data-bs-toggle="modal"
                            data-bs-target="#myModal7">
                            Search
                        </button>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane p-20 active" id="journal" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered ">
                                                <thead class="gradient-header">
                                                    <tr>
                                                        <th class="text-center" scope="col">S.No</th>
                                                        <th class="text-center" scope="col">Register Number</th>
                                                        <th class="text-center" scope="col">Students Name</th>
                                                        <th class="text-center" scope="col">Department</th>
                                                        <th class="text-center" scope="col">Date</th>
                                                        <th class="text-center" scope="col">Remarks</th>
                                                        <th class="text-center" scope="col">Occurrence</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-body">
                                                    <!--modal backend code -->
                                                    <?php
                                                    $datestart = "0000-00-00"; // Initialize variable to store the start date
                                                    $dateend = "0000-00-00"; // Initialize variable to store the end date
                                                    $regno = "regno";
                                                    $occ = 0;
                                                    $remark = "remark";
                                                    $q = 0;
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        // Check if the form has been submitted
                                                        // Retrieve the start date input from the form
                                                        $occ = $_POST['occ'];
                                                        $regno = $_POST['regno'];
                                                        $remark = $_POST['remark'];
                                                        if (empty($occ)) {
                                                            $occ = 0;
                                                        }
                                                        if (empty($regno)) {
                                                            $regno = "regno";
                                                        }
                                                        // Validate and process the dates
                                                        // Store the validated dates in PHP variables
                                                    }
                                                    ?>
                                                    <?php
                                                    // Fetch data and populate the table rows
                                                    $sql = "";
                                                    $sql2 = "";
                                                    $q = 0;
                                                    if ($regno != "regno") {
                                                        if ($remark != "remark") {
                                                            $sql2 = "SELECT * FROM indiscipline where regno='$regno' and remarks='$remark' order by date DESC";
                                                        } else {
                                                            $sql2 = "SELECT * FROM indiscipline where regno='$regno' order by date DESC,remarks asc";
                                                        }
                                                    } else {
                                                        if ($remark != "remark") {
                                                            $sql2 = "SELECT * FROM indiscipline where remarks='$remark' order by date DESC";
                                                        } else if ($occ > 0) {
                                                            $sql2 = "SELECT * FROM indiscipline order by date DESC";
                                                        } else {
                                                            $q = 1;
                                                        }
                                                    }
                                                    $sn = 1;
                                                    if ($q == 0) {
                                                        if ($db->connect_error) {
                                                            die("Connection failed: " . $db->connect_error);
                                                        }

                                                    ?>
                                                    <?php
                                                        // Fetch data and populate the table rows
                                                        if ($db->connect_error) {
                                                            die("Connection failed: " . $db->connect_error);
                                                        }
                                                        $result2 = $db->query($sql2);
                                                        if ($result2->num_rows > 0) {
                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                $a = $row2["regno"];
                                                                $b = $row2["date"];
                                                                $c = $row2["remarks"];
                                                                $sqls2 = "SELECT * FROM indiscipline where regno='$a' and date<='$b' and remarks='$c'";
                                                                $results2 = $db->query($sqls2);
                                                                $counts2 = mysqli_num_rows($results2);
                                                                $newDateFormat = date('d-m-Y', strtotime($b));
                                                                if ($counts2 >= $occ) {
                                                                    echo "<tr class='text-center'>
                                                                    <td class='text-center'>{$sn}</td>
                                                                    <td class='text-center'>{$a}</td>
                                                                    <td class='text-center'>{$row2["name"]}</td>
                                                                    <td class='text-center'>{$row2["dept"]}</td>
                                                                    <td class='text-center'>{$newDateFormat}</td>
                                                                    <td class='text-center'>{$row2["remarks"]}</td>
                                                                    <td class='text-center'>{$counts2}</td>
                                                                    </tr>";
                                                                    $sn++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $db->close();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="modal fade" id="myModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Search</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="search_student" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="regno" class="form-label">Register Number:</label>
                                <input type="text" id="regno" name="regno" placeholder="Enter Register Number"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="occ" class="form-label">Occurrence:</label>
                                <input type="number" id="occ" name="occ" placeholder="Enter Occurrence" min="0"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remarks:</label>
                                <select id="remark" name="remark" class="form-control">
                                    <option value="remark">Remarks</option>
                                    <option value="Not Having Helmet">Not Having Helmet</option>
                                    <option value="Not Wearing Helmet">Not Wearing Helmet</option>
                                    <option value="Not Clean Shaved">Not Clean Shaved</option>
                                    <option value="Late Comer">Late Comer</option>
                                    <option value="Not Wearing formal Shoe">Not Wearing formal Shoe</option>
                                    <option value="Not Wearing Shoe">Not Wearing Shoe</option>
                                    <option value="Not Wearing ID">Not Wearing ID</option>
                                    <option value="Not Proper Hair style">Not Proper Hair style</option>
                                    <option value="Using Mobile Phone">Using Mobile Phone</option>
                                    <option value="Unwanted Roaming">Unwanted Roaming</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-outline-success shadow">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>




    <!-- Footer -->
    <?php include 'footer.php'; ?>
    </div>

    <script>
        const loaderContainer = document.getElementById('loaderContainer');

        function showLoader() {
            loaderContainer.classList.add('show');
        }

        function hideLoader() {
            loaderContainer.classList.remove('show');
        }

        //    automatic loader
        document.addEventListener('DOMContentLoaded', function() {
            const loaderContainer = document.getElementById('loaderContainer');
            let loadingTimeout;

            function hideLoader() {
                loaderContainer.classList.add('hide');
            }

            function showError() {
                console.error('Page load took too long or encountered an error');
                // You can add custom error handling here
            }

            // Set a maximum loading time (10 seconds)
            loadingTimeout = setTimeout(showError, 10000);

            // Hide loader when everything is loaded
            window.onload = function() {
                clearTimeout(loadingTimeout);

                // Add a small delay to ensure smooth transition
                setTimeout(hideLoader, 500);
            };

            // Error handling
            window.onerror = function(msg, url, lineNo, columnNo, error) {
                clearTimeout(loadingTimeout);
                showError();
                return false;
            };
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Cache DOM elements
            const elements = {
                hamburger: document.getElementById('hamburger'),
                sidebar: document.getElementById('sidebar'),
                mobileOverlay: document.getElementById('mobileOverlay'),
                menuItems: document.querySelectorAll('.menu-item'),
                submenuItems: document.querySelectorAll('.submenu-item') // Add submenu items to cache
            };

            // Set active menu item based on current path
            function setActiveMenuItem() {
                const currentPath = window.location.pathname.split('/').pop();

                // Clear all active states first
                elements.menuItems.forEach(item => item.classList.remove('active'));
                elements.submenuItems.forEach(item => item.classList.remove('active'));

                // Check main menu items
                elements.menuItems.forEach(item => {
                    const itemPath = item.getAttribute('href')?.replace('/', '');
                    if (itemPath === currentPath) {
                        item.classList.add('active');
                        // If this item has a parent submenu, activate it too
                        const parentSubmenu = item.closest('.submenu');
                        const parentMenuItem = parentSubmenu?.previousElementSibling;
                        if (parentSubmenu && parentMenuItem) {
                            parentSubmenu.classList.add('active');
                            parentMenuItem.classList.add('active');
                        }
                    }
                });

                // Check submenu items
                elements.submenuItems.forEach(item => {
                    const itemPath = item.getAttribute('href')?.replace('/', '');
                    if (itemPath === currentPath) {
                        item.classList.add('active');
                        // Activate parent submenu and its trigger
                        const parentSubmenu = item.closest('.submenu');
                        const parentMenuItem = parentSubmenu?.previousElementSibling;
                        if (parentSubmenu && parentMenuItem) {
                            parentSubmenu.classList.add('active');
                            parentMenuItem.classList.add('active');
                        }
                    }
                });
            }

            // Handle mobile sidebar toggle
            function handleSidebarToggle() {
                if (window.innerWidth <= 768) {
                    elements.sidebar.classList.toggle('mobile-show');
                    elements.mobileOverlay.classList.toggle('show');
                    document.body.classList.toggle('sidebar-open');
                } else {
                    elements.sidebar.classList.toggle('collapsed');
                }
            }

            // Handle window resize
            function handleResize() {
                if (window.innerWidth <= 768) {
                    elements.sidebar.classList.remove('collapsed');
                    elements.sidebar.classList.remove('mobile-show');
                    elements.mobileOverlay.classList.remove('show');
                    document.body.classList.remove('sidebar-open');
                } else {
                    elements.sidebar.style.transform = '';
                    elements.mobileOverlay.classList.remove('show');
                    document.body.classList.remove('sidebar-open');
                }
            }

            // Toggle User Menu
            const userMenu = document.getElementById('userMenu');
            const dropdownMenu = userMenu.querySelector('.dropdown-menu');
            userMenu.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdownMenu.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', () => {
                dropdownMenu.classList.remove('show');
            });

            // Enhanced Toggle Submenu with active state handling
            const menuItems = document.querySelectorAll('.has-submenu');
            menuItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default if it's a link
                    const submenu = item.nextElementSibling;

                    // Toggle active state for the clicked menu item and its submenu
                    item.classList.toggle('active');
                    submenu.classList.toggle('active');

                    // Handle submenu item clicks
                    const submenuItems = submenu.querySelectorAll('.submenu-item');
                    submenuItems.forEach(submenuItem => {
                        submenuItem.addEventListener('click', (e) => {
                            // Remove active class from all submenu items
                            submenuItems.forEach(si => si.classList.remove(
                                'active'));
                            // Add active class to clicked submenu item
                            submenuItem.classList.add('active');
                            e.stopPropagation(); // Prevent event from bubbling up
                        });
                    });
                });
            });

            // Initialize event listeners
            function initializeEventListeners() {
                // Sidebar toggle for mobile and desktop
                if (elements.hamburger && elements.mobileOverlay) {
                    elements.hamburger.addEventListener('click', handleSidebarToggle);
                    elements.mobileOverlay.addEventListener('click', handleSidebarToggle);
                }
                // Window resize handler
                window.addEventListener('resize', handleResize);
            }

            // Initialize everything
            setActiveMenuItem();
            initializeEventListeners();
        });


        $(document).ready(function() {
            $('#zero_config').DataTable({
                responsive: true, // Enable responsive design for smaller screens
                "lengthMenu": [10, 25, 50, 75, 100], // Set the number of rows per page
                "pageLength": 10, // Default number of rows per page
                "order": [
                    [0, 'asc']
                ] // Sort the table by the first column (S.No)
            });
        });
    </script>



    <div class="container mt-4" id="pdf-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <img src="image/logo2.jpeg" alt="Logo" height="50px">
            <h2 class="text-center fs-4">DISCIPLINE REPORT</h2>
            <img src="image/kr.jpg" alt="Logo" height="30px" style="margin-right: 100px;">
        </div>

        <?php require 'config.php'; ?>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered custom-table" id="table1">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Date</th>
                        <th scope="col">Register Number</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Dept</th>
                        <th scope="col">Year</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Occurance</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $sn = 1;
                    if ($q == 0) {
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }
                        $result2 = $db->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $a = $row2["regno"];
                                $b = $row2["date"];
                                $c = $row2["remarks"];
                                $sqls2 = "SELECT * FROM indiscipline WHERE regno='$a' AND date<='$b' AND remarks='$c'";
                                $results2 = $db->query($sqls2);
                                $counts2 = mysqli_num_rows($results2);
                                $newDateFormat = date('d-m-Y', strtotime($b));
                                if ($counts2 >= $occ) {
                                    echo "<tr>
                                        <td>{$sn}</td>
                                        <td>{$newDateFormat}</td>
                                        <td>{$row2['regno']}</td>
                                        <td>{$row2['name']}</td>
                                        <td>{$row2['dept']}</td>
                                        <td>{$row2['year']}</td>
                                        <td>{$row2['remarks']}</td>
                                        <td>{$counts2}</td>
                                    </tr>";
                                    $sn++;
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if ($sn == 1 || $q == 1) {
                echo "<p class='text-danger text-center'>No relevant data was found during the search query.</p>";
            }
            ?>
        </div>
    </div>


    <script>
        function generatePDF() {
            var originalElement = document.getElementById('pdf-content');
            console.log("Hello, the button was clicked!");
            // Select the HTML element to be converted to PDF
            // Create a new div element
            var pdfContainer = document.createElement('div');

            // Set the HTML content of the new div to be the same as the original content
            pdfContainer.innerHTML = originalElement.innerHTML;
            // Options for html2pdf
            var options = {
                margin: 10,
                filename: 'Discipline report (individual.data).pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },
                // Callback to remove the new div element after PDF generation
                onAfterRender: function() {
                    document.body.removeChild(pdfContainer);
                }
            };

            // Call html2pdf library to generate PDF using the new div element
            html2pdf(pdfContainer, options);
        }
    </script>
</body>

</html>