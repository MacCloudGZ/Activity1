<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('dashboard.css')?>">
</head>
<body>
    <div class="container">
        <header>
            <h2>Welcome, <?= session()->get('username') ?>!</h2>
            <a href="logout" class="logout">Logout</a>
        </header>

        <nav>
            <p>Your email: <?= session()->get('email') ?></p>   
            <a href="/students">Manage Students</a>
            <a href="/attendance-form">Take Attendance</a>
            <a href="/attendance-report">View Reports</a>
        </nav>

        <div class="content">
            <h3>Quick Actions</h3>
            <ul>
                <li>Add new students using the Manage Students page</li>
                <li>Take daily attendance using the Take Attendance page</li>
                <li>View attendance reports by date</li>
            </ul>
        </div>
    </div>
</body>
</html>