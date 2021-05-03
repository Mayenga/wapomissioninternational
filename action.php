<?php
session_start();
//connection and defaults
require_once 'defaults.php';
// background($conn);
function background($conn){
    date_default_timezone_set("Africa/Dar_es_Salaam");
    $now = date("h:i");
    $minute = 60;
    $time = time();
    $timeout = 1617229500;//$time + $minute;
    $pretoken = rand();
    // echo '<script language="javascript">';
    // echo "alert('went in $now');";
    // echo '</script>';
    if($conn == true){
        $sql = "SELECT * FROM lineup";
        $results = $conn->query($sql);
        $duration = 674165;
        $responce = '';
        $feedback = 'Ad Succesful';
        $returned = '';
        $today = date("Y-m-d h:i:sa");
        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $adTime = $row["adpTime"];
                $adFk = $row["id"];
                if(strtotime($now) == strtotime($adTime)){
                    echo '<script language="javascript">';
                    echo "alert('went in $pretoken');";
                    echo '</script>';
                    $lineupdata = "INSERT INTO adnotifications (lineupFk,responce,feedback,status,token,day) VALUES ('$adFk','$responce','$feedback','not read','$pretoken','$today')";
                    if($conn->query($lineupdata)){
                        // sleep(60);
                        // do{
                        //     echo '<script language="javascript">';
                        //     echo "alert('went in $pretoken');";
                        //     echo '</script>';
                        //     $pretoken = rand();
                        // }while($time == $timeout);
                        // if($time == $timeout){
                        //     $pretoken = "";
                        //     echo '<script language="javascript">';
                        //     echo "alert('went in $pretoken');";
                        //     echo '</script>';
                        // }
                    }
                }
            }
            // $timeout = strtotime($timeout);
            // $sql2 = "SELECT * FROM adnotifications WHERE token = '$pretoken'";
            // $results2 = $conn->query($sql2);
            // while($row2 = $results2->fetch_assoc()) {
            //     $tokenn = $row2["token"];
            //     if($tokenn == $pretoken){
            //         echo '<script language="javascript">';
            //         echo "alert('$token zinafanana $time');";
            //         echo '</script>';           
            //     }else{
            //         echo '<script language="javascript">';
            //         echo "alert('$tokenn now hazifanani $pretoken');";
            //         echo '</script>';    
            //     }
            //     if($time == $timeout){
            //         $pretoken = "";
            //         echo '<script language="javascript">';
            //         echo "alert('went in $token');";
            //         echo '</script>';           
            //     }
            // }
            // echo '<script language="javascript">';
            // echo "alert('$now');";
            // echo '</script>';
            // if ($results2->num_rows > 0) {
            //     echo '<script language="javascript">';
            //     echo "alert('in');";
            //     echo '</script>';
            // }else{
            //     $lineupdata = "INSERT INTO adnotifications (lineupFk,responce,feedback,status,token) VALUES ('$returned','$responce','$feedback','not read','$token')";
            //     $conn->query($lineupdata);
            //     echo '<script language="javascript">';
            //     echo "alert('out');";
            //     echo '</script>';
            // }
        }
    }
}

