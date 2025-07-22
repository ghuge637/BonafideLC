<?php
session_start();

if (isset($_SESSION['loggedin']) && isset($_SESSION['desk_no'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Section</title>
    <style>
        h1 {
            margin-top: 100px;
            font-size: 35px;
        }
        .content {
            flex-grow: 0.5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        button {
            padding: 15px 30px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
        <div id="header-container"></div>

    <div class="content">
        <label>Leaving Certificate Requests</label>
        <a href="../leaving_certificate/noDue/multi_section_actions.php">
            <button>Click me</button>
        </a>
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

<?php 
} else {
    echo "<script>alert('Please login...!');window.location.href = '../index.html';</script>";
}
?>
