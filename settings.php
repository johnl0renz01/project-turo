<script src="https://cdn.tailwindcss.com"></script>

<?php
session_start();

$_SESSION['start'] = time(); // Taking now logged in time.
// Ending a session in 24hours from the starting time.
$_SESSION['expire'] = $_SESSION['start'] + (1440 * 60);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Settings</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            //REMEMBER OPTION BIRTHDATE
            //MONTH
            $(function() {
                if (localStorage.getItem('month')) {
                    $("#month option").eq(localStorage.getItem('month')).prop('selected', true);
                }

                $("#month").on('change', function() {
                    localStorage.setItem('month', $('option:selected', this).index());
                });
            }); 

            //DAY
            $(function() {
                if (localStorage.getItem('day')) {
                    $("#day option").eq(localStorage.getItem('day')).prop('selected', true);
                }

                $("#day").on('change', function() {
                    localStorage.setItem('day', $('option:selected', this).index());
                });
            });

            //Year
            $(function() {
                if (localStorage.getItem('year')) {
                    $("#year option").eq(localStorage.getItem('year')).prop('selected', true);
                }

                $("#year").on('change', function() {
                    localStorage.setItem('year', $('option:selected', this).index());
                });
            });


            //REMEMBER OPTION GENDER
            if(localStorage.selected) {
                $('#' + localStorage.selected ).attr('checked', true);
            }
            $('.radiobutton').click(function(){
                localStorage.setItem("selected", this.id);
            });
        });
    </script>
