<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .container { max-width: 800px; margin: 50px auto; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .nav { margin: 20px 0; }
        .nav a { 
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .logout { 
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome, <?= session()->get('username') ?>!</h2>
            <a href="/logout" class="logout">Logout</a>
        </div>

        <div class="nav">
            <a href="/students">Manage Students</a>
            <a href="/attendance-form">Take Attendance</a>
            <a href="/attendance-report">View Reports</a>
        </div>

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