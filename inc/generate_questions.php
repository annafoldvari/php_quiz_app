<?php



$questions = [];

$number_of_questions = 10;

//Generating the required number of questions and answers;

for($i = 0; $i < $number_of_questions; $i++) {
  $inner_array = [];
  $inner_array['leftAdder'] = rand(1,100);
  $inner_array['rightAdder'] = rand(1,100);
  $inner_array['correctAnswer'] = $inner_array['leftAdder'] + $inner_array['rightAdder'];
  do {
  $inner_array['firstIncorrectAnswer'] = $inner_array['correctAnswer'] + rand(-10,10);
  } while ($inner_array['firstIncorrectAnswer'] == $inner_array['correctAnswer']);
  do {
    $inner_array['secondIncorrectAnswer'] = $inner_array['correctAnswer'] + rand(-10,10);;
  } while ($inner_array['firstIncorrectAnswer'] == $inner_array['secondIncorrectAnswer'] OR $inner_array['secondIncorrectAnswer'] == $inner_array['correctAnswe']);
  $questions[] = $inner_array;
}

