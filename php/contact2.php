<?php 
 $to = $_REQUEST['sendto'] ; 
 $from = $_REQUEST['Email'] ; 
 $name = $_REQUEST['Name'] ; 
 $headers = "From: $from"; 
 $subject = "Web Contact Data"; 
 
 $fields = array(); 
 $fields{"Name"} = "Name";
 $fields{"Address"} = "Address";
 $fields{"City"} = "City";
 $fields{"State"} = "State";
 $fields{"Zip"} = "Zip";
 $fields{"Company"} = "Company"; 
 $fields{"Email"} = "Email"; 
 $fields{"Phone"} = "Phone"; 
 $fields{"list"} = "Mailing List"; 
 $fields{"Message"} = "Message";
 $fields{"Product"} = "Product";
 $fields{"Hdyhau"} = "Hdyhau"; 
 $fields{"Timing"} = "Timing";
 $fields{"pets"} = "Pets";
 
 $body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ 	$body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 
 
 $headers2 = "From: bkittredge@synlawn.com"; 
 $subject2 = "Thank you for contacting us"; 
 $autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usually within 48 hours. If you have any more questions, please submit another contact form on our website at http://www.synlawnbayarea.com/contact/contact.html";
 
 if($from == '') {print "You have not entered an email, please go back and try again";} 
 else { 
 if($name == '') {print "You have not entered a name, please go back and try again";} 
 else { 
 $send = mail($to, $subject, $body, $headers); 
 $send2 = mail($from, $subject2, $autoreply, $headers2); 
 if($send) 
 {header( "Location: http://www.synlawnbayarea.com/contact/thank-you.html" );} 
 else 
 {print "We encountered an error sending your mail, please notify webmaster@YourCompany.com"; } 
 }
}
 ?> 