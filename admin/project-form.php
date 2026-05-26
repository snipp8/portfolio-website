<?php
include '../includes/admin-header.php';

$project = [
    'id' => '',
    'title' => '',
    'description' => '',
    'image_url' => '',
    'project_url' => '',
    'display_order' => '0',
    'is_visible' => '1'
];

$isEdit = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $existingProject = $stmt->fetch();
    
    if ($existingProject) {
        $project = $existingProject;
        $isEdit = true;
    }
}
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= $isEdit ? 'Edit Project' : 'New Project' ?></h1>
        <a href="projects.php" class="btn btn-secondary">Back to Projects</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="project-save.php" method="POST" enctype="multipart/form-data">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($project['id']) ?>">
                    <input type="hidden" name="existing_image_url" value="<?= htmlspecialchars($project['image_url']) ?>">
                <?php endif; ?>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required><?= htmlspecialchars($project['description']) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image_file" class="form-label">Project Image Upload</label>
                    <?php if ($isEdit && !empty($project['image_url'])): ?>
                        <div class="mb-2">
                            <img src="../<?= htmlspecialchars($project['image_url']) ?>" alt="Current Image" style="max-height: 100px; display: block;">
                            <small class="text-muted">Current image. Uploading a new file will replace it.</small>
                        </div>
                    <?php endif; ?>
                    <input class="form-control" type="file" id="image_file" name="image_file" accept=".jpg,.jpeg,.png,.gif">
                    <small class="form-text text-muted">Leave empty to keep the current image (if editing).</small>
                </div>
                
                <div class="mb-3">
                    <label for="project_url" class="form-label">Project URL</label>
                    <input type="text" class="form-control" id="project_url" name="project_url" value="<?= htmlspecialchars($project['project_url']) ?>">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="display_order" class="form-label">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" value="<?= htmlspecialchars($project['display_order']) ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3 d-flex align-items-end">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" <?= $project['is_visible'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="is_visible">
                                Is Visible
                            </label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Save Project</button>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
