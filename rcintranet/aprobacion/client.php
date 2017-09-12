<?php 
require_once('../nusoap/lib/nusoap.php'); //include required class for build nnusoap web service server
   $wsdl="http://localhost:81/subhan/webservice3/server.php?wsdl";  // SOAP Server

   if($_POST['submit'])
   {
       $tmpfile = $_FILES["uploadfiles"]["tmp_name"];   // temp filename
       $filename = $_FILES["uploadfiles"]["name"];      // Original filename

       $handle = fopen($tmpfile, "r");                  // Open the temp file
       $contents = fread($handle, filesize($tmpfile));  // Read the temp file
       fclose($handle);                                 // Close the temp file

       $decodeContent   = base64_encode($contents);     // Decode the file content, so that we code send a binary string to SOAP
    }

   $client=new soapclient($wsdl) or die("Error");   // Connect the SOAP server
   $response = $client->__call('upload_file',array($decodeContent,$filename)) or die("Error");  //Send two inputs strings. {1} DECODED CONTENT {2} FILENAME

   // Check if there is anny fault with Client connecting to Server
   if($client->fault){
        echo "Fault {$client->faultcode} <br/>";
        echo "String {$client->faultstring} <br/>";
   }
   else{
        print_r($response); // If success then print response coming from SOAP Server
   }
?>

<form name="name1" method="post" action="" enctype="multipart/form-data">
<input type="file" name="uploadfiles"><br />
<input type="submit" name="submit" value="uploadSubmit"><br />
</form>