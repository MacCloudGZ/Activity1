<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="<?= base_url('student.css')?>">
    <style>table{border-collapse:collapse;} td,th{border:1px solid #ccc;padding:6px;}</style>
</head>
<body>
    <aside>
        <h1>Attendance Report</h1>

    <form method="get" action="/attendance-report">
        <label>Select date: <input type="date" name="date" value="<?= esc($date) ?>"></label>
            <button type="submit">View</button>
    </form>
        <a href="dashboard">Back to Dashboard</a>
    </aside>

    <section>
        <h2>Records for <?= esc($date) ?></h2>
        <?php if (!empty($records)): ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $i => $r): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($r['s_lastname']) ?>, <?= esc($r['s_firstname']) ?></td>
                            <td><?= esc($r['course']) ?></td>
                            <td><?= esc($r['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No attendance records for this date.</p>
        <?php endif; ?>

    </section>
</body>
</html>