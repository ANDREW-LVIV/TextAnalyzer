<?php

namespace TextAnalyzer;

use finfo;

class FileUpload
{
  // Check allowed data types
  private function isText(string $file_path, string $file_name) {
    $finfo = new finfo(FILEINFO_MIME_TYPE, null);
    $mime_type = $finfo->file($file_path);
    $file_type = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

    $allowed_mime_type = [
      'txt' => 'text/plain',
      'xml' => 'text/xml',
      'html' => 'text/html',
      'htm' => 'text/html',
    ];

    if (array_key_exists($file_type, $allowed_mime_type) && in_array($mime_type, $allowed_mime_type)) {
      return TRUE;
    }

    return FALSE;
  }

  // Upload a file to analyze
  public function upload() {
    if($this->isText($_FILES["file"]["tmp_name"], $_FILES['file']['name'])) {
      return file_get_contents($_FILES["file"]["tmp_name"]);
    } else {
      return FALSE;
    }
  }
}