<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Port Control</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .port-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .port-name {
      font-weight: bold;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 34px;
      height: 20px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 20px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 14px;
      width: 14px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: #4caf50;
    }

    input:checked + .slider:before {
      transform: translateX(14px);
    }

    button {
      width: 100%;
      padding: 10px;
      background: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Port Control</h2>
    <form method="POST">
      <?php foreach ($ports as $port): ?>
        <div class="port-row">
          <span class="port-name"><?= htmlspecialchars($port) ?></span>
          <label class="switch">
            <input type="checkbox" name="ports[<?= htmlspecialchars($port) ?>]">
            <span class="slider"></span>
          </label>
        </div>
      <?php endforeach; ?>
      <button type="submit">Save</button>
    </form>
  </div>
</body>
</html>
