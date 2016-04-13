
<!DOCTYPE html>
<html lang="en">
<style>

.row{
    margin-top:40px;
    padding: 0 10px;
}

.clickable{
    cursor: pointer;   
}

.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
</style>
  
<?php include "include/header.php"; ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php include "include/menu.php"; ?>

            <!-- top navigation -->
            <?php include "include/top.php"; ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <p style="margin-top:-50px;">
                                    <h2>Add Cell <small> <i class="fa fa-caret-right"></i> &emsp; Add a new cell in the database</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="x_content">
                                <br />
    <form id="form1" method="post" enctype="multipart/form-data" action="" data-parsley-validate class="form-horizontal form-label-left">


        <!--  First panel  -->
                               
             <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New cell</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">            
                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="cell_name" required="required" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="cell_note" rows="3"> </textarea>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Leader of the cell <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="cell_leader" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>

                                           <label class="control-label col-md-3 col-sm-3 col-xs-12"> Cell Phone No. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input onkeypress="return isNumberKey(event)" id="last-name" name="phone" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>


                                 </div>
                             </div>


                        <?php
//include("connection.php");

if(isset($_POST['submit'])) {
      
    $cell_name = mysql_real_escape_string($_POST['cell_name']);
    $cell_note = mysql_real_escape_string($_POST['cell_note']);
    $cell_leader = mysql_real_escape_string($_POST['cell_leader']);
    $phone = mysql_real_escape_string($_POST['phone']);
    
      //here query check weather if user already registered so can't register again.  
    $check_cell_query=mysql_query("select * from cells WHERE cell_name='$cell_name'");  

  
    if(mysql_num_rows($check_cell_query)>0)  
    {  
            
             echo "
            <div class='alert alert-warning'>
            <a href='add_cell.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong> This cell already exixts ..</strong> !</a> </b>
            </div>";

        exit();  
    }   
///////////////////


    if($cell_name == ""){
        echo "All fields should be filled. Either one or many fields are empty.";
        echo "<br/>";
        echo "<a href='add_cell.php'>Go back</a>";
    } else {
        mysql_query("INSERT INTO cells(cell_name, cell_note, cell_leader,phone) VALUES('$cell_name', '$cell_note','$cell_leader','$phone')", $conn)
            or die("Could not execute the Insert query.");


             //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('Add cell','".$_SESSION['valid']."','".$_SESSION['level']."','Added cell: $cell_name') ");
            
        echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success ..</strong> You have successfully added a new cell ! &emsp; <b> <a href='view_cells.php'><font color='white'> <i class='fa fa-caret-left'></i> &emsp; View all cells </font> </a>  </b>
            </div>
            ";
        //echo "<br/>";
        //echo "<a href='login.php'>Login</a>";
    }
} else {
?>
                </div>
                    </div>                  
                           </div>
                                   <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                                <a href="index.php"> <div class="btn btn-round btn-warning"> Cancel </div> </a>
                                                <button type="submit" name="submit"  class="btn btn-round btn-success">Save Cell </button>
                                            </div>
                                        </div>
                                    </form>
                                             <?php
                                            }
                                            ?>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

    <script type='text/javascript' src="boot/js/jquery.min.js"></script>
     <script type='text/javascript' src="boot/js/timing.js"></script>
    <script type='text/javascript' src='boot/js/bootstrap-datepicker.js'></script>
    <script src="boot/js/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- Select country script -->

     	<!-- select2 -->
        <script src="boot/js/select/select2.full.js"></script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="boot/js/autocomplete/countries.js"></script>
        <script src="boot/js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <script src="boot/js/custom.js"></script>


        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>

        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- /select2 -->
 
     <!--Select ending here -->
   
        <!--Country  -->

<script>
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})
</script>

   <?php include "include/scripts.php"; ?>

    <!--country ends here -->
</body>

</html>