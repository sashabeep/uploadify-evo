<?php
if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
    $targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];

    $i = 1;
    while(file_exists($targetFile)) {
        $targetFile = str_replace('//','/',$targetPath) . $i++ . '-' . $_FILES['Filedata']['name'];
    }

    if(move_uploaded_file($tempFile,$targetFile)) {
        echo "1";
        @chmod($targetFile, 0777);
    }
    else {
        echo "Error moving file " . $tempFile . ' to ' . $targetFile;        
    }
}
?>
