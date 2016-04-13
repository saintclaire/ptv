
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
                                    <h2>Add Info Alert <small> <i class="fa fa-caret-right"></i> &emsp; Add a new info in the database </small></h2>
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
                    <h3 class="panel-title">Add New Alert</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">

                      



                                         
                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="info_title" required="required" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>



                                    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="info_desc" required="required" rows="3"> </textarea>
                                            </div>
                                        </div>

                                 </div>
                             </div>



                        </div>
                    </div>                  
                 </div>



                                   <center> <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">

                                                <button type="submit" name="submit" class="btn btn-round btn-success">Display Info</button>
                                            </div>
                                        </div>

                                    </form>
                                        </center>
      

                                           
                                     
                                        </tbody>

                                    </table>
                                </div>
                                


                        <?php
//include("connection.php");

if(isset($_POST['submit'])) {
    $info_title = mysql_real_escape_string($_POST['info_title']);
    $info_desc = mysql_real_escape_string($_POST['info_desc']);
    
    if($info_title == "" || $info_desc == "") {
        echo "All fields should be filled. Either one or many fields are empty.";
        echo "<br/>";
        echo "<a href='add_dep.php'>Go back</a>";
    } else {
        mysql_query("INSERT INTO info(info_title, info_desc) VALUES('$info_title', '$info_desc')", $conn)
            or die("Could not execute the Insert query.");
          
             //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('add info','".$_SESSION['valid']."','".$_SESSION['level']."','added info: $info_title') ");


        echo "
             <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success ..</strong> You have successfully displayed a new info on the dashboard ! &emsp; <b>  <font color='white'> &emsp; <a href='index.php'><i class='fa fa-caret-left'> </i>  &emsp; Check Info</a> </font> </b>
            </div>
            ";
        //echo "<br/>";
        //echo "<a href='login.php'>Login</a>";
    }
} else {
?>
            
                            </div>
                        </div>
                          <?php
                                            }
                                            ?>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

      

  
      <?php include "include/scripts.php"; ?>
            <!-- /top navigation -->
    <!--country ends here -->
</body>

</html>