<?php 
require_once('../nusoap/lib/nusoap.php'); //include required class for build nnusoap web service server

  // Create server object
   $server = new soap_server();

   // configure  WSDL
   $server->configureWSDL('Upload File', 'urn:uploadwsdl');

   // Register the method to expose
    $server->register('upload_file',                                 // method
        array('file' => 'xsd:string','location' => 'xsd:string'),    // input parameters
        array('return' => 'xsd:string'),                             // output parameters
        'urn:uploadwsdl',                                            // namespace
        'urn:uploadwsdl#upload_file',                                // soapaction
        'rpc',                                                       // style
        'encoded',                                                   // use
        'Uploads files to the server'                                // documentation
    );

    // Define the method as a PHP function

    function upload_file($encoded,$name) {
        $location = "uploads\\".$name;                               // Mention where to upload the file
        $current = file_get_contents($location);                     // Get the file content. This will create an empty file if the file does not exist     
        $current = base64_decode($encoded);                          // Now decode the content which was sent by the client     
        file_put_contents($location, $current);                      // Write the decoded content in the file mentioned at particular location      
        if($name!="")
        {
            return "File Uploaded successfully...";                      // Output success message                              
        }
        else        
        {
            return "Please upload a file...";
        }
    }

    // Use the request to (try to) invoke the service
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA); 
    
?>