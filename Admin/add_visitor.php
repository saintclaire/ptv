
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
                  
                  
<?php
//including the database connection file

if(isset($_POST['Submit'])) {
    //$loginId = $_SESSION['id']; 
    $date_visitor = mysql_real_escape_string($_POST['date_visitor']);
    $service = mysql_real_escape_string($_POST['service']);
    $type = mysql_real_escape_string($_POST['type']);
    $firstname = mysql_real_escape_string($_POST['firstname']);
    $lastname =mysql_real_escape_string($_POST['lastname']);
    $sex =mysql_real_escape_string($_POST['sex']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $address = mysql_real_escape_string($_POST['address']);
    $duration = mysql_real_escape_string($_POST['duration']);
    $invited_by = mysql_real_escape_string($_POST['invited_by']);
    $department = mysql_real_escape_string($_POST['department']);
    $teachings = mysql_real_escape_string($_POST['teachings']);
    $baptise = mysql_real_escape_string($_POST['baptise']);
    $prayer = mysql_real_escape_string($_POST['prayer']);

    // checking empty fields
    if(empty($firstname)) {
        
        echo "Faites rentrer le nom SVP !";
      
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysql_query("INSERT INTO visitors ( date_visitor,service,type,firstname,lastname,sex,phone,address,duration,invited_by,department, teachings,baptise,prayer) VALUES('$date_visitor','$service','$type','$firstname','$lastname','$sex','$phone','$address','$duration','$invited_by','$department','$teachings','$baptise','$prayer')");
        
        //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('Add visitor','".$_SESSION['valid']."','".$_SESSION['level']."','Counsellor added visitor: $firstname') ");

        //display success message
        echo "  
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Vous avez rengistre un <strong>visiteur</strong> avec success !
            </div>

            ";

    }
}

?>
                  
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                               
                                <div class="x_content">
                                    <br />
                                    <form id="form1" method="post" enctype="multipart/form-data" action="add_visitor.php" data-parsley-validate class="form-horizontal form-label-left">



        <!--  First panel  -->
     

                                             <center>      <h3><b>FICHE DE VISITEUR</b></h3>
                            <p class="font-gray-dark">
                                Enregistrez les informations du visiteur
                            </p>   </center>
                            <div class="ln_solid"></div>
                            <p style="margin-top:20px;">

                                    <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Service Day <span class="required">*</span>
                                                    </label>
                                          
                                          <div class="col-md-5 col-sm-5 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="service" tabindex="-1">

                                                <option value="Jeudi">Jeudi</option>
                                                <option value="Dimanche"> Dimanche </option>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                              </div>
 


                  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date <span class="required">*</span>
                                            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="date_visitor" value="<?php echo date('Y-m-d');?>" id="date" data-toggle="datepicker" data-select="datepicker" readonly>
       <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
            </div>
        
    </div>

                                         <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="type" tabindex="-1">

                                                <option value="new comer">New comer</option>
                                                <option value="new converted">New converted</option>
                                                <option value="Attender">Attender</option>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="ln_solid"></div>

                                             <center>      <h4>Informations personnelles</h4>
                            <p class="font-gray-dark">
                                Vous pouvez enregistrer les informations personnelles du visiteur <b>ci-dessous</b>
                            </p>   </center>
                            <div class="ln_solid"></div>
                            <p style="margin-top:20px;">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="firstname" required="" title="Please enter your Firstname" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="lastname" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        

                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gender <span class="required">*</span>
                                            </label>
                                        &emsp; &nbsp;
                                            M:
                                            <input type="radio" class="flat" name="sex" id="genderM" value="M" checked="" required /> F:
                                            <input type="radio" class="flat" name="sex" id="genderF" value="F" />
                                        </p>
                                    </div>



                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Phone <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" class="date-picker form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" name="phone" type="number">
                                            </div>
                                        </div>
                                   

                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Address <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input id="last-name"  name="address" class="date-picker form-control col-md-7 col-xs-12" type="text">

                                            </div>
                                        </div>

                 
      
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Duration <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input id="last-name"  name="duration" class="date-picker form-control col-md-7 col-xs-12" type="text"> <font color="red" size="1">*Future date</font>
                                            </div>
                                        </div>

                                          <div class="ln_solid"></div>

                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Invited by <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="last-name"  name="invited_by" class="date-picker form-control col-md-7 col-xs-12" type="text">

                                            </div>
                                        </div>

                                           <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Integration au departement <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="department" tabindex="-1">

                                                <option value="Yes">Yes</option>
                                                <option value="No"> No </option>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                              </div>


                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Se faire enseigner ou pas <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="teachings" tabindex="-1">

                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                              </div>

                                                 <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Se faire baptise ou pas <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="baptise" tabindex="-1">

                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                              </div>

            <div class="ln_solid"></div>

  <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Requete de priere</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">


                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Requete de priere <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="prayer" rows="3" placeholder='Add a request'></textarea>
                                            </div>
                                        </div>

                         </div>


                                </div>
                            </div>

                                   <center> <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="view_visitor.php"><div class="btn btn-round btn-warning">Annuler </div></a>
                                                <button type="submit" name="Submit" class="btn btn-round btn-success"> Enregistrer </button>
                                            </div>
                                        </div>

                                    </form>
                                        </center>

                                             
                                     
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