<?php
//============================================================+
// File name   : example_050.php
// Begin       : 2009-04-09
// Last Update : 2013-05-14
//
// Description : Example 050 for TCPDF class
//               2D Barcodes
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
 * @abstract TCPDF - Example: 2D barcodes.
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('請將B欄位浮貼於此處');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData('','','','請浮貼於此處');
//
//// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
//// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//	require_once(dirname(__FILE__).'/lang/eng.php');
//	$pdf->setLanguageArray($l);
//}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.

// set font
//$pdf->SetFont('helvetica', '', 11);
$pdf->SetFont('kaiu', '', 12, true);
$pdf->SetFont('msungstdlight', '', 12);
// add a page
$pdf->AddPage();


$html = <<<EOF
<p align="center" style="font-size:10px;">請將第乙聯浮貼於此</p>
<table style="border-collapse:collapse;border-style:dotted;border-color:black;border-width:1px;text-align:center;">
</table>
<p align="center" style="font-size:14px;">中華民國第46屆世界兒童畫展</p>
EOF;
$pdf->writeHTML($html, true, false, true, false, '');

$html = "<table style=\"border-collapse:collapse;border-style:solid;border-color:black;border-width:1px;text-align:center;width:12cm;\">
<tr>
	<td style=\"border: 1px solid #000;width:1.9cm;height:0.6cm;\">類別</td>
	<td style=\"border: 1px solid #000;width:6.3cm;\" colspan=\"1\">".$type."</td>
	<td style=\"border: 1px solid #000;width:1.9cm;\">縣市別</td>
	<td style=\"border: 1px solid #000;width:1.9cm;\" colspan=\"1\">".$city."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">畫題</td>
	<td style=\"border: 1px solid #000;\" colspan=\"3\">".$title."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:1.2cm;\">姓名</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$username."</td>
	<td style=\"border: 1px solid #000;\">性別</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$sex."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">年級</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$grade."(".$class_note.")</td>
	<td style=\"border: 1px solid #000;\">年齡</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$year."歲</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">校名</td>
	<td style=\"border: 1px solid #000;\" colspan=\"3\">".$school_name."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:2.1cm;\">校址電話</td>
	<td style=\"border: 1px solid #000;text-align:left;\" colspan=\"3\">".$address."<br>".$phone."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:3.8cm;\">指導老師</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$teacher." 老師</td>
	<td style=\"border: 1px solid #000;\" colspan=\"2\"></td>
</tr>
</table>";
//$pdf->writeHTML($html, true, false, true, false, '');
$pdf->MultiCell(70, 50, $html, 0, 'J', false, 1, 45, 30, true, 0, true, true, 0, 'T', false);

$html = <<<EOF
<p></p>
<table style="border-collapse:collapse;border-style:dashed;border-color:black;border-width:1px;text-align:center;">
</table>
<p align="center" style="font-size:10px;">請延虛線剪下浮貼於黏貼處</p>
<p align="center" style="font-size:14px;">中華民國第46屆世界兒童畫展</p>
EOF;
$pdf->writeHTML($html, true, false, true, false, '');

$html = "<table style=\"border-collapse:collapse;border-style:solid;border-color:black;border-width:1px;text-align:center;width:12cm;\">
<tr>
	<td style=\"border: 1px solid #000;width:1.9cm;height:0.6cm;\">類別</td>
	<td style=\"border: 1px solid #000;width:6.3cm;\" colspan=\"1\">繪畫</td>
	<td style=\"border: 1px solid #000;width:1.9cm;\">縣市別</td>
	<td style=\"border: 1px solid #000;width:1.9cm;\" colspan=\"1\">".$city."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">畫題</td>
	<td style=\"border: 1px solid #000;\" colspan=\"3\">".$title."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:1.2cm;\">姓名</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$username."</td>
	<td style=\"border: 1px solid #000;\">性別</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$sex."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">年級</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$grade."(".$class_note.")</td>
	<td style=\"border: 1px solid #000;\">年齡</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$year."歲</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:0.6cm;\">校名</td>
	<td style=\"border: 1px solid #000;\" colspan=\"3\">".$school_name."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:2.1cm;\">校址電話</td>
	<td style=\"border: 1px solid #000;text-align:left;\" colspan=\"3\">".$address."<br>".$phone."</td>
</tr>
<tr>
	<td style=\"border: 1px solid #000;height:3.8cm;\">指導老師</td>
	<td style=\"border: 1px solid #000;\" colspan=\"1\">".$teacher." 老師</td>
	<td style=\"border: 1px solid #000;\" colspan=\"2\"></td>
</tr>
</table>";
//$pdf->writeHTML($html, true, false, true, false, '');
$pdf->MultiCell(70, 50, $html, 0, 'J', false, 1, 45, 160, true, 0, true, true, 0, 'T', false);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// ---------------------------------------------------------
//輸入其他框框
$pdf->MultiCell(15, 5, '黏貼處', 1, 'J', false, 0, 10, 10, true, 0, true, true, 0, 'T', false);
$pdf->MultiCell(15, 5, '黏貼處', 1, 'J', false, 1, 50, 10, true, 0, true, true, 0, 'T', false);
$pdf->MultiCell(15, 5, '黏貼處', 1, 'J', false, 1, 140, 10, true, 0, true, true, 0, 'T', false);
$pdf->MultiCell(15, 5, '黏貼處', 1, 'J', false, 1, 190, 10, true, 0, true, true, 0, 'T', false);
$pdf->MultiCell(70, 50, '(甲聯-實貼於作品背面)', 0, 'J', false, 1, 25, 20, true, 0, true, true, 0, 'T', false);
$pdf->MultiCell(70, 50, '(乙聯-浮貼上方黏貼處)', 0, 'J', false, 1, 25, 140, true, 0, true, true, 0, 'T', false);
$style = array(
	'border' => false,
	'padding' => 0,
	'fgcolor' => array(128,0,0),
	'bgcolor' => false
);

// QRCODE,H : QR-CODE Best error correction
$pdf->write2DBarcode($url, 'QRCODE,H', 129, 88, 36, 36, $style, 'N');
$pdf->Text(93, 120, '請勿汙損二維條碼');


//Close and output PDF document
$pdf->Output($username.'.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
