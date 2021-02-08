<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header {
        width: 100%;
        height: 155px;
        /* background-color: brown; */
    }

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
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        margin: 0px 15px;
        position: relative;
        justify-content: space-between;
    }

    .ques_content {
        font-weight: 600;
        font-size: 18px;
    }

    .ques {
        margin-top: 15px;
    }

    .info {
        display: flex;
        /* background-color: aqua; */
        flex: 4;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        width: 100%;
        flex-direction: column;
        justify-content:space-between;
    }

    .time {
        height: 130px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-weight: 600;
        font-size: 20px;
    }

    .tn {
        font-size: 40px;
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
        border-radius:50%;
    }

    .ques_number:hover {
        background-color: #ccc !important;
        cursor: pointer;
    }
    .ques_number.active {
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
        background-color: #5CB85C;
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
        flex-direction: row-reverse;
        margin-bottom: 50px;
    }

    .btn-next {
        display: block;
        background-color: #ccc;
        height: 45px;
        font-size: 18px;
        width: 90px;
        font-weight: 600;
        line-height: 45px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        opacity: 0.8;
        margin-right: 30px;
        position: absolute;
        right: 115px;
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
        background-color: #ccc;
        height: 45px;
        font-size: 18px;
        width: 90px;
        font-weight: 600;
        line-height: 45px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        opacity: 0.8;
        position: absolute;
        right: 240px;
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
        background-color: green;
    }

    .revise-check {
        display: block;
        background-color: #ccc;
        height: 45px;
        font-size: 18px;
        width: 90px;
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
        opacity: 0.6;
    }
</style>
<?php
include_once 'dbconfig.php'; ?>
<script type="text/javascript">
// function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

