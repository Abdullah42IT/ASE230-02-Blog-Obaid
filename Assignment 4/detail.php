<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Post Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <?php
    // Read blog posts from JSON
    $json = file_get_contents('posts.json');
    $blog_posts = json_decode($json, true)['posts'];

    // Get post_id from URL
    $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

    // Find the post by ID
    $post = null;
    foreach ($blog_posts as $p) {
        if ($p['id'] == $post_id) {
            $post = $p;
            break;
        }
    }

    // Function to ensure CSV headers exist
    function ensure_csv_headers($filename) {
        if (!file_exists($filename)) {
            // Create the file and add headers if it doesn't exist
            $file = fopen($filename, 'w');
            fputcsv($file, ['post_id', 'visit_count']);
            fclose($file);
        }
    }

    // Function to update visitor count in CSV
    function update_visitor_count($post_id) {
        $filename = 'visitors.csv';
        ensure_csv_headers($filename); // Ensure headers exist

        $data = [];
        $found = false;

        // Read the current CSV data
        if (($file = fopen($filename, 'r')) !== false) {
            // Skip the header row
            $headers = fgetcsv($file);

            while (($row = fgetcsv($file)) !== false) {
                if ($row[0] == $post_id) {
                    // Increment the visit count
                    $row[1] = $row[1] + 1;
                    $found = true;
                }
                $data[] = $row;
            }
            fclose($file);
        }

        // If no matching post_id is found, add a new row
        if (!$found) {
            $data[] = [$post_id, 1]; // Set initial count to 1 if it doesn't exist
        }

        // Write the updated data back to the CSV, including the headers
        $file = fopen($filename, 'w');
        fputcsv($file, ['post_id', 'visit_count']); // Write the headers again
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }

    // Function to get the visitor count
    function get_visitor_count($post_id) {
        $file = fopen('visitors.csv', 'r');
        // Skip the header row
        fgetcsv($file);
        while (($row = fgetcsv($file)) !== false) {
            if ($row[0] == $post_id) {
                fclose($file);
                return $row[1];
            }
        }
        fclose($file);
        return 0;
    }

    // Update visitor count if post exists
    if ($post) {
        update_visitor_count($post_id);
        $visitor_count = get_visitor_count($post_id);
    }
    ?>

    <?php if ($post): ?>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title"><?= $post['title'] ?></h1>
                <p class="card-text"><?= $post['content'] ?></p>
                <p class="card-text"><small class="text-muted">By <?= $post['author'] ?> on <?= $post['date'] ?></small></p>
                <p class="card-text"><small class="text-muted">Visitor Count: <?= $visitor_count ?></small></p>
            </div>
        </div>
    <?php else: ?>
        <p class="text-danger">Blog post not found.</p>
    <?php endif; ?>

</body>
</html>
