<?php
include('../../Scripts/mpdf/mpdf.php');
$mpdf=new mPDF();

$mpdf->debug = true;

$mpdf->WriteHTML("Hallo World");
$mpdf->Output();
?>