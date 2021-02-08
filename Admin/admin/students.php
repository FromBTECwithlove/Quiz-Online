<?php
include 'check_login.php';
include 'count_records.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student management page</title>
  <meta http-equiv="refresh" content="120">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="url('https://fonts.googleapis.com/css?family=Montserrat');">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style-addnewquestion.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="../ckeditor/">
  <link rel="icon" href="../dist/img/icon.png">
  <link rel="stylesheet" href="../css/student.css">
  <script src="js/extention/choices.js"></script>
  <script>
    const choices = new Choices('[data-trigger]', {
      searchEnabled: false,
      itemSelectText: '',
    });
  </script>
</head>
<body >
  <?php include('new_student.php');?>
  <div class="wrapper">
    <?php include('header.php') ?>
    <div>
      <div class="main-container">
        <div id="sidebar-container">
          <?php include('right_menu.php') ?>
        </div>
        <div class="main-wrapper">
          <div class="row">
            <div id="admin" class="table-wrapper">
              <div class="card material-table">
                <div class="table-header">
                  <span class="table-title"><a href="students.php?page=manage_student" style="text-decoration: none;">STUDENT MANAGEMENT</a></span>
                  <div class="actions">
                    <a href="#add-student" data-toggle="modal">
                      <i class="fas fa-plus"><span>New Student</span></i></a>
                      <a href="#" class="search-toggle waves-effect btn-flat nopadding">
                        <i class="fas fa-search"><span>Search</span></i></a>
                      </div>
                    </div>
                    <table id="datatable">
                      <thead>
                        <tr>
                          <th width="5%">#</th>
                          <th width="">ID</th>
                          <th width="">NAME</th>
                          <th width="">GENDER</th>
                          <th width="">EMAIL</th>
                          <th width="">PHONE</th>
                          <th width="">ADDRESS</th>
                          <th width="15%" style="text-align: center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require '../db_config/connection.php';
                        error_reporting(0);
                        $count = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM student ORDER BY student_id DESC");
                        while($row=mysqli_fetch_array($sql)){?>
                          <tr>
                            <td width=""><?php echo $count; ?></td>
                            <td>BHAF<?php echo $row['student_id']; ?></td>
                            <td><a href="view_student.php?student_id=<?php echo $row['student_id']; ?>&name=<?php echo $row['student_name']; ?>"; style="color:blue; text-decoration: none;"><?php echo $row['student_name']; ?></a></td>
                            <td><?php echo $row['student_gender']; ?></td>
                            <td><?php echo $row['student_email']; ?></td>
                            <td><?php echo $row['student_phone']; ?></td>
                            <td><?php echo $row['student_address']; ?></td>
                            <td><a href="edit_student.php?student_id=<?php echo $row['student_id']; ?>&name=<?php echo $row['student_name']; ?>" class="action-icon"><i class="far fa-edit"></i></a>
                              <a onclick="return confirmDel()" href="del_student.php?student_id=<?php echo $row['student_id']; ?>&name=<?php echo $row['student_name']; ?>" class="action-icon"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <script>function confirmDel() { var x = confirm('Do you want to delete this student?'); if (x) {return true;}else return false;}</script>
                            <?php $count++;} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <footer class="main-footer">
              <?php
              include 'footer.php';
              ?>
            </footer>
          </div>
          <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

          <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

          <script>
            $.widget.bridge('uibutton', $.ui.button);
          </script>
          <script src="../bootstrap/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
          <script src="../plugins/morris/morris.min.js"></script>
          <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
          <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
          <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
          <script src="../plugins/knob/jquery.knob.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
          <script src="../plugins/daterangepicker/daterangepicker.js"></script>
          <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
          <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
          <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
          <script src="../plugins/fastclick/fastclick.js"></script>
          <script src="../dist/js/app.min.js"></script>
          <script src="../dist/js/pages/dashboard.js"></script>
          <script src="../dist/js/demo.js"></script>
          <script src="../dist/js/bieudo.js"></script>
          <script src="../bootstrap/js/jquery.flot.js"></script>
          <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
          <script src="../bootstrap/js/jquery.flot.resize.js"></script>
          <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
          <script src="../bootstrap/js/jquery.flot.pie.js"></script>
          <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
          <script type="text/javascript">
            (function(window, document, undefined) {

              var factory = function($, DataTable) {
                "use strict";

                $('.search-toggle').click(function() {
                  if ($('.hiddensearch').css('display') == 'none')
                    $('.hiddensearch').slideDown();
                  else
                    $('.hiddensearch').slideUp();
                });

                /* Set the defaults for DataTables initialisation */
                $.extend(true, DataTable.defaults, {
                  dom: "<'hiddensearch'f'>" +
                  "tr" +
                  "<'table-footer'lip'>",
                  renderer: 'material'
                });

                /* Default class modification */
                $.extend(DataTable.ext.classes, {
                  sWrapper: "dataTables_wrapper",
                  sFilterInput: "form-control input-sm",
                  sLengthSelect: "form-control input-sm"
                });

                /* Bootstrap paging button renderer */
                DataTable.ext.renderer.pageButton.material = function(settings, host, idx, buttons, page, pages) {
                  var api = new DataTable.Api(settings);
                  var classes = settings.oClasses;
                  var lang = settings.oLanguage.oPaginate;
                  var btnDisplay, btnClass, counter = 0;

                  var attach = function(container, buttons) {
                    var i, ien, node, button;
                    var clickHandler = function(e) {
                      e.preventDefault();
                      if (!$(e.currentTarget).hasClass('disabled')) {
                        api.page(e.data.action).draw(false);
                      }
                    };

                    for (i = 0, ien = buttons.length; i < ien; i++) {
                      button = buttons[i];

                      if ($.isArray(button)) {
                        attach(container, button);
                      } else {
                        btnDisplay = '';
                        btnClass = '';

                        switch (button) {

                          case 'first':
                          btnDisplay = lang.sFirst;
                          btnClass = button + (page > 0 ?
                            '' : ' disabled');
                          break;

                          case 'previous':
                          btnDisplay = '<i class="material-icons">chevron_left</i>';
                          btnClass = button + (page > 0 ?
                            '' : ' disabled');
                          break;

                          case 'next':
                          btnDisplay = '<i class="material-icons">chevron_right</i>';
                          btnClass = button + (page < pages - 1 ?
                            '' : ' disabled');
                          break;

                          case 'last':
                          btnDisplay = lang.sLast;
                          btnClass = button + (page < pages - 1 ?
                            '' : ' disabled');
                          break;

                        }

                        if (btnDisplay) {
                          node = $('<li>', {
                            'class': classes.sPageButton + ' ' + btnClass,
                            'id': idx === 0 && typeof button === 'string' ?
                            settings.sTableId + '_' + button : null
                          })
                          .append($('<a>', {
                            'href': '#',
                            'aria-controls': settings.sTableId,
                            'data-dt-idx': counter,
                            'tabindex': settings.iTabIndex
                          })
                          .html(btnDisplay)
                          )
                          .appendTo(container);

                          settings.oApi._fnBindAction(
                            node, {
                              action: button
                            }, clickHandler
                            );

                          counter++;
                        }
                      }
                    }
                  };

      // IE9 throws an 'unknown error' if document.activeElement is used
      // inside an iframe or frame. 
      var activeEl;

      try {
        // Because this approach is destroying and recreating the paging
        // elements, focus is lost on the select button which is bad for
        // accessibility. So we want to restore focus once the draw has
        // completed
        activeEl = $(document.activeElement).data('dt-idx');
      } catch (e) {}

      attach(
        $(host).empty().html('<ul class="material-pagination"/>').children('ul'),
        buttons
        );

      if (activeEl) {
        $(host).find('[data-dt-idx=' + activeEl + ']').focus();
      }
    };

    /*
     * TableTools Bootstrap compatibility
     * Required TableTools 2.1+
     */
     if (DataTable.TableTools) {
      // Set the classes that TableTools uses to something suitable for Bootstrap
      $.extend(true, DataTable.TableTools.classes, {
        "container": "DTTT btn-group",
        "buttons": {
          "normal": "btn btn-default",
          "disabled": "disabled"
        },
        "collection": {
          "container": "DTTT_dropdown dropdown-menu",
          "buttons": {
            "normal": "",
            "disabled": "disabled"
          }
        },
        "print": {
          "info": "DTTT_print_info"
        },
        "select": {
          "row": "active"
        }
      });

      // Have the collection use a material compatible drop down
      $.extend(true, DataTable.TableTools.DEFAULTS.oTags, {
        "collection": {
          "container": "ul",
          "button": "li",
          "liner": "a"
        }
      });
    }

  }; // /factory

  // Define as an AMD module if possible
  if (typeof define === 'function' && define.amd) {
    define(['jquery', 'datatables'], factory);
  } else if (typeof exports === 'object') {
    // Node/CommonJS
    factory(require('jquery'), require('datatables'));
  } else if (jQuery) {
    // Otherwise simply initialise as normal, stopping multiple evaluation
    factory(jQuery, jQuery.fn.dataTable);
  }

})(window, document);

$(document).ready(function() {
  $('#datatable').dataTable({
    "oLanguage": {
      "sStripClasses": "",
      "sSearch": "",
      "sSearchPlaceholder": "Enter Keywords Here",
      "sInfo": "_START_ -_END_ of _TOTAL_",
      "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
      '<option value="10">10</option>' +
      '<option value="20">20</option>' +
      '<option value="30">30</option>' +
      '<option value="40">40</option>' +
      '<option value="50">50</option>' +
      '<option value="-1">All</option>' +
      '</select></div>'
    },
    bAutoWidth: false
  });
});
</script>
</body>

</html>