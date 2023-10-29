
	<body>
		<table style='text-align:center' border=1>
			<tr>
				<td>
					<h1>Student Yuklash</h1>
					<form class="" action="" method="post" enctype="multipart/form-data">
						<input type="file" name="excel" required value="">
						<button type="submit" name="Student">Import</button>
					</form>
				</td>
				<td>
					<h1>Admin Yuklash</h1>
					<form class="" action="" method="post" enctype="multipart/form-data">
						<input type="file" name="excel" required value="">
						<button type="submit" name="Student">Import</button>
					</form>
				</td>
				<td>
					<h1>Meneger Yuklash</h1>
					<form class="" action="" method="post" enctype="multipart/form-data">
						<input type="file" name="excel" required value="">
						<button type="submit" name="Student">Import</button>
					</form>
				</td>
			</tr>
		</table>
		<hr>
		<?php
		include("../newcrm/config/config.php");
		include("./student_plus.php");

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
		
				$i++;
			}
			echo $i;
		}
		?>
