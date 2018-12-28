<?php
$intTimeoutSeconds = 420;
require 'configd.php';
require_once 'userd.class.php';

session_start();
if (!user::isLogged()) {
	header("Location: index.php");
}
else {
		$id2 = $_SESSION['id'];
if(isset($_SESSION['intLastRefreshTime']))
{
	if(($_SESSION['intLastRefreshTime']+$intTimeoutSeconds)<time())
	{
		session_destroy();
        header("Location: index.php?site=7");
		session_start();
	}
}
$_SESSION['intLastRefreshTime'] = time();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8">
    <title>Denz's Register</title>
    <link href="newregister.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   </head>
	<body>
	 <?

    include ('menus.php');

	if(($_SESSION['ranga']=="Administracja" || $_SESSION['ranga']=="Menager" || $_SESSION['ranga']=="Kierownik" || $_SESSION['ranga']=="Młodszy kierownik" || $_SESSION['ranga']=="Admins")){
	?>
	    <div class="RegisterForm">
        <div class="TitleForm">
            <img src="pics/register.png" alt="Register img" width="100%"/>
        </div>
        <form action="" method="post">
            <div class="RegisterFormLeft">
                <h2>Basic Options</h2>
                <p>Nick</p>
                <input type="text" name="usernick" id="usernick" placeholder="Enter Nick" />
                <p>Password</p>
                <input type="password" name="userpassword" id="userpassword" placeholder="Enter Password" />
                <p>Password Again</p>
                <input type="password" name="auserpassword" id="auserpassword" placeholder="Enter Password Again" />
                <p>Adding Person</p>
                <input type="text" name="addingperson" id="addingperson" placeholder="Enter Adding Person" value="<? echo ''.$_SESSION['userinfo'].'' ?>" />
            </div>
            <div class="RegisterFormCenter">
                <h2>Advanced Options</h2>
                <p>Name</p>
                <input type="text" name="username" id="username" placeholder="Enter Name" />
                <p>Surname</p>
                <input type="text" name="usersurname" id="usersurname" placeholder="Enter Surmane" />
                <p>Adress</p>
                <input type="text" name="useradress" id="useradress" placeholder="Enter Adress" />
                <p>Adress Number</p>
                <input type="text" name="useradressnumber" id="useradressnumber" placeholder="Enter Adress Number" />
                <p>Phone Number</p>
                <input type="number" name="userphone" id="userphone" placeholder="Enter Phone Number" />
            </div>
               <div class="RegisterFormRight">
                <h2>Supreme Options</h2>
                <p>Rank</p>
                <select id="userrank" name="userrank">
                    <option value="" disabled selected>Select User Rank</option>
                    <option value="Admins">Admins</option>
                    <option value="Menager">Menager</option>
                    <option value="Kierownik">Kierownik</option>
                    <option value="Młodszy kierownik">Młodszy kierownik</option>
                    <option value="Barman">Barman</option>
                    <option value="Kelner">Kelner</option>
                    <option value="Okres próbny">Okres próbny</option>
                </select>
                <p>Skin</p>
                <select id="userskin" name="userskin">
                    <option value="" disabled selected>Select User Skin</option>
                    <option value="20">20 - skin męski ciemny</option>
                    <option value="46">46 - skin męski jasny</option>
                    <option value="48">48 - skin męski ciemny</option>
                    <option value="59">59 - skin męski jasny</option>
                    <option value="69">69 - skin damski ciemny</option>
                    <option value="91">91 - skin damski jasny</option>
                    <option value="98">98 - skin męski jasny</option>
                    <option value="169">169 - skin damski jasny</option>
                    <option value="171">171 - skin męski jasny</option>
                    <option value="172">172 - skin damski jasny</option>
                    <option value="185">185 - skin damski jasny</option>
                    <option value="223">223 - skin męski ciemny</option>
                    <option value="240">240 - skin męski ciemny</option>
                </select>
                <p>Sex</p>
                <div class="UserBtn">
                        <div class="form-check form-check-inline">
                            <label for="userm">
                                <input type="checkbox" name="userm" value="userm.svg">
                            </label>
                            <label for="userw">
                                <input type="checkbox" name="userw" value="userw.svg">
                            </label>
                        </div>
                       </div>
                    <input id="jsIdResult" name="jsIdResult" type="text" placeholder="Results will be placed here..."  />
                 </div>
            <div class="RegisterFormSubmit">
                <input type="hidden" name="action" value="3" />
                <input type="submit" value="Register New User" />
            </div>
        </form>
        <button id="jsGenId" type="button">Generate GUID</button>
    </div>
     <script src="script/generatorv2.js"></script>
     <?php
       }else{
            setcookie('info',"Podstrona dla wyższych rangą <br/> <b>Twoja ranga: </b> ".$profile['ranga']."",time()+5);
            header("Location: index?site=1?name=".$_SESSION['userinfo']."");
        }   };
       ?>
	</body>

</html>
