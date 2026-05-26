<?php
$pageTitle = "Contact — Syahin Bahar";
$basePath = "../";
$activePage = 'contact';
include '../includes/header.php';
?>

    <main>
        <div class="page-section">
            <div class="row">
                <div class="details col-md-6">
                    <h1>Get in Touch</h1>
                    <p>Have a question or want to work together? Drop me a message and I'll get back to you as soon as I can.</p>
                </div>
                <div class="wrapper col-md-6">
                    <form class="contact-form" action="contactform.php" method="post">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="subject" placeholder="Subject" required>
                        <textarea name="message" placeholder="Message" required></textarea>
                        <button type="submit" name="send">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
                <a href="../admin/login.php" style="position: fixed; bottom: 0; left: 0; width: 50px; height: 50px; opacity: 0; cursor: default; z-index: 9999;" title="Admin Portal"></a>
    </main>

<?php include '../includes/footer.php'; ?>