<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link href="<?= DIRPAGE ?>public/css/sigin.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container1">
    <div class="title">Registration</div>
    <div class="content1">
        <form method="post" action="#">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">username</span>
                    <input name="username" type="text" placeholder="Enter your username" >
                </div>
                <div class="input-box">
                    <span class="details">nome</span>
                    <input name="nome" type="text" placeholder="Enter your nome" >
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input name="email" type="text" placeholder="Enter your email" >
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input name="phone" type="number" placeholder="Enter your number" >
                </div>
                <div class="input-box">
                    <span class="details">nif</span>
                    <input name="nif" type="number" placeholder="Enter your nif" >
                </div>
                <div class="input-box">
                    <span class="details">birth</span>
                    <input name="birth" type="date" placeholder="Enter your birth" >
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input name="password" type="text" placeholder="Enter your password" >
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input name="confirm_pass" type="text" placeholder="Confirm your password" >
                </div>
                <div class="input-box">
                    <span class="details">postal_code</span>
                    <input name="postal_code" type="text" placeholder="Enter your postal_code" >
                </div>
                <div class="input-box">
                    <span class="details">coutry</span>
                    <input name="coutry" type="text" placeholder="Enter your coutry" >
                </div>
                <div class="input-box">
                    <span class="details">city</span>
                    <input name="city" type="text" placeholder="Enter your city" >
                </div>
                <div class="input-box">
                    <span class="details">locale</span>
                    <input name="locale" type="text" placeholder="Enter your locale" >
                </div>
                <div class="input-box">
                    <span class="details">address</span>
                    <input name="address" type="text" placeholder="Enter your address" >
                </div>
            </div>

            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <span >Gender</span>

                <div class="category">

                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>

                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</div>

</body>
</html>
