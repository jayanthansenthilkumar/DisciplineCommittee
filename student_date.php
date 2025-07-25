<?php
include("config.php");
include("session.php");
?>

<!DOCTYPE html>
<hlang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MIC</title>
        <link rel="icon" type="image/png" sizes="32x32" href="image/icons/mkce_s.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <style>
            body {
                margin: 0;
                overflow-x: hidden;
                color: #3e5569;
                background: #fff;
                font-family: 'Poppins', sans-serif;
            }

            .main-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                /* Make it take full height */
                text-align: center;
            }

            .form-control,
            .btn-custom {
                width: 100%;
                display: block;
                /* Ensuring width remains responsive */
            }

            .card {
                width: 100%;
                max-width: 500px;
            }

            .footer {
                width: 100%;
                background-color: #e9ecef;
                padding: 10px 0;
                text-align: center;
                position: relative;
                bottom: 0;
                left: 0;
                margin-top: auto;
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

            /* General Styles with Enhanced Typography */

            /* Content Area Styles */
            .content {
                margin-left: var(--sidebar-width);
                padding-top: var(--topbar-height);
                padding-bottom: 20px;
                transition: all 0.3s ease;
                min-height: calc(100vh - var(--topbar-height));
                display: flex;
                flex-direction: column;
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

                .custom-select {
                    /* Hide the scrollbar for WebKit browsers */
                    scrollbar-width: none;
                    /* Firefox */
                    -ms-overflow-style: none;
                    /* IE and Edge */

                    /* Hide the scrollbar for non-WebKit browsers */
                    &::-webkit-scrollbar {
                        display: none;
                    }
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

            /* Unique styling for the download button */
            .btnDownload {
                position: static;
                right: 0;
                /* Adjust as needed */
                top: 0;
            }

            /* Media query for responsiveness */
            @media screen and (max-width: 768px) {
                .btnDownload {
                    position: static;
                    right: 0;
                    top: 0;
                    display: inline-block;
                    visibility: visible;

                }
            }


            .container-fluid {
                padding: 20px;
                flex: 1;
            }


            /* loader */
            .loader-container {
                position: fixed;
                left: var(--sidebar-width);
                right: 0;
                top: var(--topbar-height);
                bottom: 0;
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

            /* Custom CSS to increase the size of the large modal */
            .modal-lg1 {
                max-width: 75%;
                /* Adjust the percentage to your desired size */
            }

            /* Optional: Increase modal header font size or make other adjustments as needed */
            .modal-lg1 .modal-header {
                font-size: 24px;
            }

            .modal-content {
                border-radius: 20px;
                /* Change border curvature */
            }

            /* Center-align Bootstrap modal in mobile view */
            @media (max-width: 767px) {
                #myModal5 {
                    width: 110%;
                    text-align: center;
                }

                .modal-dialog {
                    /* display: inline-block; */
                    text-align: left;
                    vertical-align: middle;
                }
            }



            /* Style for the select element */
            #myModal5 .modal-body,
            #myModal6 .modal-body {
                /* Adjust padding as needed to create space within the modal body */
                padding: 20px;
            }

            #myModal5 .modal-body select,
            #myModal6 .modal-body select {
                /* Set the select element to cover the entire modal body */
                width: calc(100% - 40px);
                /* Subtract padding to fit inside the modal */
                height: calc(100% - 60px);
                /* Subtract padding & footer height */
                border: none;
            }

            #myModal5 .modal-body select option,
            #myModal6 .modal-body select option {
                padding: 10px;
                /* Padding for each option */
            }

            .color-button {
                margin-right: 10px;
                margin-top: 40px;
                padding: 10px;
                width: 200px;
                height: 100px;
                border-radius: 20px;
                background-color: #F57C00;
            }

            .modal {
                padding: 100px;
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

            @media screen and (max-width: 768px) {
                .footer {
                    position: relative;
                    bottom: 0px;
                    margin-top: 20px;
                }
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



            .total-row1 td {
                font-size: 15px;
                /* Adjust the font size for the total row */
                font-family: 'Poppins', sans-serif;
                font-weight: bold;
                /* Optionally bolden the text */
                line-height: 1.3;
            }

            .student-info-box {
                background: linear-gradient(to bottom right, #f0f7ff, #fef6ff);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.12);
                transition: all 0.3s ease-in-out;
            }

            /* Adjust height to avoid scrolling */
            .student-info-box,
            .container-fluid {
                min-height: auto;
                max-height: 100vh;
            }

            /* Table Styling */
            .table td {
                padding: 10px;
                font-weight: 500;
            }

            /* Soft Green Button Styling */
            .btn-outline-success {
                border: 2px solid #28a745;
                color: #28a745;
                font-weight: bold;
                transition: all 0.3s ease;
            }

            .btn-outline-success:hover {
                background-color: #28a745;
                color: white;
            }

            .page-breadcrumb {
                background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
                border-radius: 10px;
                box-shadow: var(--card-shadow);
                margin: 10px;
                padding: 15px 20px;
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

            <!-- Content Area -->
            <div class="container-fluid">
                <div id="main-wrapper">

                    <div class="page-wrapper">
                        <div class="page-breadcrumb">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <h4 class="page-title mb-3">Discipline Committee</h4>
                                    <button class="btn btn-outline-success rounded-pill shadow btnDownload"
                                        id="myButton" data-bs-toggle="modal" data-bs-target="#myModal7">Download
                                        Report</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Remarks -->
                    <div class="modal fade" id="myModal5" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><b>Select the Remarks</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="id_remark" class="custom-form">
                                        <input type="hidden" name="roll" id="roll">
                                        <input type="hidden" name="name" id="name">
                                        <input type="hidden" name="year" id="year">
                                        <input type="hidden" name="dept" id="dept">
                                        <div class="d-flex justify-content-end">
                                            <label for="date">Date: </label>
                                            <input type="date" id="input_date_end" name="input_date_end"
                                                style="margin-left: 4px;" max="<?php echo date('Y-m-d'); ?>"
                                                required><br>
                                        </div>
                                        <select class="form-select form-select-lg mb-3 shadow-none" multiple size="9"
                                            aria-label="Multiple select example" id="remark" name="remark" required>
                                            <option value="Not Clean Shaved">Not Clean Shaved</option>
                                            <option value="Not Wearing formal Shoe">Not Wearing Formal Shoe</option>
                                            <option value="Not Wearing Shoe">Not Wearing Shoe</option>
                                            <option value="Not Wearing Helmet">Not Wearing Helmet</option>
                                            <option value="Not Having Helmet">Not Having Helmet</option>
                                            <option value="Late Comer">Late Comer</option>
                                            <option value="Not Wearing ID">Not Wearing ID</option>
                                            <option value="Not Proper Hair Style">Not Proper Hair Style</option>
                                            <option value="Using Mobile Phone">Using Mobile Phone</option>
                                            <option value="Unwanted Roaming">Unwanted Roaming</option>
                                        </select>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Report Download -->
                    <div class="modal fade" id="myModal7" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title">
                                        <b>Note:</b> Reload the page to get newly added Data
                                    </p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <button onclick="refreshPage()"
                                        class="btn btn-outline-warning shadow">Refresh</button>
                                    <button onclick="downloadPDF()"
                                        class="btn btn-outline-success shadow">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 student-info-box">
                                <!-- Search Section -->
                                <div class="text-center mb-3">
                                    <label for="regno" class="form-label fw-bold text-primary fs-5">Student's Register
                                        Number</label>
                                    <form id="search_student" class="d-flex flex-column align-items-center">
                                        <div class="col-sm-8 col-md-6">
                                            <input type="text" class="form-control text-center shadow-sm" id="regno"
                                                name="regno" required>
                                        </div>
                                        <button type="button"
                                            class="searching btn btn-outline-success shadow mt-3 px-4">Search</button>
                                    </form>
                                </div>
                                <div class="row align-items-center g-3">
                                    <!-- Student Info Section -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded bg-white shadow-sm">
                                            <h2 class="mb-3 text-primary text-center">Student Info</h2>
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold">Reg No:</td>
                                                        <td><span id="regno0"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Name:</td>
                                                        <td><span id="name0"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Department:</td>
                                                        <td><span id="dept0"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Year:</td>
                                                        <td><span id="year0"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Discipline Button -->
                                    <div class="col-md-6 d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-danger btn-lg px-4 shadow"
                                            data-bs-toggle="modal" data-bs-target="#myModal5">
                                            Discipline
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div>

        <script>
            function refreshPage() {
                location.reload();
            }
        </script>

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

            // Toggle Sidebar
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const body = document.body;
            const mobileOverlay = document.getElementById('mobileOverlay');

            function toggleSidebar() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.toggle('mobile-show');
                    mobileOverlay.classList.toggle('show');
                    body.classList.toggle('sidebar-open');
                } else {
                    sidebar.classList.toggle('collapsed');
                }
            }
            hamburger.addEventListener('click', toggleSidebar);
            mobileOverlay.addEventListener('click', toggleSidebar);
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

            // Toggle Submenu
            const menuItems = document.querySelectorAll('.has-submenu');
            menuItems.forEach(item => {
                item.addEventListener('click', () => {
                    const submenu = item.nextElementSibling;
                    item.classList.toggle('active');
                    submenu.classList.toggle('active');
                });
            });

            // Handle responsive behavior
            window.addEventListener('resize', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('collapsed');
                    sidebar.classList.remove('mobile-show');
                    mobileOverlay.classList.remove('show');
                    body.classList.remove('sidebar-open');
                } else {
                    sidebar.style.transform = '';
                    mobileOverlay.classList.remove('show');
                    body.classList.remove('sidebar-open');
                }
            });
        </script>

        <script>
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
            //Disciplice Remarks       
            $(document).on('submit', '#id_remark', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("id_remarks", true);
                $.ajax({
                    type: "POST",
                    url: "acode.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const res = JSON.parse(response)
                        if (res["status"] == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data Added'
                            }).then(function() {
                                $("#id_remark")[0].reset();
                                $('#search_student')[0].reset();
                                $('#photo0').attr("src",
                                    "http://localhost/guvi2/assets/images/images.jpg");
                                $('#regno0').text("");
                                $('#name0').text("");
                                $('#dept0').text("");
                                $('#year0').text("");
                                $('#roll').val("");
                                $('#roll2').val("");
                                $("#myModal5").hide();
                                $('.modal-backdrop').remove();
                            });
                        }
                        if (res["message"] == 'Detail Not Updated') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failure',
                                text: 'Enter Student Data'
                            }).then(function() {
                                $('#id_remark')[0].reset();
                            });
                        }

                        if (res["message"] == 'Detail Already Added') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failure',
                                text: 'Data Already Added'
                            }).then(function() {
                                $('#id_remark')[0].reset();
                            });
                        }

                        if (res["status"] == 500) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failure',
                                text: 'Not Updated'
                            }).then(function() {
                                $('#id_remark')[0].reset();
                            });
                        }
                    }
                });
            });


            $(document).on('click', '.searching', function(e) {
                e.preventDefault();
                var student_id = $("#regno").val();
                $.ajax({
                    type: "GET",
                    url: "acode.php?student_id=" + student_id,
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 404) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failure',
                                text: 'Enter Student Data'
                            }).then(function() {
                                $('#search_student')[0].reset();
                            });
                        } else if (res.status == 200) {
                            $('#regno0').text(res.data.sid);
                            $('#name0').text(res.data.sname);
                            if (res.data.dept == "Computer Science and Business Systems") {
                                $('#dept0').text("CSBS");
                            } else if (res.data.dept == "Computer Science and Engineering") {
                                $('#dept0').text("CSE");
                            } else if (res.data.dept == "Information Technology") {
                                $('#dept0').text("IT");
                            } else if (res.data.dept == "Electrical and Electronics Engineering") {
                                $('#dept0').text("EEE");
                            } else if (res.data.dept == "Civil Engineering") {
                                $('#dept0').text("CIVIL");
                            } else if (res.data.dept == "Electronics and Communication Engineering") {
                                $('#dept0').text("ECE");
                            } else if ((res.data.dept == "Artificial Intelligence and Data Science") ||
                                (res.data.dept == "Artificial Intelligence and Machine Learning")) {
                                $('#dept0').text("AI");
                            } else if (res.data.dept == "Mechanical Engineering") {
                                $('#dept0').text("MECH");
                            } else if (res.data.dept == "Freshman Engineering") {
                                $('#dept0').text("FE");
                            } else if (res.data.dept == "Master of Computer Applications") {
                                $('#dept0').text("MCA");
                            } else if (res.data.dept == "Master of Business Administration") {
                                $('#dept0').text("MBA");
                            }
                            $('#year0').text(res.data.ayear);
                            $('#roll').val(res.data.sid);
                            $('#dept').val(res.data.dept);
                            $('#year').val(res.data.ayear);
                            $('#name').val(res.data.sname);
                            $('#name2').val(res.data.sname);
                            $('#roll2').val(res.data.sid);
                            $('#dept2').val(res.data.dept);
                            $('#year2').val(res.data.ayear);
                            $('#search_student')[0].reset();
                        }
                    }
                });

            });
        </script>

    </body>

    <style>
        /* Overall styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        #final {
            display: none;
        }

        /* Container for the PDF content */
        #pdf-content {
            width: 100%;
            max-width: 100%;
            /* Reduced max-width */
            margin: 20px auto;
            padding: 15px;
            /* Reduced padding */
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            /* Reduced shadow */
            box-sizing: border-box;
        }

        /* Header styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            /* Reduced margin */
        }

        .header img {
            height: 40px;
            /* Reduced height */
        }

        .header h2 {
            font-size: 22px;
            /* Reduced font size */
            color: #333;
            margin: 0;
        }

        /* Date styling */
        .date {
            font-size: 14px;
            /* Reduced font size */
            margin-bottom: 20px;
            /* Reduced margin */
            color: #555;
        }

        /* Table styling */
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            /* Reduced margin */
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            /* Reduced padding */
            text-align: center;
            font-size: 12px;
            /* Reduced font size */
        }

        .table thead {
            background-color: #f0f0f0;
        }

        .table th {
            font-weight: bold;
            color: #333;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total-row {
            font-weight: bold;
            background-color: #e0e0e0;
        }

        /* Summary details table */
        .custom-table1 {
            width: 100%;
            /* Adjusted width */
            margin: 0 auto 10px;
            /* Reduced margin */
        }

        /* Chart styling */
        .row {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .column {
            width: 48%;
            /* Adjusted width */
            margin-bottom: 10px;
            /* Reduced margin */
            box-sizing: border-box;
        }

        .chart {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 200px;
            /* Reduced height */
            background-color: #f8f8f8;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
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

        .bar-height {
            font-size: 10px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .bar-label {
            margin-top: 3px;
            /* Reduced margin */
            font-size: 10px;
            /* Reduced font size */
            color: #555;
        }

        /* Signatures */
        .signatures {
            display: flex;
            justify-content: space-around;
            margin-top: 400px;
            /* Reduced margin */
            font-size: 14px;
            /* Reduced font size */
            color: #555;
        }

        /* Student list table */
        .custom-table2 {
            width: 100%;
            margin: 10px auto;
            /* Reduced margin */
            text-align: left;
        }

        .custom-table2 th,
        .custom-table2 td {
            padding: 4px 6px;
            /* Reduced padding */
            font-size: 10px;
            /* Reduced font size */
            line-height: 1.2;
            /* Reduced line height */
            border: 1px solid #ddd;
        }

        /* Page break */
        .page-break {
            page-break-before: always;
        }

        /* CSS to make content visible for printing */
        @media print {

            body,
            #pdf-content {
                background-color: #fff !important;
                color: #000 !important;
                box-shadow: none;
            }

            #pdf-content {
                display: block !important;
                position: relative !important;
                left: auto !important;
            }

            #pdf-content img {
                display: block !important;
            }

            .table th,
            .table td,
            .custom-table2 th,
            .custom-table2 td {
                border: 1px solid #ddd !important;
                padding: 4px 6px !important;
                font-size: 10px !important;
            }

            .total-row {
                background-color: #e0e0e0 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>

    <?php
    $startDate = date('l, F j, Y', strtotime('last sunday'));
    $start = date('d-m-Y', strtotime('last sunday'));
    // Get the ending day of the week (Sunday)
    $endDate = date('l, F j, Y', strtotime('saturday this week'));
    $end = date('d-m-Y', strtotime('saturday this week'));
    $current_date = date("d-m-Y");
    ?>
    <div id="final">
        <div id="pdf-content">
            <div class="header">
                <img src="image/logo2.jpeg" alt="homepage" class="light-logo" />
                <h4>DISCIPLINE REPORT</h4>
                <img src="image/kr.jpg" alt="homepage" class="light-logo" />
            </div>

            <div class="date">
                <b>Date: <?php echo $current_date ?></b>
            </div>

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


            date_default_timezone_set('Asia/Kolkata');
            $currentDate = new DateTime();
            $currentDate->modify('last sunday');
            $weekDates = array();
            for ($i = 0; $i < 7; $i++) {
                $weekDates[] = $currentDate->format('Y-m-d');
                $currentDate->modify('+1 day');
            }


            for ($i = 0; $i <= 10; $i++) {
                $sql01 = "SELECT * FROM indiscipline WHERE remarks = 'Not Clean Shaved' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result01 = mysqli_query($db, $sql01);
                $count01 = mysqli_num_rows($result01);
                $shave[$i] = $count01;

                $sql02 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing Shoe' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result02 = mysqli_query($db, $sql02);
                $count02 = mysqli_num_rows($result02);
                $shoe[$i] = $count02;

                $sql03 = "SELECT * FROM indiscipline WHERE remarks = 'Not Proper Hair style' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result03 = mysqli_query($db, $sql03);
                $count03 = mysqli_num_rows($result03);
                $hairstyle[$i] = $count03;

                $sql04 = "SELECT * FROM indiscipline WHERE remarks = 'Late Comer' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result04 = mysqli_query($db, $sql04);
                $count04 = mysqli_num_rows($result04);
                $late[$i] = $count04;

                $sql05 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing ID' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result05 = mysqli_query($db, $sql05);
                $count05 = mysqli_num_rows($result05);
                $id[$i] = $count05;

                $sql06 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing formal Shoe' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result06 = mysqli_query($db, $sql06);
                $count06 = mysqli_num_rows($result06);
                $fshoe[$i] = $count06;

                $sql07 = "SELECT * FROM indiscipline WHERE remarks = 'Not Wearing Helmet' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result07 = mysqli_query($db, $sql07);
                $count07 = mysqli_num_rows($result07);
                $helmet[$i] = $count07;

                $sql08 = "SELECT * FROM indiscipline WHERE remarks = 'Not Having Helmet' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result08 = mysqli_query($db, $sql08);
                $count08 = mysqli_num_rows($result08);
                $hhelmet[$i] = $count08;

                $sql09 = "SELECT * FROM indiscipline WHERE remarks = 'Using Mobile Phone' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result09 = mysqli_query($db, $sql09);
                $count09 = mysqli_num_rows($result09);
                $mobile[$i] = $count09;

                $sql010 = "SELECT * FROM indiscipline WHERE remarks = 'Unwanted Roaming' AND dept = '$department[$i]' AND date>='$weekDates[0]' AND date<='$weekDates[6]'";
                $result010 = mysqli_query($db, $sql010);
                $count010 = mysqli_num_rows($result010);
                $roaming[$i] = $count010;
            }
            ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered custom-table">
                    <thead>
                        <tr>
                            <th><b>Dept</b></th>
                            <th><b>Not Clean Shaved</b></th>
                            <th><b>Not Wearing Shoe</b></th>
                            <th><b>Not Wearing Helmet</b></th>
                            <th><b>Not Having Helmet</b></th>
                            <th><b>Late Comer</b></th>
                            <th><b>Not Wearing ID</b></th>
                            <th><b>No Proper Hair style</b></th>
                            <th><b>Using Mobile Phone</b></th>
                            <th><b>Unwanted Roaming</b></th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        for ($i = 0; $i <= 10; $i++) {
                            $sum[$i] = $shave[$i] + $shoe[$i] + $fshoe[$i] + $helmet[$i] + $hhelmet[$i] + $late[$i] + $id[$i] + $hairstyle[$i] + $mobile[$i] + $roaming[$i];
                            $value = ($sum[$i] * 100) / $count[$i];
                            $avg[$i] = number_format($value, 1);
                            echo "<tr>
                                <td>" . $department[$i] . "</td>
                                <td>" . $shave[$i] . "</td>
                                <td>" . ($shoe[$i] + $fshoe[$i]) . "</td>
                                <td>" . $helmet[$i] . "</td>
                                <td>" . $hhelmet[$i] . "</td>
                                <td>" . $late[$i] . "</td>
                                <td>" . $id[$i] . "</td>
                                <td>" . $hairstyle[$i] . "</td>
                                <td>" . $mobile[$i] . "</td>
                                <td>" . $roaming[$i] . "</td>
                                </tr>";
                        }

                        echo "<tr class='total-row'>
                            <td><b>Total</b></td>
                            <td>" . array_sum($shave) . "</td>
                            <td>" . (array_sum($shoe) + array_sum($fshoe)) . "</td>
                            <td>" . array_sum($helmet) . "</td>
                            <td>" . array_sum($hhelmet) . "</td>
                            <td>" . array_sum($late) . "</td>
                            <td>" . array_sum($id) . "</td>
                            <td>" . array_sum($hairstyle) . "</td>
                            <td>" . array_sum($mobile) . "</td>
                            <td>" . array_sum($roaming) . "</td>
                            </tr>";
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
            // Sorting logic remains the same
            $inputArray = $sum;
            $index = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
            $count = count($inputArray);
            for ($i = 0; $i < $count - 1; $i++) {
                for ($j = 0; $j < $count - $i - 1; $j++) {
                    if ($inputArray[$j] > $inputArray[$j + 1]) {
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
            $count = count($inputArray2);
            for ($i = 0; $i < $count - 1; $i++) {
                for ($j = 0; $j < $count - $i - 1; $j++) {
                    if ($inputArray2[$j] > $inputArray2[$j + 1]) {
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

            <div class="d-flex justify-content-center">
                <h4>SUMMARY DETAILS</h4>
            </div>

            <table class="table table-striped table-bordered custom-table1">
                <thead>
                    <tr>
                        <th><b>Dept</b></th>
                        <th><b>Dept Strength</b></th>
                        <th><b>Discipline Count</b></th>
                        <th><b>Discipline %</b></th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<tr>
                        <td>" . $department[$i] . "</td>
                        <td>" . $count1[$i] . "</td>
                        <td>" . $sum[$i] . "</td>
                        <td>" . $avg[$i] . " %</td>
                        </tr>";
                    }
                    echo "<tr class='total-row1'>
                    <td><b>Total</b></td>
                    <td>" . array_sum($count1) . "</td>
                    <td>" . array_sum($sum) . "</td>
                    <td>" . array_sum($avg) . " %</td>
                    </tr>";
                    ?>
                </tbody>
            </table>

            <br><br><br>
            <div class="d-flex justify-content-center">
                <h4>Students List</h4>
            </div>
            <div class="date">
                <b>Date: <?php echo $current_date ?></b>
            </div>

            <table class="table table-striped table-bordered custom-table2">
                <thead>
                    <tr>
                        <th><b>S.No</b></th>
                        <th><b>Date</b></th>
                        <th><b>Register Number</b></th>
                        <th><b>Student Name</b></th>
                        <th><b>Dept</b></th>
                        <th><b>Year</b></th>
                        <th><b>Reason</b></th>
                        <th><b>Occurance</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $startDate = date('l, F j, Y', strtotime('last sunday'));
                    $start = date('Y-m-d', strtotime('last sunday'));
                    $endDate = date('l, F j, Y', strtotime('saturday this week'));
                    $end = date('Y-m-d', strtotime('saturday this week'));
                    $sn = 1;
                    $rc = 0;

                    $current_date_loop = $end; // Initialize loop with $end
                    while ($current_date_loop >= $start) { // Loop backwards from $end to $start

                        $sql2 = "SELECT * FROM indiscipline where date='$current_date_loop' ORDER BY dept ASC, regno ASC, remarks ASC, date ASC";
                        $result2 = $db->query($sql2);

                        if ($result2 && $result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $a = $row2["regno"];
                                $b = $row2["date"];
                                $c = $row2["remarks"];
                                $sqls2 = "SELECT * FROM indiscipline where regno='$a' and date<='$b' and remarks='$c'";
                                $results2 = $db->query($sqls2);
                                $counts2 = mysqli_num_rows($results2);
                                $newDateFormat = date('d-m-Y', strtotime($b));
                                echo "<tr>
                                    <td>" . $sn++ . "</td>  
                                    <td>" . $newDateFormat . "</td>
                                    <td>" . $row2["regno"] . "</td>
                                    <td>" . $row2["name"] . "</td>
                                    <td>" . $row2["dept"] . "</td>
                                    <td>" . $row2["year"] . "</td>
                                    <td>" . $row2["remarks"] . "</td>
                                    <td>" . $counts2 . "</td>
                                    </tr>";
                                $rc++;
                                if ($rc >= 35) {
                                    echo '<tr><td colspan="8" class="page-break"></td></tr>';
                                    $rc = 0;
                                }
                            }
                        }
                        $current_date_loop = date('Y-m-d', strtotime($current_date_loop . ' -1 day')); // Decrement the date
                    }
                    ?>
                </tbody>
            </table>
            <br><br>
            <div class="row">
                <div class="column">

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
                            </div>
                            <span class="bar-label"><?php echo $department[$index2[$i]] ?></span>
                    </div>
                <?php
                        }
                ?>
                </div>
            </div>

            <div class="column">
                <h4 class="d-flex justify-content-center">Count Wise Report</h4>
                <div class="chart">
                    <?php
                    for ($i = 10; $i >= 0; $i--) {
                    ?>
                        <div class="bar-container">
                            <div class="bar"
                                style="height: <?php echo $sum[$index[$i]] * 3; ?>px; background-color: <?php echo $color[$index[$i]] ?>;">
                                <span class="bar-height">
                                    <?php
                                    if ($sum[$index[$i]] != 0) {
                                        echo $sum[$index[$i]];
                                    }
                                    ?>
                                </span>
                            </div>
                            <span class="bar-label"><?php echo $department[$index[$i]] ?></span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
        $flag2 = 0;
        $startDate = date('l, F j, Y', strtotime('last sunday'));
        $start = date('Y-m-d', strtotime('last sunday'));
        $start1 = date('d-m-Y', strtotime('last sunday'));
        $endDate = date('l, F j, Y', strtotime('saturday this week'));
        $end = date('Y-m-d', strtotime('saturday this week'));
        $end1 = date('d-m-Y', strtotime('saturday this week'));
        $sqlcheck2 = "SELECT * FROM indiscipline where date<'$start' and permission=0";
        $resultcheck2 = $db->query($sqlcheck2);
        if ($resultcheck2->num_rows > 0) {
            $flag2 = 1;
        }
        ?>


        <div class="signatures">
            <h4>Discipline Coordinator</h4>
            <h4>Discipline Chairperson</h4>
            <h4>Principal</h4>
        </div>


    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('pdf-content');
            const opt = {
                margin: 10,
                filename: 'Discipline_Report.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>



    </html>