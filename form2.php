<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visa Requirements</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #e0f2f1; 
      color: #333; 
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #263238; 
      padding: 40px 35px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      width: 350px;
      text-align: center;
    }

    h1 {
      font-size: 2rem;
      color: #ff7043; 
      margin-bottom: 20px;
      font-weight: 600;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); 
    }

    label {
      font-size: 1.2rem;
      color: #ffffff;
      margin-bottom: 10px;
      display: block;
    }

    select, button {
      padding: 12px 20px;
      font-size: 1.1rem;
      border-radius: 5px;
      border: 2px solid #ff7043; 
      width: 100%;
      margin-bottom: 20px;
      background-color: #37474f; 
      color: #ffffff;
      transition: all 0.3s ease;
    }

    select:hover, button:hover {
      background-color: #455a64; 
      border-color: #ff5722;
      cursor: pointer;
    }

    button {
      background-color: #ff7043; 
      color: #2e2e2e;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    button:hover {
      background-color: #ff5722; 
      transform: translateY(-3px);
    }

    .result {
      font-size: 1.2rem;
      margin-top: 20px;
      padding: 15px;
      background-color: #ffffff; 
      border-radius: 5px;
      color: #37474f; 
      font-weight: 600;
      display: inline-block;
      width: 100%;
      max-width: 300px;
      margin-top: 20px;
    }

    .error {
      color: #d32f2f;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Visa Requirements</h1>

   
    <form action="" method="POST">
      <label for="country">Select your country:</label>
      <select name="country" id="country">
        <option value="">Select a country</option>
        <option value="USA">United States</option>
        <option value="Canada">Canada</option>
        <option value="India">India</option>
        <option value="UK">United Kingdom</option>
        <option value="Australia">Australia</option>
      </select>
      <button type="submit">Submit</button>
    </form>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $country = $_POST['country'];
        
       
        $message = "";

        switch ($country) {
            case "USA":
                $message = "Visa required for most applicants.";
                break;
            case "Canada":
                $message = "Visa required unless you have an eTA.";
                break;
            case "India":
                $message = "Visa required before travel.";
                break;
            case "UK":
                $message = "Visa depends on the duration of stay.";
                break;
            case "Australia":
                $message = "eVisa available for eligible travelers.";
                break;
            default:
                $message = "Invalid country selection.";
        }

       
        echo '<div class="result">' . $message . '</div>';
    }
    ?>
  </div>

</body>
</html>
