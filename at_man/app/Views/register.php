<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('login.css')?>">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        
        <?php if(isset($validation)): ?>
            <div class="error">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/register/save">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= set_value('email') ?>" required>
            </div>
            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" name="confirmpassword" required>
            </div>
            
            <button type="submit">Register</button>
        </form>
        
        <p>Already have an account? <a href="/">Login here</a></p>
    </div>
</body>
</html>