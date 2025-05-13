<?php

//connection

include("config.php");
//inserting
if (isset($_POST['id_remarks'])) {
    $remark = mysqli_real_escape_string($db, $_POST['remark']);
    $regno = mysqli_real_escape_string($db, $_POST['roll']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $date = mysqli_real_escape_string($db, $_POST['input_date_end']);
    // $gender=mysqli_real_escape_string($db,$_POST['gender']);
    $sql2 = "SELECT * FROM indiscipline where remarks='$remark' and regno='$regno' and date='$date'";
    $result2 = $db->query($sql2);
    if ($result2->num_rows > 0) {
        $res = [
            'status' => 400,
            'message' => 'Detail Already Added'
        ];
        echo json_encode($res);
        return;
    } else if ($regno == "rollno" || $regno == NULL) {
        $res = [
            'status' => 400,
            'message' => 'Detail Not Updated'
        ];
        echo json_encode($res);
        return;
    } else {
        if ($dept == "Computer Science and Engineering") {
            $dept = "CSE";
        }
        if ($dept == "Artificial Intelligence and Data Science" || $dept == "Artificial Intelligence and Machine Learning") {
            $dept = "AI";
        }
        if ($dept == "Civil Engineering") {
            $dept = "CIVIL";
        }
        if ($dept == "Electronics and Communication Engineering") {
            $dept = "ECE";
        }
        if ($dept == "Electrical and Electronics Engineering") {
            $dept = "EEE";
        }
        if ($dept == "Mechanical Engineering") {
            $dept = "MECH";
        }
        if ($dept == "Information Technology") {
            $dept = "IT";
        }
        if ($dept == "Computer Science and Business Systems") {
            $dept = "CSBS";
        }
        if ($dept == "Master of Computer Applications") {
            $dept = "MCA";
        }
        if ($dept == "Master of Business Administration") {
            $dept = "MBA";
        }
        if ($dept == "Freshman Engineering") {
            $dept = "FE";
        }

        // year changing
        if ($year == "2022-2024" || $year == "2022-24" || $year == "22-24" || $year == "22-2024") {
            $year = "2nd year";
        }
        if ($year == "2023-2025" || $year == "2023-25" || $year == "23-25" || $year == "23-2025") {
            $year = "1st year";
        }
        if ($year == "2020-2024" || $year == "2020-24" || $year == "20-24" || $year == "20-2024") {
            $year = "4th year";
        }
        if ($year == "2020-2024" || $year == "2020-24" || $year == "20-24" || $year == "20-2024") {
            $year = "4th year";
        }
        if ($year == "2021-2025" || $year == "2021-25" || $year == "21-25" || $year == "21-2025") {
            $year = "3rd year";
        }
        if ($year == "2022-2026" || $year == "2022-26" || $year == "22-26" || $year == "22-2026") {
            $year = "2nd year";
        }
        if ($year == "2023-2027" || $year == "2023-27" || $year == "23-27" || $year == "23-2027") {
            $year = "1st year";
        }
        

        $query = "INSERT INTO indiscipline (remarks,regno,dept,year,name,date,permission) VALUES('$remark','$regno','$dept','$year','$name','$date',0)";

        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not Updated'
            ];
            echo json_encode($res);
            return;
        }
    }
}

