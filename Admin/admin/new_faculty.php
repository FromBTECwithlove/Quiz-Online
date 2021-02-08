<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Faculty</title>
</head>
<style>
  .modal-footer{
    max-width: 30%;
    float: right;
  }
  .modal-footer button{
    padding: 5px;
    font-size: 12px;
    width: 70px;
  }
  div#position{
    top:400px !important;
  }
  .modal-header{
    height: 55px;
  }
  .modal-header h5{
    font-weight: 700 !important;
    font-size: 20px !important;
    padding-top: 2px;
  }
  .modal-body-add-new-student{
    /*padding: 20px 40px !important;*/
  }
  .modal-content{
    width: 130% !important;
    right: 15%;
  }
  .addstudent-container form{
    left: -20px !important;
    width: 100%;
  }
  .addstudent-container table{
    width:100%;
    margin-left: 17px;
    color: black;

    text-align: center;
  }

  .add{
    padding-left: 40px;
    padding-right: 15px;
    width: 100%;
    height: auto;
    margin: auto;
    color: black;
    text-align: left;
  }
  .add select{
    width: 99.5%;
  }
  .add th{
    padding-bottom: 10px;
  }
  .add th span{
    float: left;
    font-size: 14px;
  }
  .add th div label{
    font-size: 14px;
    margin-top: 2px;
    font-weight: 100;
  }
  .add input{
    width: 90%;
    padding: 3px 5px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #000;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    border-radius: 5px;

  }

  .add input[type=text]:focus {
    border: 1px solid #58257b;
  }

  .add textarea{
    width: 190%;
    height: 60px;
    border-radius: 5px;
    margin-bottom: 10px;
  }
  .add th div{
    display: flex;
    width: 60%;
    margin: 10px 0 0 -15px;

  }
  .add th div input{
    margin-top: 5px;
  }
  .nofication h4{
    text-align: center;
    padding-right: 10px: 
  }
  .modal-footer{
    width: 100%;
  }
</style>
<body>
  <div class="modal fade" id="add-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 200px" role="document">
      <div class="modal-content modal-content-width" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-body-add-new-student">
          <div class="addstudent-container">
            <form action="add_student.php" method="post">
              <table  class="add">
                <tr>
                  <input type="text" class="form-control" name="student_id" hidden placeholder="ID">
                  <th>
                    <span>Name</span><br>
                    <input type="text" class="form-control" name="student_name"  placeholder="Name" required>
                  </th>
                </tr>
                <tr>
                  <th>
                    <span>Date of birth</span><br>
                    <input type="date" class="form-control" name="student_DoB"  placeholder="Date of Birth" required>
                  </th>
                  <th colspan="2">
                    <span>Gender</span><br>
                    <div>
                      <input type="radio" id="male" name="student_gender" required value="Male">
                      <label for="male">Male</label>
                      <input type="radio" id="female" name="student_gender" required value="Female">
                      <label for="female">Female</label>
                    </div>
                  </th>
                  <tr>
                    <th>
                      <span>Phone</span><br>
                      <input type="text" class="form-control" name="student_phone"  placeholder="Phone number" required>
                    </th>
                    <th>
                      <span>Email</span><br>
                      <input type="email" class="form-control" name="student_email"  placeholder="Email" required>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <span>Address</span><br>
                      <textarea name="student_address"  placeholder="Address" required></textarea>
                    </th>
                  </tr>
                </table>
                <div>
                  <?php
                  if(isset($_GET['msg']))
                  {
                    $error = $_GET['msg'];
                    $DoB = $_GET['DoB'];
                    $name = $_GET['name'];
                    if($error=0)
                    {
                      print '<div class="nofication">
                      <h4>Existing'.$name.' contestants with date of birth '.$DoB.'!</h4>
                      Try again please!
                      </div>';
                      header("Location:new_student.php; refresh:2");
                    }
                    else
                    {
                      print '<div class="nofication">
                      <h4>Add successful '.$name.' student with date of birth '.$DoB.'</h4>
                      </div>';
                    }
                  }
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button class="btn btn-primary" type="submit" name="add_student" id="sendEmail">ADD</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>