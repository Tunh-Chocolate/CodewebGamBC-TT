<?php
require "Classes/PHPExcel.php";
    $conn = mysqli_connect("localhost","root","","web_game2");
	mysqli_set_charset($conn,"utf8");
	$sql = "SELECT * FROM games";
	$result = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($result)){
		$query = mysqli_query($conn,$sql);
	    $objExcel = new PHPExcel;
	    $objExcel->setActiveSheetIndex(0);
	    $sheet = $objExcel->getActiveSheet()->setTitle('games');
	    $numRow = 1;
		$sheet->setCellValue('A'.$numRow, 'ID');
		$sheet->setCellValue('B'.$numRow, 'Tên trò chơi');
		$sheet->setCellValue('C'.$numRow, 'Nhà sản xuất');
		$sheet->setCellValue('D'.$numRow, 'Id danh mục');
		$sheet->setCellValue('E'.$numRow, 'Giới thiệu');
		$sheet->setCellValue('F'.$numRow, 'Phiên bản');
		$sheet->setCellValue('G'.$numRow, 'Giá');
        $sheet->setCellValue('H'.$numRow, 'Kích thước');
		$sheet->setCellValue('I'.$numRow, 'Ngày tạo');
        $sheet->setCellValue('J'.$numRow, 'Ảnh');
        $sheet->setCellValue('K'.$numRow, 'Trực tuyến');
        $sheet->setCellValue('L'.$numRow, 'Is_Active');
		$sheet->getColumnDimension("A")->setAutosize(true);
		$sheet->getColumnDimension("B")->setAutosize(true);
		$sheet->getColumnDimension("C")->setAutosize(true);
		$sheet->getColumnDimension("D")->setWidth(10);
		$sheet->getColumnDimension("E")->setWidth(86);
		$sheet->getColumnDimension("F")->setWidth(15);
		$sheet->getColumnDimension("G")->setAutosize(true);
		$sheet->getColumnDimension("H")->setWidth(10);
        $sheet->getColumnDimension("I")->setAutosize(true);
		$sheet->getColumnDimension("J")->setAutosize(true);
        $sheet->getColumnDimension("K")->setAutosize(true);
        $sheet->getColumnDimension("L")->setAutosize(true);
		$sheet->getStyle('A1:L1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
		$sheet->getStyle('A1:L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$result = $conn->query("SELECT id,name,developer,IdCategory,intro,version,price,size,date,image,internet,is_Active FROM  games");

		while($data = mysqli_fetch_assoc($result)){
			$numRow++;
			$sheet->setCellValue('A'.$numRow, $data['id']);
			$sheet->setCellValue('B'.$numRow, $data['name']);
			$sheet->setCellValue('C'.$numRow, $data['developer']);
			$sheet->setCellValue('D'.$numRow, $data['IdCategory']);
			$sheet->setCellValue('E'.$numRow, $data['intro']);
			$sheet->setCellValue('F'.$numRow, $data['version']);
			$sheet->setCellValue('G'.$numRow, $data['price']);
			$sheet->setCellValue('H'.$numRow, $data['size']);
            $sheet->setCellValue('I'.$numRow, $data['date']);
            $sheet->setCellValue('J'.$numRow, $data['image']);
            $sheet->setCellValue('K'.$numRow, $data['internet']);
            $sheet->setCellValue('L'.$numRow, $data['is_Active']);
		}
		$styleArray = array(
			'border'=>array(
				'allborder'=>array(
					'style'=>PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);
		$sheet->getStyle('A1:'.'L'.($numRow+1))->applyFromArray($styleArray);
		$sheet->setCellValue('L'.($numRow+1));
		$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
		$filename = "games.xlxs";
		$objWriter->save($filename);
		$msg = "Xuat File thanh cong!";
        echo"Xuất file thành công! File nằm tại  ./webgame/admin/";
}
?>
<br>
<a href="./manage-games.php">Quay lại</a>