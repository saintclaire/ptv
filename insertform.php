<?php

            include('db.php');    
            if (isset($_POST['save'])){


                $name=$_POST['fullname'];
                $previousname=$_POST['previousname'];
                $passportnumber=$_POST['passportnumber'];
                $dateOfissue=$_POST['dateOfissue'];
                $placeOfissue=$_POST['placeOfissue'];
				$nationality=$_POST['nationality'];
				$dateOfbirth=$_POST['dateOfbirth'];
				$placeissued=$_POST['placeissued'];
				$addressInghana=$_POST['addressInghana'];
				$postalOffice=$_POST['postalOffice'];
				$telephonenumber1=$_POST['telephonenumber1'];
				$email=$_POST['emailid'];
				$telephonenumber2=$_POST['telephonenumber2'];
				$addressOverseas=$_POST['addressOverseas'];
				$department=$_POST['department'];
				$telephonenumber3=$_POST['telephonenumber3'];
				$educationalqualification=$_POST['educationalqualification'];
				$durationOfcontract=$_POST['durationOfcontract'];
				$commencementDate=$_POST['commencementDate'];
				$expiryDate=$_POST['expiryDate'];
                $howLongresident=$_POST['howLongresident'];
                $dateOffirstarrival=$_POST['dateOffirstarrival'];
                $dateOflatestarrival=$_POST['dateOflatestarrival'];
                $proposedLength=$_POST['proposedLength'];
                $maritalStatus=$_POST['maritalStatus'];
                $nameOfspouse=$_POST['nameOfspouse'];
                $nationality=$_POST['nationality2'];
                $educationalQualification=$_POST['educationalQualification2'];
                $Occupation=$_POST['Occupation'];
                $nameOfchildren=$_POST['nameOfchildren'];
				
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

                mysql_query("insert into applicant (photo,fullname,previousname,passportnumber,dateOfissue,placeOfissue,nationality,dateOfbirth,placeissued,addressInghana,postalOffice,telephonenumber1,emailid,telephonenumber2,addressOverseas,department,telephonenumber3,educationalqualification,durationOfcontract,commencementDate,expiryDate,howLongresident,dateOffirstarrival,dateOflatestarrival,proposedLength,maritalStatus,nameOfspouse,nationality2,educationalQualification2,Occupation,nameOfchildren) 
                    values('$photo_name','$name','$previousname','$passportnumber','$dateOfissue','$placeOfissue','$nationality','$dateOfbirth','$placeissued','$addressInghana','$postalOffice','$telephonenumber1','$email','$telephonenumber2','$addressOverseas','$department','$telephonenumber3','$educationalqualification','$durationOfcontract','$commencementDate','$expiryDate','$howLongresident','$dateOffirstarrival','$dateOflatestarrival','$proposedLength','$maritalStatus','$nameOfspouse','$nationality','$educationalQualification','$Occupation','$nameOfchildren')
					")or die(mysql_error());
				

                header('location:index.php');

            }

        ?>