</head>
<body class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black" >
    <!-- ADDEDD to class (absolute, z-10)-->
    <header class="bg-transparent flex items-center justify-between px-8 py-4 absolute z-10">
        <h1 class="w-3/12">
            <a href="home_page.php">
              <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-100">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
            </svg>
            </a>
        </h1>
        
      </header>

    <!-- ADDEDD to new div, and changed main class (absolute top-0 bottom-0 left-0 right-0 m-auto)-->
    <main class="absolute top-0 bottom-0 left-0 right-0 m-auto">
        <div class=" flex items-center justify-center h-screen py-4 ">
            
            <section class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black p-6 rounded-lg  hover:shadow-orange-700 shadow-2xl ">
                <form autocomplete="off" method="POST">
                    <h2 class="text-white text-xl">Settings</h2>
                    <p class="text-white mb-2">Choose one to modify.</p>
                    <hr >
                    <br>
                    <!--Input section start-->
                    <div>
                        <style>
                            .heading {
                                display: flex;
                                justify-content: space-between;
                                flex-direction: row;
                                }
                                .heading:before, h1:after{
                                content: "";
                                flex: 1 1;
                                border-bottom: 1px solid;
                                color: white;
                                margin: auto;
                                }
                                .heading:before {
                                margin-right: 2px
                                }
                                .heading:after {
                                margin-left: 2px
                            }
                        </style>

                            <?php 
                            /*
                            $conn = new mysqli('localhost','root','','turo');
                            $current_user = $_SESSION['Username'];
                            $sql = "SELECT * FROM $current_user ORDER BY RowID ASC";
                            $result = mysqli_query($conn, $sql);
                     
    
                                 if ($result->num_rows > 0) {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     
                                   }
                                 }
                            */
     
                            
                            ?>


                        <div class="flex justify-between pb-1">
                            <p class="text-orange-400 text-md font-semibold -mt-2 px-2">Name</p>
                            <div class="flex-grow bg bg-gray-300 h-0.5 mt-1.5 mr-2"></div>
                            <i id="name_plus" class="fa fa-plus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="name_show()"></i>
                            <i id="name_minus" class="hidden fa fa-minus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="name_hide();show_display_btn();"></i>
                        </div>
                        <div id="change_name" disabled="disabled" class="hidden bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 px-4 py-1 rounded-lg  hover:shadow-orange-700">
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">First Name: </p>
                            <input type="text" id="FirstName" name="FirstName" class="col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php echo $_SESSION['FirstName'];?>">
                            </div>
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">Last Name: </p>
                            <input type="text" id="LastName" name="LastName" class="col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                            value="<?php echo $_SESSION['LastName'];?>">
                            </div>
                        
                        </div>

                        <br>
                        <div class="flex justify-between pb-1">
                            <p class="text-orange-400 text-md font-semibold -mt-2 px-2">Username</p>
                            <div class="flex-grow bg bg-gray-300 h-0.5 mt-1.5 mr-2"></div>
                            <i id="username_plus" class="fa fa-plus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="username_show()"></i>
                            <i id="username_minus" class="hidden fa fa-minus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="username_hide();show_display_btn();"></i>
                        </div>
                        <div id="change_username" disabled="disabled" class="hidden bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 px-4 py-1 rounded-lg  hover:shadow-orange-700">
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">Username: </p>
                            <input type="text" id="Username" name="Username" class=" col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php echo $_SESSION['Username'];?>">
                            </div>
                        </div>

                        <br>

                        <div class="flex justify-between pb-1">
                            <p class="text-orange-400 text-md font-semibold -mt-2 px-2">Email Address</p>
                            <div class="flex-grow bg bg-gray-300 h-0.5 mt-1.5 mr-2"></div>
                            <i id="email_plus" class="fa fa-plus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="email_show()"></i>
                            <i id="email_minus" class="hidden fa fa-minus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="email_hide();show_display_btn();"></i>
                        </div>
                        <div id="change_email" disabled="disabled" class="hidden bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 px-4 py-1 rounded-lg  hover:shadow-orange-700">
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">Email : </p>
                            <input type="text" id="Email" name="Email" class="col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php echo $_SESSION['Email'];?>">
                            </div>
                        </div>

                        <br>
                        <div class="flex justify-between pb-1">
                            <p class="text-orange-400 text-md font-semibold -mt-2 px-2">Password</p>
                            <div class="flex-grow bg bg-gray-300 h-0.5 mt-1.5 mr-2"></div>
                            <i id="password_plus" class="fa fa-plus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="password_show()"></i>
                            <i id="password_minus" class="hidden fa fa-minus text-white h-0.5 pr-2 cursor-pointer hover:text-orange-400" onClick="password_hide();show_display_btn();"></i>
                        </div>
                        <div id="change_password" disabled="disabled" class="hidden bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 px-4 py-1 rounded-lg  hover:shadow-orange-700">
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">Old Pass: </p>
                            <input type="password" id="PasswordOld" name="PasswordOld" class="col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php ?>">
                            </div>
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">New Pass: </p>
                            <input type="password" id="Password" name="Password" class=" col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php ?>">
                            </div>
                            <div class="grid grid-cols-4 my-3">
                            <p class="text-white text-md form-group pr-1">Confirm Pass: </p>
                            <input type="password" id="ConfirmPassword" name="ConfirmPassword" class="col-span-3  text-black border-2 w-full border-gray-400 rounded-md px-3 text-md" 
                                value="<?php ?>">
                            </div>
                            
                        </div>
   
                        
                    <!--Input section end-->
                    <!--Button sign up start-->
                    <input type="submit" value="Apply Changes" name="" id="btn_display" disabled="disabled" class="inline-block w-120 mt-4 px-6 py-2 border-2 border-gray-600 text-gray-100 font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-gray-300 to-gray-600">
                    <input type="submit" value="Apply Changes" name="submit_name" id="btn_name" disabled="disabled" class="hidden cursor-pointer w-120 mt-4 px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-300 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50">
                    <input type="submit" value="Apply Changes" name="submit_username" id="btn_username" disabled="disabled" class="hidden cursor-pointer w-120 mt-4 px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-300 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50">
                    <input type="submit" value="Apply Changes" name="submit_email" id="btn_email" disabled="disabled" class="hidden cursor-pointer w-120 mt-4 px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-300 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50">
                    <input type="submit" value="Apply Changes" name="submit_password" id="btn_password" disabled="disabled" class="hidden cursor-pointer w-120 mt-4 px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-300 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50">
                    
                        
                    <!--Button sign up ends-->
                </form>  
            </section>
        </div>
    </main>

    <script>
                            //NAME

                            function show_display_btn() {
                                document.getElementById("btn_display").style.display = "block";
                            }

                            function name_show() {          
                                document.getElementById("btn_display").style.display = "none";
                                document.getElementById("btn_name").style.display = "block";
                                document.getElementById("btn_name").disabled = false;
                                document.getElementById("FirstName").required = true;
                                document.getElementById("LastName").required = true;

                                document.getElementById("change_name").style.display = "block";
                                document.getElementById("name_minus").style.display = "block";
                                document.getElementById("name_plus").style.display = "none";   
                                

                                username_hide();
                                email_hide();
                                password_hide();
                            }

                            function name_hide() {
                                document.getElementById("btn_name").style.display = "none";
                                document.getElementById("btn_name").disabled = true;
                                document.getElementById("FirstName").required = false;
                                document.getElementById("LastName").required = false;

                                document.getElementById("name_plus").style.display = "block";
                                document.getElementById("name_minus").style.display = "none";
                                document.getElementById("change_name").style.display = "none";
                            }

                            //USERNAME
                            function username_show() {
                                document.getElementById("btn_display").style.display = "none";
                                document.getElementById("btn_username").style.display = "block";
                                document.getElementById("btn_username").disabled = false;
                                document.getElementById("Username").required = true;

                                document.getElementById("change_username").style.display = "block";
                                document.getElementById("username_minus").style.display = "block";
                                document.getElementById("username_plus").style.display = "none";
                                name_hide();
                                email_hide();
                                password_hide();
                            }

                            function username_hide() {
                                document.getElementById("btn_username").style.display = "none";
                                document.getElementById("btn_username").disabled = true;
                                document.getElementById("Username").required = false;

                                document.getElementById("username_plus").style.display = "block";
                                document.getElementById("username_minus").style.display = "none";
                                document.getElementById("change_username").style.display = "none";
                            }

                            //EMAIL
                            function email_show() {
                                document.getElementById("btn_display").style.display = "none";
                                document.getElementById("btn_email").style.display = "block";
                                document.getElementById("btn_email").disabled = false;
                                document.getElementById("Email").required = true;

                                document.getElementById("change_email").style.display = "block";
                                document.getElementById("email_minus").style.display = "block";
                                document.getElementById("email_plus").style.display = "none";
                                name_hide();
                                username_hide();
                                password_hide();
                            }

                            function email_hide() {
                                document.getElementById("btn_email").style.display = "none";
                                document.getElementById("btn_email").disabled = true;
                                document.getElementById("Email").required = false;

                                document.getElementById("email_plus").style.display = "block";
                                document.getElementById("email_minus").style.display = "none";
                                document.getElementById("change_email").style.display = "none";
                            }
                            
                             //PASSWORD
                            function password_show() {
                                document.getElementById("btn_display").style.display = "none";
                                document.getElementById("btn_password").style.display = "block";
                                document.getElementById("btn_password").disabled = false;
                                document.getElementById("PasswordOld").required = true;
                                document.getElementById("Password").required = true;
                                document.getElementById("ConfirmPassword").required = true;

                                document.getElementById("change_password").style.display = "block";
                                document.getElementById("password_minus").style.display = "block";
                                document.getElementById("password_plus").style.display = "none";
                                name_hide();
                                username_hide();
                                email_hide();
                            }

                            function password_hide() {
                                document.getElementById("btn_password").style.display = "none";
                                document.getElementById("btn_password").disabled = true;
                                document.getElementById("PasswordOld").required = false;
                                document.getElementById("Password").required = false;
                                document.getElementById("ConfirmPassword").required = false;

                                document.getElementById("password_plus").style.display = "block";
                                document.getElementById("password_minus").style.display = "none";
                                document.getElementById("change_password").style.display = "none";
                            }



                            </script>
    
