<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<style>
    .add-cate-container{
        padding: 1.8rem;
        padding-top: 0;
    }
    .modal-dialog {
        max-width: 400px;
        top: 5%;
        font-size: 16px !important;
    }
    .add-cate-title{
        font-size: 20px;
        font-weight: 700;
        color: #006077;
    }
    .close-add-cate span{
        font-size: 25px;
    }
    .add-cate-row2 span,
    .add-cate-row3 span {
        font-weight: 700;
        line-height: 35px;
    }
    .add-cate-row2 {
        /*display: flex;*/
        justify-content: space-between;
        margin-top: 13px;
        align-content: center;
    }

    .add-cate-row3 {
        margin-top: 10px;
    }

    .add-cate-row3 textarea {
        margin-top: 3px;
    }

    .add-cate-row1-text,
    .add-cate-row2-text {
        flex: 1;
        max-width: 130px;
    }

    .add-cate-row1-input,
    .add-cate-row2-input {
        flex: 1;
    }

    .add-cate-row1-input input,
    .add-cate-row2-input input {
        width: 100%;
        height: 35px;
    }

    .add-cate-row3 textarea {
        width: 100%;
        height: 150px;
    }
    .add-cate-submit{
        float: right;
        margin-top: 10px;
    }
    .add-cate-submit button{
        font-size: 16px !important;
    }
    .input-form{
        font-size: 12px;
    }
</style>

<body>
    <!-- Modal -->
    <div class="modal fade" id="new-cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 500px">
            <div class="modal-header">
                <span class="modal-title add-cate-title" id="exampleModalLabel">Add new category</span>
                <button type="button" class="close close-add-cate" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-cate-container">
                <form action="add_cate.php" method="POST" accept-charset="utf-8">
                    <input type="text" hidden name="cate_id" class="form-control input-form" placeholder="Category ID">
                    <div class="add-cate-row2">
                        <div class="add-cate-row2-text">
                            <span>Category Title</span>
                        </div>
                        <div class="add-cate-row2-input">
                            <input type="text" name="cate_title" class="form-control input-form" placeholder="Category title" required="">
                        </div>
                    </div>
                    <div class="add-cate-row3">
                        <div>
                            <span>Description</span>
                        </div>
                        <div>
                            <textarea name="cate_des" class="form-control input-form" rows="5" cols="96" style="max-width: 100%" placeholder="Desciption" name=""></textarea>
                        </div>
                    </div>
                    <div class="add-cate-submit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" onclick="confirmAdd()" class="btn btn-primary" name="add_cate" id="">Create</button>
                        <script>
                            function confirmAdd() {
                              var x = confirm('Click OK to continue!');
                              if (x) {
                                return true;
                            }
                            else
                                return false;
                        }
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
</body>

</html>