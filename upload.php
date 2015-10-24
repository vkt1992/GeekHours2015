<?php

   $fname=$_POST["firstname"];
   $lname=$_POST["lastname"];
   $location=$_POST["location"];
   $dob=$_POST["dob"];
   $nativeplace=$_POST["nativeplace"];
   $info = $_POST["info"];

   $m = new MongoClient();
   $db = $m->dvis;
   $collection = $db->userdata;

   $document = array( 
      "firstname" => $fname, 
      "lastname" => $lname,
      "location" => $location, 
      "dob" => $dob ,
      "nativeplace"=>$nativeplace,
      "info"=>$info
   );

   $collection->insert($document);
   echo "<p> data updated successfully</p>";
   echo "<a href='upload.html'>Go Back</a>";
?>
