
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
    $loginId = $_SESSION['id']; 
    $firstname =strtoupper($_POST['firstname']);
    $lastname = mysql_real_escape_string($_POST['lastname']);
    $dob = mysql_real_escape_string($_POST['dob']);
    //$dob = date('Y-m-d', strtotime($dob1));
    $sex =mysql_real_escape_string($_POST['sex']);
    $occupation = mysql_real_escape_string($_POST['occupation']);
    $country = mysql_real_escape_string($_POST['country']);
    $address = mysql_real_escape_string($_POST['address']);
    $address_overseas = mysql_real_escape_string($_POST['address_overseas']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $email = mysql_real_escape_string($_POST['email']);
    $tithe = mysql_real_escape_string($_POST['tithe']);
    $tithe_paying = mysql_real_escape_string($_POST['tithe_paying']);

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
            echo "Photo not uploaded";
        }
    } 

    $arrival_date_dep = mysql_real_escape_string($_POST['arrival_date_dep']);
    $arrival_date_church = mysql_real_escape_string($_POST['arrival_date_church']);
    $classification = mysql_real_escape_string($_POST['classification']);
    $department = mysql_real_escape_string($_POST['department']);
    $cell_attending = mysql_real_escape_string($_POST['cell_attending']);
    $cell_name = mysql_real_escape_string($_POST['cell_name']);
    $cell_classification = mysql_real_escape_string($_POST['cell_classification']);
    $note = mysql_real_escape_string($_POST['note']);

    // checking empty fields
    if(empty($firstname)) {
     
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysql_query("INSERT INTO members (login_id, firstname, lastname, dob, sex, occupation, country, address,address_overseas, phone, email, tithe,tithe_paying, photo, arrival_date_dep,arrival_date_church, classification, department,cell_attending, cell_name, cell_classification,note) VALUES('$loginId','$firstname','$lastname','$dob','$sex','$occupation','$country','$address','$address_overseas','$phone','$email','$tithe','$tithe_paying','$photo_name','$arrival_date_dep','$arrival_date_church','$classification','$department','$cell_attending','$cell_name','$cell_classification','$note')");
        
        //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('Add member','".$_SESSION['valid']."','".$_SESSION['level']."','Added member: $firstname') ");

        //display success message
        echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Member</strong> added successfully !
            </div>

            ";

    }
}

?>
                  
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              
                                    <p style="margin-top:-50px;">
                                    <h2>Add member &emsp;<small> <i class="fa fa-caret-right"></i> &emsp; Add a new member in the database</small></h2>
                               
                                <div class="x_content">
                                    <br />
                                    <form id="form1" method="post" enctype="multipart/form-data" action="add_member.php" data-parsley-validate class="form-horizontal form-label-left">



        <!--  First panel  -->
                                  
      <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Personal Info</h3>
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

                                </p>
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date of birth <span class="required">*</span>
                                            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="dob" id="date" data-toggle="datepicker" data-select="datepicker" readonly>
       <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Occuptaion <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="last-name" value="STUDENT" name="occupation" class="date-picker form-control col-md-7 col-xs-12" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Country <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                            <select class="select2_single form-control" name="country" tabindex="-1">
<option value="None">None</option>                
<option value="Afganistan">Afghanistan</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Australia">Australia</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                                    </div>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Address Overseas <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input id="last-name"  name="address_overseas" class="date-picker form-control col-md-7 col-xs-12" type="text"> <font color="red" size="1">*Original Address</font>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Phone <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" class="date-picker form-control col-md-7 col-xs-12" onkeypress="return isNumberKey(event)" name="phone" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> E-mail <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="email" class="date-picker form-control col-md-7 col-xs-12" type="email">
                                            </div>
                                        </div>


                                </div>
                            </div>
      

                             <div class="panel panel-info">
            <div class="panel-heading">
                    <h3 class="panel-title">Department Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">


                                         

                                        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Arrival Date/Church <span class="required">*</span>
                                            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="arrival_date_church" id="date" data-toggle="datepicker" data-select="datepicker" readonly>
       <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
            </div>
        
    </div>


                                                                <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Arrival Date/Department <span class="required">*</span>
                                            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="arrival_date_dep" id="date" data-toggle="datepicker" data-select="datepicker" readonly>
       <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
            </div>
        
    </div>
                                        


                                             <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                                    <select class="select2_single form-control" id="cd" name="department" tabindex="-1">
                                            <?php
                                            $level_dep = $_SESSION['level'];

                                            $dquery="SELECT dep_name FROM departments";
                                            $dresult=mysql_query($dquery) or die ("Query to get data from first table failed: ".mysql_error());
                                            
                                            while ($cdrow=mysql_fetch_array($dresult)) {
                                            $dep=$cdrow["dep_name"];
                                                echo "<option>
                                                    $dep
                                                </option>";
                                            
                                            }
                                                
                                            ?>
   
                                                </select>
                                                    </div>
                                                </div>
                                                </div>

                                             <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Position <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="classification" tabindex="-1">

                                                <option value="Leader">Leader</option>
                                                <option value="Member">Member</option>
                                                <option value="Treasurer">Treasurer</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Guest">Guest</option>
                                                <option value="Regular Attender">Regular Attender</option>
                                                <option value="Pastor">Pastor</option>
                                                <option value="Deacon">Deacon</option>
                                                <option value="Elder">Elder</option>
                                                  <option value="Monitor">Monitor</option>
                                                <option value="Children">Children</option>
                                                </select>
                                                    </div>
                                                </div>
                                              </div>

                </div>
            </div>



                    <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tithe Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">


                                     <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        Does he pay tithe ?
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                      <div class="form-group">
                                            
                                                    <select class="select2_single form-control" name="tithe_paying" tabindex="-1">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                    
                                                    
                                                </select>
                                                    </div>
                                                </div>
                                                </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tithe Card Number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input id="last-name" name="tithe" class="date-picker form-control col-md-7 col-xs-12" type="text"> Leave empty if none!
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





         <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cell Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">


                                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Does he attend a cell ? <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                      <div class="form-group">
                                            
                                                    <select class="select2_single form-control" name="cell_attending" tabindex="-1">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                               
                                                    
                                                </select>
                                                    </div>
                                                </div>
                                        </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cell Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                        
                                                    <select class="select2_single form-control" id="cd" name="cell_name" tabindex="-1">
                                            <?php

                                            $cquery="SELECT cell_name FROM cells";
                                            $cresult=mysql_query($cquery) or die ("Query to get data from firsttable failed: ".mysql_error());
                                            
                                            while ($cdrow=mysql_fetch_array($cresult)) {
                                            $cel=$cdrow["cell_name"];
                                                echo "<option>
                                                    $cel
                                                </option>";
                                            
                                            }
                                                
                                            ?>
   
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                         <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Position in Cell  <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                            <select class="select2_single form-control" name="cell_classification" tabindex="-1">
                                                <option value="Leader">Leader</option>
                                                <option value="Member">Member</option>
                                                <option value="Treasurer">Treasurer</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Guest">Guest</option>
                                                <option value="Regular Attender">Regular Attender</option>
                                                <option value="Pastor">Pastor</option>
                                                <option value="Deacon">Deacon</option>
                                                <option value="Elder">Elder</option>
                                              
                                                </select>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                        
                            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Note</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">


                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="note" rows="3" placeholder='Add a note'></textarea>
                                            </div>
                                        </div>

                         </div>
                    </div>                        
                </div>
        </div>



                                   <center> <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="index.php"><div class="btn btn-round btn-warning">Cancel </div></a>
                                                <button type="submit" name="Submit" class="btn btn-round btn-success"> Save member </button>
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