<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
    <link rel="stylesheet" href="<?= base_url('student.css') ?>">
    <style>label{display:block;margin-top:8px;} table{border-collapse:collapse;} td,th{border:1px solid #ccc;padding:6px;}</style>
</head>
<body>
    <aside>
        <h1>Attendance Form</h1>
    <?php if (session()->getFlashdata('message')): ?>
            <p style="color:green"><?= session()->getFlashdata('message') ?></p>
        <?php endif ?>
        
        <form method="get" action="/attendance-form">
            <label>Select date: <input type="date" name="date" value="<?= esc($date) ?>"></label>
            <button type="submit">Load</button>
        </forms>
        <a href="students">Add Students</a>
        <a href="attendance-report">View Reports</a>
    </aside>

    <section>
        <form method="post" action="/submit-attendance">
        <?= csrf_field() ?>
            <input type="hidden" name="attendance_date" value="<?= esc($date) ?>">
        
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // map existing records by student_id for this date
                    $map = [];
                    if (!empty($records)) {
                        foreach ($records as $r) {
                            $map[$r['student_id']] = $r['status'];
                        }
                    }
                    if (!empty($students)):
                        foreach ($students as $i => $s):
                            $sid = $s['student_id'];
                            $status = $map[$sid] ?? '';
                            ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($s['s_lastname']) ?>, <?= esc($s['s_firstname']) ?></td>
                                <td><?= esc($s['course']) ?></td>
                                <td><input type="radio" name="status[<?= $sid ?>]" value="PRESENT" <?= $status === 'PRESENT' ? 'checked' : '' ?>></td>
                                <td><input type="radio" name="status[<?= $sid ?>]" value="ABSENT" <?= $status === 'ABSENT' ? 'checked' : '' ?>></td>
                            </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="5">No students available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        
            <button type="submit">Save Attendance for <?= esc($date) ?></button>
        </form>
    </section>

</body>
</html>