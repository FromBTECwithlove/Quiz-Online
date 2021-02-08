<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    body {
        margin: 0;
    }

    .header {
        width: 100%;
        height: 60px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);

    }
    .header-content{
        display: flex;
        justify-content: space-between;
        height: 60px;
    }
    .user-account {
        display: flex;
        align-items: center;
    }

    .user-account-img img {
        height: 40px;
        margin-right: 5px;
    }

    .exam-title{
        display: flex;
        align-items: center;
        font-size:20px;
        font-weight: 600;
    }
    .time {
        width: 200px;
        /* height: 60px; */
        /* height: 130px; */
        /* text-align: center; */
        display: flex;
        justify-content: space-around;
        font-weight: 600;
        font-size: 20px;
        align-items: center;
    }

    /* .tn {
        font-size: 30px;
        } */

        .exam-container {
            display: flex;
            box-sizing: border-box;
            height: 600px;
            padding: 20px 20px;
        }

        .ques-container {
            display: flex;
            flex-direction: column;
            flex: 9;
            font-size: 16px;
            border-radius: 8px;
            padding: 30px;
            /* box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); */
            margin: 0px 15px;
            position: relative;
            justify-content: space-between;
        }

        .ques_content {
            font-weight: 700;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        .question{
            font-weight: 400;
            font-size:16px;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .ques {
            margin-bottom: 30px;
        }

        .info {
            display: flex;
            /* background-color: aqua; */
            flex: 4;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            width: 100%;
            flex-direction: column;
            justify-content: space-between;
        }

        .student-info {
            margin-top: 10px;
            height: 130px;
            text-align: center;
        }

        .questioncheck {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .ques_number {
            display: block;
            height: 40px;
            width: 40px;
            border: 1px solid #ccc;
            margin: 5px 5px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
        }

        .ques_number:hover {
            background-color: #ccc !important;
            cursor: pointer;
        }

        .finish {
            display: flex;
            justify-content: center;
        }

        .btn-finish {
            margin-top: 10px;
            height: 40px;
            text-align: center;
            /* border: 1px solid #000; */
            width: 90px;
            line-height: 40px;
            border-radius: 4px;
            background-color: #0090B3;
            color: #fff;
            font-weight: 600;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            opacity: 0.9;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin: 35px;
        }

        .btn-finish:hover {
            opacity: 1;
        }

        .btn-finish:active {
            opacity: 0.9;
        }

        #btn-next-previous {
            display: flex;
            /* flex-direction: row-reverse; */
            margin-bottom: 50px;
        }

        .btn-next {
            display: block;
            background-color: #0090B3;
            color: #fff;    
            height: 45px;
            font-size: 18px;
            width: 120px;
            font-weight: 600;
            line-height: 45px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            opacity: 0.8;
            margin-right: 30px;
            position: absolute;
            left: 160px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .btn-next:hover {
            opacity: 1;
            cursor: pointer;
        }

        .btn-next:active {
            opacity: 0.6;
            cursor: pointer;
        }

        .btn-previous {
            display: block;
            background-color: #fff;
            color: #0090B3;
            height: 45px;
            font-size: 18px;
            width: 120px;
            font-weight: 600;
            line-height: 45px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            opacity: 0.8;
            position: absolute;
            left: 20px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .btn-previous:hover {
            opacity: 1;
            cursor: pointer;
        }

        .btn-previous:active {
            opacity: 0.6;
            cursor: pointer;
        }

        .ques input:checked~.ques_number {
            background-color: #0090B3;
        }

        .revise-check {
            display: block;
            /* background-color: #ccc; */
            color: #0090B3;
            height: 45px;
            font-size: 18px;
            width: 150px;
            font-weight: 600;
            line-height: 45px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            opacity: 0.8;
            position: absolute;
            margin-right: 30px;
            right: 10px;
            bottom: 35px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .revise-check:hover {
            opacity: 1;

        }

        .revise-check:active {
            opacity: 0.8;
        }
    </style>
    <?php
    include_once 'dbconfig.php'; ?>
    <body oncontextmenu="return false">
        <?php include('header.php'); ?>
        <div class="exam-container container">
            <div class="ques-container">
                <?php
                if (isset($_POST['submit'])) {
                    $ex_code = $_POST['code'];
                    $sql = mysqli_query($conn, "SELECT `question`.*, `exam`.`exam_id`, `exam`.`title`, `exam`.`create_date`, `exam`.`date_time`, `exam`.`duration`, `exam`.`faculty_id`, `ques_exam`.* FROM `ques_exam`
                        INNER JOIN `question` ON `question`.`ques_id` = `ques_exam`.`ques_id`
                        INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
                        WHERE `ques_exam`.`exam_id`='$ex_code'");
                    while ($row = mysqli_fetch_array($sql)) {
                        if($row['type']=="Single Choice")
                            {?>
                                <div class="hidden-question">
                                    <div class="ques_content">
                                        <span>Question <?php echo $row['id']; ?>:</span>
                                        <p><?php echo $row['content'] ?></p>
                                    </div>
                                    <div class="answer">
                                        <div class="ques">
                                            <input type="radio" name="answer <?php echo $row['id']; ?>" value="A">
                                            A. <?php echo $row['a_ans']; ?>
                                        </div>
                                        <div class="ques">
                                            <input type="radio" name="answer <?php echo $row['id']; ?>" value="B">
                                            B. <?php echo $row['b_ans']; ?>
                                        </div>
                                        <div class="ques">
                                            <input type="radio" name="answer <?php echo $row['id']; ?>" value="C">
                                            C. <?php echo $row['c_ans']; ?>
                                        </div>
                                        <div class="ques">
                                            <input type="radio" name="answer <?php echo $row['id']; ?>" value="D">
                                            D. <?php echo $row['d_ans']; ?>
                                        </div>
                                        <div class="revise-check">
                                            Note
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            if($row['type']=="Multiple Choices")
                                {?>
                                    <div class="hidden-question">
                                        <div class="ques_content">
                                            <span>Question <?php echo $row['id']; ?>:</span>
                                            <p><?php echo $row['content'] ?></p>
                                        </div>
                                        <div class="answer">
                                            <div class="ques ques1">
                                                <input type="checkbox" name="answer <?php echo $row['id']; ?>" value="A">
                                                A. <?php echo $row['a_ans']; ?>
                                            </div>
                                            <div class="ques ques2">
                                                <input type="checkbox" name="answer <?php echo $row['id']; ?>" value="B">
                                                B. <?php echo $row['b_ans']; ?>
                                            </div>
                                            <div class="ques ques3">
                                                <input type="checkbox" name="answer <?php echo $row['id']; ?>" value="C">
                                                C. <?php echo $row['c_ans']; ?>
                                            </div>
                                            <div class="ques ques4">
                                                <input type="checkbox" name="answer <?php echo $row['id']; ?>" value="D">
                                                D. <?php echo $row['d_ans']; ?>
                                            </div>
                                            <div class="revise-check">
                                                Note
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if($row['type']=="True / False")
                                    {?>
                                        <div class="hidden-question">
                                            <div class="ques_content">
                                                <span>Question <?php echo $row['id']; ?>:</span>
                                                <p><?php echo $row['content'] ?></p>
                                            </div>
                                            <div class="answer">
                                                <div class="ques">
                                                    <input type="radio" name="answer <?php echo $row['id']; ?>" value="A">
                                                    A. <?php echo $row['a_ans']; ?>
                                                </div>
                                                <div class="ques">
                                                    <input type="radio" name="answer <?php echo $row['id']; ?>" value="B">
                                                    B. <?php echo $row['b_ans']; ?>
                                                </div>
                                                <div class="revise-check">
                                                    Note
                                                </div>
                                            </div>
                                        </div>
                                    <?php } }
                                }?>
                                <div id="btn-next-previous">
                                    <div class="btn-next" onclick="showNext()">
                                        Next
                                    </div>
                                    <div class="btn-previous" onclick="showPrev()">
                                        Previous
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <div>
                                    <div class="student-info">
                                        ********************
                                    </div>
                                    <div class="questioncheck">
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $ex_code = $_POST['code'];
                                            $sql = mysqli_query($conn,"SELECT * FROM `ques_exam` WHERE `exam_id` = '$ex_code'");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo " <div class='ques_number'>";
                                                echo $row['id']."</div>";
                                            } }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="finish">
                                        <div class="btn-finish">
                                            SUBMIT
                                            <form action="" id="form" method="POST" accept-charset="utf-8">
                                                <input class="total-mark" type="text" name="mark" value="" placeholder="">
                                                <input type="submit" name="sb_mark" value="Submit">
                                            </form>
                                            <?php
                                            if (isset($_POST['sb_mark'])) {
                                                $mark = $_POST['mark'];
                                                $sql = mysqli_query($conn, "UPDATE `student_exam` SET `mark`='$mark' WHERE `student_id` ='180000'");
                                                if ($sql===true) {
                                                    
                                                }
                                                else
                                                {
                                                   echo "<script>alert('Fail');</script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            base64_encode(include('answer.php'));
                            ?>
                        </body>
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                        crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                        crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                        crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                        crossorigin="anonymous"></script>

                        <script src="../Js/exam.js" type="text/javascript"></script>


                        <script type="text/javascript">
                            $(document).ready(function($){
                                $(document).keydown(function(event) {
                                    var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();

                                    if (event.ctrlKey && (pressedKey == "c" || pressedKey == "u")) {
                                        alert('Sorry, This Functionality Has Been Disabled!');

                                        return false;
                                    }
                                });
                            });
                            document.onkeypress = function (event) {
                                event = (event || window.event);
                                if (event.keyCode == 123) {
                                    return false;
                                }
                            }
                            document.onmousedown = function (event) {
                                event = (event || window.event);
                                if (event.keyCode == 123) {
                                    return false;
                                }
                            }
                            document.onkeydown = function (event) {
                                event = (event || window.event);
                                if (event.keyCode == 123) {
                                    return false;
                                }
                            }
                        </script>
                        </html>