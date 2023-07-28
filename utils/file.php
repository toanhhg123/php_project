<?php
function uploadFile($file): ?string
{
    try {
        $target_dir = __DIR__ . "/../files/";
        $fileName = uniqid() . preg_replace('/[ \-\!\@\#\$\%\&\*\(\)]/i', "", basename($file["name"]));
        $target_file   = $target_dir . $fileName;
        if ($file['error'] != 0)
            return null;
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $fileName;
        }
    } catch (\Throwable $th) {
        return null;
    }
}
