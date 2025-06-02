<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🍓 Fruit Picker Section</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ffdde1, #ee9ca7, #f6d365);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      padding-top: 50px;
    }

    @keyframes gradientShift {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    .container {
      backdrop-filter: blur(18px);
      background: rgba(255, 255, 255, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 25px;
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
      padding: 40px;
      max-width: 800px;
      width: 95%;
    }

    h2 {
      text-align: center;
      font-size: 32px;
      margin-bottom: 30px;
      color: #ffffff;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.2);
    }

    .fruit-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 20px;
    }

    .fruit-card {
      background: rgba(255, 255, 255, 0.6);
      border-radius: 15px;
      padding: 15px;
      text-align: center;
      transition: 0.3s;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      cursor: pointer;
    }

    .fruit-card:hover {
      transform: scale(1.05);
      background: rgba(255, 255, 255, 0.8);
    }

    .fruit-card input[type="checkbox"] {
      transform: scale(1.3);
      margin-bottom: 8px;
    }

    .fruit-name {
      font-size: 18px;
    }

    input[type="submit"] {
      margin: 30px auto 0;
      display: block;
      background: #ff6b81;
      color: white;
      padding: 14px 30px;
      font-size: 16px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      transition: background 0.3s, transform 0.2s;
    }

    input[type="submit"]:hover {
      background: #ff4757;
      transform: scale(1.05);
    }

    .result {
      background: rgba(255, 255, 255, 0.85);
      margin-top: 30px;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .result ul {
      padding-left: 20px;
    }

    .result p {
      margin-top: 10px;
      font-style: italic;
    }

    footer {
      text-align: center;
      font-size: 14px;
      margin-top: 40px;
      color: #fff;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>

<div class="container">
  <h2>🍇 Fruit Picker Arcade</h2>

  <form method="post">
    <div class="fruit-grid">
      <?php
      $fruits = [
        "🍎 Apple", "🍌 Banana", "🥭 Mango", "🍊 Orange", "🍇 Grapes",
        "🍓 Strawberry", "🍍 Pineapple", "🍉 Watermelon"
      ];
      foreach ($fruits as $fruit) {
        echo '<label class="fruit-card">';
        echo '<input type="checkbox" name="fruits[]" value="'.$fruit.'">';
        echo '<div class="fruit-name">'.$fruit.'</div>';
        echo '</label>';
      }
      ?>
    </div>

    <input type="submit" name="submit" value="🎉 Show My Fruits!">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    if (!empty($_POST['fruits'])) {
      $selected = $_POST['fruits'];
      echo "<div class='result'>";
      echo "<strong>You picked:</strong><ul>";
      foreach ($selected as $fruit) {
        echo "<li>$fruit</li>";
      }
      echo "</ul>";

     
      
      if (in_array("🍍 Pineapple", $selected) && in_array("🍉 Watermelon", $selected)) {
        echo "<p>🍍 & 🍉? You've got tropical dreams!</p>";
      }
      if (count($selected) === count($fruits)) {
        echo "<p>🌈 You've collected them all — Fruit Master!</p>";
      } elseif (count($selected) >= 5) {
        echo "<p>🧺 A fruity feast! Bon appétit!</p>";
      } elseif (count($selected) === 1) {
        echo "<p>🎯Isa lang? pili ka pa isa para masarap!HAHHAHA</p>";
      } else {
        echo "<p>😋 wowowowow yan masarap na yan nakshie!</p>";
      }

      echo "</div>";
    } else {
      echo "<div class='result'><p>Please choose at least one fruit! 🍋</p></div>";
    }
  }
  ?>
</div>

<footer>
  🍒 Built with ♥ for your PHP Activity – Fruit Picker Arcade © 2025
</footer>

</body>
</html>
