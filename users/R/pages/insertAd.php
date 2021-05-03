<?php
require '../../../action.php';
if(isset($_POST['cname'])){
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
            header("location: ./newTangazo.php");
            echo '<script type="text/javascript">alert("date wrong");</script>';
        }
    }
    function insertTangazoowner($company,$companyPhone,$companyEmail,$companyAddress,$conn){
        $cmpny = "INSERT INTO tangazoowner (ownerName,ownerPhone,ownerEmail,addresss) VALUES ('$company','$companyPhone','$companyEmail','$companyAddress')";
        $conn->query($cmpny);
        if($conn->query($cmpny)){
            header("location: ./newTangazo.php");
        }
    }
    function getTangazoOwnerId($company,$companyPhone,$conn){
        $companyId = 0;
        $qry = "SELECT * FROM tangazoowner WHERE ownerName = '$company' AND ownerPhone = '$companyPhone'";
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
        $conn->query($cperson);
    }
            insertTangazoowner($company,$companyPhone,$companyEmail,$companyAddress,$conn);
            $companyId = getTangazoOwnerId($company,$companyPhone,$conn);

            postContactperson($contactPersonName,$contactPersonPhone,$contactPersonEmail,$companyId,$conn);

            $sql = "INSERT INTO matangazo (tangazoName, issueDate, playFrom, playTo, statuss, ownerFk,cost) VALUES ('$tangazoName', '$now', '$from','$to','$status','$companyId','$tangazoCost')";
            if ($conn->query($sql) === TRUE) {
                recptnRegAdLog($_SESSION['USER_ID'],$now,$action,$conn);
                header("location: ./matangazo.php");    
            }
    // if($companyName === ''){
    //     if($from < $now && $from != $now){
    //         header("location: ./newTangazo.php");
    //         echo '<script type="text/javascript">alert("date is not correct");</script>';
    //     }else{
    //         $companyId = $companyName2;
    //         $sql = "INSERT INTO matangazo (tangazoName, issueDate, playFrom, playTo, statuss, ownerFk,cost) VALUES ('$tangazoName', '$now', '$from','$to','$status','$companyId','$tangazoCost')";
    //         if ($conn->query($sql) === TRUE) {
    //             header("location: ./matangazo.php");    
    //             echo '<script type="text/javascript">alert("Ad registered succsesful");</script>';
    //         } else {
    //             echo '<script type="text/javascript">alert("something went wrong");</script>';
    //         }
    //     }
    // }else{
    //     if($from < $now && $from != $now){
    //         header("location: ./newTangazo.php");
    //         echo '<script type="text/javascript">alert("date wrong");</script>';
    //     }else{
    //         insertTangazoowner($company,$companyPhone,$companyEmail,$companyAddress,$conn);
    //         $companyId = getTangazoOwnerId($company,$companyPhone,$conn);
    //         postContactperson($contactPersonName,$contactPersonPhone,$contactPersonEmail,$companyId,$conn);

    //         $sql = "INSERT INTO matangazo (tangazoName, issueDate, playFrom, playTo, statuss, ownerFk,cost) VALUES ('$tangazoName', '$now', '$from','$to','$status','$companyId','$tangazoCost')";
    //         if ($conn->query($sql) === TRUE) {
    //             recptnRegAdLog($_SESSION['USER_ID'],$now,$action,$conn);
    //             header("location: ./matangazo.php");    
    //         } else {
    //             echo 'something went wrong';
    //         }
    //     }
    // }
}

?>