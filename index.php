<?php include 'includes/header.php'; ?>
    <main>
        <h2>Feedback</h2>
        <p>Leave feedback for Bluebell University's Online Learning Setup</p>
        <form action ="" method="POST">
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="feedback">Feedback: </label>
            <textarea id="feedback" name="feedback" placeholder="Enter your feedback" required></textarea>
            <input type="submit" value="Send" name="send-submit">
        </form>
    </main>
<?php
include 'includes/footer.php'; ?>