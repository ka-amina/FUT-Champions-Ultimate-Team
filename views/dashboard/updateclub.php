<?php
include '../../config/connection.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// GET THE ID FROM THE URL
$club_id= $_GET['id'];

$get_club="SELECT * FROM clubs WHERE club_id=$club_id";
$get_club_info= mysqli_query($connection, $get_club);
$get_exiting_clubimg= mysqli_fetch_row($get_club_info);


$result = mysqli_query($connection, $get_club);
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

if (isset($_POST['updateclub'])) {
    $name = $_POST['clubname'];

    if(isset($_FILES['clubImg']) && !empty($_FILES['clubImg']['name'])){
    $logo = $_FILES['clubImg']['name'];
    $temp_file = $_FILES['clubImg']['tmp_name'];
    $folder = "../../assets/img/clubs/$logo";
    move_uploaded_file($temp_file, $folder);
    }else{
        $logo=$get_exiting_clubimg[2];
    }

    $query = "UPDATE clubs  
    SET club_name ='$name ' , club_logo='$logo'
    WHERE club_id=$club_id";
    mysqli_query($connection, $query);
    header('Location: clubs.php');
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        form {
            background-color: rgba(156, 163, 175, 0.9);
            border-radius: 0.375rem;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#55cca2",
                        "primary-hover": "#2F9B75",
                        "error": "#F44336"
                    },
                    fontSize: {
                        xxs: "0.625rem",
                    },
                },
                plugins: [],
            },
        };
    </script>
    <title>Document</title>
</head>

<body>
    <!-- component -->
    <aside
        class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
        <div>
            <ul class="space-y-2 tracking-wide mt-8">
                <li>
                    <a href="dashboard.php" aria-label="dashboard"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="-mr-1 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="player.php"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-gray-600 group">
                        <span class="group-hover:text-gray-700">Players</span>
                    </a>
                </li>
                <li>
                    <a href="../home/index.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700">View Stade</span>
                    </a>
                </li>
                <li>
                    <a href="DeletedPlayers.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700">Deleted players</span>
                    </a>
                </li>
                <li>
                    <a href="nationalities.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                        <span class="group-hover:text-gray-700">Clubs</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Clubs</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">
                    <!--search bar -->
                    <div hidden class="md:block">
                        <div class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
                            <span class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                                <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current"
                                    viewBox="0 0 35.997 36.004">
                                    <path id="Icon_awesome-search" data-name="search"
                                        d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                                    </path>
                                </svg>
                            </span>
                            <input type="search" name="leadingIcon" id="leadingIcon" placeholder="Search here"
                                class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition">
                        </div>
                    </div>
                    <!--/search bar -->
                    <button aria-label="search"
                        class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200 md:hidden">
                        <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 mx-auto fill-current text-gray-600"
                            viewBox="0 0 35.997 36.004">
                            <path id="Icon_awesome-search" data-name="search"
                                d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                            </path>
                        </svg>
                    </button>
                    <button aria-label="chat"
                        class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </button>
                    <button aria-label="notification"
                        class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>


        <div id="country_form" class="flex justify-center ">
            <div class="flex md:justify-end justify-center ml-8 md:ml-0">
                <div id="personal-info" class="w-[450px] rounded-md mr-5 mt-9">
                    <form action="" class="flex flex-col items-center" method="POST"
                        enctype="multipart/form-data">
                        <div
                            class="p-4 border-b-2 w-full text-center font-bold border-b-black flex justify-between items-center">
                            <span>Update Club</span>
                            <a href="clubs.php" class="close-form cursor-pointer"><img src="../../assets/icons/close.svg" alt=""
                                    width="24" height="24" /></a>
                        </div>

                        <div class="flex flex-col ">
                            <label for="name" class="name my-2">Club name</label>
                            <input id="player-name" name="clubname" type="text" placeholder="name"
                                class="p-2 w-52 rounded border border-gray-500" value="<?php echo $get_exiting_clubimg[1]?>"/>
                        </div>
                        <p id="player-name-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col w-52">
                            <label for="photo" class="mb-2">image</label>
                            <img src="" alt="Profile Image" id="showImg" class="w-40 h-40 hidden mb-6" />
                            <input id="profile-img" name="clubImg" type="file" accept=".jpg, .png, .jpeg, .webp"
                                class="hidden" />
                            <label for="profile-img"
                                class="cursor-pointer bg-primary text-white py-1 px-2 rounded text-center">
                                Select Image
                            </label>
                        </div>



                        <div id="change" class="mt-8">
                            <button id="addNewPlayer" type="submit" name="updateclub"
                                class="bg-primary hover:bg-primary-hover text-white p-2 w-80 rounded mb-6">
                                Update Club
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <script>
    const table = document.querySelector(".clubs-table");
    const countryForm = document.getElementById("country_form");
        const getCountryForm = document.getElementById("show-form-country")
        getCountryForm.addEventListener("click", (e) => {
            e.preventDefault();
            countryForm.classList.remove("hidden");
            table.classList.add("hidden");
        })</script>
</body>

</html>