
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
                                    <h2>Add User <small> <i class="fa fa-caret-right"></i> &emsp; Add a new user in the database</small></h2>
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
                    <h3 class="panel-title">User Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">

                                 <div style="position:relative;">
                    <a class='btn btn-primary' href='javascript:;'>
                        Choose photo...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="photo" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>

                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="name" required="required" class="date-picker form-control col-md-7 col-xs-12" type="text"> 
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Email Address
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="email" class="date-picker form-control col-md-7 col-xs-12" type="email"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Username <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="username" required="required" class="date-picker form-control col-md-7 col-xs-12" type="text"> <font color="#98AFC7">Specify username for user login </font>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" pattern=".{5,20}" required title="6 characters minimum" name="password" required="required" class="date-picker form-control col-md-7 col-xs-12" type="password"> <font color="#E77471"> 6 characters minimum* </font>
                                            </div>
                                        </div>

                                     <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        Privilege
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                      <div class="form-group">
                                            
                                                    <select class="select2_single form-control" required="required" name="level" tabindex="-1">
                                                
                                                    <!-- All privileges are added here -->

                                                   
                                                   
                                                    <option value="Counsellors">Counsellors</option>
                                                    <option value="Cultural department">Cultural department</option>
                                                    <option value="Follow up">Follow up</option>
                                                    <option value="Intercessors">Intercessors</option>
                                                    <option value="Musical departement">Musical departement</option>
                                                    <option value="Next Level">Next Level</option>
                                                    <option value="Sunday School">Sunday School</option>
                                                    <option value="Technicians">Technicians</option>
                                                    <option value="Ushers">Ushers</option>
                                                    <option value="MC & Interpreters">MC & Interpreters </option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Super admin">Super admin</option>

                                                    <!-- Ending privileges here -->
                                                </select>
                                                    </div>
                                                </div>
                                                </div>

                                       


                                 </div>
                             </div>

                                        <!--div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Picture <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" id="photo" name="photo" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div-->


       


                        </div>
                    </div>                  
                 </div>

                                 <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                                <a href="index.php" ><div class="btn btn-round btn-warning"> Cancel</div> </a>
                                                <button type="submit" name="submit"  class="btn btn-round btn-success" >Save User</button>
                                            </div>
                                        </div>

                                    </form>
                                     


<?php
//include("connection.php");

if(isset($_POST['submit'])) {
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $user = mysql_real_escape_string($_POST['username']);
    $pass =mysql_real_escape_string($_POST['password']);
    $level = mysql_real_escape_string($_POST['level']);

     if(isset($_FILES['photo'])){
        $errors= array();
        $photo = $_FILES['photo']['name'];
        $file_size =$_FILES['photo']['size'];
        $file_tmp =$_FILES['photo']['tmp_name'];
        $file_type=$_FILES['photo']['type'];
        $exploded = explode('.',$_FILES['photo']['name']);
        $file_ext=strtolower(end($exploded));
        $photo_name=time().".".$file_ext;
        
        $expensions= array("jpeg","jpg","png");         
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 20097152){
        $errors[]='File size must be excately 20 MB';
        }               
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/".$photo_name);
            //echo "Photo loaded successfully !";
            echo "<p>";
        }else{
            echo "Photo not uploaded !";
        }
    } 


    //here query check weather if user already registered so can't register again.  
    $check_username_query=mysql_query("select * from login WHERE username='$user'");  

  
    if(mysql_num_rows($check_username_query)>0)  
    {  
            
             echo "
            <div class='alert alert-warning'>
            <a href='add_user.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong> This user already exixts ..</strong> !</a> </b>
            </div>";

        exit();  
    }   
///////////////////
    
    if($user == "" || $pass == "" || $name == "" || $email == "" || $level == "") {
        echo "All fields should be filled. Either one or many fields are empty.";
        echo "<br/>";
        //echo "<a href='register.php'>Go back</a>";
    } else {
        mysql_query("INSERT INTO login(name, email, username, password, level, photo) VALUES('$name', '$email', '$user', md5('$pass'), '$level', '$photo_name')".mysql_error(), $conn);

        //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('add new user','".$_SESSION['valid']."','".$_SESSION['level']."','added user: $user') ");

            
        echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success ..</strong> You have successfully added a new user ! &emsp; <b> <a href='view_user.php'> <font color='white'> &emsp; <i class='fa fa-caret-left'> </i> &emsp; View all users </font> </a> </b>
            </div>
            ";
        //echo "<br/>";
        //echo "<a href='login.php'>Login</a>";
    }
} else {

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
                    <!-- footer content -->
             
                <!-- /footer content -->
                    
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

  
   
<?php include "include/scripts.php"; ?>
    <!--country ends here -->
</body>

</html>