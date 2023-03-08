<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<?php 
ob_start();
session_start();

//USED to redirect to previous page after logging in
$_SESSION['CurrentPage'] = "home_page.php";
$_SESSION['CurrentTab'] = "";

unset($_SESSION['SearchKey']);
$_SESSION['count'] = 1;

if (isset($_SESSION['UserID']) && isset($_SESSION['Username'])) {
  $login = TRUE;
} else {
  $login = FALSE;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel = "icon" href = "./img/logo.png" type = "image/x-icon">

    <link rel="stylesheet" href="./dist/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Home</title>
    <script>
      localStorage.clear();
    </script>
</head>
<body >
    
    <header class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black shadow-md border-2 border-black  flex items-center justify-between px-8 py-4">
        <h1 class="w-3/12">
          <a href="home_page.php">    
              <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-100">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
            </svg>
            </a>
        </h1>

          <!-- buttons --->
          <div class="w-3/12 flex justify-end">               
              <ul>
                <li class="py-1 nav font-semibold text-lg text-white hover:text-orange-500 duration-200 cursor-pointer active">
                  <!-- DROPDOWN -->
                    <div x-data="{ dropdownOpen: false }" class="inline">
                      <a @click="dropdownOpen = !dropdownOpen" class="cursor-pointer">
                        <?php 
                          if($login == TRUE) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 26" stroke-width="1.5" stroke="currentColor" class="h-8 text-white hover:text-orange-500 duration-200 inline items-end mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>';
                            echo $_SESSION['FirstName']; 
                          } else {
                            echo '<a href="login.php">Login </a>'; 
                          }
                        ?>
                      </a>

                      <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                      <div x-show="dropdownOpen" class="absolute right-8 mt-3 py-2 w-32 bg-gray-100 rounded-md shadow-xl z-20">
                            <a href="settings.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Settings
                            </a>
                            <a id="favorites" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Favorites
                            </a>
                            <a href="logout.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Sign Out   
                            </a>
                      </div>
                    </div>
                </li>
              </ul>
            </a>        
          </div>
    </header>
   
      <main class=" h-screen grid grid-rows-2 ">   
        <section>

        <!-- BOOKMARK MODAL START-->
        <?php
              if ($login){
                $user_database = $_SESSION['Username'];
                //lower case
                $user_database = strtolower($user_database);
                $conn = new mysqli('localhost','root','','turo');
                $sql_favorites = "SELECT * FROM $user_database";
                $result_favorites = mysqli_query($conn, $sql_favorites);

                $j = 0;
                $_SESSION['BookmarkCode'] = array();
                $_SESSION['BookmarkAlias'] = array();
                
                if ($result_favorites->num_rows > 0) {
                  
                  while($row = mysqli_fetch_assoc($result_favorites)) {
                  
                    $col1=$row['restaurant_bookmark'];
                    array_push($_SESSION['BookmarkCode'],$col1);    
                    $col2=$row['restaurant_alias'];
                    array_push($_SESSION['BookmarkAlias'],$col2); 
                }
                }
            ?>

            <!-- MODAL FOR REVIEW -->
            <div id="favorites_modal" class="modal " tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
                  <div class="modal-content  pb-10 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black relative hover:shadow-lg hover:shadow-orange-500 ">
                      <div class="modal-header ">
                        <h5 class="modal-title text-xl font-bold text-white ">
                             Favorites
                        </h5>
                        <button onClick="close_option()" type="button" class="close text-xl font-bold text-white"  data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="mx-6 pb-1 modal-body bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 relative shadow-lg">
                        <h5 class="text-gray-200 text-lg font-semibold -mt-2 text-center pb-2 underline underline-offset-4">Bookmarked Restaurant(s)</h5>
                        <form method="POST">
                          <input class="hidden" type="text" id="resultbookmark" name="resultbookmark">

                          <!-- DISPLAY ALL BOOKMARKED RESTAURANT-->
                          <?php 
                            for($j; $j < count($_SESSION['BookmarkAlias']) ; $j++) {
                          ?>
                          
                          <!-- Index should always be equal to 0-->
                          <button id="b<?php echo $j;?>" name="submit" type="submit" class="rounded-lg flex gap-x-4 pt-1 w-full hover:bg-yellow-600 hover:drop-shadow-lg cursor-pointer 
                          text-center fas fa-star text-warning pl-2 text-xl text-white pb-1">
                          <?php echo $_SESSION['BookmarkAlias'][$j]?>
                          </button>     
                        <?php
                          }
                        ?>
                        </form>
                        <!---->
                        <!--UNUSED DESIGN-->
                        <?php
                        /*
                        <div class="rounded-lg grid grid-cols-6 mx-4 pt-1 hover:bg-yellow-600 cursor-pointer">
                          <div class="text-center"><i class="fas fa-star text-warning mt-1"></i></div>
                          <div class="col-span-5"><p class="text-lg text-white pb-1">Ying Yang fu</p></div>
                        </div>
                        */
                        ?>
                      </div>
                  </div>
                </div>
            </div>

            <!-- CLOSING IF LOG-INed -->
            <?php
             }
            ?>
            <script>
               $('#favorites').click(function(){
                $('#favorites_modal').modal('show');
              });

            </script>

            <script type="text/javascript">
              const buttons = document.getElementsByTagName("button");
              const resultbookmark = document.getElementById("resultbookmark");

              const buttonHovered = e => { 
                  var name = `${e.target.id}`;
                  name = name.substring(1);
                  document.getElementById("resultbookmark").value = name;

                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                    
                      }
                  };
                  xhttp.open("POST", "./restaurant_overview.php", true);
                  xhttp.send(); 
              }   
              for (let button of buttons) {
                  button.addEventListener("mouseover", buttonHovered);
              }
            </script>

            <?php
              if (isset($_POST['submit'])) {
                $int = (is_numeric($_POST['resultbookmark']) ? (int)$_POST['resultbookmark'] : -1);
                $index = $int;

                echo "<h1>".$index."</h1>";
                $RestaurantID = $_SESSION['BookmarkCode'][$index];
                $_SESSION['DatabaseName'] = $RestaurantID;
                $_SESSION['Previous'] = "";

                if (isset($_SESSION['DatabaseName'])) {
                    header("Location: restaurant_overview.php");
                    exit();
                }
              }
          ?>

            <!-- YELLOW COLOR OF STAR-->
           <style>
              .star-light {
                color:#e9ecef;
              }

              .text-warning {
                color:#ffc107!important
              }
              a.text-warning:focus,a.text-warning:hover {
                color:#d39e00!important
              }
            </style>
    <!---->   

          <!-- END CODE FOR BOOKMARKS-->




          <div class="w-full h-full">
          <div class="bg-[url('./img/Page1.jpg')] bg-cover bg-bottom   text-white w-full h-full flex text-center items-center justify-center ">  
          </div>
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 flex justify-center items-center backdrop-blur-lg backdrop-brightness-50  ">
              <h1 class="m-2 text-white"> <span class="font-bold text-7xl text-orange-500">TURO </span> <span class="font-semibold text-5xl"> in Mall of asia </span><br> 
              <span class="font-medium text-2xl ml-5">Discover the best restaurants in mall of asia</span></h1>        
            </div>
          </div>
          
          

            <!-- For bot-->
            <div class=" bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black w-full h-full flex justify-around text-center text-2xl  text-white">
                
                <div class="mt-32 justify-center">          
                    <a href="search_page.php">
                    <button type="button" class="transition ease-in-out delay-150 0 hover:-translate-y-1 hover:scale-110 duration-300 inline-flex px-4 py-2  text-white font-medium text-3xl leading-snug uppercase rounded-full  border-red-600    bg-gradient-to-r from-orange-500 to-orange-600 hover:from-green-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mr-2 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                          </svg>Search</button>
                          <article class="mt-4 backdrop-blur-sm">
                            Looking for the best food and restaurants in Mall of Asia?<br> Explore here now.
                          </article>
                      </a>
                </div>
           
                <!-- Bot Section-->
                <div class="mt-32">
                  <a href="survey_page.php">
                  <button type="button" class="transition ease-in-out delay-150 0 hover:-translate-y-1 hover:scale-110 duration-300 inline-flex px-4 py-2  text-white font-medium text-3xl leading-snug uppercase rounded-full  border-red-600    bg-gradient-to-r from-orange-500 to-orange-600 hover:from-green-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                      </svg>
                      Survey</button>
                    </a>

                      <article class="mt-4 backdrop-blur-sm">
                        Have a different taste palate? <br> Take a survey to see the restaurants that suits your craving.
                      </article>
                </div>

                <div class="mt-32">
                  <form method="post">
                  <button id="submit" name="submit" type="submit" class="transition ease-in-out delay-150 0 hover:-translate-y-1 hover:scale-110 duration-300 inline-flex px-4 py-2  text-white font-medium text-3xl leading-snug uppercase rounded-full  border-red-600    bg-gradient-to-r from-orange-500 to-orange-600 hover:from-green-500 hover:to-yellow-500  shadow-xl hover:shadow-orange-400/50 ">
                    <svg class="h-10 w-10 mr-2 text-white" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="16 3 21 3 21 8" />  <line x1="4" y1="20" x2="21" y2="3" />  <polyline points="21 16 21 21 16 21" />  <line x1="15" y1="15" x2="21" y2="21" />  <line x1="4" y1="4" x2="9" y2="9" />
                    </svg>Random</button>
                        </form>
                    <article class="mt-4 backdrop-blur-sm">Can’t  decide? Here are some random restaurants <br> you might want to try.</article>
                </div>
            </div>
        </section>    
   
    </main>
</body>
</html>

<?php 

    if(isset($_POST['submit'])){
      // MySQL stuff goes here
      $database = array("cafemarygrace", "zubuchon", "timhowan");
      $randomindex = rand(0, count($database) - 1);
      $_SESSION['RandomDatabaseName'] = $database[$randomindex];
      header("Location: randomized.php");
      exit;
    }
  
?>
