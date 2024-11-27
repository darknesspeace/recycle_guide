<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$questions = [
    "What is the main benefit of recycling?" => "Reduces waste",
    "Which of these materials can be recycled?" => "Plastic",
    "How much energy does recycling aluminum save?" => "95%"
];
$score = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($questions as $question => $answer) {
        if (isset($_POST[str_replace(' ', '_', $question)]) && $_POST[str_replace(' ', '_', $question)] == $answer) {
            $score++;
        }
    }
    echo "<h3>Your score: $score/3</h3>";
}
?>
<html>
<head>
    <title>Recycling Knowledge Test</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Recycling Knowledge Test</h2>
    <form method="POST" action="test.php">
        <?php foreach ($questions as $question => $answer) { ?>
            <p><?php echo $question; ?></p>
            <input type="radio" name="<?php echo str_replace(' ', '_', $question); ?>" value="Reduces waste"> Reduces waste<br>
            <input type="radio" name="<?php echo str_replace(' ', '_', $question); ?>" value="Increases waste"> Increases waste<br>
            <input type="radio" name="<?php echo str_replace(' ', '_', $question); ?>" value="Does nothing"> Does nothing<br>
        <?php } ?>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
