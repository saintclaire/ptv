
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
                                    <h2>Add department <small> <i class="fa fa-caret-right"></i> &emsp; Add a new department in the database</small></h2>
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
                    <h3 class="panel-title">Add New Department</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">

                      



                                         
                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="dep_name" required="required" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>



                                    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="dep_desc" required="required" rows="3"> </textarea>
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
                                                <a href="index.php"><div class="btn btn-round btn-warning" > Cancel </div> </a>
                                                <button type="submit" name="submit"  class="btn btn-round btn-success">Save Department</button>
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
    $dep_name = mysql_real_escape_string($_POST['dep_name']);
    $dep_desc = mysql_real_escape_string($_POST['dep_desc']);

     //here query check weather if user already registered so can't register again.  
    $check_dep_query=mysql_query("select * from departments WHERE dep_name='$dep_name'");  

  
    if(mysql_num_rows($check_dep_query)>0)  
    {  
            
             echo "
            <div class='alert alert-warning'>
            <a href='add_dep.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong> This department already exixts ..</strong> !</a> </b>
            </div>";

        exit();  
    }   
///////////////////
    
    if($dep_name == "" || $dep_desc == "") {
        echo "All fields should be filled. Either one or many fields are empty.";
        echo "<br/>";
        echo "<a href='add_dep.php'>Go back</a>";
    } else {
        mysql_query("INSERT INTO departments(dep_name, dep_desc) VALUES('$dep_name', '$dep_desc')", $conn)
            or die("Could not execute the Insert query.");

            //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('Add department','".$_SESSION['valid']."','".$_SESSION['level']."','Added department: $dep_name') ");

            
        echo "
             <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success ..</strong> You have successfully added a new department ! &emsp; <b> <a href='view_dep.php'> <font color='white'> &emsp; <i class='fa fa-caret-left'> </i> &emsp; View all departments </font> </a> </b>
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