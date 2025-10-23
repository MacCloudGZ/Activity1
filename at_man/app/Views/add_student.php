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
            display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            width: 100%;
        }
        body form{
            display: flex;
                justify-content: space-evenly;
                gap: 100px;
        }
    </style>
<body>
    <h1>Add Student</h1>
    <?php if(session()->getFlashdata('message')): ?>
        <p style="color:green"><?= session()->getFlashdata('message') ?></p>
    <?php endif ?>

    <form method="post" action="/add-student">
        <?= csrf_field() ?>
        <label>Last name <input type="text" name="s_lastname" required></label>
        <label>First name <input type="text" name="s_firstname" required></label>
        <label>Middle name <input type="text" name="s_middlename"></label>
        <label>Course <input type="text" name="course" required></label>
        <button type="submit">Add Student</button>
    </form>

    <h2>Students</h2>
    <?php if(!empty($students)): ?>
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Course</th></tr></thead>
            <tbody>
            <?php foreach($students as $s): ?>
                <tr>
                    <td><?= esc($s['student_id']) ?></td>
                    <td><?= esc($s['s_lastname']) ?>, <?= esc($s['s_firstname']) ?> <?= esc($s['s_middlename']) ?></td>
                    <td><?= esc($s['course']) ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No students yet.</p>
    <?php endif ?>

</body>
</html>