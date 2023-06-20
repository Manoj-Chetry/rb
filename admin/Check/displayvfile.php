<?php
$file = $_GET['file'];

// Validate and sanitize the file path to prevent unauthorized access
$filename = basename($file);
$filepath = 'upload/volunteer/' . basename($filename);

// Check if the file exists
if (file_exists($filepath)) {
    // Set the appropriate headers for PDF content
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Output the PDF file
    readfile($filepath);
} else {
    // File not found error
    echo "File not found.";
}
?>

