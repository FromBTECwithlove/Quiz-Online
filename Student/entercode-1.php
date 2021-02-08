<?php
include 'dbconfig.php';
?>
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

.body-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 16px;
    margin-bottom: 40px;
}

.body-content {
    max-width: 850px;
    margin-top: 80px;
}

.start-exam {
    display: flex;
    /* flex-direction: column; */
    justify-content: center;
    /* align-items: center; */
    margin-top: 50px;
}

.start-exam input {
    width: 200px;
    height: 48px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-right: 15px;
    padding: 0px 10px;
}

.start-exam input:focus {
    outline: 0px;
}

.btn-start {
    padding-bottom: 5px;
    height: 48px;
    width: 120px;
    font-size: 20px;
    font-weight: 600;
    color: #fff;
    background-color: #1DBFAF;
    border-radius: 4px;
    border: 0px;
}

.btn-start:hover {
    opacity: 0.8;
}

.btn-start:active {
    opacity: 1;
}

.btn-start:focus {
    outline: 0px;
}
</style>

<body>
    <div class="header">
        <div class="container header-content">
            <div class="user-account">
                <div class="user-account-img">
                    <img src="https://logodix.com/logo/1070602.png" alt="">
                </div>
                <div class="user-account-name">
                    <?php
                    $name = $_GET['username'];
                    $sql = mysqli_query($conn, "SELECT * FROM student WHERE student_email= '".$name."'");
                    if ($row = mysqli_fetch_array($sql)) {?>
                        <?php echo $row['student_name']; echo '<input hidden type="text" name="" value="'.$row['student_id'].'" placeholder="">';
                         ?>
                    </div>
                </div>
                <div class="exam-title">
                    ---
                </div>
                <div class="time">
                    ---
                </div>
            </div>
        </div>
        <div class="container body-wrapper">
            <div class="body-content">
                <div class="start-time">
                    <div>
                        Caution:
                    </div>
                    <div>
                        - The website will turn on full screen mode during the exam, exiting full screen mode is a violation of
                        exam
                        regulations. <br>
                        - After pressing "Submit", the test will end and you will no longer be able to edit the test.<br>
                        - Test time is limited, pay attention to divide time appropriately for each sentence to get the best
                        results.
                    </div>
                    <form action="demo-tinh.php" method="POST">
                        <input class="exam-code" type="text" name="code" placeholder="Enter Exam Code">
                        <!-- <button class="btn-start" name="submit" type="button">Start</button> -->
                        <input hidden type="text" name="student" value="<?php echo $row['student_name'];?>" placeholder="">
                        <input hidden type="text" name="student_id" value="<?php echo $row['student_id'];?>" placeholder="">
                        <input type="submit" name="submit" value="Submit">
                    </form>
                <?php }
                ?>
                <?php
                if (isset($_POST['submit'])) {
                    $exam_code = $_POST['code'];
                    $sql = mysqli_query($conn,"SELECT * FROM exam WHERE exam_id ='".$exam_code."'");
                    while($row = mysqli_fetch_array($sql)){;
                        $time = $row['date_time'];
                        header("location:demo-tinh.php");
                    }
                }
                ?>
                <div id="show-mark"></div>
            </div>
        </div>
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

    <script>
        $(document).ready(function () {
            // window.onbeforeunload = function () {
            //     return "you can not refresh the page";
            // }
        // click start to get code and compare code
        // $(".btn-start").click(function start() {
        //     var a = $(".exam-code").val()
        //     if (a == "abc") {
        //         location.href = 'demo.html'
        //     }
        // })

        // get current-date
        var d = new Date();
        console.log(typeof (d.getDate()))
        if (d.getDate() <= 9) {
            var str_date = (d.getDate())
            var newStringDate = "0" + str_date
            // console.log(newStringDate)
        } else {
            var newStringDate = d.getDate()
        }
        if (d.getMonth() <= 9) {
            var str_month = (d.getMonth() + 1)
            var newStringMonth = "0" + str_month
            // console.log(newStringMonth)
        } else {
            var newStringMonth = d.getMonth()
        }
        if (d.getHours() <= 9) {
            var str_hours = d.getHours()
            var newStringHours = "0" + str_hours;
        } else {
            var newStringHours = d.getHours()
        }
        // console.log(newStringHours)
        if (d.getMinutes() <= 9) {
            var str_minutes = d.getMinutes();
            var newStringMinutes = "0" + str_minutes;
            // console.log(newStringMinutes);
        } else {
            var newStringMinutes = d.getMinutes()
        }

        var strDate = newStringDate + "/" + newStringMonth + "/" + d.getFullYear() + "  " + newStringHours + ":" + newStringMinutes;
        var fullDate = newStringDate + "/" + newStringMonth + "/" + d.getFullYear()
        var fullTime = newStringHours + ":" + newStringMinutes
        $(".current-date").html(strDate);
        console.log($(".current-date").html(strDate));

        var lastDay = new Date(d.getFullYear(), d.getMonth() + 1, 0);

        var daysNumber = lastDay.getDate();
        // console.log(daysNumber)

        $(".btn-get-date").click(function () {
            var date = $(".start-date-input").val()
            var inputTime = $(".start-time-input").val()
            // $(".btn-start").css("background-color", "green")
            console.log(date)
            // console.log(inputTime)
            // console.log(fullTime)
            // console.log(fullDate)
            if (date == fullDate && inputTime == fullTime) {
                console.log("ok")
                // $(".btn-start").click(function start() {
                //     var a = $(".exam-code").val()
                //     location.href = 'demo.html'
                //     // console.log("start")
                // })
                // setTimeout(function () {
                //     $(".btn-start").unbind("click")
                //     $(".btn-start").css("background-color", "#ccc")
                //     $(".btn-start").attr("title", "overtime")
                // }, 2)
            }


            // var currentDate = Number(strDate.substring(0, 10))
            // var currentHours = Number(strDate.substring(12, 14))
            // var currentMinutes = Number(strDate.substring(15, 17))
            
            // var inputHours = Number(inputTime.substring(0, 2))
            // var inputMinutes = Number(inputTime.substring(3, 5))
            // var inputDate = Number(date.substring(0, 2))
            // var inputMonth = Number(date.substring(3, 5))
            // console.log(inputMonth)
            // // console.log(currentDate)
            // // console.log(currentHours)
            // // console.log(currentMinutes)
            // // console.log("inputTime"+inputTime)
            // // console.log(typeof inputHours)
            // // console.log(typeof inputMinutes)

            //     // console.log("abc")


            //     if (inputMinutes < 45) {
            //         newInputMinutes = inputMinutes + 15;
            //         // console.log(inputMinutes)
            //         if ((inputDate == newStringDate) && (inputMinutes <= newInputMinutes) ) {
            //             $(".btn-start").click(function start() {
            //                 var a = $(".exam-code").val()
            //                 location.href = 'demo.html'
            //             })
            //         }

            //     } else if ((inputMinutes >= 45) && (inputHours == 23) && (inputDate != daysNumber) && (inputMonth != 12)) {
            //         var newInputMinutes = inputMinutes + 15 - 60
            //         var newInputHours = "00"
            //         var newInputDate = newStringDate + 1
            //         console.log("new hours " + newInputHours)
            //         console.log("new minutes " + newInputMinutes)
            //         console.log("new date " + newInputDate)
            //         // var newdate =  

            //     } else if ((inputMinutes >= 45) && (inputHours == 23) && (inputDate == daysNumber) && (inputMonth != 12)) {
            //         var newInputDate = "01"
            //         var newInputMinutes = inputMinutes + 15 - 60
            //         var newInputHours = "00"
            //         var newInputMonth = newStringMonth + 1
            //         console.log("new hours " + newInputHours)
            //         console.log("new minutes " + newInputMinutes)
            //         console.log("new date " + newInputDate)
            //         console.log("new month " + newInputMonth)
            //     } else if ((inputMinutes >= 45) && (inputHours == 23) && (inputDate == daysNumber) && (inputMonth==12)) {
            //         var newInputDate = "01"
            //         var newInputMinutes = inputMinutes + 15 - 60
            //         var newInputHours = "00"
            //         var newInputMonth = "01"
            //         var newInputYear = d.getFullYear() + 1
            //         console.log("new hours " + newInputHours)
            //         console.log("new minutes " + newInputMinutes)
            //         console.log("new date " + newInputDate)
            //         console.log("new month " + newInputMonth)
            //         console.log("new year " + newInputYear)
            //     }

            // $(".btn-start").unbind("click");


            // if (inputMinutes < 45) {
            //     inputMinutes = inputMinutes + 15;
            //     console.log(inputMinutes)
            // }
        })
});


</script>

</html>