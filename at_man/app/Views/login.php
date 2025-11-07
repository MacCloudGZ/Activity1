<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('login.css')?>">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="error">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/login/auth">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <p>Don't have an account? <a href="/register">Register here</a></p>
    </div>
</body>
</html>