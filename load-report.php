<?php

require __DIR__.'/vendor/autoload.php';

$exportReport = new TextAnalyzer\ExportReport();
$analyzed_text = json_decode(base64_decode($_POST["analyzed_text"]), true);
if(isset($_POST["submit_report"])) {
    $exportReport->export($analyzed_text, $_POST["export"]);
}