<?php
// ----------------------
// Inclusion de la config
// ----------------------
include 'connexion.php';

// ----------------------
// Traitement des actions POST
// ----------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    // Ajouter une nouvelle tâche
    if ($action === "new") {
        $title = trim($_POST["title"] ?? '');
        if ($title !== '') {
            $stmt = $conn->prepare("INSERT INTO todo (title) VALUES (?)");
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Supprimer ou basculer une tâche (done / not done)
    elseif (($action === "delete" || $action === "toggle") && isset($_POST["id"])) {
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

    // Redirection après action
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
