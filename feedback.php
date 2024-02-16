<?php include 'includes/header.php'; ?>

<?php

$query = 'SELECT feedback, name FROM feedback_view'; // MySQL DDL Command
$dbconnection = new DBConnection(); // Instantiation of the class DBConnection
$connection = $dbconnection->getConnection(); // Method call to getConnection
$result = $connection->query($query); // Counterpart in Java is Statement
$feedbacks = $result->fetchAll(PDO::FETCH_ASSOC); // Counterpart in Java is ResultSet
?>
    <main>
        <h2>Feedback</h2>

        <?php if (empty($feedbacks)): ?>
            <p>There is no feedback</p>
        <?php endif ?>
        <?php foreach ($feedbacks as $entry): ?>
            <div class="feedback-cards">
                <div class="card">
                    <?php echo $entry['feedback'] ?>
                    <div class="feedback-name">
                        By <?php echo $entry['name'] ?>
                        on <?php echo date('F j, Y') ?>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </main>
<?php
    include 'includes/footer.php'; ?>