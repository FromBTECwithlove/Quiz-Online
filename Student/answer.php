<?php
$sql = mysqli_query($conn, "SELECT `question`.*, `exam`.`exam_id`, `exam`.`title`, `exam`.`create_date`, `exam`.`date_time`, `exam`.`duration`, `exam`.`faculty_id`, `ques_exam`.* FROM `ques_exam`
    INNER JOIN `question` ON `question`.`ques_id` = `ques_exam`.`ques_id`
    INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
    WHERE `ques_exam`.`exam_id`='M01'");
    while ($row = mysqli_fetch_array($sql)) {?>
        <div class="ques-ans-content" style="display:none">
            <div class="ques-id"><?php echo $row['id']; ?></div>
            <div class="ques-ans"><?php echo $row['correct_ans']; ?></div>
            <div class="ques-mark"><?php echo $row['mark']; ?></div>
            <div class="ques-type"><?php echo $row['type']; ?></div>

        </div>
        <?php }?>