function backgroundPro($conn){
    date_default_timezone_set("Africa/Dar_es_Salaam");
    $now = date("h:i");
    $minute = 60;
    $time = time();
    // echo '<script language="javascript">';
    // echo "alert('went in $time');";
    // echo '</script>';
    $timeout = 1617232372;//$time + $minute;
    if($conn == true){
        $sql = "SELECT * FROM lineup";
        $results = $conn->query($sql);
        $duration = 674165;
        $responce = '';
        $feedback = '';
        $returned = '';
        $pretoken = 'yyxxyyxy';
        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $adTime = $row["adpTime"];
                $adFk = $row["id"];
                if(strtotime($now) == strtotime($adTime)){
                    $lineupdata = "INSERT INTO adnotifications (lineupFk,responce,feedback,status,token) VALUES ('$adFk','$responce','$feedback','not read','$pretoken')";
                    if($conn->query($lineupdata)){
                        echo '<script language="javascript">';
                        echo "alert('Mda umefika jombaaa');";
                        echo '</script>';
                        // do{
                        //     //inatakiwa ipoteze dk mja ndan umu ili token isiwe updated data zikaingizw mara mbili
                        //     $pretoken = "xcv";
                        //         echo '<script language="javascript">';
                        //         echo "alert('went in $pretoken');";
                        //         echo '</script>';
                        // }while($time == $timeout);
                        // if($time == $timeout){
                        //     $pretoken = "";
                        //     echo '<script language="javascript">';
                        //     echo "alert('went in $pretoken');";
                        //     echo '</script>';
                        // }
                    }
                }
            }
            // $timeout = strtotime($timeout);
            // $sql2 = "SELECT * FROM adnotifications WHERE token = '$pretoken'";
            // $results2 = $conn->query($sql2);
            // while($row2 = $results2->fetch_assoc()) {
            //     $tokenn = $row2["token"];
            //     if($tokenn == $pretoken){
            //         echo '<script language="javascript">';
            //         echo "alert('$token zinafanana $time');";
            //         echo '</script>';           
            //     }else{
            //         echo '<script language="javascript">';
            //         echo "alert('$tokenn now hazifanani $pretoken');";
            //         echo '</script>';    
            //     }
            //     if($time == $timeout){
            //         $pretoken = "";
            //         echo '<script language="javascript">';
            //         echo "alert('went in $token');";
            //         echo '</script>';           
            //     }
            // }
            // echo '<script language="javascript">';
            // echo "alert('$now');";
            // echo '</script>';
            // if ($results2->num_rows > 0) {
            //     echo '<script language="javascript">';
            //     echo "alert('in');";
            //     echo '</script>';
            // }else{
            //     $lineupdata = "INSERT INTO adnotifications (lineupFk,responce,feedback,status,token) VALUES ('$returned','$responce','$feedback','not read','$token')";
            //     $conn->query($lineupdata);
            //     echo '<script language="javascript">';
            //     echo "alert('out');";
            //     echo '</script>';
            // }
        }
    }
}

// Log in Log function
function userLogsIn($id,$now,$action,$conn){
    $now = date("Y-m-d h:i:sa");
    $action = 'Logged In';
    $logInLog = "INSERT INTO logs (datee,action,userFK) VALUES ('$now','$action','$id')";
    $conn->query($logInLog);
}

// Reception register tangazo Log function
function recptnRegAdLog($id,$now,$action,$conn){
    $now = date("Y-m-d h:i:sa");
    $action = 'Registered Tangazo';
    $logInLog = "INSERT INTO logs (datee,action,userFK) VALUES ('$now','$action','$id')";
    $conn->query($logInLog);
}

// Reception Edit tangazo Log function
function recptnEditAdLog($id,$now,$action,$conn){
    $now = date("Y-m-d h:i:sa");
    $action = 'Edited Tangazo';
    $logInLog = "INSERT INTO logs (datee,action,userFK) VALUES ('$now','$action','$id')";
    $conn->query($logInLog);
}

// //automatic check date and remove item to the active
$now = date("Y-m-d h:i:sa");
if($conn == true){ 
    $sql = "SELECT * FROM matangazo"; 
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        while($row = $results->fetch_assoc()) {
          $to = $row["playTo"];
          $from = $row["playFrom"];
          $id = $row["id"];
          if($now > $to){
            $sql2 = "UPDATE matangazo SET statuss = 'Deactive' WHERE id = '$id'";
            $conn->query($sql2);
            //delete de active ads from lineup
            $deleteAd = "DELETE FROM lineup WHERE adFk = '$id'";
            $conn->query($deleteAd);
          }elseif($from > $now){
            $sql3 = "UPDATE matangazo SET statuss = 'Pending' WHERE id = '$id'";
            $conn->query($sql3);
            $deleteAd = "DELETE FROM lineup WHERE adFk = '$id'";
            $conn->query($deleteAd);
          }else{
            $sql2 = "UPDATE matangazo SET statuss = 'Active' WHERE id = '$id'";
            $conn->query($sql2);
          }
        }
    }
}