// student_lc.php inserting without date
if (isset($_POST['id_remarks2'])) {
    $remark = mysqli_real_escape_string($db, $_POST['remark']);
    $regno = mysqli_real_escape_string($db, $_POST['roll']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $todaydate = date("Y-m-d");
    // $gender=mysqli_real_escape_string($db,$_POST['gender']);
    $sql2 = "SELECT * FROM indiscipline where remarks='$remark' and regno='$regno' and date='$todaydate'";
    $result2 = $db->query($sql2);
    if ($result2->num_rows > 0) {
        $res = [
            'status' => 400,
            'message' => 'Detail Already Added'
        ];
        echo json_encode($res);
        return;
    } else if ($regno == "rollno" || $regno == NULL) {
        $res = [
            'status' => 400,
            'message' => 'Detail Not Updated'
        ];
        echo json_encode($res);
        return;
    } else {
        if ($dept == "Computer Science and Engineering") {
            $dept = "CSE";
        }
        if ($dept == "Artificial Intelligence and Data Science" || $dept == "Artificial Intelligence and Machine Learning") {
            $dept = "AI";
        }
        if ($dept == "Civil Engineering") {
            $dept = "CIVIL";
        }
        if ($dept == "Electronics and Communication Engineering") {
            $dept = "ECE";
        }
        if ($dept == "Electrical and Electronics Engineering") {
            $dept = "EEE";
        }
        if ($dept == "Mechanical Engineering") {
            $dept = "MECH";
        }
        if ($dept == "Information Technology") {
            $dept = "IT";
        }
        if ($dept == "Computer Science and Business Systems") {
            $dept = "CSBS";
        }
        if ($dept == "Master of Computer Applications") {
            $dept = "MCA";
        }
        if ($dept == "Master of Business Administration") {
            $dept = "MBA";
        }
        if ($dept == "Freshman Engineering") {
            $dept = "FE";
        }

        // year changing
        if ($year == "2022-2024" || $year == "2022-24" || $year == "22-24" || $year == "22-2024") {
            $year = "2nd year";
        }
        if ($year == "2023-2025" || $year == "2023-25" || $year == "23-25" || $year == "23-2025") {
            $year = "1st year";
        }
        if ($year == "2020-2024" || $year == "2020-24" || $year == "20-24" || $year == "20-2024") {
            $year = "4th year";
        }
        if ($year == "2021-2025" || $year == "2021-25" || $year == "21-25" || $year == "21-2025") {
            $year = "3rd year";
        }
        if ($year == "2022-2026" || $year == "2022-26" || $year == "22-26" || $year == "22-2026") {
            $year = "2nd year";
        }
        if ($year == "2023-2027" || $year == "2023-27" || $year == "23-27" || $year == "23-2027") {
            $year = "1st year";
        }

        $today = date("Y-m-d");
        $query = "INSERT INTO indiscipline (remarks,regno,dept,year,name,date,action,mentor,gender,permission) VALUES('$remark','$regno','$dept','$year','$name','$today', 'no action','mentor','',0)";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not Updated'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['submitaction1'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    if ($action == null) {
        $res = [
            'status' => 400,
            'message' => 'Detail Not Updated'
        ];
        echo json_encode($res);
        return;
    } else {
        $sql = "UPDATE `latecomers` SET `action`='$action' WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks'";
        if ($db->query($sql)) {
            $res = [
                'status' => 200,
                'message' => 'Details Submitted Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not Submitted'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['submitaction2'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    if ($action == null) {
        $res = [
            'status' => 400,
            'message' => 'Detail Not Updated'
        ];
        echo json_encode($res);
        return;
    } else {
        $sql = "UPDATE `indiscipline` SET `action`='$action' WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks'";
        if ($db->query($sql)) {
            $res = [
                'status' => 200,
                'message' => 'Details Submitted Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not Submitted'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['submitapprove1'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $hour = mysqli_real_escape_string($db, $_POST['hour']);
    $sql = "UPDATE `latecomers` SET `permission`=1 WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks' AND `action`='$action' AND `hour`='$hour'";
    if ($db->query($sql)) {
        $res = [
            'status' => 200,
            'message' => 'Details Submitted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Submitted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submitreject1'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $hour = mysqli_real_escape_string($db, $_POST['hour']);
    $sql = "UPDATE `latecomers` SET `permission`=2 WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks' AND `action`='$action' AND `hour`='$hour'";
    if ($db->query($sql)) {
        $res = [
            'status' => 200,
            'message' => 'Details Submitted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Submitted'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['submitapprove2'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $sql = "UPDATE `indiscipline` SET `permission`=1 WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks' AND `action`='$action'";
    if ($db->query($sql)) {
        $res = [
            'status' => 200,
            'message' => 'Details Submitted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Submitted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['submitreject2'])) {
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $action = mysqli_real_escape_string($db, $_POST['action']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $sql = "UPDATE `indiscipline` SET `permission`=2 WHERE `regno`='$regno' AND `date`='$date' AND `remarks`='$remarks' AND `action`='$action'";
    if ($db->query($sql)) {
        $res = [
            'status' => 200,
            'message' => 'Details Submitted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Submitted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_photos'])) {
    $errors = array();

    // Sanitize and validate input
    $file_name = $_FILES['photo']['tmp_name'];

    // Retrieve the existing photo path from the database
    $query = "SELECT photo FROM register WHERE mail='$s'";
    $query_run = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($query_run);
    if ($row) {
        $f = $row['photo'];

        // Delete the old photo if it exists
        if (file_exists($f)) {
            unlink($f);
        }
    }
    $file_tmp = $_FILES['photo']['tmp_name'];
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION); // Use the original file name for extension
    $file_name = $s . "." . $ext;
    $filePath = "images/cert/" . $file_name;

    if (empty($errors)) {
        move_uploaded_file($file_tmp, $filePath);

        $query = "UPDATE register SET photo='$filePath' WHERE mail='$s'";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not Updated'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Upload Failed: There were errors in the upload process'
        ];
        echo json_encode($res);
        return;
    }
}




if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($db, $_GET['student_id']);
    $query = "SELECT * FROM student WHERE sid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' => 'details Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'details Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}





?>