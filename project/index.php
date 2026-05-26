<?php
$pageTitle = "Projects — Syahin Bahar";
$basePath = "../";
$activePage = 'projects';
require_once '../config/database.php';

// Fetch visible projects, ordered by display_order
try {
    $stmt = $pdo->query("SELECT * FROM projects WHERE is_visible = 1 ORDER BY display_order ASC, id DESC");
    $projects = $stmt->fetchAll();
} catch (PDOException $e) {
    $projects = [];
}

include '../includes/header.php';
?>

    <main>
        <div class="page-section">
            <h1>Projects</h1>
            
            <?php if (empty($projects)): ?>
                <p>Coming soon — stay tuned for my latest works!</p>
            <?php else: ?>
                <div class="row g-4 mt-2">
                    <?php foreach ($projects as $project): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm">
                                <?php if (!empty($project['image_url'])): ?>
                                    <img src="<?php echo htmlspecialchars($project['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($project['title']); ?>" style="height: 200px; object-fit: cover;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h5>
                                    <p class="card-text text-muted"><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                                </div>
                                <?php if (!empty($project['project_url'])): ?>
                                    <div class="card-footer bg-white border-top-0 pb-3">
                                        <a href="<?php echo htmlspecialchars($project['project_url']); ?>" class="btn btn-outline-accent btn-sm" target="_blank" rel="noopener noreferrer">View Project</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php include '../includes/footer.php'; ?>
