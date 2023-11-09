<?php
session_start();
require_once '../scripts/auth.php';

if (isset($_SESSION['username'])) {
    header('Location: main.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $captcha = $_POST['captcha'];

    if ($captcha !== $_SESSION['captcha']) {
        $signupError = 'Invalid CAPTCHA. Please try again.';
    } else {
        $auth = new Auth();

        if ($password !== $confirmPassword) {
            $signupError = 'Passwords do not match.';
        } elseif ($auth->registerUser($username, $password)) {
            header('Location: login.php?notification=Registration%20successful');
            exit();
        } else {
            $signupError = 'Usuario ya existe pa';
        }
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="container">
    <h1>Sign UP</h1>
    <form method="POST" action="signup.php" id="signupForm">
        <div class="form-group">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
        <label for="captcha">CAPTCHA</label>
            <div class="input-group" id="signup-captcha">
                <input type="text" class="form-control" id="captcha" name="captcha" required>
                <div class="input-group-append">
                 <img src="captcha.php" alt="CAPTCHA Image" class="input-group-text" style="background-color: #ffffff; border: none;">
                </div>
            </div>
        </div>
        <?php if (isset($signupError)) { ?>
            <div class="alert alert-danger">
                <?php echo $signupError; ?>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</div>

<script src="signup.js"></script>

<?php include('../includes/footer.php'); ?>
