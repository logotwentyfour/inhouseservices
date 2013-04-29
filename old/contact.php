<?php



  #########################################################
 ###########  serverside form validation  ################
#########################################################

if($_POST['Submit'] == 'submit')
{
	$first_name = $_POST['first_name'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$work_description = $_POST['work_description'];
	$comments = $_POST['comments'];
	$spam_question = $_POST['spam_question'];




	$SERVER_SIDE_FORM_VALIDATION = true  ;

	if( ($first_name == "") || (strlen($first_name ) > 50)  )
    {
		$SERVER_SIDE_FORM_VALIDATION = false;
		$VALIDATION_ERROR['first_name'] = true;
    }
	
	
	if( ($work_description == "") || (strlen($work_description ) > 2000)  )
    {
		$SERVER_SIDE_FORM_VALIDATION = false;
		$VALIDATION_ERROR['work_description'] = true;
    }
	
	
	if( strlen($telephone) > 20 )
    {
		$SERVER_SIDE_FORM_VALIDATION = false;
		$VALIDATION_ERROR['telephone'] = true;
    }
	
	if(!email($email))
    {
		$SERVER_SIDE_FORM_VALIDATION = false;
		$VALIDATION_ERROR['email'] = true;
    }
	
	if($spam_question != 'hot')
    {
		$SERVER_SIDE_FORM_VALIDATION = false;
		$VALIDATION_ERROR['spam_question'] = true;
    }
	
	
	
	  ####################################################################
	 ###########  if validation passes mail the message  ################
	####################################################################
	
	if($SERVER_SIDE_FORM_VALIDATION == true )
	{
  
	$field_left_blank = "Detail not given"; 

 		if($telephone == "")
		{
			$telephone = $field_left_blank;
		}
 
 
		$first_name = stripslashes($first_name);
		$telephone = stripslashes($telephone);
		$email = stripslashes($email);
		$work_description = stripslashes($work_description);
		$comments = stripslashes($comments);
 
		$glen = "glen@inhouseservices.ie";
		$from = "From: enquiry@inhhouseservices.ie";
		$subject = "Enquiry from inhouseservices.ie";
		$message = "Name: " . $first_name . "\n\n";
		$message .= "email: " . $email . "\n\n";
		$message .= "Telephone no: " . $telephone . "\n\n";
		$message .= "Work Description: " . $work_description . "\n\n";
		$message .= "Additional Comments: " . $comments ;
		

		mail($send_to, $subject, $message, $from);
		mail($glen, $subject, $message, $from);
		
		header("location:thank_you.html");
		exit;
	
	}

}




function email($email, $options = null)
{
	$check_domain = false;
	$use_rfc822 = false;

	if (is_bool($options))
	{
		$check_domain = $options;
	}
	elseif (is_array($options))
	{
		extract($options);
	}

		
	##### regular expression check for email #####
	$regex = '&^(?:                                               # recipient:
    ("\s*(?:[^"\f\n\r\t\v\b\s]+\s*)+")|                          #1 quoted name
    ([-\w!\#\$%\&\'*+~/^`|{}]+(?:\.[-\w!\#\$%\&\'*+~/^`|{}]+)*)) #2 OR dot-atom
    @(((\[)?                     #3 domain, 4 as IPv4, 5 optionally bracketed
    (?:(?:(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:[0-1]?[0-9]?[0-9]))\.){3}
    (?:(?:25[0-5])|(?:2[0-4][0-9])|(?:[0-1]?[0-9]?[0-9]))))(?(5)\])|
    ((?:[a-z0-9](?:[-a-z0-9]*[a-z0-9])?\.)*[a-z](?:[-a-z0-9]*[a-z0-9])?)  #6 domain as hostname
    \.((?:([^-])[-a-z]*[-a-z])?)) #7 ICANN domain names 
    $&xi';

	if($use_rfc822? Validate::__emailRFC822($email, $options) : preg_match($regex, $email))
	{
			
		if($check_domain && function_exists('checkdnsrr'))
		{
			list (, $domain)  = explode('@', $email);
                
			if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A'))
			{
				return true;
			}
			return false;
		}
		return true;
	}
	return false;
}




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://dublincore.org/documents/dcq-html/">
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="DC.title" content="Inhouse Services and Co" />
		<meta name="DC.subject" content="Inhouse Services and co, kitchen refit, bathroom refit, building services, extenstions, renovations, attic converstions, bathrooms, shop fittings, sunrooms, kitchens, wardrobes, carpentry, electrical, plumbing, doors, stairs, fitted wardrobes, buit in wardrobes, bedroom furniture, wardrobe doors, kitchen design, kitchen doors, fitted bedroom, bathroom tiles, tiles, bathroom design, bathroom suites, luxury bathrooms, house extensions, home extension, conservatories, stairs, stair cases, timber stairs" />
		<meta name="DC.description" content="Inhouse Services and co offer you a complete building service including extenstions, renovations, attic converstions, bathrooms, shop fittings, sunrooms, kitchens, wardrobes, carpentry, electrical, plumbing." />
       
		<meta name="DC.publisher" content="Inhouse Services and Co" />
		<meta name="DC.creator" content="Paddy O'Hanlon" />
		<meta name="DC.rightsholder" content="Inhouse Services and Co" />
		<meta name="DC.type" content="Text" />
		<meta name="DC.format" content="text/html" />
		<meta name="DC.language" content="en" />
		<meta name="DC.coverage" content="World" />
		<meta name="DC.audience" content="Everybody" />
		<meta name="author" content="Paddy O'Hanlon" />
		<meta name="revisit-after" content="1 month" />
        <meta name="robots" content="all">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Inhouse Services and co, building services, extenstions, renovations, attic converstions, bathrooms, shop fittings, sunrooms, kitchens, wardrobes, carpentry, electrical, plumbing" />
<meta name="description" content="Inhouse Services and co offer you a complete building service including extenstions, renovations, attic converstions, bathrooms, shop fittings, sunrooms, kitchens, wardrobes, carpentry, electrical, plumbing." />

<link rel="shortcut icon" href="images/inhouse.ico" />

<title>Inhouse Services and Co - Contact us</title>

<link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css" />

<!--[if IE]><link rel="stylesheet" type="text/css" media="screen" href="ie.css" /><![endif]-->
<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />

<script type="text/javascript" src="scripts/prototype.js"></script>
<script type="text/javascript" src="scripts/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="scripts/lightbox.js"></script>





<script language="javascript" type="text/javascript" >


function validateForm(form)
{

	if( (form.first_name.value =="") || (form.first_name.value.length > 50) )
	{
         alert("Please enter your Name!");
         form.first_name.focus();
         form.first_name.select();
         return false;
	}
	
	
		if( (form.work_description.value =="") || (form.work_description.value.length > 2000) )
	{
         alert("Please leave you message!");
         form.work_description.focus();
         form.work_description.select();
         return false;
	}
	
	
	if(form.telephone.value.length > 20) {
         alert("The phone number you have entered is too long!");
         form.telephone.focus();
         form.telephone.select();
         return false;
    }
	
	
	if( !isEmailAddress(form.email.value) )
	{
		alert("Please enter your valid email address!");
		form.email.focus();
		return false;
	}

 	return true ;
}





function isEmailAddress(email)
{
	var validEmail = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	
	if (!validEmail.test(email))   return false;
    else return true;
}


</script>



</head>


<body>

 
 	<a href="#skip_to_main_content" class="hide_me">skip to the main content</a>




<div id="page_rap">
   <div id="main_content">
 		<div id="content_holder">
  
  
  		<!-- banner logo -->
		
  			<div id="top_img"> 


	<img src="images/banner_logo.jpg" alt="Inhouse Services and Co logo"/>

  			</div>
  
  
  
					
				
					
			<div id="content">
			
					<!-- main content goes here -->
			
				<div id="middle"> 
				
				  <a name="skip_to_main_content"></a> <!-- 'skip to main content' links to here -->
				  
				  	<h1>Contact us</h1>
					
					<p>
					To get a quote from Inhouse Services please use the contact details below
					</p>
					
					<p>
					Glenn 087 417 6158. 
					</p>
					
					<p>
					Alternatively, please you our online get-a-quote form. We look forward to hearing from you!
					</p>
					
				  <br />
				  <br />
				  
				  
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contact-form" onsubmit="return validateForm(this);">
	<fieldset>
		<legend>Contact Information</legend> 
			<br />



			<label for="first_name">Name</label>
			<br />
				<input name="first_name" type="text" id="first_name" size="25" maxlength="50"   <?php if( $SERVER_SIDE_FORM_VALIDATION == false ) { ?> value="<?php echo $first_name ; ?>"  <?php } ?> />
			<br />
<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['first_name'] == true )  ) echo "<span class='error_message'>Please enter your Name!</span><br />"; ?>
			<br />

	   
			<label for="email">Email</label>
			<br />
				<input name="email" type="text" id="email" size="25" maxlength="50"  <?php if( $SERVER_SIDE_FORM_VALIDATION == false ) { ?> value="<?php echo $email ; ?>"  <?php } ?> />
			<br />
