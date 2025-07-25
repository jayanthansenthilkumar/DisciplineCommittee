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
        /* Custom CSS to reduce table size */
        .custom-table2 {
            max-width: 100%;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            /* Center-align the table */
            text-align: center;
        }

        .custom-table2 th,
        .custom-table2 td {
            padding: 3px;
            /* Adjust cell padding */

            font-size: 10px;
            /* Adjust the font size for table headers and data cells */
            line-height: 1.5;
        }

        /* CSS to hide the content */
        #pdf-content {
            display: none;
        }

        /* Custom CSS to reduce table size */
        .custom-table {
            max-width: 100%;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            /* Center-align the table */
            text-align: center;

        }

        .custom-table th,
        .custom-table td {
            padding: 2px;
            /* Adjust cell padding */
            font-size: 11px;
            /* Adjust the font size for table headers and data cells */
            line-height: 1;
        }

        .total-row td {
            font-size: 13px;
            /* Adjust the font size for the total row */
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            /* Optionally bolden the text */
            line-height: 1.3;
        }

        .chart {
            width: 250px;
            margin: 20px auto;
            border: 1px solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-end;
        }

        .bar-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bar {
            width: 20px;
            margin-bottom: 20px;
            background-color: #3498db;
            display: inline-block;
            width: 21px;
            margin-top: 25px;
            margin-right: 1px;
            margin-left: 3px;
            position: relative;
            margin-bottom: 28px;
        }

        .bar-label {
            font-size: 12px;
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 100%;
            text-align: center;
            font-weight: bold;
            font-size: 8px;
        }

        .chart {
            width: 300px;
            height: 210px;
            margin: 20px auto;
            border: 1px solid #ccc;
            text-align: center;
        }


        .bar-height {
            font-size: 10px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
        }


        .row {
            display: flex;
        }

        .column {
            flex: 1;
            /* Adjust this value to set the relative size of columns */
            padding: 10px;
            /* Remove border */
        }

        /* Custom CSS to reduce table size */
        .custom-table1 {
            max-width: 60%;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            /* Center-align the table */
            text-align: center;
        }

        .custom-table1 th,
        .custom-table1 td {
            padding: 3px;
            /* Adjust cell padding */
            font-size: 12px;
            /* Adjust the font size for table headers and data cells */
            line-height: 1;
        }

        .custom-table1 th {
            font-weight: bold;
        }

        .total-row1 td {
            font-size: 15px;
            /* Adjust the font size for the total row */
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            /* Optionally bolden the text */
            line-height: 1.3;
        }

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

        #searchInput {
            padding: 8px 12px;
            /* Adjust padding as needed */
            border-radius: 10px;
            /* Adjust border radius as needed */
            border: 1px solid #ccc;
            /* Border color */
            font-size: 14px;
            /* Adjust font size as needed */
            width: 200px;
            /* Adjust width as needed */
        }

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

</head>

