<?php
include __DIR__ . '/asset/style.php';
include __DIR__ . '/../includes/config.php';

// Fetch all categories
$catStmt = $conn->query("SELECT id, name FROM categories");
$categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);

// Selected category from dropdown (default = all)
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

if ($selectedCategory === 'all') {
    $stmt = $conn->query("
        SELECT q.heading, q.content, q.image_url, c.name as category 
        FROM quotes q 
        JOIN categories c ON q.category_id = c.id
    ");
} else {
    $stmt = $conn->prepare("
        SELECT q.heading, q.content, q.image_url, c.name as category 
        FROM quotes q 
        JOIN categories c ON q.category_id = c.id
        WHERE c.id = :cat_id
    ");
    $stmt->execute([':cat_id' => $selectedCategory]);
}
$quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <form method="GET" class="mb-3">
        <select name="category" class="form-select w-25 d-inline" onchange="this.form.submit()">
            <option value="all" <?php echo ($selectedCategory === 'all') ? 'selected' : ''; ?>>All Categories</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['id']; ?>" 
                    <?php echo ($selectedCategory == $cat['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($cat['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="container my-4">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <?php foreach ($quotes as $index => $q): ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $index; ?>"
                        class="<?php echo ($index === 0) ? 'active' : ''; ?>" aria-current="true"
                        aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>

            <div class="carousel-inner">
                <?php if (count($quotes) > 0): ?>
                    <?php foreach ($quotes as $index => $q): ?>
                        <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <img src="<?php echo htmlspecialchars($q['image_url']); ?>" class="d-block w-100" alt="quote image">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo htmlspecialchars($q['heading']); ?> (<?php echo htmlspecialchars($q['category']); ?>)</h5>
                                <p><?php echo htmlspecialchars($q['content']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center p-4">
                        <p>No quotes found for this category.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Controls -->
            <?php if (count($quotes) > 1): ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