<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['email'] == true )  ) echo "<span class='error_message'>Please enter a valid email address!</span><br />"; ?>
			<br />

			<label for="telephone">Phone (Home or mobile) * Optional field</label>
			<br />
				<input name="telephone" type="text" id="telephone" size="25" maxlength="50"  <?php if( $SERVER_SIDE_FORM_VALIDATION == false ) { ?> value="<?php echo $telephone ; ?>"  <?php } ?> />
			<br />
<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['telephone'] == true )  ) echo "<span class='error_message'>The number you have entered is too long!</span><br />"; ?>


			<br />

			<label for="work_description">Work Description</label>
			<br />
	<textarea name="work_description" id="work_description"  /><?php if( $SERVER_SIDE_FORM_VALIDATION == false ) { echo $work_description; } ?></textarea>
			<br />
	<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['work_description'] == true )  ) echo "<span class='error_message'>Please leave your message!</span><br />"; ?>
			<br />
            
            
            
            
            <label for="comments">Additional Comments * Optional field</label>
			<br />
	<textarea name="comments" id="comments"  /><?php if( $SERVER_SIDE_FORM_VALIDATION == false ) { echo $comments ; } ?></textarea>
			<br />
	<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['comments'] == true )  ) echo "<span class='error_message'>Please leave your message!</span><br />"; ?>
			<br />
            
            
            
            <label for="spam_question">Is fire hot or cold? (spam question)</label>
			<br />
				<input name="spam_question" type="text" id="spam_question" size="25" maxlength="50" />
			<br />
