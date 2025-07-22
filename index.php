<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
    <style>
        /* General Styles */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    /* height: 100vh;
      background-color: #0b0f1a;
      overflow: hidden; */
    background-size: cover;
    background-attachment: fixed;
}
.background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to top, #f7f7f7, #7da2a9); /* gradient base */
      z-index: 0;
    }

    svg {
      width: 100%;
      height: 100%;
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1;
    }

    polygon {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    /* polygon:hover {
      transform: translateY(-5px) rotate(3deg);
      filter: drop-shadow(0 0 15px rgba(0, 0, 0, 0.2));
    } */

        /* Mobile Frame */
        .mobile-frame {
            width: 23%;
            height: min(90vh, 650px); /* Adapts based on screen height */
            min-height: 500px; /* Prevents shrinking too much */
            max-height: 95vh; /* Ensures it doesn’t exceed viewport */
            background: linear-gradient(to bottom, #f7f7f7, #7da2a9);
            border-radius: 40px;
            border: 8px solid rgb(0,0,0);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6); */
            overflow: hidden;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .mobile-frame {
                width: 90%;
                height: min(85vh, 600px);
            }
        }

        @media screen and (max-width: 480px) {
            .mobile-frame {
                width: 95%;
                height: min(90vh, 580px);
            }
        }


        /* Notch */
        .notch {
            width: 150px;
            height: 30px;
            background: rgb(0, 0, 0);
            border-radius: 15px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: inset 0 0 5px rgba(255, 255, 255, 0.3);
        }

        /* Bottom Speaker */
        .bottom-speaker {
            width: 100px;
            height: 6px;
            background: rgb(0, 0, 0);
            border-radius: 3px;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: inset 0 0 5px rgba(255, 255, 255, 0.3);
        }

        /* Login Form (Transparent) */
        .login-container {
            width: 85%;
            /* background: rgba(255, 255, 255, 0.1); */
            backdrop-filter: blur(10px); /* Glass effect */
            padding: 20px;
            /* border-radius: 15px; */
            text-align: center;
            /* box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2); */
            margin-top: 60px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 15px;
            font-size: 22px;
            /* color: bl; */
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-size: 14px;
            margin-top: 10px;
            /* color: white; */
        }

        input, select {
            width: 94S%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.2);
            /* color: white; */
            outline: none;
            transition: background 0.3s ease;
        }

        input:focus, select:focus {
            background: rgba(255, 255, 255, 0.3);
        }

        select option {
            background-color: black;
            color: white;
        }

        input::placeholder {
            color: rgba(0, 0, 0, 0.7);
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.3);
            /* color: white; */
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
            border: 2px solid black;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 15px black;
        }

        /* Forgot Password Link */
        .forgot-password {
            margin-top: 10px;
            font-size: 14px;
            color: rgb(0, 21, 255);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: rgb(121, 87, 255);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .mobile-frame {
                width: 90%;
                height: 85vh;
            }
        }

        @media screen and (max-width: 480px) {
            .mobile-frame {
                width: 95%;
                height: 90vh;
            }

            .login-container {
                width: 90%;
                padding: 15px;
            }

            button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
<div class="background">
    <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <!-- <polygon points="0,0 50,0 25,50" fill=" #7b98a0" /> -->
      <polygon points="50,0 100,0 75,50" fill=" #a9bbc1" />
      <polygon points="0,0 25,50 0,100" fill=" #95afb6" />
      <polygon points="25,50 50,100 0,100" fill=" #95afb6" />
      <!-- <polygon points="25,50 75,50 50,100" fill=" #819ba2" />
      <polygon points="75,50 100,100 50,100" fill=" #536a6f" /> -->
      <polygon points="100,0 100,100 75,50" fill=" #a9bbc1" />
    </svg>
  </div>

    <div class="mobile-frame">
        <div class="notch"></div>
        <div class="login-container">
            <h2>Login</h2>
            <form action="" method="POST">
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select role</option>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                </select>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>

                <button type="submit" name="login">Login</button>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </form>
        </div>
        <div class="bottom-speaker"></div>
    </div>

</body>
</html>

<?php
// Include database connection
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate role and authenticate user
    if ($role === 'student') {
        $sql = "SELECT * FROM students WHERE prnno = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
    
            if ($password === $row['studdob']) {
                $_SESSION['stud_id'] = $row['prnno'];
                // $_SESSION[]

                echo "<script>alert('Loging successfull');</script>";
                echo "<script>window.location.href = 'user_page.php';</script>";

            }
            else {
                echo "<script>alert('Incorrect password');</script>";
                }
        }
        else { 
            echo "<script>alert('Incorrect Username');</script>"; 
        }
    } 
    
    elseif ($role === 'staff') {
        $sql = "SELECT * FROM desks WHERE user_id = '$username'"; 

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

                            if ($password === $row['password']) {
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $row['user_id'];
                                $_SESSION['role'] = $role;
                                $_SESSION['desk_no'] = $row['desk_no'];
                                $desk = $row['desk_no'];
                                    
                                    switch ($desk) {
                                    
                                        case 1:
                                            
                                            echo "<script>window.location.href = 'sections/student_section.php';</script>";
                                            break;
                                        
                                        default:
                                            echo "<script>window.location.href = 'leaving_certificate/noDue/multi_section_actions.php';</script>";
                                            break;
                                    }
                                }else {
                                    echo "<script>alert('Incorrect password');</script>";
                                    }

                            } else { echo "<script>alert('Incorrect Username');</script>"; }
            }
        } 


?>
