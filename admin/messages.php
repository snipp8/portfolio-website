<?php
include '../includes/admin-header.php';

$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();
?>

<div class="container-fluid py-4">
    <h1 class="mb-4">Messages</h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $msg): ?>
                            <tr>
                                <td><?= htmlspecialchars($msg['id']) ?></td>
                                <td><?= htmlspecialchars($msg['name']) ?></td>
                                <td><?= htmlspecialchars($msg['email']) ?></td>
                                <td><?= htmlspecialchars($msg['created_at']) ?></td>
                                <td>
                                    <?php if ($msg['is_read']): ?>
                                        <span class="badge bg-secondary">Read</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Unread</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="message-view.php?id=<?= $msg['id'] ?>" class="btn btn-sm btn-info text-white">View</a>
                                    <form action="message-delete.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($messages)): ?>
                            <tr>
                                <td colspan="6" class="text-center">No messages found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
