<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
</head>
<body>
    <h1>Student Information Form</h1>
    
    <?php if (session()->getFlashdata('message')): ?>
        <p style="color: green;\"><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>
    
    <form action="/destine/save" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <br><br>
        
        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>