<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT staff.staffID, staff_emails.staff_email, staff.password, staff_firstName, staff_lastName, is_admin FROM staff
        INNER JOIN staff_emails on staff.staffID = staff_emails.staffID
        WHERE staff_email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $firstname, $lastname, $isAdmin);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            if($isAdmin == 1){
                                $roleRes = mysqli_query($conn,
                                    "SELECT roles.* FROM roles
                                    INNER JOIN administrator ON administrator.admin_rule = roles.roleID
                                    WHERE administrator.staffID = '$id'");
                                $admin_data = mysqli_fetch_array($roleRes);
                                $_SESSION["adminPos"] = $admin_data["role_pos"];
                            }else{
                                $_SESSION["adminPos"] = 0;
                            }
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstname"] = $firstname; 
                            $_SESSION["lastname"] = $lastname; 
                            $_SESSION["adminRole"] = $isAdmin;   
                                                    
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($conn);
}
?>

<div class="flex flex-col h-screen">
  <?php include "header.php"; ?>
  <div class="flex justify-center min-h-[80%] h-[80%] flex-grow items-center">
    <div class="w-[20%] h-fit items-center bg-sky-500 rounded-2xl py-10 px-5 border-1 shadow-lg">
      <form class="flex flex-col gap-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 class="text-center text-4xl font-bold mb-8">Staff Login</h1>
        <label for="student_id">Email</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $username_err;?></span>
        <input class="rounded-md" type="text" name="username" id="username">

        <label for="first_name">Password</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $password_err;?></span>
        <input class="rounded-md" type="text" name="password" id="password">

        <input class="submit px-4 py-2 text-stone-100 text-lg bg-gradient-to-br from-sky-600 to-sky-800 rounded-xl mt-3 cursor-pointer shadow-gray-900 shadow-md hover:text-stone-200 hover:font-semibold hover:shadow-sm hover:shadow-gray-700" type="submit" name="submit" value="Login" />

      </form>
    </div>
  </div>
  <?php @ require_once ("footer.php"); ?>
</div>