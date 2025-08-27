<?php
$data = json_decode(file_get_contents("php://input"), true);

if ($data && isset($data["name"]) && isset($data["message"])) {
    $file = "comments.json";
    if (!file_exists($file)) {
        file_put_contents($file, "[]");
    }

    $comments = json_decode(file_get_contents($file), true);

    $comments[] = [
        "name" => htmlspecialchars($data["name"]),
        "message" => htmlspecialchars($data["message"]),
        "date" => date("d.m.Y H:i")
    ];

    file_put_contents($file, json_encode($comments, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
?>