</body>
</html>

<?php
    
    $success = FALSE;
    $conn = new mysqli('localhost','root','','turo');
    $id = $_SESSION['UserID'];
    $Username = $_SESSION['Username'];
    $Username = strtolower($Username);
    $Email = $_SESSION['Email'];

    if(isset($_POST['submit_name'])){
        $FirstNameNew = $_POST['FirstName'];
        $LastNameNew = $_POST['LastName'];
        $query_name = mysqli_query($conn, "UPDATE userinfo SET FirstName='$FirstNameNew', LastName='$LastNameNew' WHERE UserID='$id'");
        echo '<script language="javascript">';
        echo 'alert("Changes have been applied to name.");';
        echo 'location.href="home_page.php"';
        echo '</script>';
        $_SESSION['FirstName'] = $FirstNameNew;
        $_SESSION['LastName'] = $LastNameNew;
        $success = TRUE;
    }

    if(isset($_POST['submit_username'])){
        $UsernameNew = $_POST['Username'];
        
        $duplicate_user = mysqli_query($conn, "SELECT * FROM userinfo WHERE username = '$UsernameNew'");
        if(mysqli_num_rows($duplicate_user) > 0){
            echo"<script> alert('Username must be different from previous or Username has already taken'); </script>";
        } else {
            //$query_username = mysqli_query($conn, "UPDATE userinfo SET Username='$UsernameNew' WHERE UserID='$id'");
            //$querytable = mysql_query("RENAME TABLE `".$Username."` TO `".$UsernameNew ."`" );
            echo '<script language="javascript">';
            echo 'alert("Changes have been applied to username.");';
            echo 'location.href="home_page.php"';
            echo '</script>';
            
            $_SESSION['Username'] = $UsernameNew;
            $success = TRUE;
        }
    }

    if(isset($_POST['submit_email'])){
        $EmailNew = $_POST['Email'];
        $duplicate_email = mysqli_query($conn, "SELECT * FROM userinfo WHERE Email = '$EmailNew'");
        if(mysqli_num_rows($duplicate_email) > 0){
            echo"<script> alert('Email must be different from previous or Email has already taken'); </script>";
        } else {
            $query_email = mysqli_query($conn, "UPDATE userinfo SET Email='$EmailNew' WHERE UserID='$id'");
            echo '<script language="javascript">';
            echo 'alert("Changes have been applied to email.");';
            echo 'location.href="home_page.php"';
            echo '</script>';
            $_SESSION['Email'] = $EmailNew;
            $success = TRUE;
        }

    }

    if(isset($_POST['submit_password'])){
        $PasswordOld = $_POST['PasswordOld'];
        $ConfirmPassword = $_POST['ConfirmPassword'];
        $Passwordword = $_POST['Password'];
        $valid_oldpassword = mysqli_query($conn, "SELECT * FROM userinfo WHERE Password='$PasswordOld'");
        if(mysqli_num_rows($valid_oldpassword) > 0){
            if($Passwordword === "") {
                exit();
            }
            if($Passwordword == $ConfirmPassword){
                $query_password = mysqli_query($conn, "UPDATE userinfo SET Password='$Old' WHERE UserID='$id'");
                echo '<script language="javascript">';
                echo 'alert("Changes have been applied to password.");';
                echo 'location.href="home_page.php"';
                echo '</script>';
                $_SESSION['Password'] = $Passwordword;
                $success = TRUE;
            } else {
                echo"<script> alert('New Password and Confirm Password Does Not Match'); </script>";
            }
        } else {
            echo"<script> alert('Old password does not exist.'); </script>";
            exit();
            
        }
    }
    
    if ($success == TRUE) {
        header("Location: home_page.php");
        exit;
    }
?>