// log in
if(isset($_POST['submitLogin'])){
	$user = $_POST['username'];
	$pwd = $_POST['password'];
    
    if(!empty($user) && !empty($pwd)){
        $user =trim(htmlspecialchars($_POST['username']));
        $pwd = trim(htmlspecialchars($_POST['password']));    

        $queryOne = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'B' AND status = 'Active'";
        $query_runOne = mysqli_query($conn,$queryOne);

        $queryTwo = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'MK' AND status = 'Active'";
        $query_runTwo = mysqli_query($conn,$queryTwo);

        $queryThree = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'R' AND status = 'Active'";
        $query_runThree = mysqli_query($conn,$queryThree);    
        
        $queryFour = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'MT' AND status = 'Active'";
        $query_runFour = mysqli_query($conn,$queryFour);    

        $queryFive = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'A' AND status = 'Active'";
        $query_runFive = mysqli_query($conn,$queryFive);
        
        $querySix = "SELECT * FROM users WHERE userName = '$user' AND password = '$pwd' AND role = 'X' AND status = 'Active'";
        $query_runSix = mysqli_query($conn,$querySix);
        
        $upOne = mysqli_num_rows($query_runOne); 
        $upTwo = mysqli_num_rows($query_runTwo); 
        $upThree = mysqli_num_rows($query_runThree); 
        $upFour = mysqli_num_rows($query_runFour); 
        $upFive = mysqli_num_rows($query_runFive); 
        $upSix = mysqli_num_rows($query_runSix); 
        $action = "Logged In";
        if($upOne > 0){
            session_regenerate_id();
	        $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runOne)){
                $_SESSION['USER_ID'] = "{$rows['id']}";	
                $_SESSION['USER_NAME'] = "{$rows['userName']}";	
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: users/B/bshop.php");
            // background($conn);
        }else if($upTwo > 0){
            session_regenerate_id();
		    $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runTwo)){
                $_SESSION['USER_ID'] = "{$rows['id']}";	
                $_SESSION['USER_NAME'] = "{$rows['userName']}";
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: ./users/MK/mkurugenzi.php");
        }else if($upThree > 0){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runThree)){
                $_SESSION['USER_ID'] = "{$rows['id']}";	
                $_SESSION['USER_NAME'] = "{$rows['userName']}";
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: ./users/R/reception.php");
        }else if($upFour > 0){
            session_regenerate_id();
		    $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runFour)){
                $_SESSION['USER_ID'] = "{$rows['id']}";	
                $_SESSION['USER_NAME'] = "{$rows['userName']}";
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: ./users/MT/mwndaamatangazo.php");
        }else if($upFive > 0){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runFive)){
                $_SESSION['USER_ID'] = "{$rows['id']}";	
                $_SESSION['USER_NAME'] = "{$rows['userName']}";
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: ./users/A/admin.php");
        }else if($upSix > 0){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['start'] = time(); // Taking now logged in time.
            $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.
            while($rows = mysqli_fetch_array($query_runSix)){
                $_SESSION['USER_ID'] = "{$rows['id']}";
                $_SESSION['USER_NAME'] = "{$rows['userName']}";
                $_SESSION['CHEO'] = "{$rows['role']}";
                $_SESSION['USER_PHONE'] = "{$rows['phone']}";
            }
            userLogsIn($_SESSION['USER_ID'],$now,$action,$conn);
            header("location: ./users/X/reception.php");
        }else{
        require("index.php");
        echo'<script type="text/javascript">document.getElementById("alert").innerHTML = "Username or Password is incorrect";</script>';
        } 
    }else{
        require("index.php");
        echo'<script type="text/javascript">document.getElementById("alert").innerHTML = "Username or Password cant be empty";</script>';
    }
}
//log in ends
 
//update tangazo data
if(isset($_POST['editData'])){
    $tangazoId = $_REQUEST['tId'];
    $tangazoName = $_POST['tname'];
    $tangazoCost = $_POST['tcost'];
    $fromtoo = $_POST['fromto'];
    $now = date("Y-m-d");
    $from = substr($fromtoo,1,10);
    $to = substr($fromtoo,13);
    $var = $from;
    $var2 = $to;
    $from = date("Y-m-d", strtotime($var) );
    $to = date("Y-m-d", strtotime($var2) );
    $action = "Update Ad";
    function validateForm($now,$from){        
        if(($from < $now) && ($from != $now)){
            echo '<script language="javascript">';
            echo 'alert("Please Select Valid Dates!");location.href="./users/R/pages/editAd.php";';
            echo '</script>';
        }
    }
    validateForm($now,$from);
    $sql = "UPDATE matangazo SET tangazoName = '$tangazoName', playFrom = '$from', playTo = '$to', cost = '$tangazoCost' WHERE id = '$tangazoId'";
    
    if ($conn->query($sql) === TRUE) {
        recptnEditAdLog($_SESSION['USER_ID'],$now,$action,$conn);
        echo '<script language="javascript">';
        echo 'alert("Ad Updated Succesful!");location.href="./users/R/pages/matangazo.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Network not stable, Please try again!");location.href="./users/R/pages/editAd.php";';
        echo '</script>';
    }
}

