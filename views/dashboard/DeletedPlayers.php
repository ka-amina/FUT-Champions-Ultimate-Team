<?php
include '../../config/connection.php';
include '../../assets/lang/lang.php';

if (isset($_GET['id']) ) {
    $id = $_GET['id'];
        $soft_delete_players = "UPDATE PLAYERS SET is_deleted = 0 where player_id = $id";
        mysqli_query($connection, $soft_delete_players);
    header('Location: DeletedPlayers.php');
}
$deleted_players = mysqli_query($connection, $get_deleted_players);
if (!$deleted_players) {
    die("connection faild:" . mysqli_connect_error());
}


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
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="-mr-1 font-medium"><?= $language['Dashboard']?></span>
                    </a>
                </li>
                <li>
                    <a href="players.php"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-gray-600 group ">
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
                        class="px-4 py-3 flex items-center space-x-4 rounded-md bg-gradient-to-r from-sky-600 to-cyan-400 text-white">
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
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block"><?= $language['players']?></h5>
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

        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <div class="flex justify-between items-center">
                <h2 class="text-gray-500 text-lg font-semibold pb-4"><?= $language['Deleted']?> </h2>
            </div>

            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="w-1/12 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['id']?>
                        </th>
                        <th
                            class="w-1/12 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                        </th>
                        <th
                            class="w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['name']?>
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['position']?>
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['rating']?>
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['actions']?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($player = mysqli_fetch_assoc($deleted_players)) {
                        ?>
                        <tr class="hover:bg-grey-lighter">
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?php echo $player['player_id']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <img src="../../assets/img/profile/<?php echo $player['photo']; ?>" alt="Player Photo"
                                    class="rounded-full h-15 w-15">

                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?php echo $player['name']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?php echo $player['position_name']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?php echo $player['rating']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <a href="DeletedPlayers.php?id=<?php echo $player['player_id']; ?>" id="restore"
                                name="restore">
                                    <button
                                        class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                        <?= $language['Restore']?>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>