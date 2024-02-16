<?php include 'includes/header.php'; ?>
<?php

$name = $email = $feedback = ""; // Initialize variable to avoid undefined variable error
$nameErr = $emailErr = $feedbackErr = ""; // This is a short-hand way of declaring variables with the same initial value

if (isset($_POST['send-submit'])) { // isset is a function that checks if a variable is set and is not NULL
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        // Filter the retrieved input to remove any unwanted characters
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        // Filter the retrieved input to remove any unwanted characters
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    if (empty($_POST['feedback'])) {
        $feedbackErr = "Feedback is required";
    } else {
        // Filter the retrieved input to remove any unwanted characters
        $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING);
    }

    if (empty($nameErr) && empty($emailErr) && empty($feedbackErr))
    {
        $query = 'INSERT INTO feedback_responses (name, email, feedback) VALUES (:name, :email, :feedback)';
        $dbconnection = new DBConnection();
        $connection = $dbconnection->getConnection();
        $statement = $connection->prepare($query);
        $result = $statement->execute(['name' => $name, 'email' => $email, 'feedback' => $feedback]);
        /*
         * Alternative:
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':feedback', $feedback);
        $result = $stmt->execute();
         */
        if ($result) {
            header('Location: feedback.php');
        } else {
            echo "Failed to submit feedback";
        }
    }
}
?>
    <main>
        <h2>Feedback</h2>
        <p>Leave feedback for Bluebell University's Online Learning Setup</p>
            <form action ="" method="POST">
            <!-- We can also put the 'required' keyboard in input
             so that I do not need to put a nameErr, emailErr, and feedbackErr-->
            <label for="name">Name: </label>
            <!-- Name attribute is so important because it is used to retrieve the
            value of the input field-->
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <div class="invalid-input">
                <?php echo $nameErr; ?>
            </div>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <div class="invalid-input">
                <?php echo $emailErr; ?>
            </div>
            <label for="feedback">Feedback: </label>
            <textarea id="feedback" name="feedback" placeholder="Enter your feedback"></textarea>
            <div class="invalid-input">
                <?php echo $feedbackErr; ?>
            </div>
            <input type="submit" value="Send" name="send-submit">
        </form>
    </main>
<?php
include 'includes/footer.php'; ?>