// $(document).ready(function(){
//      $(document).on("keydown", disableF5);
// });
</script>
<script>
// Warning before leaving the page (back button, or outgoinglink)
window.onbeforeunlo
+ad = function() {
 return "Do you really want to leave our brilliant application?";
   //if we return nothing here (just calling return;) then there will be no pop-up question at all
   //return;
};
</script>
<body>
    <header>

    </header>
    <div class="exam-container">
        <div class="ques-container">
            <?php
            $sql = mysqli_query($conn, "SELECT `question`.*, `exam`.`exam_id`, `exam`.`title`, `exam`.`create_date`, `exam`.`date_time`, `exam`.`duration`, `exam`.`faculty_id`, `ques_exam`.* FROM `ques_exam`
                INNER JOIN `question` ON `question`.`ques_id` = `ques_exam`.`ques_id`
                INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
                WHERE `ques_exam`.`exam_id`='M01'");
            while ($row = mysqli_fetch_array($sql)) {
               // echo $row['type'];
                if($row['type']=="Single Choice")
                    {?>
                        <div class="hidden-question">
                            <div class="ques_content">
                                <span>Question <?php echo $row['id']; ?>:</span>
                                <p><?php echo $row['content'] ?></p>
                            </div>
                            <div class="answer">
                                <div class="ques">
                                    <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
                                    A. <?php echo $row['a_ans']; ?>
                                </div>
                                <div class="ques">
                                    <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
                                    B. <?php echo $row['b_ans']; ?>
                                </div>
                                <div class="ques">
                                    <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
                                    C. <?php echo $row['c_ans']; ?>
                                </div>
                                <div class="ques">
                                    <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
   11                                  D. <?php echo $row['d_ans']; ?>
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
                                    <div class="ques">
                                        <input type="checkbox" value="<?php echo $row['correct_ans']?>">
                                        A. <?php echo $row['a_ans']; ?>
                                    </div>
                                    <div class="ques">
                                        <input type="checkbox" value="<?php echo $row['correct_ans']?>">
                                        B. <?php echo $row['b_ans']; ?>
                                    </div>
                                    <div class="ques">
                                        <input type="checkbox" value="<?php echo $row['correct_ans']?>">
                                        C. <?php echo $row['c_ans']; ?>
                                    </div>
                                    <div class="ques">
                                        <input type="checkbox" value="<?php echo $row['correct_ans']?>">
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
                                            <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
                                            A. <?php echo $row['a_ans']; ?>
                                        </div>
                                        <div class="ques">
                                            <input type="radio" name="answer" value="<?php echo $row['correct_ans']?>">
                                            B. <?php echo $row['b_ans']; ?>
                                        </div>
                                        <div class="revise-check">
                                            Note
                                        </div>
                                    </div>
                                </div>
                            <?php }
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
                            <div class="time">
                                <div>Thời gian còn lại</div>
                                <div class="tn" id="time-countdown">00:03:00</div>
                            </div>
                            <div class="student-info">
                                <span>Đề thi trắc nghiệm</span>
                                Số câu
                                <br>
                                thời gian <br>
                                họ tên <br>
                                giới tính
                            </div>

                            <div class="questioncheck">
                                <?php
                                $sql = mysqli_query($conn,"SELECT * FROM ques_exam WHERE exam_id='M01'");
                                while ($row = mysqli_fetch_array($sql)) {
                                    echo " <div class='ques_number'>";
                                    echo $row['id']."</div>";
                                }?>
                            </div>

                        </div>
                        <div class="finish">
                            <div class="btn-finish">
                                SUBMIT
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>

            <script>
                for (var i = 0; i <= ($(".hidden-question").length - 1); i++) {
                    $(".ques_number").eq(i).attr('id', 'id' + i);
                }
                for (var i = 0; i <= ($(".hidden-question").length - 1); i++) {
                    $(".hidden-question").eq(i).attr('id', 'ansid' + i);
                }
                for (var i = 0; i <= ($(".hidden-question").length - 1); i++) {
                    $(".answer").eq(i).attr('id', 'answer-' + i);
                }
                var visibleDiv = 0;
                function showDiv() {
                    $(".hidden-question").hide();
                    $(".hidden-question:eq(" + visibleDiv + ")").show();
                    if (visibleDiv == $(".hidden-question").length - 1) {
                        $(".btn-next").hide();
                    } else {
                        $(".btn-next").show();
                    }
                    if (visibleDiv == 0) {
                        $(".btn-previous").hide();
                    } else {
                        $(".btn-previous").show();
                    }
                }
                showDiv()

                function showNext() {
                    if (visibleDiv == $(".hidden-question").length - 1) {
                        visibleDiv == 0;
                    }
                    else {
                        visibleDiv++;
                    }
                    showDiv();


                }
                function showPrev() {
                    if (visibleDiv == 0) {
                        visibleDiv = $(".hidden-question").length - 1
                    }
                    else {
                        visibleDiv--;
                    }
                    showDiv();
                }

                $(".ques_number").click(function () {
                    visibleDiv = this.id.substring(2)
                    showDiv()

        // $(".ques_number").css("background-color","#fff");
        // $(this).css("background-color", "#ccc");
        
    })

                $(".ques input").click(function test() {
                    var a = this.closest("div.hidden-question").id;
                    console.log(a)
                    var ques_num_id = $("#" + (a.substring(3)))
                    if ($("#" + a + " .ques input").is(":checked")) {
                        ques_num_id.css("background-color", "green");
            // console.log(a.substring(3))
        }
        else {
            ques_num_id.css("background-color", "white");
        }
    });

    //bookmark to check
    $(".revise-check").click(function () {
        var a = this.closest("div.hidden-question").id;
        var b = this.closest("div.answer").id;
        var ques_num_id = $("#" + (a.substring(3)));
        if ((ques_num_id.attr('data-click-state') == 1) && ($("#" + b + " .ques input").is(":checked"))) {
            ques_num_id.attr('data-click-state', 0);
            ques_num_id.css('background-color', 'green');
            $("#" + b + " .ques input").bind("click", function () {
                if ($("#" + b + " .ques input").is(":checked")) {
                    ques_num_id.css("background-color", "green");
                }
                else {
                    ques_num_id.css("background-color", "white");
                }
            });
        }
        else if ((ques_num_id.attr('data-click-state') == 1) && ($("#" + b + " .ques input").not(":checked"))) {
            ques_num_id.attr('data-click-state', 2)
            ques_num_id.css('background-color', 'white')

            $("#" + b + " .ques input").bind("click", function () {
                if ($("#" + b + " .ques input").is(":checked")) {
                    ques_num_id.css("background-color", "green");
                }
                else {
                    ques_num_id.css("background-color", "white");
                }
            });
        } else {
            ques_num_id.attr('data-click-state', 1)
            ques_num_id.css('background-color', 'orange')
            $("#" + b + " .ques input").unbind("click");
            console.log("#" + (a.substring(3)) + ":hover")
        }
    })

    //time countdown and substring duration of database
    $(document).ready(function () {
        var time = $(".tn").text();
        $(".tn").html(time.substring(3))
        var time_up;
        var timer2 = time.substring(3);
        var interval = setInterval(function () {


            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.tn').html(minutes + ':' + seconds);
            if (minutes < 0) clearInterval(interval);
            //check if both minutes and seconds are 0
            if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
            timer2 = minutes + ':' + seconds;
            if (minutes == 0 && seconds == 0) {
                $(".tn").html("Times up!")
                // window.location = ('https://www.google.com.vn/');
            }
        }, 1000);
    });


</script>

</html>