<script src="https://cdn.tailwindcss.com"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Login Page</title>
</head>
<!--class="bg-[url('../img/mainBG.png')] bg-no-repeat bg-cover"-->
<body class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black">
<header class="bg-transparent   flex items-center justify-between px-8 py-4">
  <h1 class="w-3/12">
      <a href="_HomePage.html">
        <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-100">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
      </svg>
      </a>
  </h1>
  
</header>
  
  <main class=" flex items-center justify-center h-screen ">
   
    <section class=" bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black p-6 rounded-lg  hover:shadow-orange-700 shadow-2xl">
      
      <!--for Login Form-->
      <div class="flex justify-center text-center">
        <h1 class="text-2xl text-white font-sans pb-3">Login your account</h1>
      </div>

      <!--For inputs-->
      <div class="flex items-center justify-center">
        <form action="login.php" method="post" class="w-96">
          <?php if (isset($_GET['error'])) { ?>
     	    	<p class="error"><?php echo $_GET['error']; ?></p>
         	<?php } ?>
          <div class="mb-4 mt-2">
            <input type="text" id="Username" name="Username" placeholder="Username" required class="border-2 border-gray-400 rounded-md  w-full px-4 py-1.5"><br>
          </div>

          <div class="mb-4">
            <input type="Password" id="Password" name="Password" placeholder="Password" required class=" border-2 border-gray-400 rounded-md px-4 py-1.5 w-full" ><br>
          </div>
          
          <!--Login Button-->
          <div class="text-center pt-1 pb-1 rounded-md">
            <input type="submit" value="Login" class="inline-block w-full px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-500 to-yellow-600 hover:from-green-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50 ">
            
          </div>
          
          <br>

          <!--For forgot Password align-->
          <div class="flex items-center justify-end text-blue-300 font-semibold">
          <a href="#" class="hover:text-blue-500">Forgot password</a>
          </div>
        

          <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
              <span class="bg-white px-4 text-sm text-gray-500">OR</span>
            </div>
          </div>
          
          <div class="text-center pt-1 pb-1 rounded-md">
            <h2 class="text-orange-100">Doesn't have an Account?</h2><br>
        </form>

        <!--Sign Up button-->

          <a href="_sign_Up_Page.html" class="inline-block w-full px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-500 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50"> Sign up</a>
        
      </div>
      </div>

    </section>
  </main>

</body>
</html>



<?php 
session_start(); 
include "db-connector.php";

if (isset($_POST['Username']) && isset($_POST['Password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$Username = validate($_POST['Username']);
	$Password = validate($_POST['Password']);

	if (empty($Username)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($Password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM userinfo WHERE Username='$Username' AND Password='$Password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $Username && $row['Password'] === $Password) {
            	$_SESSION['Username'] = $row['Username'];
            	$_SESSION['FirstName'] = $row['FirstName'];
            	$_SESSION['UserID'] = $row['UserID'];
            	header("Location: restaurant.php");
		        exit();
            }else{
				echo '<script>alert("Incorrect Username or Password. Please try again.")</script>';
		        exit();
			}
		}else{
			echo '<script>alert("Incorrect Username or Password. Please try again.")</script>';
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

