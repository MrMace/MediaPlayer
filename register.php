<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- */-->


<html>
<head>
    <title>Mace Media Player</title>
</head>
<body>

<div id="inputContainer">
    <!--        Login  form-->
    <form id="loginForm" action="register.php" method="POST">
        <h2>Login Here</h2>

        <!--        login UserName-->
        <p>
            <label for="loginUsername">Username:</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Richard Nixon" required>
        </p>
        <!--        login password-->
        <p>
            <label for="loginPassword">Password:</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
        </p>
        <!--log in button-->
        <button type="submit" name="loginBtn">Log In</button>
    </form>


    <!--    register form-->
    <form id="registerForm" action="register.php" method="POST">
        <h2>Sign Up Here</h2>
        <!--       sign up username-->
        <p>
            <label for="signUpUsername">Username:</label>
            <input id="signUpUsername" name="signUpUsername" type="text" placeholder="walkerDestroyer" required>
        </p>
        <!--       first name-->
        <p>
            <label for="firstName">First Name:</label>
            <input id="firstName" name="firstName" type="text" placeholder="Daryl" required>
        </p>
        <!--       last name-->
        <p>
            <label for="lastName">Last Name:</label>
            <input id="lastName" name="lastName" type="text" placeholder="Dixon" required>
        </p>
        <!--        email address-->
        <p>
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="Your Email" required>
        </p>
        <!--email address confirmation -->
        <p>
            <label for="email2">Confirm Email:</label>
            <input id="email2" name="email2" type="email" placeholder="Your Email" required>
        </p>

        <!--        password-->
        <p>
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </p>
        <!--        password confirm-->
        <p>
            <label for="password2">Confirm Password:</label>
            <input id="password2" name="password2" type="password" placeholder="Password" required>
        </p>
        <!--sign up button-->
        <button type="submit" name="regBtn">Sign Up</button>
    </form>

</div>

</body>
</html>