//Insert User into database
if(isset($_POST['saveUser'])){
    $userPhone = $_POST['uphone'];
    $userName = $_POST['uname'];
    $userRole = $_POST['urole'];
    $userProgramme = $_POST['upro'];
    
    $now = date("Y-m-d"); 
    
    function validateForm($userPhone,$userName,$userRole){
        if($userPhone == '' || $userName == '' || $userRole == ''){
            echo '<script language="javascript">';
            echo 'alert("Please Feed All Required Fields!");location.href="./users/A/pages/newUser.php";';
            echo '</script>';
        }
    }
    function insertUser($userPhone,$userName,$userRole,$userProgramme,$conn){
        $default = '12345';
        $status = 'Active';
        $users = "INSERT INTO users (userName,password,phone,role,status) VALUES ('$userName','$default','$userPhone','$userRole','$status')";
        if($conn->query($users)){
            echo '<script language="javascript">';
            echo 'alert("User Registered Succesful!");location.href="./users/A/pages/users.php";';
            echo '</script>';
        }
        if($userRole != "00"){
            $qry = "SELECT * FROM users WHERE userName = '$userName' AND password = '$default'";
            $results = mysqli_query($conn,$qry);
            if (mysqli_num_rows($results) > 0) {
                while($rows = mysqli_fetch_array($results)){
                    $userId = $rows["id"];
                }
            }
            $cmpny = "INSERT INTO userkipindi (userFk,vipindiFk) VALUES ('$userId','$userProgramme')";
            if($conn->query($cmpny)){}
        }
    }
    validateForm($userPhone,$userName,$userRole);
    insertUser($userPhone,$userName,$userRole,$userProgramme,$conn);
}


