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
    $captcha = $_POST['captcha'];

    if ($captcha !== $_SESSION['captcha']) {
        $loginError = 'Invalid CAPTCHA. Please try again.';
    } else {
        $auth = new Auth();

        if ($auth->authenticateUser($username, $password)) {
            $_SESSION['username'] = $username;
            header('Location: main.php');
            exit();
        } else {
            $loginError = 'Invalid username or password.';
        }
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="container">
    <h1>Log in</h1>
    <form method="POST" action="login.php" id="loginForm">
        <div class="form-group">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="captcha">Captcha</label>
            <div class="form-group d-flex align-items-center">
                <input type="text" class="form-control" id="captcha" name="captcha" required>
                <div class="ml-2">
                    <img src="captcha.php" alt="CAPTCHA Image" class="captcha">
                </div>
            </div>
        </div>
        <?php if (isset($loginError)) { ?>
            <div class="alert alert-danger">
                <?php echo $loginError; ?>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p>No tienes cuenta aún? <a href="signup.php">Registrate</a></p>
</div>
<script src="login.js"></script>

<?php include('../includes/footer.php'); ?>