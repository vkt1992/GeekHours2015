<!DOCTYPE html>
<html>
<body background="back1.jpg">
<?php

   $fname=$_GET["firstname"];
   $lname=$_GET["lastname"];
   $location=$_GET["location"]; 
   $mail=$_GET["mail"];


   $m = new MongoClient();
   $db = $m->dvis;
   $collection = $db->userdata;

   $query = array(
      "firstname" => $fname,
      "lastname" => $lname,
      "location" => $location
   );

  $cursor=$collection->find($query);
   
   $flag=0;
   $cnt=1;

   foreach ($cursor as $details) {
	
   $flag=1;

   echo "<h2>ResultSet ".$cnt. "</h2><br>"; 

   echo $details["firstname"]."<br>";
   echo $details["lastname"]."<br>";
   echo $details["location"]."<br>";
   echo $details["dob"]."<br>";
   echo $details["nativeplace"]."<br>";
   
   $cnt=$cnt+1;

   
   }

   if ($flag==0) {

   $p = new MongoClient();
   $dbp = $p->dvis;
   $collectionp = $dbp->pendinginfo;

   $add = array(
      "firstname" => $fname,
      "lastname" => $lname,
      "location" => $location,
      "mail" => $mail
   );

   $collectionp->insert($add);
   	//echo "<a href="/search.html"></a>";
	echo "<p>Sorry, No Match Found</p>";
   

   }
   echo "<a href='search.html'>Go Back</a>";

?>

</body>
</html>
