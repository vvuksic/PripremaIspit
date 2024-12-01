<?php

$filename = 'tasks.json';

// Učitavanje trenutnih zadataka iz datoteke
function loadTasks($filename) {
    if (!file_exists($filename)) {
        return [];
    } else {
        $json = file_get_contents($filename);
        return json_decode($json, true);
    }
}

// Spremanje zadataka u datoteku
function saveTasks($tasks, $filename) {
    $json = json_encode($tasks, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
}

// Dodavanje novog zadatka
function addTask($task, $filename) {
    $tasks = loadTasks($filename);
    $nextId = count($tasks) > 0 ? max(array_column($tasks, 'id')) + 1 : 1;
    $tasks[] = ['id' => $nextId, 'task' => $task];
    saveTasks($tasks, $filename);
}

// Brisanje zadatka
function deleteTask($taskId, $filename) {
    $tasks = loadTasks($filename);
    foreach ($tasks as $i => $task) {
        if ($task['id'] == $taskId) {
            array_splice($tasks, $i, 1);
            break;
        }
    }
    saveTasks($tasks, $filename);
}

// Provjera zahtjeva od korisnika
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        addTask(trim($_POST['task']), $filename);
    } elseif (isset($_POST['delete']) && is_numeric($_POST['delete'])) {
        deleteTask($_POST['delete'], $filename);
    }

    // Preusmjeravanje na istu stranicu nakon obrade POST zahtjeva
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$tasks = loadTasks($filename);

?>

<!-- HTML dio za prikaz i dodavanje zadataka -->
<!DOCTYPE html>
<html>
<head>
    <title>Todo Lista</title>
</head>
<body>
    <h1>Todo Lista</h1>
    <form method="post">
        <input type="text" name="task" placeholder="Dodaj novi zadatak">
        <button type="submit">Dodaj</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['task']); ?>
                <form method="post" style="display:inline;">
                    <button type="submit" name="delete" value="<?php echo $task['id']; ?>">Obriši</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
