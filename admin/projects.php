<?php
include '../includes/admin-header.php';

$stmt = $pdo->query("SELECT * FROM projects ORDER BY display_order ASC, created_at DESC");
$projects = $stmt->fetchAll();
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Projects</h1>
        <a href="project-form.php" class="btn btn-primary">New Project</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Visible</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?= htmlspecialchars($project['id']) ?></td>
                                <td>
                                    <?php if ($project['image_url']): ?>
                                        <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="Project Image" style="height: 50px; object-fit: cover;">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($project['title']) ?></td>
                                <td><?= htmlspecialchars($project['display_order']) ?></td>
                                <td>
                                    <?php if ($project['is_visible']): ?>
                                        <span class="badge bg-success">Yes</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">No</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="project-form.php?id=<?= $project['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="project-delete.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                        <input type="hidden" name="id" value="<?= $project['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($projects)): ?>
                            <tr>
                                <td colspan="6" class="text-center">No projects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
