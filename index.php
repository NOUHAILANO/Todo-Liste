<?php
// ----------------------
// Inclusion de la config
// ----------------------
include 'config/connexion.php';


// ----------------------
// Traitement des actions POST
// ----------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;


    if ($action === "new") {
        $title = trim($_POST["title"] ?? '');
        if ($title !== '') {
            $stmt = $conn->prepare("INSERT INTO todo (title) VALUES (?)");
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $stmt->close();
        }
    } elseif (($action === "delete" || $action === "toggle") && isset($_POST["id"])) {
        $id = (int)$_POST["id"];

        if ($action === "delete") {
            $stmt = $conn->prepare("DELETE FROM todo WHERE id = ?");
        } else {
            $stmt = $conn->prepare("UPDATE todo SET done = 1 - done WHERE id = ?");
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }


    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// ----------------------
// Lecture des tâches
// ----------------------
$taches = [];
$res = $conn->query("SELECT id, title, done, created_at FROM todo ORDER BY created_at DESC");

if ($res) {
    while ($row = $res->fetch_assoc()) {
        $row["id"] = (int)$row["id"];
        $row["done"] = (int)$row["done"];
        $taches[] = $row;
    }
    $res->free();
}

$conn->close();
?>
<?php require_once 'config\connexion.php'; ?>
<?php include 'front-end\includes\header.php'; ?>
<?php include 'front-end\templates\add-task-form.php'; ?>
<?php include 'front-end\templates\tasks-list.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="front-end/public/style.css">
</head>

<body>

</body>

</html>