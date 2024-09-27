<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Blog Posts</h1>

    <?php
    // Read blog posts from JSON file
    $json = file_get_contents('posts.json');
    $blog_posts = json_decode($json, true)['posts'];
    ?>

    <div class="list-group">
        <?php foreach ($blog_posts as $post): ?>
            <a href="detail.php?post_id=<?= $post['id'] ?>" class="list-group-item list-group-item-action">
                <?= $post['title'] ?>
            </a>
        <?php endforeach; ?>
    </div>

</body>
</html>
