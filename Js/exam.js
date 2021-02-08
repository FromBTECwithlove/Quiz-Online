
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
    // console.log(a)
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
            // console.log("#" + (a.substring(3)) + ":hover")
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

    //tinh diem 
    for (var i = 0; i <= ($(".hidden-question").length - 1); i++) {
        $(".ques-ans-content").eq(i).attr('id', 'ques-ans-id' + (i));
    }
    // for (var i = 0; i <= 5; i++) {
    //     $(".answer").eq(i).attr('id', 'answer' + (i + 1));
    // }

    $(".btn-finish").click(function () {
        var mark = 0
        var max = 0
        var totalMark = 0
        for (var i = 0; i <= ($(".hidden-question").length - 1); i++) {
            var answer_mark = Number($("#ques-ans-id" + i + " .ques-mark").html())
            var quesType = $("#ques-ans-id" + i + " .ques-type").html()
            var answerText = $("#ques-ans-id" + i + " .ques-ans").html()
            totalMark += answer_mark
            if (quesType === 'Single Choice') {
                var singleValue = $("#answer-" + i + " .ques input:checked").val()
                if (singleValue == answerText) {
                    mark += answer_mark
                }
            }
            if (quesType === 'Multiple Choices') {
                var listChoices = []
                var listAnswers = []
                listAnswers.push(answerText.substring(0, 1), answerText.substring(2, 3), answerText.substring(4, 5), answerText.substring(6, 7))
                for (var j = 1; j <= 4; j++) {
                    var checkbox = $("#answer-" + i + " .ques" + j + " input:checked").val()
                    if (checkbox != null) {
                        listChoices.push(checkbox)
                    }
                }
                for (var k = 0; k <= listAnswers.length; k++) {
                    if (listAnswers[k] == "") {
                        listAnswers.splice(k, 10)
                    }
                }
                if (listChoices.sort().toString() === listAnswers.sort().toString()) {
                    mark += answer_mark
                }
            }
            if (quesType == 'True / False') {
                var trueFalseValue = $("#answer-" + i + " .ques input:checked").val()
                if (trueFalseValue == answerText) {
                    mark += answer_mark
                }
            }
        }
        $(".total-mark").val(mark)
        $('#form').submit()
        console.log(totalMark)
        console.log("total mark: " + Math.ceil(mark / totalMark * 100) + "%")
    })