//Insert Tangazo into database
if(isset($_POST['saveData'])){
    $companyPhone = $_POST['cphone'];
    $companyEmail = $_POST['cemail'];
    $companyAddress = $_POST['caddress'];

    $contactPersonName = $_POST['cpname'];
    $contactPersonPhone = $_POST['cpphone'];
    $contactPersonEmail = $_POST['cpemail'];
    
    $companyName = $_POST['cname'];  //textbox
    $companyName2 = $_POST['cmpny']; //drop down
    $tangazoName = $_POST['tname'];
    $tangazoCost = $_POST['tcost'];
    $tangazoCostType = $_POST['costType'];
    $fromtoo = $_POST['fromto'];
    $now = date("Y-m-d"); 
    $status = 'Active';
    $company = $companyName; //txtbox
    $companyId = $companyName2;
    $from = substr($fromtoo,1,10);
    $to = substr($fromtoo,13);
    $var = $from;
    $var2 = $to;
    $from = date("Y-m-d", strtotime($var) );
    $to = date("Y-m-d", strtotime($var2) );
    
    function validateForm($now,$from){
        if($from > $now){
            echo '<script language="javascript">';
            echo 'alert("Please Enter Valid Dates");location.href="./users/R/pages/newTangazo.php";';
            echo '</script>';
        }
    }
    function insertTangazoowner($company,$companyPhone,$companyEmail,$companyAddress,$conn){
        $cmpny = "INSERT INTO tangazoowner (ownerName,ownerPhone,ownerEmail,addresss) VALUES ('$company','$companyPhone','$companyEmail','$companyAddress')";
        if($conn->query($cmpny)){
            //keep log here
        }
    }
    function getTangazoOwnerId($company,$companyPhone,$companyAddress,$conn){
        $companyId = 0;
        $qry = "SELECT * FROM tangazoowner WHERE ownerName = '$company' AND ownerPhone = '$companyPhone' AND addresss = '$companyAddress'";
        $results = mysqli_query($conn,$qry);
        if (mysqli_num_rows($results) > 0) {
            while($rows = mysqli_fetch_array($results)){
                $companyId = $rows["id"];
            }
        }
        return $companyId;
    }
    function postContactperson($contactPersonName,$contactPersonPhone,$contactPersonEmail,$companyId,$conn){
        $cperson = "INSERT INTO contactperson (namee,phone,email,ownerFk) VALUES ('$contactPersonName','$contactPersonPhone','$contactPersonEmail','$companyId')";
        if($conn->query($cperson)){
            //keep
        }
    }
    
    if($companyName === ''){
        if($tangazoName=='' || $now=='' || $from=='' || $to=='' || $status=='' || $tangazoCost==''){
            echo '<script language="javascript">';
            echo 'alert("Please Fill All Required Fields!");location.href="./users/R/pages/newTangazo.php";';
            echo '</script>';
        }
        if($from < $now && $from != $now){
            echo '<script language="javascript">';
            echo 'alert("Please Enter Valid Dates!");location.href="./users/R/pages/newTangazo.php";';
            echo '</script>';
        }else{
            $companyId = $companyName2;
            if($companyId == '0'){
                echo '<script language="javascript">';
                echo 'alert("Please Select Company!");location.href="./users/R/pages/newTangazo.php";';
                echo '</script>';
            }
            $sql = "INSERT INTO matangazo (tangazoName, issueDate, playFrom, playTo, statuss, ownerFk,cost,costType) VALUES ('$tangazoName', '$now', '$from','$to','$status','$companyId','$tangazoCost','$tangazoCostType')";
            if ($conn->query($sql) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Ad Entered Succesful!");location.href="./users/R/pages/matangazo.php";';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Network not stable, please try again!");location.href="./users/R/pages/newTangazo.php";';
                echo '</script>';
            }
        }
    }else{
        if($contactPersonName=='' || $contactPersonPhone=='' || $contactPersonEmail=='' || $company=='' || $companyPhone=='' || $companyEmail=='' || $companyAddress==''){
            echo '<script language="javascript">';
            echo 'alert("Please Fill All Required Fields!");location.href="./users/R/pages/newTangazo.php";';
            echo '</script>';
        }
        if($from < $now && $from != $now){
            echo '<script language="javascript">';
            echo 'alert("Plase Enter Valid Dates!");location.href="./users/R/pages/newTangazo.php";';
            echo '</script>';
        }else{
            insertTangazoowner($company,$companyPhone,$companyEmail,$companyAddress,$conn);
            $companyId = getTangazoOwnerId($company,$companyPhone,$companyAddress,$conn);
            postContactperson($contactPersonName,$contactPersonPhone,$contactPersonEmail,$companyId,$conn);
            $action = "Registered Ad";
            $sql = "INSERT INTO matangazo (tangazoName, issueDate, playFrom, playTo, statuss, ownerFk,cost,costType) VALUES ('$tangazoName', '$now', '$from','$to','$status','$companyId','$tangazoCost','$tangazoCostType')";
            if ($conn->query($sql) === TRUE) {
                recptnRegAdLog($_SESSION['USER_ID'],$now,$action,$conn);
                echo '<script language="javascript">';
                echo 'alert("Ad Entered Succesful!");location.href="./users/R/pages/matangazo.php";';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Network not stable, please try again!");location.href="./users/R/pages/newTangazo.php";';
                echo '</script>';
            }
        }
    }  
}

//edit tangazo
if(isset($_GET['edit'])){
    $_SESSION['tangazoId'] = $_REQUEST['tangazo'];
    header("location: ./users/R/pages/editAd.php");
}

//tangazo details
if(isset($_GET['moreR'])){
    $_SESSION['moreId'] = $_REQUEST['more'];
    header("location: ./pages/moreR.php");
}

//selected programme to add Ads
if(isset($_GET['moreAdd'])){
    $_SESSION['moreId'] = $_REQUEST['more'];
    header("location: ./pages/moreAdd.php");
}

//Edt selected program, change selected ads for it
if(isset($_GET['moreAddEdit'])){
    $_SESSION['moreIdkipindi'] = $_REQUEST['more'];
    header("location: ./pages/moreAddEdit.php");
}

//Edt selected program, delete or update it
if(isset($_GET['moreProgrammeEdit'])){
    $_SESSION['moreIdkipindi'] = $_REQUEST['more'];
    header("location: ./pages/moreProgammeEdit.php");
}

if(isset($_GET['moreMT'])){
    $_SESSION['moreId'] = $_REQUEST['more'];
    header("location: ./pages/moreMT.php");
}

if(isset($_GET['moreMK'])){
    $_SESSION['moreId'] = $_REQUEST['more'];
    header("location: ./pages/moreMK.php");
}

if(isset($_GET['moreB'])){
    $_SESSION['moreId'] = $_REQUEST['more'];
    header("location: ./pages/moreB.php");
}




