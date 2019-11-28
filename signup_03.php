<!DOCTYPE html>
<html>
    <head>
        <title>
            Signup
        </title>
                <style>
            .bs {
                border: 1px solid #c0c0c0;
                border-radius: 4px;
                width: 300px;
                height: 35px;
                margin-left: 16px;
                margin-bottom: 10px;
                color: #404040;
            }
            .border {
                border: 1px solid gray;
                width: 340px;
                border-radius: 4px;
                margin: auto;
                margin-top: -8px;
                margin-bottom: 20px;
            }
            legend {
                font-family: monospace;
                font-size: 22px;
                color: #0099ff;
            }
            .submit {
                border: 0px;
                background-color: #0099ff;
                width: 300px;
                height: 35px;
                margin-bottom: 19px;
                margin-left: 16px;
                border-radius: 4px;
                position: relative;
                color: aliceblue;
            }
            .logo {
                margin-left: 88px;
                margin-top: -20;
                width: 150px;
                padding: 0px;
                border: 0px;
                height: 130px;
            }
            .tcs {
                text-align: center;
                position: relative;
                top: -27px;
                font-family: monospace;
                font-size: 14px;
                color: #404040;
            }
            .bs_2 {
                margin: auto;
                border: 1px solid gray;
                width: 363px;
                border-radius: 4px;
                font-family: monospace;
                font-size: 15px;
                height: 50px;
            }
            .bs_3 {
                margin-top: 14px;
                margin-right: 8px;
                text-align: center;
            }        
            #exists {
                font-size: 10px;
                position: relative;
                left: 22px;
                top: 8px;
                font-family: monospace;
                color: red;
            }
                    .head {
                font-family: monospace;
                text-align: center;
                font-size: 30px;
                border-bottom: 1px solid dimgrey;
            }
            .foot {
                font-size: 10px;
                margin-top: 40px;
                border-top: 1px solid dimgrey;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <header class="head">
            <p>Welcome to Camagry</p>
        </header>
        <form action="check.php" method="post">
            <br />
            <fieldset class="border">
                <legend>Signup</legend>
                <img class="logo" src="Pictures/Untitled.png">
                <p class="tcs">By signing up, you agree to our Terms and Conditions.</p>
                <p><input class="bs" type="text" name="Username" Placeholder=" Enter Username" pattern="[^]{1,}" title="Username is not valid" required></p> 
                <p><input class="bs" type="password" name="Password" placeholder=" Enter Password" pattern="(?=.*[A-Z0-9])(?=.*[a-z]).{8,}" title="Password not valid" required></p>
                <p id="exists">Email already exists</p>
                <P><input class="bs" style="border-color: red;" type="email" name="Email" pattern="[a-zA-Z0-9]+@+[a-zA-Z]+\.{1, }" placeholder="Enter Email" required></P>
                <input class="submit" type="submit" name="Submit" value="Sign Up">
            </fieldset>
        </form>
        <section class="bs_2">
            <div class="bs_3">Have an account already?
                <a href="login.php">Login</a></div>
        </section>
        <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>