<header>
    <form action="" method="POST" accept-charset="utf-8">
        <?php
        $username = $_REQUEST['username'];
        $query = mysqli_query($conn, "SELECT * FROM student WHERE student_email = '$username'");
        if ($std_row = mysqli_fetch_array($query)) {?>
            <div class="form-header" style="display: flex;">
                <div>
                    <span><b style="font-size: 25px">|</b>Student ID: </span>
                    <input hidden type="text" name="student_id" value="<?php echo $std_row['student_id']; ?>">
                    <span style="color: blue"><strong><?php echo $std_row['student_id']; ?></strong></span>
                </div>
                <div style="margin-left: 10px;">
                    <span><b style="font-size: 25px">|</b> Student Name: </span>
                    <input hidden type="text" name="student_name" value="<?php echo $std_row['student_name']; ?>">
                    <span style="color: blue"><strong><?php echo $std_row['student_name']; ?></strong></span>
                </div>
                <div style="margin-left: 10px;">
                    <span><b style="font-size: 25px">|</b> Exam Code: </span>
                    <input type="text" name="exam" value="" placeholder="Enter the code of exam here..." required>
                </div>
                <div style="margin-left: 10px;">
                    <span><b style="font-size: 25px">|</b></span>
                    <input type="submit" name="submit" value="Start">
                </div>
                <div>
                    <input type="text" name="id" value="1" hidden>
                </div>
            <?php } ?>
        </div>
    </form>
</header>