//set default user password
if(isset($_GET['resetpassword'])){
    $_SESSION['userId'] = $_REQUEST['moreeee'];
    $default = 'nic123';
    $id = $_SESSION['userId'];
    $sql = "UPDATE users SET password = '$default' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Succesful");location.href="./users/A/pages/users.php";';
        echo '</script>';
    }
}

//Admin user id enable dissable
if(isset($_GET['enabledisable'])){
    $_SESSION['userId'] = $_REQUEST['moree'];
    $id = $_SESSION['userId'];
    $status = '';
    $queryOne = "SELECT * FROM users WHERE id = '$id'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 
    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $status = "{$rows['status']}";	
        }
    }

    if($status == 'Active'){
        //update user status
        $sql = "UPDATE users SET status = 'Deactive' WHERE id = '$id'";
        if($conn->query($sql)){
            echo '<script language="javascript">';
            echo 'alert("Succesful");location.href="./users/A/pages/users.php";';
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/A/pages/users.php";';
            echo '</script>';
        }
    }elseif($status == 'Deactive'){
        //update user status
        $sql = "UPDATE users SET status = 'Active' WHERE id = '$id'";
        $conn->query($sql);
        header("location: ./users/A/pages/users.php");
    }
}

//show user logs 
if(isset($_GET['showLogs'])){
    $_SESSION['userId'] = $_REQUEST['moreee'];
    header("location: ./users/A/pages/logs.php");
}

// log out
if(isset($_GET['out_admin'])){
    session_start();
    session_destroy();
    header('Location: ./index.php');
	// require('./index.php');
}

//resert Password
if(isset($_POST['reset_pwd'])){
    $old = $_POST['oldpsw'];
    $new = $_POST['newpsw'];
    $newagain = $_POST['newpswrep'];

    if($new != $newagain){
        echo '<script language="javascript">';
        echo 'alert("Password mismatch");location.href="./users/R/profile.php";';
        echo '</script>';

    }
    
    $queryOne = "SELECT * FROM users WHERE password = '$old' AND role = 'R'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 

    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $uid = "{$rows['id']}";
        }
        
        $sql = "UPDATE users SET password = '$newagain' WHERE id = '$uid'";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Password updated Successful");location.href="./users/R/profile.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/R/profile.php";';
            echo '</script>';
        }
    }
}

//reset password B shop
if(isset($_POST['reset_pwd_bshop'])){
    $old = $_POST['oldpsw'];
    $new = $_POST['newpsw'];
    $newagain = $_POST['newpswrep'];

    if($new != $newagain){
        echo '<script language="javascript">';
        echo 'alert("Password mismatch");location.href="./users/B/profile.php";';
        echo '</script>';
    }
    
    $queryOne = "SELECT * FROM users WHERE password = '$old' AND role = 'B'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 

    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $uid = "{$rows['id']}";
        }
        
        $sql = "UPDATE users SET password = '$newagain' WHERE id = '$uid'";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Password Updated Succsesful");location.href="./users/B/profile.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/B/profile.php";';
            echo '</script>';
        }
    }

}

//reset password Admin
if(isset($_POST['reset_pwd_admin'])){
    $old = $_POST['oldpsw'];
    $new = $_POST['newpsw'];
    $newagain = $_POST['newpswrep'];

    if($new != $newagain){
        echo '<script language="javascript">';
        echo 'alert("Password missmatch");location.href="./users/A/admin.php";';
        echo '</script>';
    }
    
    $queryOne = "SELECT * FROM users WHERE password = '$old' AND role = 'A'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 

    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $uid = "{$rows['id']}";
        }
        
        $sql = "UPDATE users SET password = '$newagain' WHERE id = '$uid'";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Password Updated Succsesful");location.href="./users/A/profile.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/A/profile.php";';
            echo '</script>';
        }
    }

}

//reset password MK
if(isset($_POST['reset_pwd_mk'])){
    $old = $_POST['oldpsw'];
    $new = $_POST['newpsw'];
    $newagain = $_POST['newpswrep'];

    if($new != $newagain){
        echo '<script language="javascript">';
        echo 'alert("Password Updated Succsesful");location.href="./users/MK/reception.php";';
        echo '</script>';
    }
    
    $queryOne = "SELECT * FROM users WHERE password = '$old' AND role = 'MK'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 

    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $uid = "{$rows['id']}";
        }
        
        $sql = "UPDATE users SET password = '$newagain' WHERE id = '$uid'";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Password Updated Succsesful");location.href="./users/MK/profile.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/MK/profile.php";';
            echo '</script>';
        }
    }

}

