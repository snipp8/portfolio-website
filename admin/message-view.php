<?php
include '../includes/admin-header.php';

if (!isset($_GET['id'])) {
    header("Location: messages.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM messages WHERE id = ?");
$stmt->execute([$id]);
$message = $stmt->fetch();

if (!$message) {
    echo "<div class='container-fluid py-4'><h3>Message not found.</h3></div>";
    include '../includes/admin-footer.php';
    exit;
}

// Mark as read
if (!$message['is_read']) {
    $updateStmt = $pdo->prepare("UPDATE messages SET is_read = 1 WHERE id = ?");
    $updateStmt->execute([$id]);
}
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>View Message</h1>
        <a href="messages.php" class="btn btn-secondary">Back to Messages</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">From: <?= htmlspecialchars($message['name']) ?> (<?= htmlspecialchars($message['email']) ?>)</h5>
            <h6 class="card-subtitle mb-2 text-muted">Received: <?= htmlspecialchars($message['created_at']) ?></h6>
            <hr>
            <p class="card-text" style="white-space: pre-wrap;"><?= htmlspecialchars($message['message']) ?></p>
        </div>
        <div class="card-footer">
            <form action="message-delete.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                <input type="hidden" name="id" value="<?= $message['id'] ?>">
                <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
