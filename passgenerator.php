<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');

$length = filter_input(INPUT_GET, 'length', FILTER_VALIDATE_INT, ['options' => ['default' => 16, 'min_range' => 4, 'max_range' => 128]]);
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';
$password = '';
$chars_length = strlen($chars) - 1;

for ($i = 0; $i < $length; $i++) {
    $password .= $chars[random_int(0, $chars_length)];
}

if (filter_input(INPUT_GET, 'api', FILTER_VALIDATE_BOOLEAN)) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['password' => $password, 'length' => $length]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Password Generator</title>
    <style>
        body { font-family: system-ui, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; background-color: #f8f9fa; color: #212529; }
        .card { background: #fff; padding: 2.5rem; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); text-align: center; max-width: 400px; width: 90%; }
        h2 { margin-top: 0; }
        .password-box { font-family: ui-monospace, monospace; font-size: 1.5rem; background: #e9ecef; padding: 1rem; border-radius: 8px; margin: 1.5rem 0; word-break: break-all; user-select: all; cursor: pointer; }
        .btn { display: inline-block; background: #0d6efd; color: #fff; text-decoration: none; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: 500; transition: background 0.2s; }
        .btn:hover { background: #0b5ed7; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Password Generator</h2>
        <div class="password-box"><?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?></div>
        <a href="?length=<?php echo $length; ?>" class="btn">Generate Another</a>
    </div>
</body>
</html>
