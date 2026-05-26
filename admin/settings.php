<?php
include '../includes/admin-header.php';
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Settings</h1>
    </div>

    <?php if (isset($_GET['resume_uploaded'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Resume uploaded successfully! The public link is now serving the new file.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
                if ($_GET['error'] == 'invalid_file') echo "Invalid file type. Please upload a PDF.";
                elseif ($_GET['error'] == 'upload_failed') echo "Failed to move the uploaded file. Check permissions.";
                elseif ($_GET['error'] == 'no_file') echo "No file was uploaded.";
                else echo "An unknown error occurred.";
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Update Resume</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Upload a new PDF to replace your current resume. The public link on the homepage will automatically serve this new file.</p>
                    
                    <form action="resume-upload.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="resume_file" class="form-label">Select PDF Document</label>
                            <input class="form-control" type="file" id="resume_file" name="resume_file" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Resume</button>
                    </form>
                    
                    <div class="mt-4">
                        <h6>Current Resume:</h6>
                        <?php if (file_exists('../assets/docs/resume.pdf')): ?>
                            <a href="../assets/docs/resume.pdf" target="_blank" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-file-earmark-pdf"></i> View Current Resume
                            </a>
                            <p class="text-muted small mt-1">Last updated: <?= date("F d Y H:i:s.", filemtime('../assets/docs/resume.pdf')) ?></p>
                        <?php else: ?>
                            <span class="text-danger">No resume file found.</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
