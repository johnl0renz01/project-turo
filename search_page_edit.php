<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<?php 
ob_start();
session_start();

if (isset($_SESSION['UserID']) && isset($_SESSION['Username'])) {
  $login = TRUE;
} else {
  $login = FALSE;
}

error_reporting(0);
ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="./dist/flowbite-min.css" />
    <title>Search</title>
</head>
<!--class="bg-[url('../img/mainBG.png')] bg-no-repeat bg-cover"-->

<body class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black ">
    <div class="flex flex-col h-screen justify-between">    
        <header class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black shadow-md border-2 border-black  flex items-center justify-between px-8 py-4">
            <!-- logo -->
            <h1 class="w-3/12">
                <a href="home_page.php">
                <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-200">
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
                                echo '<a href="login_index.php">Login </a>'; 
                            }
                            ?>
                        </a>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen" class="absolute right-8 mt-3 py-2 w-32 bg-gray-100 rounded-md shadow-xl z-20">
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

        <main>
            <section class="overflow-hidden text-gray-700 ">
                <div class="container px-1 pt-4 pb-10 mx-auto lg:pt-2 lg:px-2">
                    <!-- breadcrumbs-->
                    <nav class="py-2 rounded-md w-full">
                        <ol class="list-reset flex">
                            <li><a href="home_page.php" class="text-orange-400 hover:text-orange-500">Home</a></li>
                            <li><span class="text-white mx-2">/</span></li>
                            <li class="text-white">Search</li>
                            
                        </ol>
                    </nav>
                    
                    <br><!--SPACING-->

                    <!-- search bar-->
                    <div class="max-w-full mb-8">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <form autocomplete="off" action="search_page.php" method="post">  
                                <input type="search" name="SearchTag" id="SearchTag" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Search for restaurant, cuisine, or dish..." required
                                value="<?php if(isset($_SESSION['Tag'])) echo $_SESSION['Tag'];?>">
                                <input type="submit" value="Search" class="cursor-pointer text-white absolute right-2.5 bottom-2.5 bg-yellow-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">                    
                            </form>
                        </div>
                    </div>

                    <div id="button-group" class="grid gap-8 lg:grid-cols-2 sm:max-w-sm sm:mx-auto lg:max-w-full">
                    <?php       
                        if (isset($_POST['SearchTag'])) {
                            $Search = $_POST['SearchTag'];
                            $_SESSION['Tag'] = $Search;
                            // Database connection
                            $conn = new mysqli('localhost','root','','turo');
                            $sql = "SELECT * FROM restaurantsearch WHERE RestaurantName LIKE '% $Search %' 
                                                                    OR RestaurantName LIKE '% $Search' 
                                                                    OR RestaurantName LIKE '$Search %' 
                                                                    OR CuisineType = '$Search' 
                                                                    OR Tags LIKE '% $Search %'
                                                                    OR Tags LIKE '% $Search'
                                                                    OR Tags LIKE '$Search %'
                                                                    ORDER BY RestaurantName";
                            $result = mysqli_query($conn, $sql);
                                
                            $_SESSION['RestaurantImg'] = array();
                            $i = 0;

                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <?php
                                $_SESSION['RestaurantName'] = $row['RestaurantName'];
                                $_SESSION['CuisineType'] = $row['CuisineType'];
                                $_SESSION['Tags'] = $row['Tags'];
                                $_SESSION['Description'] = $row['Description'];


                                $c1=$row['RestaurantImg'];
                                array_push($_SESSION['RestaurantImg'],$c1);                       

                    ?>          
                    <!--Suggestion-->
                    
                        <div class="relative block overflow-hidden transition-shadow duration-300 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black rounded hover:shadow-orange-500 shadow-2xl">
                        <form  method="post">
                            <span class="absolute right-2 top-5 z-10 inline-flex items-center rounded-full bg-gray-900 px-3 py-1 text-base font-semibold text-white">
                                4.5
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            </span>
                            
                            <img src="<?php for($i; $i < count($_SESSION['RestaurantImg']) ; $i++) { 
                                echo "./img/"; echo $_SESSION['RestaurantImg'][$i]; 
                                echo "_MAIN.jpg";} ?>"  
                                class="object-cover w-full h-64" alt="" />
                                
                            <div class="p-5"> 
                                <!--Invisible Input-->
                                <input class="hidden" type="text" name="RestoID" id="RestoID" value="<?php echo $_SESSION['RestaurantImg'][$i - 1];?>">
                                <span class="inline-block mb-2 text-2xl font-bold leading-5 transition-colors duration-200 text-white hover:text-deep-purple-accent-700">
                                    <?php echo $_SESSION['RestaurantName'];?>
                                </span>
                                <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                                <span class="transition-colors duration-200 text-white hover:text-deep-purple-accent-700">FOODS</span>
                                <span class="text-gray-200">: <?php echo $_SESSION['CuisineType']; echo ', '; echo $_SESSION['Tags'];?></span>
                                </p>
                                <p class="mb-2 text-white pb-10">
                                <?php echo $_SESSION['Description'];?>
                                </p>
                                <div class="absolute mt-4 bottom-2 border-b border-orange-800 text-orange-500 font-medium mb-2 ">
                                    
                                    <p class="relative group text-xl">
                                    <!-- NEEDED TO IDENTIFY WHICH PART OR BUTTON IS CLICKED-->
                                    <input id="b<?php echo $i - 1;?>" type="submit" class="cursor-pointer" value="Find out more">
                                    <span class="absolute -bottom-1 left-0 w-0 h-2 bg-orange-400 transition-all group-hover:w-full"></span>
                                    </p>
                                
                                </div>
                            </div>
                        </div>
                    <?php
                                }
                                // REFRESH PAGE
                                //echo("<meta http-equiv='refresh' content='2'>");
                            }
                        } /*else {
                             TO UNSET EACH SESSION
                            unset ($_SESSION["SearchTag"]);
                            unset ($_SESSION["RestaurantName"]);
                            unset ($_SESSION["CuisineType"]);
                            unset ($_SESSION["Tags"]);
                            unset ($_SESSION["Description"]);
                            unset ($_SESSION["RestaurantImg"]);
                            
                        }*/
                    ?>
                    <!--Invisible Input-->
                    <input class="hidden" type="text" id="result" name="result">
                    </form>
                    </div> 
                    
                </div>
            </section>
        </main>
    
        <footer class="bg-gray-800 dark:bg-gray-900 mt-auto">
            <div class="mx-auto max-w-5xl px-4 py-2 sm:px-6 lg:px-8">
                <div class="flex justify-center pt-4">
                <svg viewBox="0 0 110 30.5" class="h-8 w-auto text-gray-200">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
                </svg>
                </div>
            
                <p
                class="mx-auto mt-4 max-w-md pb-2 text-center leading-relaxed text-gray-100 dark:text-gray-400"
                >
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt
                consequuntur amet culpa cum itaque neque.
                </p>
            
                <nav class="mt-2" aria-labelledby="footer-navigation">
                <h2 class="sr-only" id="footer-navigation">Footer navigation</h2>
            
                <ul class="flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-12">
                    <li> <a class="text-white transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" href="/" > About </a> </li>
                    <li> <a class="text-white transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" href="/" > History </a> </li>
                    <li> <a class="text-white transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" href="/" > Services </a> </li> 
                </ul>
                </nav>
            
                <ul class="mt-2 flex py-4 justify-center gap-6 md:gap-8">
                <li>
                    <a href="/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                    </a>
                </li>
            
                <li>
                    <a href="/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" >
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                    </a>
                </li>
            
                <li>
                    <a href="/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" >
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                    </a>
                </li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>


