<html>
<?php

   $user=$_POST["user"];
   $pass=$_POST["pass"];

   $m = new MongoClient();
   $db = $m->dvis;
   $collection = $db->login;

   $query = array(
      "user" => $user,
      "pass" => $pass
      
   );

  $cnt=$collection->count($query);

  if($cnt==1)
  {

   if($cursor["user"]==$user and $cursor["pass"]==$pass)
    {
	session_start();
	
	$_SESSION['user']= $user;
	header("location:update.html");
    } 
    else
    {
	echo "<p> Username and Password not matched..!!</p>"
	header("location:index.html");
    }
  } 
	 

?>
</html>