//reset password MK
if(isset($_POST['reset_pwd_mt'])){
    $old = $_POST['oldpsw'];
    $new = $_POST['newpsw'];
    $newagain = $_POST['newpswrep'];

    if($new != $newagain){
        echo '<script language="javascript">';
        echo 'alert("Passwords missmatch");location.href="./users/MT/reception.php";';
        echo '</script>';
    }
    
    $queryOne = "SELECT * FROM users WHERE password = '$old' AND role = 'MT'";
    $query_runOne = mysqli_query($conn,$queryOne);
    $upOne = mysqli_num_rows($query_runOne); 

    if($upOne > 0){
        while($rows = mysqli_fetch_array($query_runOne)){
            $uid = "{$rows['id']}";
        }
        
        $sql = "UPDATE users SET password = '$newagain' WHERE id = '$uid'";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Password updated Successful");location.href="./users/MT/profile.php";';
            echo '</script>';
        } else {    
            echo '<script language="javascript">';
            echo 'alert("Network not stable, please try again!");location.href="./users/MT/profile.php";';
            echo '</script>';
        }
    }
}

//Update Phone Producer
if(isset($_POST["changePhoneMt"])){
    $phone = $_POST['updatedPhone'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Password updated Successful");location.href="./users/MT/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MT/profile.php";';
        echo '</script>';
    }
}

//Update Phone Reception
if(isset($_POST["changePhoneReception"])){
    $phone = $_POST['updatedPhone'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Password updated Successful");location.href="./users/R/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/R/profile.php";';
        echo '</script>';
    }
}

//Update Phone B Shop
if(isset($_POST["changePhoneBshp"])){
    $phone = $_POST['updatedPhone'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Password updated Successful");location.href="./users/B/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/B/profile.php";';
        echo '</script>';
    }
}

//Update Phone Lineup
if(isset($_POST["changePhoneLinup"])){
    $phone = $_POST['updatedPhone'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Password updated Successful");location.href="./users/X/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/X/profile.php";';
        echo '</script>';
    }
}

//Update Phone Mkurugenzi
if(isset($_POST["changePhoneMk"])){
    $phone = $_POST['updatedPhone'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Password updated Successful");location.href="./users/MK/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MK/profile.php";';
        echo '</script>';
    }
}


//Update Name Lineup
if(isset($_POST["changeNameLinup"])){
    $name = $_POST['updatedName'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET userName = '$name' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Name updated Successful");location.href="./users/X/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/X/profile.php";';
        echo '</script>';
    }
}

//Update Name B shop
if(isset($_POST["changeNameBshop"])){
    $name = $_POST['updatedName'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET userName = '$name' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Name updated Successful");location.href="./users/B/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/B/profile.php";';
        echo '</script>';
    }
}

//Update Name Mt
if(isset($_POST["changeNameMt"])){
    $name = $_POST['updatedName'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET userName = '$name' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Name updated Successful");location.href="./users/MT/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MT/profile.php";';
        echo '</script>';
    }
}

//Update Name Mkurugenzi
if(isset($_POST["changeNameMk"])){
    $name = $_POST['updatedName'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET userName = '$name' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Name updated Successful");location.href="./users/MK/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MK/profile.php";';
        echo '</script>';
    }
}

//Update Name Reception
if(isset($_POST["changeNameReception"])){
    $name = $_POST['updatedName'];
    $id = $_SESSION['USER_ID'];
    $sql = "UPDATE users SET userName = '$name' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Your Name updated Successful");location.href="./users/R/profile.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/R/profile.php";';
        echo '</script>';
    }
}

//store lineup information  && $_POST['chaguo']!=""
if(isset($_POST['storeLineup'])){
        $kipindi = $_SESSION['selectedKipindi'];
        $ad = $_POST['chaguo'];
        $tid = $_POST['tid'];
        $adpTime = $_POST['tTime'];
            
        //Retrieve all matangazo
        $sql = "SELECT * FROM matangazo WHERE statuss = 'Active' ORDER BY id DESC";
        $results = $conn->query($sql);
        while($row=mysqli_fetch_array($results)){
            $adId[] = $row['id'];
        }

        for($i=0; $i < count($adId); $i++){
            for($a = 0; $a < count($ad); $a++){
                if($adId[$i] == $ad[$a]){
                    $lineup = "INSERT INTO lineup (adFk,kipindFk,adpTime,tid) VALUES ('$adId[$i]','$kipindi','$adpTime[$i]','$tid[$i]')";
                    if($conn->query($lineup)){
                        echo '<script language="javascript">';
                        echo 'alert("Successfully");location.href="./users/X/pages/active.php"';
                        echo '</script>';
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("Network not stable, please try again!");location.href="./users/X/pages/active.php";';
                        echo '</script>';
                    }
                }
            }
        }
}

