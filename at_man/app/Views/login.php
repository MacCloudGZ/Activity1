<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .container { max-width: 400px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
    </style>
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