<?php
if(isset($_POST["Student"])){
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    $targetDirectory = "uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
    error_reporting(0);
    ini_set('display_errors', 0);
    require 'excelReader/excel_reader2.php';
    require 'excelReader/SpreadsheetReader.php';
    $reader = new SpreadsheetReader($targetDirectory);
    $i=1;
    foreach($reader as $key => $row){
        $AdminID = 1689004931;
        $StudentID = $row[0];
        $FIO = $row[1];
        $Phone = $row[2];
        $Address = $row[3];
        $Tkun = $row[4];
        $InsertData = $row[5];
        $Tanish = $row[6];
        $TanishPhone = $row[7];
        $About = $row[8];
        $Haqimizda = $row[9];
        $Data = date("Y-m-d");

        $sql = "INSERT INTO `users`(`id`, `UserID`, `FIO`, `Phone`, `Manzil`, `TKun`, `Type`, `Username`, `Password`, `DateInsert`, `DateUpdate`)
        VALUES (NULL,?,?,?,?,?,'student','student','student',?,CURRENT_TIMESTAMP)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$StudentID, $FIO, $Phone, $Address, $Tkun, $InsertData]);

        $sql2 = "INSERT INTO `user_student`(`id`, `UserID`, `Tanish`, `TanishPhone`, `About`, `Haqimizda`) 
        VALUES (NULL,?,?,?,?,?)";
        $stmt2= $conn->prepare($sql2);
        $stmt2->execute([$StudentID, $Tanish, $TanishPhone, $About, $Haqimizda]);

        $sql3 = "INSERT INTO `user_history`(`id`, `UserID`, `AdminID`, `Izoh`, `Data`)
        VALUES (NULL,?,?,'ESKI CRIMDAN KO`CHIRILDI',CURRENT_TIMESTAMP)";
        $stmt3= $conn->prepare($sql3);
        $stmt3->execute([$StudentID, $AdminID]);
        $i++;
    }
    echo $i."Ta student yuklandi";
}
?>