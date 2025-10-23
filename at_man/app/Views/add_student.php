<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>label{display:block;margin-top:8px;} table{border-collapse:collapse;} td,th{border:1px solid #ccc;padding:6px;}</style>
</head>
    <style>
        body{
            padding: 0;
            margin: 0;
            display: flex;
            height: 100vh;
        }
        body aside{
        padding: 20px;
            width: 300px;
            background-color: #c33333ff;
            color: white;
            display: flex;
                flex-direction: column;
                gap: 20px;
        }
        body aside form{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        body section{
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
<body>
    <aside>
        <h1>Add Student</h1>
        <?php if(session()->getFlashdata('message')): ?>
            <p style="color:green"><?= session()->getFlashdata('message') ?></p>
        <?php endif ?>
            <hr style="width: 100%;">    
        <form method="post" action="/add-student">
            <?= csrf_field() ?>
            <label>Last name <input type="text" name="s_lastname" required></label>
            <label>First name <input type="text" name="s_firstname" required></label>
            <label>Middle name <input type="text" name="s_middlename"></label>
            <label>Course <input type="text" name="course" required></label>
            <button type="submit">Add Student</button>
        </form>
        <a href="attendance-form">view Attendance Form</a>
        <a href="attendance-report">View Reports</a>
    </aside>
    <section>
        <h2>Students</h2>
        <?php if (!empty($students)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $s): ?>
                            <tr>
                                <td><?= esc($s['student_id']) ?></td>
                                <td><?= esc($s['s_lastname']) ?>, <?= esc($s['s_firstname']) ?>         <?= esc($s['s_middlename']) ?></td>
                                <td><?= esc($s['course']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No students yet.</p>
            <?php endif ?>
    </section>

</body>
</html>