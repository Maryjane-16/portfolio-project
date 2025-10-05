<?php

namespace App\Traits;

trait HandlesFileUpload
{
    public function handlePhotoUpload(string $fieldName, string $uploadSubDir)
    {

        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $maxSize = 10 * 1024 * 1024; //10MB

            $fileSize = $_FILES[$fieldName]['size'];
            $fileName = $_FILES[$fieldName]['name'];
            $tmpName = $_FILES[$fieldName]['tmp_name'];
            $fileType = mime_content_type($tmpName);

            if (!in_array($fileType, $allowedTypes)) {
                $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
                header('Location: /testimonials/create');
                exit();
            }

            if ($fileSize > $maxSize) {
                $_SESSION['error'] = "File is too large. Maximum file size is 10MB.";
                header('Location: /testimonials/create');
                exit();
            }

            $uploadDir = dirname(__DIR__, 2) . "/storage/$uploadSubDir/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $photoName = uniqid() . '_' . basename($fileName);
            $targetFile = $uploadDir . $photoName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                return ['path' => "$uploadSubDir" . $photoName];
            } else {
                return $_SESSION['error'] = "Failed to upload photo.";
            }
        } else {
            return ['path' => null];
        }
    }
}
