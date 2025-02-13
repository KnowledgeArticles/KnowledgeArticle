<?php
include('db.php');

// Initialize variables
$associate_name = $article_title = $file_path = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $associate_name = $_POST['associate_name'];
    $article_title = $_POST['article_title'];

    // Handle file upload
    if (isset($_FILES['article_file']) && $_FILES['article_file']['error'] === 0) {
        $allowed_extensions = ['doc', 'docx'];
        $file_name = $_FILES['article_file']['name'];
        $file_tmp = $_FILES['article_file']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        
        // Check if the file type is allowed
        if (in_array(strtolower($file_ext), $allowed_extensions)) {
            $file_path = 'uploads/' . uniqid() . '.' . $file_ext;
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Insert form data into database
                $sql = "INSERT INTO articles (associate_name, article_title, file_path) 
                        VALUES ('$associate_name', '$article_title', '$file_path')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record saved successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "File upload failed!";
            }
        } else {
            echo "Invalid file type. Only DOC and DOCX files are allowed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Submission</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Article Submission Form</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="associate_name">Associate Name</label>
                <select class="form-control" id="associate_name" name="associate_name" required>
                    <option value="">Select Associate Name</option>
                    <option value="John Doe">John Doe</option>
                    <option value="Jane Smith">Jane Smith</option>
                    <option value="Emily Johnson">Emily Johnson</option>
                    <option value="Michael Brown">Michael Brown</option>
                </select>
            </div>

            <div class="form-group">
                <label for="article_title">Article Title</label>
                <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter article title" required>
            </div>

            <div class="form-group">
                <label for="article_file">Upload Article (DOC file)</label>
                <input type="file" class="form-control-file" id="article_file" name="article_file" accept=".doc,.docx" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
