<div class="header">
    <div class="container header-content">
        <div class="user-account">
            <div class="user-account-img">
                <img src="https://logodix.com/logo/1070602.png" alt="">
            </div>
            <div class="user-account-name">
                <?php
                if (isset($_POST['submit'])) {
                    $student = $_POST['student'];
                    echo $student;
                }
                ?>
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $ex_code = $_POST['code'];
            $sql = mysqli_query($conn, "SELECT `question`.*, `exam`.`exam_id`, `exam`.`title`, `exam`.`create_date`, `exam`.`date_time`, `exam`.`duration`, `exam`.`faculty_id`, `ques_exam`.`id` FROM `ques_exam`
                INNER JOIN `question` ON `question`.`ques_id` = `ques_exam`.`ques_id`
                INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
                WHERE `ques_exam`.`exam_id`='$ex_code'");
            if ($row1 = mysqli_fetch_array($sql)) {
                ?>
                <div class="exam-title">
                    <?php echo $row1['title']; ?>
                </div>
                <div class="time">
                    <div>Time left:</div>
                    <div class="tn" id="time-countdown"><?php echo $row1['duration']; ?></div>
                </div>
            <?php } } ?>
        </div>

    </div>