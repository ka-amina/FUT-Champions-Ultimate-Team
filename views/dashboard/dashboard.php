<?php 
include '../../assets/lang/lang.php';
include '../../config/connection.php';

$count_players= 'SELECT COUNT(player_id) FROM players WHERE is_deleted=0';
$count_players_result= mysqli_query($connection, $count_players);
if (!$count_players_result) {
    die("Query failed: " . mysqli_error($connection));
}
$pcount= mysqli_fetch_row($count_players_result);

$count_clubs= 'SELECT count(club_id ) FROM clubs';
$count_clubs_result= mysqli_query($connection, $count_clubs);
if (!$count_players_result) {
    die("Query failed: " . mysqli_error($connection));
}
$clubscount= mysqli_fetch_row($count_clubs_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                        <span class="-mr-1 font-medium"><?= $language['Dashboard']?></span>
                    </a>
                </li>
                <li>
                    <a href="players.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700"><?= $language['players']?></span>
                    </a>
                </li>
                <li>
                    <a href="../home/index.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700"><?= $language['formation']?></span>
                    </a>
                </li>
                <li>
                    <a href="DeletedPlayers.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700"><?= $language['Dplayers']?></span>
                    </a>
                </li>
                <li>
                    <a href="clubs.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700"><?= $language['Clubs']?></span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block"><?= $language['Dashboard']?></h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">
                    <button aria-label="notification"
                        class="w-24 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                        <a href="?lang=fr"><?= $language['French']?></a>
                    </button>
                    <button aria-label="notification"
                        class="w-24 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                        <a href="?lang=en"><?= $language['English']?></a>
                    </button>
                </div>
            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full min-w-0 ">
                <!-- In use -->
                <div class="flex flex-col px-6 py-2 bg-white shadow rounded-lg overflow-hidden">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="text-6xl font-bold tracking-tight leading-none text-blue-500"><?=$pcount[0]?></div>
                        <div class="text-lg font-medium text-blue-500"><?= $language['total-players']?></div>
                    </div>
                </div>
                <!-- renovation -->
                <div class="flex flex-col px-6 py-2 bg-white shadow rounded-lg overflow-hidden">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="text-6xl font-bold tracking-tight leading-none text-amber-500"><?=$clubscount[0]?></div>
                        <div class="text-lg font-medium text-amber-600"><?= $language['total-clubs']?></div>
                    </div>
                </div>
               
            </div>
        </div>


    </div>
</body>

</html>