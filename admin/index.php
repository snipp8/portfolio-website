<?php
include '../includes/admin-header.php';

// Fetch quick stats
$stmtMessages = $pdo->query("SELECT COUNT(*) FROM messages");
$messageCount = $stmtMessages->fetchColumn();

$stmtProjects = $pdo->query("SELECT COUNT(*) FROM projects");
$projectCount = $stmtProjects->fetchColumn();
?>

<div class="container-fluid py-4">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-primary text-white h-100">
                <div class="card-body py-5 text-center">
                    <h2 class="display-4"><?= htmlspecialchars($messageCount) ?></h2>
                    <h4>Total Messages</h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="messages.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-success text-white h-100">
                <div class="card-body py-5 text-center">
                    <h2 class="display-4"><?= htmlspecialchars($projectCount) ?></h2>
                    <h4>Total Projects</h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="projects.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