//update ads selection on Programme codes
if(isset($_POST['updateAdsSelectionCodes'])){
    $kipindi = $_SESSION['selectedKipindi'];
    if(!empty($_POST['chaguo'])){
        $_SESSION['chaguo']=$_POST['chaguo'];
        $ad = $_SESSION['chaguo'];
        $x = 1;
        $val = 0;
        while(list ($key, $val) = @each($ad)){
            //delete ads selected to picked
            $deleteAd = "DELETE FROM lineup WHERE adFk = '$val' AND kipindFk = '$kipindi'";
            if($conn->query($deleteAd)){    
                echo '<script language="javascript">';
                echo 'alert("Successfully");location.href="./users/X/pages/active.php";';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("Network not stable, please try again!");location.href="./users/X/pages/active.php";';
                echo '</script>';
            }
        }
    }else{
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/X/pages/active.php";';
        echo '</script>';
    }
}

//update Programme
if(isset($_POST['updateProgramme'])){
    $kipindi = $_SESSION['selectedKipindi'];
    $kname = $_POST['kname'];
    $kFromTime = $_POST['kFromTime'];
    $kToTime = $_POST['kToTime'];
    $kType = $_POST['kType'];
    $korder = $_POST['korder'];

    $sql = "UPDATE vipindi SET kipindiname = '$kname',fromTime = '$kFromTime',toTime = '$kToTime',type = '$kType',oderedBy = '$korder' WHERE id = '$kipindi'";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Programme updated Successful");location.href="./users/X/pages/active.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MT/profile.php";';
        echo '</script>';
    }
}

//Delete Programme
if(isset($_POST['deleteProgramme'])){
    $kipindi = $_SESSION['selectedKipindi'];
    $sql = "DELETE FROM vipindi WHERE id = '$kipindi'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Programme Deleted Successful");location.href="./users/X/pages/active.php";';
        echo '</script>';
    } else {    
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!");location.href="./users/MT/profile.php";';
        echo '</script>';
    }
}

//store programme into a database
if(isset($_POST['saveProggramme'])){
    $pname = $_POST['pname'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $ptype = $_POST['ptype'];
    $oder = $_POST['oder'];

    $lineup = "INSERT INTO vipindi (kipindiname,fromTime,toTime,type,oderedBy) VALUES ('$pname','$stime','$etime','$ptype','$oder')";
    if($conn->query($lineup)){
        echo '<script language="javascript">';
        echo 'alert("Successfully Registered");location.href="./users/X/pages/newProgramme.php";';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!"); location.href="./users/X/pages/newProgramme.php"';
        echo '</script>';
    }
}

//send message data into a database Bshop
if(isset($_POST['sendMessage'])){
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user = $_SESSION['USER_ID'];
    $now = date("Y-m-d h:i:sa");
    $status = "not read";
    $message = "INSERT INTO messages (subject,message,userFk,time,status) VALUES ('$subject','$message','$user','$now','$status')";
    if($conn->query($message)){
        echo '<script language="javascript">';
        echo 'alert("Message sent Successfully");location.href="./users/B/pages/sents.php";';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!"); location.href="./users/B/pages/compose.php"';
        echo '</script>';
    }
}

//send message data into a database Manager
if(isset($_POST['sendMessageMK'])){
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user = $_SESSION['USER_ID'];
    $now = date("Y-m-d h:i:sa");
    $status = "not read";
    $message = "INSERT INTO messages (subject,message,userFk,time,status) VALUES ('$subject','$message','$user','$now','$status')";
    if($conn->query($message)){
        echo '<script language="javascript">';
        echo 'alert("Message sent Successfully");location.href="./users/MK/pages/sents.php";';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Network not stable, please try again!"); location.href="./users/MK/pages/compose.php"';
        echo '</script>';
    }
}
?>