<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>


    <!-- Main Content -->
    <div class="content">
        <div class="loader-container" id="loaderContainer">
            <div class="loader"></div>
        </div>
        <?php include 'topbar.php'; ?>
        <?php
        $datestart = "2000-01-01";
        $dateend = "0000-00-00";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $input_date_start = $_POST['input_date_start'];
            if (isset($_POST['input_date_end'])) {
                $input_date_end = $_POST['input_date_end'];
                if (!empty($input_date_start) && !empty($input_date_end)) {
                    $datestart = date("Y-m-d", strtotime($input_date_start));
                    $datestart2 = date("d-m-Y", strtotime($input_date_start));
                    $dateend = date("Y-m-d", strtotime($input_date_end));
                    $dateend2 = date("d-m-Y", strtotime($input_date_end));
                }
            }
        }
        ?>
        <div class="breadcrumb-area custom-gradient">
            <nav aria-label="breadcrumb">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="page-title mb-0">Discipline Committee</h4>
                    <button onclick="downloadPDF()" class="btn btn-rounded btn-outline-success shadow btnDownload"
                        id="myButton">Download Report</button>
                </div>
                <form id="search_student" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                    class="row g-3 mt-3">
                    <div class="col-md-5">
                        <label for="input_date_start" class="form-label">From:</label>
                        <input type="date" id="input_date_start" name="input_date_start" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label for="input_date_end" class="form-label">To:</label>
                        <input type="date" id="input_date_end" name="input_date_end" class="form-control" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" name="submit"
                            class="searching btn btn-rounded btn-outline-success shadow w-100">Submit</button>
                    </div>
                </form>
            </nav>
        </div>
        <div class="container-fluid">

            <?php $start_it2 = $datestart;
            $end_it2 = $dateend; ?>
            <div class="table-responsive mt-4">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead class="gradient-header">
                        <tr>
                            <th class="text-center" scope="col">S.No</th>
                            <th class="text-center" scope="col">Register Number</th>
                            <th class="text-center" scope="col">Students Name</th>
                            <th class="text-center" scope="col">Department</th>
                            <th class="text-center" scope="col">Date</th>
                            <th class="text-center" scope="col">Remarks</th>
                            <th class="text-center" scope="col">Occurance</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sn = 1;
                        while ($start_it2 <= $end_it2) {
                            if ($db->connect_error) {
                                die("Connection failed: " . $db->connect_error);
                            }
                            $sql2 = "SELECT * FROM indiscipline WHERE date='$end_it2' ORDER BY regno ASC, remarks ASC";
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
                                    echo "<tr>
                                    <td class='text-center'>" . $sn++ . "</td>
                                    <td class='text-center'>" . $row2["regno"] . "</td>
                                    <td class='text-center'>" . $row2["name"] . "</td>
                                    <td class='text-center'>" . $row2["dept"] . "</td>
                                    <td class='text-center'>" . $newDateFormat . "</td>
                                    <td class='text-center'>" . $row2["remarks"] . "</td>
                                    <td class='text-center'>" . $counts2 . "</td>
                                    </tr>";
                                }
                            }
                            $end_it2 = date('Y-m-d', strtotime($end_it2 . ' -1 day'));
                        }
                        $db->close();
                        ?>
                    </tbody>
                </table>
                <?php if ($sn == 1)
                    echo '<p class="text-danger text-center mt-3">No relevant data was found during the search query.</p>'; ?>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>






    <div id="pdf-content">
        <div class="d-flex justify-content-between">
            <img src="image/logo2.jpeg" alt="homepage" height="50px" class="light-logo" />
            <h2>DISCIPLINE REPORT</h2>
            <img src="image/kr.jpg" alt="homepage" height="30px" class="light-logo" /><br>
        </div>
        <font size=+1><b>Date: <?php echo $datestart2 ?> to <?php echo $dateend2 ?></b></font>


        <?php
        require 'config.php';
        ?>

        <?php
        $department = array("AI", "CIVIL", "CSBS", "CSE", "ECE", "EEE", "IT", "MECH", "FE", "MBA", "MCA");
        $remarks = array("Not Clean Shaved", "Not Wearing Shoe", "Not Proper Hair style", "Late Comer", "Not Wearing ID", "Not Wearing formal Shoe", "Not Wearing Helmet");
        $count = array(304, 111, 170, 379, 729, 524, 374, 373, 1001, 126, 124);
        $count1 = array(304, 111, 170, 379, 729, 524, 374, 373, 1001, 126, 124);
        $shave = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $shoe = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $hairstyle = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $late = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $id = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $fshoe = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $helmet = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $late = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $avg = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $sum = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $color = array("#003366", "#50C878", "#7851A9", "#FF6F61", "#008080", "#FFDB58", "#87CEEB", "#FFDAB9", "#98FF98", "#E0115F", "#8A2BE2");




        for ($i = 0; $i <= 10; $i++) {
            $sql01 = "SELECT * FROM indiscipline WHERE remarks = 'Not Clean Shaved' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result01 = mysqli_query($db, $sql01);
            $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
            $count01 = mysqli_num_rows($result01);
            $shave[$i] = $count01;

            $sql02 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing Shoe' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result02 = mysqli_query($db, $sql02);
            $row02 = mysqli_fetch_array($result02, MYSQLI_ASSOC);
            $count02 = mysqli_num_rows($result02);
            $shoe[$i] = $count02;

            $sql03 = "SELECT * FROM indiscipline WHERE remarks = 'Not Proper Hair style' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result03 = mysqli_query($db, $sql03);
            $row03 = mysqli_fetch_array($result03, MYSQLI_ASSOC);
            $count03 = mysqli_num_rows($result03);
            $hairstyle[$i] = $count03;

            $sql04 = "SELECT * FROM indiscipline WHERE remarks = 'Late Comer' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result04 = mysqli_query($db, $sql04);
            $row04 = mysqli_fetch_array($result04, MYSQLI_ASSOC);
            $count04 = mysqli_num_rows($result04);
            $late[$i] = $count04;

            $sql05 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing ID' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result05 = mysqli_query($db, $sql05);
            $row05 = mysqli_fetch_array($result05, MYSQLI_ASSOC);
            $count05 = mysqli_num_rows($result05);
            $id[$i] = $count05;

            $sql06 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing formal Shoe' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result06 = mysqli_query($db, $sql06);
            $row06 = mysqli_fetch_array($result06, MYSQLI_ASSOC);
            $count06 = mysqli_num_rows($result06);
            $fshoe[$i] = $count06;

            $sql07 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing Helmet' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result07 = mysqli_query($db, $sql07);
            $row07 = mysqli_fetch_array($result07, MYSQLI_ASSOC);
            $count07 = mysqli_num_rows($result07);
            $helmet[$i] = $count07;

            $sql08 = "SELECT * FROM indiscipline WHERE remarks = 'Not Having Helmet' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result08 = mysqli_query($db, $sql08);
            $row08 = mysqli_fetch_array($result08, MYSQLI_ASSOC);
            $count08 = mysqli_num_rows($result08);
            $hhelmet[$i] = $count08;

            $sql09 = "SELECT * FROM indiscipline WHERE remarks = 'Using Mobile Phone' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result09 = mysqli_query($db, $sql09);
            $row09 = mysqli_fetch_array($result09, MYSQLI_ASSOC);
            $count09 = mysqli_num_rows($result09);
            $mobile[$i] = $count09;

            $sql010 = "SELECT * FROM indiscipline WHERE remarks = 'Unwanted Roaming' AND dept = '$department[$i]' AND date>='$datestart' AND date<='$dateend'";
            $result010 = mysqli_query($db, $sql010);
            $row010 = mysqli_fetch_array($result010, MYSQLI_ASSOC);
            $count010 = mysqli_num_rows($result010);
            $roaming[$i] = $count010;
        }
        ?>

        <div>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered custom-table" role="grid"
                    aria-describedby="zero_config_info">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"><b><b>Dept</b></b></th>
                            <th scope="col"><b><b>Not Clean Shaved</b></b></th>
                            <th scope="col"><b><b>Not Wearing Shoe</b></b></th>
                            <th scope="col"><b><b>Not Wearing Helmet</b></b></th>
                            <th scope="col"><b><b>Not Having Helmet</b></b></th>
                            <th scope="col"><b><b>Late Comer</b></b></th>
                            <th scope="col"><b><b>Not Wearing ID</b></b></th>
                            <th scope="col"><b><b>No Proper Hair style</b></b></th>
                            <th scope="col"><b><b>Using Mobile Phone</b></b></th>
                            <th scope="col"><b><b>Unwanted Roaming</b></th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        // Fetch data and populate the table rows
                        for ($i = 0; $i <= 10; $i++) {
                            $sum[$i] = $shave[$i] + $shoe[$i] + $hairstyle[$i] + $late[$i] + $id[$i] + $fshoe[$i] + $helmet[$i] + $hhelmet[$i] + $mobile[$i] + $roaming[$i];
                            $value = ($sum[$i] * 100) / $count[$i];
                            $avg[$i] = number_format($value, 1); ?>
                            <tr>
                                <td><?= $department[$i] ?></td>
                                <td><?= $shave[$i] ?></td>
                                <td><?= $shoe[$i] + $fshoe[$i] ?></td>
                                <td><?= $helmet[$i] ?></td>
                                <td><?= $hhelmet[$i] ?></td>
                                <td><?= $late[$i] ?></td>
                                <td><?= $id[$i] ?></td>
                                <td><?= $hairstyle[$i] ?></td>
                                <td><?= $mobile[$i] ?></td>
                                <td><?= $roaming[$i] ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="total-row">
                            <td><b>Total</b></td>
                            <td><?= array_sum($shave) ?></td>
                            <td><?= array_sum($shoe) + array_sum($fshoe) ?></td>
                            <td><?= array_sum($helmet) ?></td>
                            <td><?= array_sum($hhelmet) ?></td>
                            <td><?= array_sum($late) ?></td>
                            <td><?= array_sum($id) ?></td>
                            <td><?= array_sum($hairstyle) ?></td>
                            <td><?= array_sum($mobile) ?></td>
                            <td><?= array_sum($roaming) ?></td>
                        </tr>
                    </tbody>
                </table><br>
                <?php
                // Input array with duplicates
                $inputArray = $sum;
                $index = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
                // Bubble sort implementation without using built-in functions
                $count = count($inputArray);
                for ($i = 0; $i < $count - 1; $i++) {
                    for ($j = 0; $j < $count - $i - 1; $j++) {
                        if ($inputArray[$j] > $inputArray[$j + 1]) {
                            // Swap elements
                            $temp = $inputArray[$j];
                            $inputArray[$j] = $inputArray[$j + 1];
                            $inputArray[$j + 1] = $temp;

                            $temp2 = $index[$j];
                            $index[$j] = $index[$j + 1];
                            $index[$j + 1] = $temp2;
                        }
                    }
                }

                $inputArray2 = $avg;
                $index2 = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
                // Bubble sort implementation without using built-in functions
                $count = count($inputArray2);
                for ($i = 0; $i < $count - 1; $i++) {
                    for ($j = 0; $j < $count - $i - 1; $j++) {
                        if ($inputArray2[$j] > $inputArray2[$j + 1]) {
                            // Swap elements
                            $temp = $inputArray2[$j];
                            $inputArray2[$j] = $inputArray2[$j + 1];
                            $inputArray2[$j + 1] = $temp;

                            $temp2 = $index2[$j];
                            $index2[$j] = $index2[$j + 1];
                            $index2[$j + 1] = $temp2;
                        }
                    }
                }

                ?>

                <body>
                    <div class="d-flex justify-content-center">
                        <h3>SUMMARY DETAILS</h3>
                    </div>
                    <table id="zero_config" class="table table-striped table-bordered custom-table1" role="grid"
                        aria-describedby="zero_config_info">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"><b>Dept</b></th>
                                <th scope="col"><b>Dept Strength</b></th>
                                <th scope="col"><b>Discipline Count</b></th>
                                <th scope="col"><b>Discipline %</b></th>

                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <tr>
                                    <td><?= $department[$i] ?></td>
                                    <td><?= $count1[$i] ?></td>
                                    <td><?= $sum[$i] ?></td>
                                    <td><?= $avg[$i] ?> %</td>
                                </tr>
                            <?php endfor; ?>

                            <tr class="total-row1">
                                <td><b>Total</b></td>
                                <td><?= array_sum($count1) ?></td>
                                <td><?= array_sum($sum) ?></td>
                                <td><?= array_sum($avg) ?>%</td>
                            </tr>
                        </tbody>

                    </table>

                    <body>
                        <div class="row">
                            <div class="column">
                                <br>
                                <h4 class="d-flex justify-content-center">% Wise Report</h4>
                                <div class="chart">
                                    <?php
                                    for ($i = 10; $i >= 0; $i--) {
                                    ?>
                                        <div class="bar-container">
                                            <font color="<?php echo $color[$index2[$i]] ?>">
                                                <div class="bar"
                                                    style="height: <?php echo $avg[$index2[$i]] * 3; ?>px; background-color: <?php echo $color[$index2[$i]] ?>;">
                                            </font>
                                            <span class="bar-height">
                                                <?php
                                                if ($avg[$index2[$i]] != 0) {
                                                    echo $avg[$index2[$i]];
                                                    echo "%";
                                                }
                                                ?>
                                            </span>
                                            <span class="bar-label"><?php echo $department[$index2[$i]] ?></span>
                                        </div>
                                </div>
                            <?php
                                    }
                            ?>
                            </div>
                    </body>
                </body>
            </div>
            <div class="column">
                <br>
                <h4 class="d-flex justify-content-center">Count Wise Report</h4>
                <div class="chart">
                    <?php
                    for ($i = 10; $i >= 0; $i--) {
                    ?>
                        <div class="bar-container">
                            <font color="<?php echo $color[$index[$i]] ?>">
                                <div class="bar"
                                    style="height: <?php echo $sum[$index[$i]] * 3; ?>px; background-color: <?php echo $color[$index[$i]] ?>;">
                            </font>
                            <span class="bar-height">
                                <?php
                                if ($sum[$index[$i]] != 0) {
                                    echo $sum[$index[$i]];
                                }
                                ?>
                            </span>
                            <span class="bar-label"><?php echo $department[$index[$i]] ?></span>
                        </div>
                </div>
            <?php
                    }
            ?>
            </div>

        </div>

    </div><br><br>
    <div class="d-flex justify-content-between">
        <h4>Discipline Coordinator</h4>
        <h4>Discipline Chairperson</h4>
        <h4>Principal</h4>
    </div>
    <div style="page-break-before: always;"></div>

    <div class="d-flex justify-content-center">
        <h2>Students List</h2>
    </div><br>
    <font size=+1><b>Date: <?php echo $datestart2 ?> to <?php echo $dateend2 ?></font>
    <br>
    <?php
    $start_it = $datestart;
    $end_it = $dateend;
    ?>
    <table id="zero_config" class="table table-striped table-bordered custom-table2" role="grid"
        aria-describedby="zero_config_info">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 1px;"><b>S.No</b></th>
                <th scope="col" style="width: 40px;"><b>Date</b></th>
                <th scope="col" style="width: 70px;"><b>Register Number</b></th>
                <th scope="col" style="width: 90px;"><b>Student Name</b></th>
                <th scope="col" style="width: 15px;"><b>Dept</b></th>
                <th scope="col" style="width: 35px;"><b>Year</b></th>
                <th scope="col" style="width: 80px;"><b>Reason</b></th>
                <th scope="col" style="width: 15px;"><b>Occurance</b></th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            // Fetch data and populate the table rows
            $sn = 1;
            $rc = 0;
            while ($start_it <= $end_it) {
                // Fetch data and populate the table rows
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

            ?>
                <?php

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }
                $sql2 = "SELECT * FROM indiscipline where date='$end_it' ORDER BY dept ASC, regno ASC, remarks ASC";
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
                ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $newDateFormat ?></td>
                            <td><?= $row2["regno"] ?></td>
                            <td><?= $row2["name"] ?></td>
                            <td><?= $row2["dept"] ?></td>
                            <td><?= $row2["year"] ?></td>
                            <td><?= $row2["remarks"] ?></td>
                            <td><?= $counts2 ?></td>
                        </tr>
                        <?php
                        $rc++;
                        if ($rc >= 35) { ?>
                            <tr>
                                <td colspan="8">
                                    <div style="page-break-before: always;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                            </tr>
            <?php $rc = 0;
                        }
                    }
                }

                $end_it = date('Y-m-d', strtotime($end_it . ' -1 day'));
            }

            ?>
        </tbody>
    </table>







</body>
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
                        submenuItems.forEach(si => si.classList.remove('active'));
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
</script>

<script>
    function downloadPDF() {
        // Select the HTML element to be converted to PDF
        var originalElement = document.getElementById('pdf-content');

        // Create a new div element
        var pdfContainer = document.createElement('div');

        // Set the HTML content of the new div to be the same as the original content
        pdfContainer.innerHTML = originalElement.innerHTML;

        // Options for html2pdf
        var options = {
            margin: 10,
            filename: 'Discipline report (<?php echo $datestart2 ?> to <?php echo $dateend2 ?>).pdf',
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
            // Callbseark to remove the new div element after PDF generation
            onAfterRender: function() {
                document.body.removeChild(pdfContainer);
            }
        };

        // Call html2pdf library to generate PDF using the new div element
        html2pdf(pdfContainer, options);
    }

    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("zero_config");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, start from index 1 to skip the table header
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            let rowVisible = false;
            for (let j = 0; j < td.length; j++) {
                let cell = td[j];
                if (cell) {
                    txtValue = cell.textContent || cell.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        rowVisible = true;
                        break;
                    }
                }
            }
            tr[i].style.display = rowVisible ? "" : "none";
        }
    }
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




</html>