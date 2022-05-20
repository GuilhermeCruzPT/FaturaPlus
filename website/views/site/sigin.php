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
        <form action="#">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">username</span>
                    <input type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">nome</span>
                    <input type="text" placeholder="Enter your nome" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">nif</span>
                    <input type="number" placeholder="Enter your nif" required>
                </div>
                <div class="input-box">
                    <span class="details">birth</span>
                    <input type="date" placeholder="Enter your birth" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="text" placeholder="Confirm your password" required>
                </div>
                <div class="input-box">
                    <span class="details">postal_code</span>
                    <input type="text" placeholder="Enter your postal_code" required>
                </div>
                <div class="input-box">
                    <span class="details">coutry</span>
                    <input type="text" placeholder="Enter your coutry" required>
                </div>
                <div class="input-box">
                    <span class="details">city</span>
                    <input type="text" placeholder="Enter your city" required>
                </div>
                <div class="input-box">
                    <span class="details">locale</span>
                    <input type="text" placeholder="Enter your locale" required>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
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
