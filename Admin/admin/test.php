<?php
function getQuestionByType($questionType, $cate)
{
  include '../db_config/connection.php';
  $listQuestion = array();
  $sql = "SELECT * FROM question WHERE type = '".$questionType."' AND cate_id= ".$cate."";
  $result = mysqli_query($conn, $sql);
  while ($row=mysqli_fetch_array($result))
  {
    array_push($listQuestion, $row['ques_id']);
  }
  return $listQuestion;
}
function randomQuestion($numberOfQuestion)
{
  $list0 = getQuestionByType("Single Choice",1);
  $list1 = getQuestionByType("Multiple Choices",1);
  $list2 = getQuestionByType("True / False",1);
  $List_rand = array();
  $count = 0;
  while ($count < $numberOfQuestion)
  {
    $tmp0 = $list0[array_rand($list0)];
    $tmp1 = $list1[array_rand($list1)];
    $tmp2 = $list2[array_rand($list2)];
    if (!in_array($tmp2, $List_rand))
    {
      array_push($List_rand, $tmp2);
      $count ++;
    }
    elseif (!in_array($tmp1, $List_rand))
    {
      array_push($List_rand, $tmp1);
      $count ++;
    }
    elseif (!in_array($tmp0, $List_rand))
    {
      array_push($List_rand, $tmp0);
      $count ++;
    }
  }
  return $List_rand;
}

$count = 1;
$lr = randomQuestion(30);
for ($a = 0; $a < 30; $a++)
{
  include('../db_config/connection.php');
  $sql = mysqli_query($conn, "INSERT INTO ques_exam(exam_id, ques_id) VALUES('M0','$lr[$a]')");
  if ($sql !== TRUE) {
    echo "--".$count.". ".$lr[$a]."<br>";
  }
  $count++;
}
if ($sql === TRUE) {
  echo "Success";
}
else{
  echo "False";
}
?>
