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
