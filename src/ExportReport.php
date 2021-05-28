<?php

namespace TextAnalyzer;

use SimpleXMLElement;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportReport
{
    public function export(array $data, $type)
    {
        switch ($type) {
            case 'csv':
                $contentType = 'text/csv';
                $exc = '.csv';
                break;
            case 'xml':
                $contentType = 'text/xml';
                $exc = '.xml';
                break;
            case 'xlsx':
                $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                $exc = '.xlsx';
                break;
            default:
                $contentType = 'text/plain';
                $exc = '.txt';
        }

        header('Content-Description: File Transfer');
        header('Content-Type: ' . $contentType);
        header('Content-Disposition: attachment; filename=report' . $exc);

        switch ($type) {
            case 'csv':
                $fp = fopen('php://output', 'w');
                fputcsv($fp, array_keys($data[0]));
                foreach ($data as $row) {
                    fputcsv($fp, $row);
                }
                break;
            case 'xml':
                $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
                $this->array_to_xml($data, $xml_data);
                $content = $xml_data->asXML();
                $fp = fopen('php://output', 'w');
                fwrite($fp, $content);
                break;
            case 'xlsx':
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $i=1;
                foreach ($data as $item) {
                    $sheet->setCellValue('A'.$i, $item['title']);
                    $sheet->setCellValue('B'.$i, $item['result']);
                    $i++;
                }
                $writer = new Xlsx($spreadsheet);
                $content = $writer->save('php://output');
                $fp = fopen('php://output', 'w');
                fwrite($fp, $content);
                break;
            default:
                $content = 'no data';
                $fp = fopen('php://output', 'w');
                fwrite($fp, $content);
                break;
        }

        exit;
    }

    private function array_to_xml(array $data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'item' . $key;
                }
                $subNode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subNode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

}