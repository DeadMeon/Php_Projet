<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" type="text/css" href="loginPostGre.css" />
</head>
<body>

  <h2>Login PostGre</h2>
  <div id="contenue">
	   <form action="loginPostGre.php" method="post" >
        <div id="question">
            <label for="host">Host :</label>
            <div id="form">
                <input type="text" name="host" value="ust-infoserv.univlehavre.lan" required>
                <!--'required' ou 'value=<php if (isset($_POST["host"])) print "'".$_POST["host"]."'"; else echo "''"; ?>'-->
            </div>
            <br>
          </div>
		     <div id="question">
			        <label for="user">User :</label>
              <div id="form">
    	    	      <input type="text" name="user" required>
              </div>
    	        <br>
        </div>
        <div id="question">
 	 		     <label for="password">Password : </label>
           <div id="form">
        	    <input type="password" name="password" required>
           </div>
           <br>
        </div>
        <div id="question">
           <input type="submit" value="Valider" />
           <input type="reset" />
        </div>
	   </form>
  </div>

</body>
</html>