<!-- FOR GETTING VALUE OR ID FOR DATABASE NAME-->


<script type="text/javascript">
    const buttons = document.getElementsByTagName("input");
    const result = document.getElementById("result");

    const buttonPressed = e => { 
        var name = `${e.target.id}`;
        name = name.substring(1);
        //result.innerHTML = `ID of <em>${e.target.innerHTML}</em> is <strong>${name}</strong>`;  // old code
        document.getElementById("result").value = name;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
           
            }
        };
        xhttp.open("POST", "./search_done.php", true);
        xhttp.send();

        /* UNUSED AJAX
        $("#submit").click(function(){$.ajax({  
            type: 'POST',  
            url: 'search_page.php', 
            data: { name: value},
            success: function(result){
            $("#content").html(result);
            $("#submit").hide();
            }
            });
            });
        */
        
    }   

    for (let input of buttons) {
        input.addEventListener("mouseover", buttonPressed);
    }

    


</script>




<!--  CHECK IF THE INDEX IS VALID AND CONVERRTTTT brbrtbrtt-->

<?php 
    $_SESSION['Previous'] = "Search";

    $int = (is_numeric($_POST['result']) ? (int)$_POST['result'] : -1);
    $index = $int;

    //echo "<h1>".$index."</h1>";
    $RestaurantID = $_SESSION['RestaurantImg'][$index];
    $_SESSION['DatabaseName'] = $RestaurantID;
    

    

    if (isset($_SESSION['DatabaseName'])) {
        header("Location: restaurant_overview.php");
        exit();
    }
        
    //For checking
    /*
    echo "<h1>".$RestaurantID."</h1>";
    echo "<h1>".$_SESSION["DatabaseName"]."</h1>";
    */
    
?>

   
  