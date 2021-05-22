<?php

require __DIR__.'/vendor/autoload.php';

$exportReport = new TextAnalyzer\ExportReport();
$analyzed_text = unserialize(base64_decode($_POST["analyzed_text"]));

if(isset($_POST["submit_report"])) {
    $exportReport->export($analyzed_text, $_POST["export"]);
}