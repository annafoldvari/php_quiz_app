<?php 
  require('inc/quiz.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
          <?php if($show_score) {
            echo "<p>You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions . " correct!</p>";
            echo "<form action='index.php' method='post'><input type='submit' class='retake_button' name='retake' value='Take an other quiz' /></form>";
          } else {
          ?> 
            <p class="breadcrumbs">Question #<?= count($_SESSION['used_indexes']) ?> of #<?= $totalQuestions ?></p>
            <p class="quiz">What is <?= $question['leftAdder'] ?> + <?= $question['rightAdder'] ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?= $index ?>" />
                <input type="submit" class="btn" name="answer" value="<?= $answers[0] ?>" />
                <input type="submit" class="btn" name="answer" value="<?= $answers[1]?>" />
                <input type="submit" class="btn" name="answer" value="<?= $answers[2]?>" />
            </form>
          <?php
          }
          ?>  
        </div>
        <?php
          if($toast) {
            echo '<p>'.$toast.'</p>'; 
          }
        ?>
    </div>
</body>
</html>