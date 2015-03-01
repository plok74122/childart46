<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
//    public function Header() {
//        // Logo
//        $image_file = K_PATH_IMAGES.'logo_example.jpg';
//        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//        // Set font
//        $this->SetFont('helvetica', 'B', 20);
//        // Title
//        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('kaiu', '', 10, true);
        // Page number
        $this->Cell(0, 10, '第'.$this->getAliasNumPage().'頁/共'.$this->getAliasNbPages().'頁', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 003');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set default header data
//$pdf->SetHeaderData('', '', '第46屆世界兒童畫展', "收件列表(".$receive_date.")：共計".count($item)."件\n".$content_info);
$pdf->SetHeaderData('', '', '第46屆世界兒童畫展 '.$class_note[0]['class_note'].' 獲獎清單', implode(',',$count));
// set header and footer fonts
$pdf->setHeaderFont(Array('kaiu', '', 14));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//    require_once(dirname(__FILE__).'/lang/eng.php');
//    $pdf->setLanguageArray($l);
//}

// ---------------------------------------------------------

// set font
$pdf->SetFont('kaiu', '', 12, true);
$pdf->SetFont('msungstdlight', '', 12);
// add a page
$pdf->AddPage();

$html = "<table style=\"border-collapse:collapse;border-style:solid;border-color:black;border-width:1px;text-align:center;width:12cm;\">
<tr>
	<td style=\"border: 1px solid #000;width:1.9cm;\">項次</td>
	<td style=\"border: 1px solid #000;width:4.0cm;\">作品名稱</td>
	<td style=\"border: 1px solid #000;width:2.1cm;\">姓名</td>
	<td style=\"border: 1px solid #000;width:2.4cm;\">年級</td>
	<td style=\"border: 1px solid #000;width:3.0cm;\">學校</td>
	<td style=\"border: 1px solid #000;width:3.0cm;\">指導老師</td>
	<td style=\"border: 1px solid #000;width:2.0cm;\">評鑑</td>
</tr>";
for($i=0 ; $i < count($item) ; $i++)
{
	$j=$i+1;
	$html .="<tr>
		<td style=\"border: 1px solid #000;\">".$j."</td>
		<td style=\"border: 1px solid #000;\">".$item[$i]['title']."</td>
		<td style=\"border: 1px solid #000;\">".str_replace("、","<br>",$item[$i]['name'])."</td>
		<td style=\"border: 1px solid #000;\">".$item[$i]['grade']."</td>
		<td style=\"border: 1px solid #000;\">".$item[$i]['school_name']."</td>
		<td style=\"border: 1px solid #000;\">".$item[$i]['teacher']."</td>
		<td style=\"border: 1px solid #000;\">".$item[$i]['rank']."</td>
	</tr>";
}
$html .= "</table>";
$pdf->writeHTML($html, true, false, true, false, '');

$html = <<<EOF
<table style="border-collapse:collapse;border-style:dotted;border-color:black;border-width:1px;text-align:center;">
</table>
<p align="center" style="font-size:14px;">以下空白</p>
EOF;
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Rank_list.pdf');

//============================================================+
// END OF FILE, 'D'
//============================================================+