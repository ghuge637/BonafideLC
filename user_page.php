<?php
session_start();

if (isset($_SESSION['stud_id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificates</title>
  <style>
    /* Lock scroll */
    html, body {
      overflow: hidden;
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: "Segoe UI", Roboto, sans-serif;
    }

    /* Background image */
    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.saymedia-content.com/.image/t_share/MTkyOTkyMzE2OTQ3MjQ0MjUz/website-background-templates.jpg') no-repeat center center;
      background-size: cover;
      z-index: -2;
    }

    /* Blur effect */
    .blur-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.1);
      z-index: -1;
    }

    /* Content Container */
    .content {
      position: absolute;
      top: 30vh;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      width: 100%;
      max-width: 600px;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: black;
    }

    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
      width: 100%;
      max-width: 400px;
      margin: 0 auto;
    }

    button {
      width: 100%;
      max-width: 200px;
      padding: 15px;
      font-size: 16px;
      color: black;
      background-color: rgb(251, 238, 53);
      border: 1px solid black;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.4);
    }

    /* Mobile View Fix: Top 30% */
    @media screen and (max-width: 600px) {
      .content {
        top: 30vh;
      }

      button {
        width: 100%;
        max-width: 300px;
        font-size: 14px;
        padding: 12px;
      }

      .button-container {
        flex-direction: column;
        gap: 15px;
      }
    }
  </style>
</head>
<body>
          <div id="header-container"></div>  <!-- div for header content  -->

  <div class="background"></div>
  <div class="blur-overlay"></div>

  <div class="content">
    <h1>Apply for Certificates</h1>
    <div class="button-container">
      <a href="bonafide/user/apply.php"><button>Bonafide</button></a>
      <a href="leaving_certificate/userLc/apply_lc.php"><button>Leaving Certificate</button></a>
    </div>
  </div>
   <!-- show header using below script fetch code from header.html of logout folder -->
<script>
    function loadHeader() {
        fetch('logout/header.html') // adjust path if needed
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
    fetch('logout/logout.php', {
      method: 'POST',
      credentials: 'include'
    })
    .then(response => {
      if (response.ok) {
        window.location.href = 'index.php';
      } else {
        alert("Logout failed");
      }
    })
    .catch(error => console.error('Logout error:', error));
  }
</script>

</body>
</html>

<?php
} else {
    echo "YOU TRYING TO HACK THE SYSTEM AND THAT IS NOT ALLOWED...!";
}
?>
