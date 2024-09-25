<?php
$upload_dir = 'uploads/';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo-file'])) {
   
    $file = $_FILES['photo-file'];
    $caption = htmlspecialchars($_POST['photo-caption']);

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Error uploading file.');
    }

    $file_name = uniqid() . '-' . basename($file['name']);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        
        $gallery_data_file = 'gallery_data.json';
        $gallery_data = file_exists($gallery_data_file)
         ? json_decode(file_get_contents($gallery_data_file), true) : [];
        $gallery_data[] = [
            'file' => $file_name,
            'caption' => $caption
        ];
        file_put_contents($gallery_data_file, json_encode($gallery_data));
        echo 'Photo uploaded successfully!';
    } else {
        echo 'Failed to move uploaded file.';
    }
} else {
    echo 'No file uploaded.';
}
?>
