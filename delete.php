<?php
  //PHP-8 Database cridentials 
    const HOST ='127.0.0.1';
    const USER='root';
    const PASS='';
    const DB  ='outfyre'; 
   $userId = isset($_GET['id']) ? $_GET['id'] : NULL;

   if(!empty($userId)){
     //echo $userId;
      $con = new MySQli(HOST,USER,PASS,DB);
      //Check for Database connectivity 
      if($con->connect_error) 
         die($con->connect_error);
      else {
          $SQL="delete from products where id=".$userId;
          $con->query($SQL);
          //affected_rows used to return 1 or zero.
          //1 means above query gets successfully executed , zero means there are some error happened regarding sql query at mysql database.

          $rows = $con->affected_rows;

          //Close the Database Connection.
          $con->close();
          if($rows == 1){
             echo "<script>
                   alert('One User profile got deleted');
                   window.location.href='productlist.php';           
             </script>"; 
          } else {
              echo "<script>
                     alert('Something went wrong !');
                     window.location.href='productlist.php';
              </script>";
          }

      }


   }else{
     // echo "Sorry No id has been supplied";
       echo "<script>
             alert('You are not authorized to view this Page');
             window.location.href='productlist.php';
       </script>";
    }


?>