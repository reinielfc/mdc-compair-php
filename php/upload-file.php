<?php //https://codewithawa.com/posts/how-to-upload-and-download-files-php-and-mysql
    function uploadFile($uploadFile, &$destination, &$errorMsg, ...$extensions) {

        $filename = $_FILES[$uploadFile]['name'];
        $file = $_FILES[$uploadFile]['tmp_name'];
        $size = $_FILES[$uploadFile]['size'];

        $destination .= $filename;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $extensions)) {
            $errorMsg = "File extension must be ";
            if (sizeof($extensions) == 1) {
                $errorMsg .= $ext[0];
            } else {
                $i = 0;
                for (; $i < sizeof($extensions)-1; $i++) {
                    $errorMsg .= '.' . $extensions[$i] . ", ";
                }
                $errorMsg .= "or ." . $extensions[$i];
            }
            return false;
        } else if ($size > 1000000) {
            $errorMsg = "File too large! Maximum size = 1MB";
            return false;
        } else if (move_uploaded_file($file, $destination)) {
            $errorMsg = "File uploaded successfully!";
            return true;
        } else {
            $errorMsg = "Failed to upload file.";
            return false;
        }
    }
?>