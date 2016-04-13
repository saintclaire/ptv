<?php include('include/metag.php')?>
    <body>
	
	 <div class="mainmenu-wrapper">
	       <?php include('include/mainmenu-wrapper.php')?> 
		</div> <div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Application Form</h1>
					</div>
				</div>
			</div>
		</div>
		<form method="post">
		
		<div class="modal-body" style=" height:500px;overflow:hidden;">
		
<div class="col-lg-4">
  <div style="position:relative;margin-left: 9px;">
                    <input type="file" name="file" value="upload"/>
                </div>
				
				
				    
				
				
				
				
				
										<div class="input-group input-sm">
												<span class="input-group-addon input-sm">NAME (IN FULL) MR. MRS.MISS:</span>
												<textarea name="fullname" class="form-control input-sm" rows="1"></textarea>
											
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">PREVIOUS NAME (IF ANY):</span>
												<textarea name="previousname" class="form-control input-sm" rows="1"></textarea>
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">PASSPORT N:</span>
												<textarea name="passportnumber" class="form-control input-sm" rows="1"></textarea>
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">DATE OF ISSUE:</span>
												<input type="date" value="" name="dateOfissue" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">PLACE OF ISSUE::</span>
												<input type="text" value="" name="placeOfissue" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
											  <span class="input-group-addon input-sm">NATIONALITY:</span>
												 <select name="nationality" class="form-control input-sm" id="animal">
															<?php include('nationality.php')?>
														</select>
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">DATE OF BIRTH:</span>
												<input type="date" value="" 4"="" name="dateOfbirth" class="form-control input-sm">
												
														<input type="hidden" name="employee_id_no" class="form-control input-sm" value="1">
										
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">PLACE OF ISSUE::</span>
												<input type="text" value="" name="placeissued" class="form-control input-sm">
											</div>
												
												
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">ADDRESS IN GHANA (IN FULL):</span>
												<input type="text" value="" name="addressInghana" class="form-control input-sm">
											</div>	
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">POSTAL(OFFICE/BUSINESS):</span>
												<input type="text" value="" name="postalOffice" class="form-control input-sm">
											</div>
									</div>
									<div class="col-lg-4">
										
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">TELEPHONE NUMBER:</span>
												<input type="number" value="" name="telephonenumber1" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">EMAIL:</span>
												<input type="email" value="" name="emailid" class="form-control input-sm">
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">RESIDENTIAL (HNO):</span>
												<input type="text" value="" name="residential" class="form-control input-sm">
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">TELEPHONE NUMBER:</span>
												<input type="number" value="" name="telephonenumber2" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">ADDRESS OVERSEAS:</span>
												<input type="text" value="" name="addressOverseas" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">Department:</span>
												<input type="text" value="" name="department" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">TELEPHONE NUMBER::</span>
												<input type="number" value="" name="telephonenumber3" class="form-control input-sm">
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">EDUCATIONAL QUALIFICATION:</span>
												<input type="text" value="" name="educationalqualification" class="form-control input-sm">
											</div>
											
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">DURATION OF CONTRACT:</span>
												<input type="text" value="" name="durationOfcontract" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">COMMENCEMENT DATE OF CONTRACT:</span>
												<input type="date" value="" name="commencementDate" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">EXPIRY DATE:</span>
												<input type="text" value="" name="expiryDate" class="form-control input-sm">
											</div>
																									<input type="hidden" name="employee_id" value="62" style="display:none;">
																				</div>
									<div class="col-lg-4">
									
														
											
											
								
											
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">HOW LONG PRESIDENT:</span>
												<input type="text" value="" name="howLongresident" class="form-control input-sm">
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">DATE OF FIRST ARRIVAL:</span>
												<input type="text" value="" name="dateOffirstarrival" class="form-control input-sm">
											</div>
												<div class="input-group input-sm">
												<span class="input-group-addon input-sm">DATE OF LATEST ARRIVAL:</span>
												<input type="text" value="" name="dateOflatestarrival" class="form-control input-sm">
											</div>	
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">PROPOSED LENGTH OF STAY:</span>
												<input type="text" value="" name="proposedLength" class="form-control input-sm">
											</div>	
											
											<div class="input-group input-sm">
												<span class=" input-group-addon input-sm ">MARITAL STATUS:</span>
												<input type="text" value="" name="maritalStatus" class="form-control input-sm">
											</div>	
									
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">NAME OF THE SPOUSE:</span>
												<input type="text" value="" name="nameOfspouse" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
											  <span class="input-group-addon input-sm">NATIONALITY:</span>
												 <select name="nationality2" class="form-control input-sm" id="animal">
															<?php include('nationality.php')?>
														</select>
											</div>
																						<div class="input-group input-sm">
												<span class="input-group-addon input-sm">EDUCATIONAL QUALIFICATION::</span>
												<input type="text" value="" name="educationalQualification2" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">OCCUPATION:</span>
												<input type="text" value="" name="Occupation" class="form-control input-sm">
											</div>
											<div class="input-group input-sm">
												<span class="input-group-addon input-sm">NAME OF THE CHILDREN UNDER 18 YEARS:</span>
												<input type="text" value="" name="nameOfchildren" class="form-control input-sm">
											</div>
									</div>
									
					  <div class="input-group input-sm">
		                                <button type="submit" name="save" class="btn btn-large"><i class="icon-save"></i>&nbsp;Save</button>
	</div>
			</form>					
      </div>
	  <?php include ('insertform.php');?>
	  