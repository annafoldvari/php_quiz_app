<?php

  session_start();

  require('inc/generate_questions.php');

  $show_score = false;

  $totalQuestions = count($questions);

  $toast = '';

  //Generated questions store in a session variable so that it remains the same throught the quiz

  if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = $questions;
  }


  //Toast messages are set

  if ($_POST['answer']) {
    if ($_POST['answer'] == $_SESSION['questions'][$_POST['id']]['correctAnswer']) {
      $toast = "Well done! That's correct.";
      $_SESSION['totalCorrect']++;
    } else {
      $toast = "Bummer! That was incorrect.";
    }

  //More session variables are initialized. One for used indexes of the questions and one for total correct answers

    if (!isset($_SESSION['used_indexes'])) {
      $_SESSION['used_indexes'] = [];
      $_SESSION['totalCorrect'] = 0;
    }
    
  }

  if (count($_SESSION['used_indexes']) == $totalQuestions ) {
    $_SESSION["used_indexes"] = [];
    $show_score = true;
    unset($_SESSION['questions']);
  } else {
    $show_score = false; 
    if (count($_SESSION['used_indexes']) == 0 ) {
      $_SESSION["totalCorrect"] = 0;
      $toast = '';
    }
    do {
      $index = array_rand($_SESSION['questions']);
    } while ( in_array($index, $_SESSION["used_indexes"]));

    //Question that is displayed set

    $question = $_SESSION['questions'][$index];

    array_push($_SESSION['used_indexes'], $index);

    $answers = [];

    $answers[] = $question['correctAnswer'];
  
    $answers[] = $question['firstIncorrectAnswer'];
  
    $answers[] = $question['secondIncorrectAnswer'];

    shuffle($answers);
  }
 