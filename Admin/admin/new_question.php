<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Question</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> -->
  </head>
  <style type="text/css">
    html{
      font-size: 16px !important;
    }

    .modal-title{
      color: #006077;
      font-weight: 700;
    }
    .modal-dialog{
      max-width: 600px !important;
    }
    .hidden-form-container{
      display: none;
    }
    .dropdown-menu .dropdown-menu-right button.active{
      background-color: white;
    }
    .hidden-form-container .active{
      display: block;
    }
    .btn-show-name{
      min-width: 150px !important;
    }
    .dropdown-item{
      width: 150px !important;
    }
    .dropdown-menu{
      min-width: 100px;
    }
    .btn-choice:hover{
      background-color: #CED4DA;
    }
    /*-------------------------------------------------*/
    .ques-table-footer{
      width: 100px;
      padding: 7px 0px;
      text-align:center;
      margin:10px;
      background-color: #0090B3;
      border-radius: 10px;
      font-size: 18px;
      font-weight: 700;
    }
    .ques-table-footer:hover{
      background-color: #007A99;
    }
    .ques-table-footer a{
      color: white;
    }
    .ques-table-footer a:hover{
      text-decoration: none;
    }
    .form-group p{
      font-weight: 700;
    }
    .form-group textarea{
      width: 100%;
    }
    .add-container{
      position: relative;
    }
    .btn-group{
      position: absolute;
      left:100px;
      top: -6px;
    }
    .btn-show-name{
      background-color: #0090B3;
    }
    .btn-show-name span{
      font-weight: 500;
    }
    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
      background-color: #006077;
    }
    .dropdown-item.active, .dropdown-item:active{
      background-color: #0090B3;
    }
    .drop-button{
      margin-left: 0px;
    }
    .btn-show-name:hover{
      background-color: #006077;
    }
    #input-ans{
      flex: 1;
      height: 38px;
      border-radius: 5px;
      border:1px solid #CED4DA;
      margin-left: 10px;
    }
    .answer-form{
      display: flex;
    }
    .answer-form span{
      margin-top: 5px;
    }
    .answer-form label{
      flex: 1;
      display: flex;
      justify-content: space-between;
    }
    #option-1,#option-2,#option-3,#option-4{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    #option-tf-1,#option-tf-2{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    #option-mc-1,#option-mc-2,#option-mc-3,#option-mc-4{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    .form-sc, .form-tf, .form-mc label{
      position: relative;
    }
    .fas.fa-check-circle{
      font-size: 24px;
      margin-top: 5px;
      margin-right: 10px;
    }
    .fas.fa-check-square{
      font-size: 24px;
      margin-top: 5px;
      margin-right: 10px;
    }
    .btn-radio{
      color: #6C757D;
    }
    #option-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-3:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-4:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-tf-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-tf-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-3:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-4:checked +.btn-radio{
      color: #5DE2A5;
    }
    .add-ques-footer{
      float: right;
    }
    .btn-create:hover{
      background-color: #006077;
    }
    .btn-create{
      background-color: #0090B3;
    }
  </style>
  <body>
  <div class="modal fade" id="add-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="add-container">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle btn-show-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>Single choice</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right drop-button">
                <button class="dropdown-item btn-choice" type="button">Single choice</button>
                <button class="dropdown-item btn-choice" type="button">True or False</button>
                <button class="dropdown-item btn-choice" type="button">Multiple choice</button>
              </div>
            </div>
            <div class="form-container">
              <div class="hidden-form-container">
                <form class="item" id="btn-single-choice" action="add_choice.php" method="POST" accept-charset="utf-8">
                  <div class="hidden-form">
                    <div class="form-group">
                      <p>Category</p>
                      <select class="form-control" name="cate_id">
                        <?php
                        include('../db_config/connection.php');
                        $sql = mysqli_query($conn, "SELECT * FROM category");
                        while($row = mysqli_fetch_array($sql)){?>
                          <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <input hidden type="text" class="form-control" placeholder="ID" name="ques_id">
                    <div class="form-group">
                      <p>Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"></textarea>
                    </div>
                    <div class="form-group">
                      <input hidden class="form-control" type="text" name="type" value="Single Choice" placeholder="Single Choice" readonly="">
                    </div>
                    <div class="form-group form-sc">
                      <p>Single Choice</p>
                      <div class="answer-form">
                        <label class="radio-icon" for="option-1">
                          <input type="radio" required="true" id="option-1" name="correct_ans" value="A">
                          <i class="fas fa-check-circle btn-radio"></i>
                          <span>A.</span>
                          <input type="text" required name="a_ans" value="" id="input-ans" placeholder=" A answer">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label class="radio-icon" for="option-2">
                          <input type="radio" id="option-2" required="true" name="correct_ans" value="B">
                          <i class="fas fa-check-circle btn-radio"></i>
                          <span>B.</span>
                          <input type="text" name="b_ans" required="" value="" id="input-ans" placeholder=" B answer">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label class="radio-icon" for="option-3">
                          <input type="radio" id="option-3" required="true" name="correct_ans" value="C">
                          <i class="fas fa-check-circle btn-radio"></i>
                          <span>C.</span>
                          <input type="text" name="c_ans" value="" required="" id="input-ans" placeholder=" C answer">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label class="radio-icon" for="option-4">
                          <input type="radio" id="option-4" required="true" name="correct_ans" value="D">
                          <i class="fas fa-check-circle btn-radio"></i>
                          <span>D.</span>
                          <input type="text" name="d_ans" value="" id="input-ans" required placeholder=" D answer">
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input hidden style="background-color: transparent;" type="text" class="form-control" value="1.5" name="mark" placeholder="Mark" readonly="" required>
                    </div>
                    <div class="add-ques-footer">
                      <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                      <button type="submit" class="btn btn-primary btn-create" name="add_ques" id="sendEmail">Create</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- True/False -->
              <div class="hidden-form-container">
                <form class="item" id="btn-true-false" action="add_choice.php" method="POST" accept-charset="utf-8">
                  <div class="hidden-form">
                    <div class="form-group">
                      <p>Category</p>
                      <select class="form-control" name="cate_id">
                        <?php
                        include('../db_config/connection.php');
                        $sql = mysqli_query($conn, "SELECT * FROM category");
                        while($row = mysqli_fetch_array($sql)){?>
                          <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <input type="text" hidden class="form-control" name="ques_id" placeholder="ID">
                    <div class="form-group">
                      <p>Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"></textarea>
                    </div>
                    <div class="form-group">
                      <input hidden="" class="form-control" type="text" name="type" value="True / False" placeholder="True / False" readonly>
                    </div>
                    <div class="form-group">
                      <div class="form-group form-tf">
                        <p>True / False</p>
                        <div class="answer-form ">
                          <label for="option-tf-1">
                            <input type="radio" id="option-tf-1" required name="correct_ans" value="A">
                            <i class="fas fa-check-circle btn-radio"></i>
                            <span>A.</span>
                            <input type="text" name="a_ans" value="True" required placeholder=" A answer" id="input-ans">
                          </label>
                        </div>
                        <div class="answer-form">
                          <label for="option-tf-2">
                            <input type="radio" id="option-tf-2" name="correct_ans" required value="B">
                            <i class="fas fa-check-circle btn-radio"></i>
                            <span>B. </span>
                            <input type="text" name="b_ans" value="False" placeholder=" B answer" required id="input-ans">
                          </label>
                        </div>
                      </div>
                      <input readonly="" hidden style="background-color: transparent;" type="text" class="form-control" value="1" name="mark" placeholder="Mark" required>
                    </div>
                    <div class="add-ques-footer">
                      <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                      <button type="submit" class="btn btn-primary btn-create" name="add_ques" id="sendEmail">Create</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Multiple Choices -->
              <div class="hidden-form-container">
                <form class="item" id="btn-multiple-choice" action="add_choice.php" method="POST" accept-charset="utf-8">
                  <div class="hidden-form">
                    <div class="form-group">
                      <p>Category</p>
                      <select class="form-control" name="cate_id">
                        <?php
                        include('../db_config/connection.php');
                        $sql = mysqli_query($conn, "SELECT * FROM category");
                        while($row = mysqli_fetch_array($sql)){?>
                          <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <input type="text" hidden class="form-control" name="ques_id" placeholder="ID">
                    <div class="form-group">
                      <p>Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"></textarea>
                    </div>
                    <div class="form-group">
                      <input hidden="" class="form-control" type="text" name="type" value="Multiple Choices" placeholder="Multiple Choices" readonly>
                    </div>
                    <div class="form-group form-mc">
                      <p>Multiple Choices</p>
                      <div class="answer-form">
                        <label for="option-mc-1">
                          <input type="checkbox" id="option-mc-1" name="correct_ans[]" value="A">
                          <i class="fas fa-check-square btn-radio"></i>
                          <span>A.</span>
                          <input type="text" name="a_ans" value="" placeholder=" A answer" required id="input-ans">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label for="option-mc-2">
                          <input type="checkbox" id="option-mc-2" name="correct_ans[]" value="B">
                          <i class="fas fa-check-square btn-radio"></i>
                          <span>B.</span>
                          <input type="text" name="b_ans" value="" placeholder=" B answer" id="input-ans">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label for="option-mc-3">
                          <input type="checkbox" id="option-mc-3" name="correct_ans[]" value="C">
                          <i class="fas fa-check-square btn-radio"></i>
                          <span>C.</span>
                          <input type="text" name="c_ans" value="" required placeholder=" C answer" id="input-ans">
                        </label>
                      </div>
                      <div class="answer-form">
                        <label for="option-mc-4">
                          <input type="checkbox" id="option-mc-4" name="correct_ans[]" value="D" >
                          <i class="fas fa-check-square btn-radio"></i>
                          <span>D.</span>
                          <input type="text" name="d_ans" value="" required placeholder=" D answer" id="input-ans">
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input hidden style="background-color: transparent;" type="text" class="form-control" value="2" name="mark" readonly placeholder="Mark" required>
                    </div>
                    <div class="add-ques-footer">
                      <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                      <button type="submit" class="btn btn-primary btn-create" name="add_ques-2" id="sendEmail">Create</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.hidden-form-container:first').show();
    $('.btn-choice:first').addClass('active');

    $('.btn-choice').click(function (event) {
      index = $(this).index();
      $('.btn-choice').removeClass('active');
      $(this).addClass('active');
      $('.hidden-form-container').hide();
      $('.hidden-form-container').eq(index).show();
    });
    $('.btn-choice').click(function(){
      var a=$(this).text();
      $('.btn-show-name').text(a);
    });

  });
</script>
</html>