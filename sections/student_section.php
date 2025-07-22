<?php
session_start();
// echo $_SESSION['desk_no'];

if (isset($_SESSION['loggedin']) && isset($_SESSION['desk_no'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Section</title>
    <style>

body{
    margin: 0;
}

.button-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 40px; /* Space between button groups */
    margin-top: 10%;
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
}

.button-group {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

button {
    padding: 15px 30px;
    font-size: 16px;
    color: black;
    background-color: #fff;
    border: 1px solid #000;
    border-radius: 5px;
    cursor: pointer;
    transition: box-shadow 0.3s ease, background-color 0.3s ease;
    width: 200px; /* Fixed width for consistency */
}

button:hover {
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.6);
}

a:link,
a:visited {
    color: black;
    text-decoration: none;
}

/* ============================ */
/* 🎯 Responsive Design - Mobile */
/* ============================ */

/* For screens smaller than 768px (Mobiles + Tablets Portrait) */
@media (max-width: 768px) {
    h1 {
        font-size: 24px;
    }

    .button-container {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    button {
        width: 100%;
        max-width: 300px;
    }
}

/* For ultra small devices like very small phones */
@media (max-width: 480px) {
    h1 {
        font-size: 22px;
    }

    button {
        font-size: 15px;
        padding: 12px 20px;
    }
}

    </style>
</head>
<body>
    <div id="header-container"></div>
    

    <div class="button-container">
        <div class="button-group">
            <label for="bonafide-button">Bonafide Requests</label>
            <a href="../bonafide/admin/admin_portal.php">
                <button id="bonafide-button">Bonafide</button>
            </a>
        </div>
        <div class="button-group">
            <label for="lc-button">Leaving Certificate Requests</label>
            <a href="../leaving_certificate/noDue/multi_section_actions.php">
                <button id="lc-button">Leaving Certificate</button>
            </a>
        </div>
        <div class="button-group">
            <label for="lc-button">Distribute Leaving Certificate Requests</label>
            <a href="../leaving_certificate/noDue/LC/ready_to_distributeLC.php">
                <button id="lc-button" type='submit'>Distribute</button>
            </a>
        
        </div>
    </div>

    <!-- show header using below script fetch code from header.html of logout folder -->
<script>
    function loadHeader() {
        fetch('../logout/header.html') // adjust path if needed
        .then(response => response.text())
        .then(data => {
            document.getElementById('header-container').innerHTML = data;
        })
        .catch(error => console.error('Header load error:', error));
    }
    loadHeader();
</script>


<!-- bellow script for perform logout operation basically its 
 fetch logout code from logout.php file and perform operation -->

<script>
  function logout() {
    fetch('../logout/logout.php', {
      method: 'POST',
      credentials: 'include'
    })
    .then(response => {
      if (response.ok) {
        window.location.href = '../index.php';
      } else {
        alert("Logout failed");
      }
    })
    .catch(error => console.error('Logout error:', error));
  }
</script>


</body>
</html>

<?php }
else{
  echo "<script>alert('plzz login...!');window.location.href = '../index.php';</script>"; }
  ?>