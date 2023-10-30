<!DOCTYPE html>
<html lang="en">
    <?php
        date_default_timezone_set("Asia/Samarkand");
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sss</title>
</head>
<body>
    <table style='text-align:center' border=1>
        <tr>
            <td>
                <h4>Guruh</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="Guruh">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['Guruh'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $GuruhID = $row[1];
                        $GuruhName = $row[2];
                        $Summa = $row[3];
                        $TecherID = $row[4];
                        $TechTulov = $row[5];
                        $TechBonus = $row[6];
                        $Start = $row[7];
                        $End = $row[8];
                        $Xona = $row[9];
                        $Dushanba = $row[10];
                        $Seshanba = $row[11];
                        $chorshanba = $row[12];
                        $Payshanba = $row[13];
                        $Juma = $row[14];
                        $Shanba = $row[15];
                        $Meneger = $row[16];
                        $InsertData = $row[17];
                        $UpdateData = date("Y-m-d");
                        if($i>1){
                            $sql = "INSERT INTO `guruh`(`id`, `GuruhID`, `GuruhName`, `GuruhSumma`, `TecherID`, `TechTulov`, `TechBonus`, `Start`, `End`, `RoomID`, `Dushanba`, `Seshanba`, `Chorshanba`, `Payshanba`, `Juma`, `Shanba`, `Meneger`, `InsertData`, `UpdateData`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $GuruhID, $GuruhName, $Summa, $TecherID, $TechTulov, $TechBonus, $Start, $End, $Xona, $Dushanba, $Seshanba, $chorshanba, $Payshanba, $Juma, $Shanba, $Meneger, $InsertData, $UpdateData]);
                        }
                        $i++;
                    }
                    echo $i." ta guruh yuklandi";
                }
            ?>
            <td>
                <h4>Guruh Plus</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="GuruhPlus">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['GuruhPlus'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $GuruhID = $row[1];
                        $UserID = $row[2];
                        $Start = $row[3];
                        $StartIzoh = $row[4];
                        $StartMeneger = $row[5];
                        $END = $row[6];
                        $EndIzoh = $row[7];
                        $EndMeneger = $row[8];
                        $Status = $row[9];
                        if($i>1){
                            $sql = "INSERT INTO `guruh_plus`(`id`, `GuruhID`, `UserID`, `Start`, `StartIzoh`, `StartMenegerID`, `End`, `EndIzoh`, `EndMenegerID`, `Status`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $GuruhID, $UserID, $Start, $StartIzoh, $StartMeneger, $END, $EndIzoh, $EndMeneger, $Status]);
                        }
                        $i++;
                    }
                    echo $i." ta guruhga qo'shilgan talabalar yuklandi";
                }
            ?>
            <td>
                <h4>Rooms</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="rooms">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['rooms'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $RoomID = $row[1];
                        $Room = $row[2];
                        $Sigim = $row[3];
                        $MenegerID = $row[4];
                        $Insert = $row[5];
                        $Update = date("Y-m-d");
                        if($i>1){
                            $sql = "INSERT INTO `rooms`(`id`, `RoomID`, `Room`, `Sigim`, `MenegerID`, `InsertData`, `UpateData`)
                            VALUES (NULL,?,?,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $RoomID, $Room, $Sigim, $MenegerID, $Insert, $Update]);
                        }
                        $i++;
                    }
                    echo $i." ta xona qo'shildi";
                }
            ?>
        </tr>
        <tr>
            <td>
                <h4>Admin Dostup</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="Dostup">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['Dostup'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $Plus = $row[2];
                        $Edit = $row[3];
                        $Trash = $row[4];
                        if($i>1){
                            $sql = "INSERT INTO `user_admin`(`id`, `UserID`, `Plus`, `Edit`, `Trash`) VALUES (NULL,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $Plus, $Edit, $Trash]);
                        }
                        $i++;
                    }
                    echo $i." Admin dostup";
                }
            ?>
            <td>
                <h4>Student Dostup</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="Sdostup">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['Sdostup'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $Tanish = $row[2];
                        $TanishPhone = $row[3];
                        $About = $row[4];
                        $Haqimizda = $row[5];
                        if($i>1){
                            $sql = "INSERT INTO `user_student`(`id`, `UserID`, `Tanish`, `TanishPhone`, `About`, `Haqimizda`)
                            VALUES (NULL,?,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $Tanish, $TanishPhone, $About, $Haqimizda]);
                        }
                        $i++;
                    }
                    echo $i." student dostup";
                }
            ?>
            <td>
                <h4>Techer Dostup</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="Tdostup">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['Tdostup'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $Mutahasislik = $row[2];
                        $About = $row[3];
                        if($i>1){
                            $sql = "INSERT INTO `user_techer`(`id`, `UserID`, `Mutahasilik`, `About`)
                            VALUES (NULL,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $Mutahasislik, $About]);
                        }
                        $i++;
                    }
                    echo $i." techer dostup";
                }
            ?>
        </tr>
        <tr>
            <td>
                <h4>Admin Plus</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="admin_plus">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['admin_plus'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $FIO = $row[2];
                        $Phone = $row[3];
                        $Address = $row[4];
                        $Tday = $row[5];
                        $Type = $row[6];
                        $Username = $row[7];
                        $Password = $row[8];
                        $DateInsert = $row[9];
                        if($i>1){
                            $sql = "INSERT INTO `users`(`id`, `UserID`, `FIO`, `Phone`, `Manzil`, `TKun`, `Type`, `Username`, `Password`, `DateInsert`, `DateUpdate`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $FIO, $Phone, $Address, $Tday, $Type, $Username, $Password, $DateInsert]);
                        }
                        $i++;
                    }
                    echo $i." Admin qo'shildi";
                }
            ?>
            <td>
                <h4>Student Plus</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="student_plus">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['student_plus'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $FIO = $row[2];
                        $Phone = $row[3];
                        $Address = $row[4];
                        $Tday = $row[5];
                        $Type = $row[6];
                        $Username = $row[7];
                        $Password = $row[8];
                        $DateInsert = $row[9];
                        if($i>1){
                            $sql = "INSERT INTO `users`(`id`, `UserID`, `FIO`, `Phone`, `Manzil`, `TKun`, `Type`, `Username`, `Password`, `DateInsert`, `DateUpdate`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $FIO, $Phone, $Address, $Tday, $Type, $Username, $Password, $DateInsert]);
                        }
                        $i++;
                    }
                    echo $i." Student qo'shildi";
                }
            ?>
            <td>
                <h4>Techer Plus</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="techer_plus">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['techer_plus'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $FIO = $row[2];
                        $Phone = $row[3];
                        $Address = $row[4];
                        $Tday = $row[5];
                        $Type = $row[6];
                        $Username = $row[7];
                        $Password = $row[8];
                        $DateInsert = $row[9];
                        if($i>1){
                            $sql = "INSERT INTO `users`(`id`, `UserID`, `FIO`, `Phone`, `Manzil`, `TKun`, `Type`, `Username`, `Password`, `DateInsert`, `DateUpdate`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $FIO, $Phone, $Address, $Tday, $Type, $Username, $Password, $DateInsert]);
                        }
                        $i++;
                    }
                    echo $i." Techer qo'shildi";
                }
            ?>
        </tr>
        <tr>
            <td>
                <h4>Student Tulov</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="student_tulov">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['student_tulov'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $TulovType = $row[2];
                        $Summa = $row[3];
                        $Izoh = $row[4];
                        $Operator = $row[5];
                        $InsertData = $row[6];
                        if($i>1){
                            $sql = "INSERT INTO `user_student_tulov`(`id`, `UserID`, `TulovType`, `TulovSumma`, `Izoh`, `MenegerID`, `InsertData`, `UpateData`)
                            VALUES (NULL,?,?,?,?,?,?,CURRENT_TIMESTAMP)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $TulovType, $Summa, $Izoh, $Operator, $InsertData]);
                        }
                        $i++;
                    }
                    echo $i." tolov qo'shildi";
                }
            ?>
            <td>
                <h4>Techer Tulov</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="techer_tulov">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['techer_tulov'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $GuruhID = $row[2];
                        $Type = $row[3];
                        $Summa = $row[4];
                        $Izoh = $row[5];
                        $Meneger = $row[6];
                        $Date = $row[6];
                        if($i>1){
                            $sql = "INSERT INTO `user_techer_tulov`(`id`, `TecherID`, `GuruhID`, `TulovType`, `TulovSumma`, `Izoh`, `Meneger`, `Data`)
                            VALUES (NULL,?,?,?,?,?,?,?)";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $GuruhID, $Type, $Summa, $Izoh, $Meneger, $Date]);
                        }
                        $i++;
                    }
                    echo $i." tech tolov qo'shildi";
                }
            ?>
            <td>
                <h4>Qaytarilgan to'lov</h4>
                <form class="" action="index2.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel" required value="">
                    <button type="submit" name="tulov_qaytar">Import</button>
                </form>
            </td>
            <?php
                if(isset($_POST['tulov_qaytar'])){
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
                    include("../newcrm/config/config.php");
                    foreach($reader as $key => $row){
                        $ID = $row[0];
                        $UserID = $row[1];
                        $Summa = $row[2];
                        $TulovType = $row[3];
                        $Qaytarildi = $row[4];
                        $Operator = $row[5];
                        $Izoh = $row[6];
                        $Xisobchi = $row[7];
                        $Tasdiqlandi = $row[8];
                        if($i>1){
                            $sql = "INSERT INTO `moliya_qaytarildi`(`id`, `UserID`, `TulovSumma`, `TulovTuri`, `QaytarishVaqti`, `Meneger`, `Izoh`, `Xisobchi`, `Tasdiqlandi`, `Status`)
                            VALUES (NULL,?,?,?,?,?,?,?,?,'true')";
                            $stmt= $conn->prepare($sql);
                            $stmt->execute([ $UserID, $Summa, $TulovType, $Qaytarildi, $Operator, $Izoh, $Xisobchi, $Tasdiqlandi]);
                        }
                        $i++;
                    }
                    echo $i." Qaytarilgan tolovlar";
                }
            ?>
        </tr>
    </table>
</body>
</html>