<?php if( ($SERVER_SIDE_FORM_VALIDATION == false ) && ($VALIDATION_ERROR['spam_question'] == true )  ) echo "<span class='error_message'>Please answer the spam question!</span><br />"; ?>

            
			
   		<label for="submit" class="hide_me">Submit</label>
			<input class="button" type="submit" name="Submit" id="submit" value="submit" />
			
			<br />
			<br />
			
			
	 
	</fieldset>
			<br />
		
</form>
					  
				
				
				</div> <!--closes middle div -->
			
			
			<!--  sub navigation goes in the 'left' div when required -->
			
				<div id="left"> 
				
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
					
					<br />
					
					<h2><a href="what_we_do.html">What we do</a></h2>
						
					<ul>
						<li><a href="construction.html">Construction</a></li>
						<li><a href="attic_conversions.html">Attic conversions</a></li>
						<li><a href="kitchens_and_wardrobes.html">Kitchens and Wardrobes</a></li>
						<li><a href="bathrooms.html">Bathrooms</a></li>
						<li><a href="carpentry.html">Carpentry</a></li>
<li><a href="doors.html">Doors</a></li>
						<li><a href="electric.html">Electrical Services</a></li>
						<li><a href="plumbing.html">Plumbing</a></li>						
					</ul>
					
					<br />
					<br />
					

					<br />
				
				</div>


			<!-- contact details goes here -->

				<div id="right"> 
				
				  <h2><a href="contact.php">Contact Details</a></h2>
				  
				  	<address>
					27 Knightswood<br />
					Santry<br />
					Dublin 9<br />
					Ireland
					</address><br />
					
					<h3>phone</h3>+353 (0)87 417 6158<br /><br />
<h3>fax</h3>+353 (0)1 842 9734<br /><br />
					<h3>email</h3><a href="mailto:glen@inhouseservices.ie" class="text_color" title="this is an email link">glen@inhouseservices.ie</a>
					
					<br />
					<br />
					<br />
					<br />
					
				</div>
				
			</div> <!-- closes content div -->
		</div> <!-- closes content_holder div -->



		<!-- bottom border image -->
	
  			<div id="btm_img"> 
			 	<img src="images/border_btm.jpg" alt=""/>
  			</div>
		
		</div> <!-- closes main_content div -->
 
 
 <!-- footer plain text links -->
 
 		 	<div id="btm_text_links">
 				<a href="index.html">home</a> |
				<a href="contact.php">contact us</a> |
				<a href="what_we_do.html">what we do</a> |
<a href="site_map.html">site map</a>
				
				<br />
				<br />
				
				&copy; Inhouse Services and Co 2013
				
				<br />
				<br />
				
				

  			</div>
			
			
  	<!-- bottom gradient controlled in the stylesheet -->
 
  <div id="btm_grad"> 
	&nbsp;
  </div>
  
</div> <!-- closes page_rap div -->

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2030538-4";
urchinTracker();
</script>

</body>
</html>
