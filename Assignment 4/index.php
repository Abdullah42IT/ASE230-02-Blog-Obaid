<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            padding-top: 50px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #0056b3;
        }
        .list-group-item {
            border-radius: 0;
            margin-bottom: 10px;
            background-color: #ffffff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .list-group-item:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .list-group-item.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Obaid Alnaqbi's Blog</h1>
    </div>

    <div class="container mt-4">
        <?php
        // Read blog posts from JSON file
        $json = file_get_contents('posts.json');
        $blog_posts = json_decode($json, true)['posts'];
        ?>

        <div class="list-group">
            <?php foreach ($blog_posts as $post): ?>
                <a href="detail.php?post_id=<?= $post['id'] ?>" class="list-group-item list-group-item-action">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 Obaid Alnaqbi's Blog
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
