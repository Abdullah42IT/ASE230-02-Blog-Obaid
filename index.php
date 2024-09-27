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
    // Blog posts array
    $blog_posts = [
        1 => [
            'title' => 'The Future of Web Development',
            'content' => 'Web development is evolving rapidly due to the introduction of modern technologies.
            With the rise of AI, machine learning, and no-code development platforms, the landscape is expected to become even more dynamic.
            In the future, developers will likely need to adapt to new frameworks and tools that are increasingly driven by automation and cloud-based solutions.
            Web3 technologies and decentralized applications (dApps) are also likely to play a major role in shaping the future of the web.',
            'author' => 'Obaid Alnaqbi',
            'date' => '2024-09-15'
        ],
        2 => [
            'title' => 'Understanding PHP Arrays',
            'content' => 'PHP arrays are one of the most versatile and powerful data structures in the language.
            They allow developers to store multiple values in a single variable, and they can be indexed or associative.
            In this post, we dive into the mechanics of PHP arrays, exploring how they work under the hood and how you can use them efficiently.
            Understanding multidimensional arrays, array manipulation functions, and best practices is key to writing optimized code in PHP.',
            'author' => 'Obaid Alnaqbi',
            'date' => '2024-09-16'
        ],
        3 => [
            'title' => 'Mastering Bootstrap for Responsive Design',
            'content' => 'Bootstrap is a popular front-end framework that simplifies the process of designing responsive web applications.
            This blog post will take you through the key concepts of using Bootstrap to create mobile-first, responsive layouts.
            We cover how the grid system works, customizing breakpoints, and making the most out of Bootstrap\'s utilities.
            By the end of this post, you will be equipped with the skills to create visually appealing and functional websites that adapt seamlessly to any device.',
            'author' => 'Obaid Alnaqbi',
            'date' => '2024-09-17'
        ]
    ];
    ?>

    <div class="list-group">
        <?php foreach ($blog_posts as $id => $post): ?>
            <a href="detail.php?post_id=<?= $id ?>" class="list-group-item list-group-item-action">
                <?= $post['title'] ?>
            </a>
        <?php endforeach; ?>
    </div>

</body>
</html>
