<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visa Application Form</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fce4ec; 
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #ffeb3b; 
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 350px;
      text-align: center;
    }

    h1 {
      font-size: 1.8rem;
      color: #ff5722; 
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      font-size: 1.2rem;
      color: #673ab7; 
      margin-bottom: 8px;
      display: block;
    }

    input, select, button {
      width: 100%;
      padding: 12px;
      font-size: 1.1rem;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #9c27b0; 
      background-color: #fff3e0;
      color: #9c27b0; 
      transition: all 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #ff5722; 
      outline: none;
      box-shadow: 0 0 5px rgba(255, 87, 34, 0.7);
    }

    button {
      background-color: #ff5722;
      color: white;
      cursor: pointer;
      border: none;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    button:hover {
      background-color: #e64a19; 
      transform: translateY(-3px); 
    }

    .error {
      color: #d32f2f;
      font-size: 1rem;
      margin-top: 15px;
    }

    .success {
      color: #388e3c; 
      font-size: 1rem;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Visa Application</h1>

   
    <form action="" method="POST">
     
      <label for="name">Enter your full name:</label>
      <input type="text" id="name" name="name" required value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">

     
      <label for="passport">Passport Number:</label>
      <input type="text" id="passport" name="passport" required value="<?= isset($_POST['passport']) ? $_POST['passport'] : ''; ?>">

     
      <label for="country">Select your country:</label>
      <select id="country" name="country" required>
        <option value="">Select a country</option>
        <option value="USA" <?= (isset($_POST['country']) && $_POST['country'] == 'USA') ? 'selected' : ''; ?>>United States</option>
        <option value="Canada" <?= (isset($_POST['country']) && $_POST['country'] == 'Canada') ? 'selected' : ''; ?>>Canada</option>
        <option value="India" <?= (isset($_POST['country']) && $_POST['country'] == 'India') ? 'selected' : ''; ?>>India</option>
        <option value="UK" <?= (isset($_POST['country']) && $_POST['country'] == 'UK') ? 'selected' : ''; ?>>United Kingdom</option>
        <option value="Australia" <?= (isset($_POST['country']) && $_POST['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
      </select>

      
      <button type="submit">Apply for Visa</button>
    </form>

    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $name = trim($_POST['name']);
        $passport = trim($_POST['passport']);
        $country = $_POST['country'];

      
        $message = '';
        $messageClass = '';

      
        if (empty($name) || empty($passport) || empty($country)) {
            $message = 'All fields are required!';
            $messageClass = 'error';
        } elseif (strlen($passport) < 8 || strlen($passport) > 10) {
            $message = 'Invalid passport number!';
            $messageClass = 'error';
        } else {
            $message = 'Visa application submitted successfully!';
            $messageClass = 'success';
        }

     
        echo "<div class='$messageClass'>$message</div>";
    }
    ?>
  </div>

</body>
</html>
