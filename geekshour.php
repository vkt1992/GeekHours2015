<html>
<body>
<?php
   // connect to mongodb
   echo "<p> hello world </p>";
   $m = new MongoClient();
   echo "<p>Connection to database successfully</p>";
   // select a database
   $db = $m->viveku;
   echo "<p>Database mydb selected</p>";
   $collection = $db->mycol;
   echo "<p>Collection selected succsessfully</p>";
   $document = array( 
      "title" => "MongoDB", 
      "description" => "database", 
      "likes" => 100,
      "url" => "http://www.tutorialspoint.com/mongodb/",
      "by", "tutorials point"
   );
   $collection->insert($document);
   echo "<p>Document inserted successfully</p>";
?>
</body>
</html>
