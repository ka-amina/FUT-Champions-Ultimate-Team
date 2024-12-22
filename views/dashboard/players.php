<?php
include '../../config/connection.php';
include '../../assets/lang/lang.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($connection, $get_players);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

$contries = mysqli_query($connection, $get_contries);

if (!$contries) {
    die("Query failed: " . mysqli_error($connection));
}

$clubs = mysqli_query($connection, $get_clubs);
if (!$clubs) {
    die("Query failed: " . mysqli_error($connection));
}

if (isset($_POST['addPlayer'])) {
    // profile input
    $photo_name = $_FILES['profileImg']['name'];
    $temp_file = $_FILES['profileImg']['tmp_name'];
    $folder = "../../assets/img/profile/$photo_name";
    move_uploaded_file($temp_file, $folder);

    $player_name = $_POST['pname'];
    $club = $_POST['club'];
    $position = $_POST['position'];
    $nationality = $_POST['nationality'];
    $rating = $_POST['rating'];
    $pace = $_POST['pace'];
    $diving = $_POST['diving'];
    $shooting = $_POST['shooting'];
    $handling = $_POST['handling'];
    $passing = $_POST['passing'];
    $kicking = $_POST['kicking'];
    $dribling = $_POST['dribbling'];
    $reflexes = $_POST['reflexes'];
    $defending = $_POST['defending'];
    $speed = $_POST['speed'];
    $physical = $_POST['physical'];
    $positioning = $_POST['positioning'];

    $query1 = "INSERT INTO PLAYERS (name, photo, club_id, nationality_id, position_name, rating, is_deleted)
    VALUES ( '$player_name', '$photo_name', '$club', '$nationality', '$position', '$rating', '0')";
    $data = mysqli_query($connection, $query1);

    if ($data) {
        $player_id = mysqli_insert_id($connection);

        if ($position === "GK") {
            $query2 = "INSERT INTO GOALKEEPERS
                       VALUES ('$player_id', '$diving', '$handling', '$kicking', '$reflexes', '$speed', '$positioning')";
            mysqli_query($connection, $query2);
            
        } else {
            $query3 = "INSERT INTO OUTFIELD_PLAYERS 
                       VALUES ( '$player_id', '$pace', '$shooting', '$passing', '$dribling', '$defending', '$physical')";
            mysqli_query($connection, $query3);
          
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    header('Location: players.php');
   
}
if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    if ($action === 'delete') {
        $soft_delete_players = "UPDATE PLAYERS SET is_deleted = 1 where player_id = $id";
        mysqli_query($connection, $soft_delete_players);
    }
    header('Location: players.php');
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
                        <span class="-mr-1 font-medium"><?= $language['Dashboard']?></span>
                    </a>
                </li>
                <li>
                    <a href="players.php"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
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
                    <a href="clubs.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
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

        <div class="mt-8 bg-white p-4 shadow rounded-lg players-table">
            <div class="flex justify-between items-center">
                <h2 class="text-gray-500 text-lg font-semibold pb-4"><?= $language['tplayers']?></h2>

                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded "
                    id="show-form-button">
                    <?= $language['addplayer']?>
                </button>
            </div>

            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm ">
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
                    while ($player = mysqli_fetch_assoc($result)) {
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
                                <div class="flex">
                                    <a href="update.php?action=update&id=<?php echo $player['player_id']; ?>" id="delete"
                                        name="delete">
                                        <img class="cursor-pointer" src="../../assets/icons/edit.svg" alt="" width="45"
                                            height="45">
                                    </a>

                                    <a href="players.php?action=delete&id=<?php echo $player['player_id']; ?>" id="delete"
                                        name="delete">
                                        <img class="cursor-pointer" src="../../assets/icons/delete.svg" alt="" width="45"
                                            height="45">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <div id="show-form" class="flex justify-center hidden">
            <div class="flex md:justify-end justify-center ml-8 md:ml-0">
                <div id="personal-info" class="w-[600px] rounded-md mr-5 mt-9">
                    <form action="players.php" class="flex flex-col items-center" method="POST"
                        enctype="multipart/form-data">
                        <div
                            class="p-4 border-b-2 w-full text-center font-bold border-b-black flex justify-between items-center">
                            <span><?= $language['addplayer']?></span>
                            <span class="close-form cursor-pointer"><img src="../../assets/icons/close.svg" alt=""
                                    width="24" height="24" /></span>
                        </div>
                        <div class="flex flex-col gap-8 my-2 w-full">
                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col ">
                                    <label for="name" class="name my-2"><?php echo $language['name']; ?></label>
                                    <input id="player-name" name="pname" type="text" placeholder="name"
                                        class="p-2 w-52 rounded border border-gray-500" />
                                </div>
                                <p id="player-name-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col w-52">
                                    <label for="photo" class="mb-2"><?php echo $language['photo']; ?></label>
                                    <img src="" alt="Profile Image" id="showImg" class="w-40 h-40 hidden mb-6" />
                                    <input id="profile-img" name="profileImg" type="file"
                                        accept=".jpg, .png, .jpeg, .webp" class="hidden" />
                                    <label for="profile-img"
                                        class="cursor-pointer bg-primary text-white py-1 px-2 rounded text-center">
                                        <?php echo $language['selectimage']; ?>
                                    </label>
                                </div>
                                <p id="profile-img-error" class="w-80 hidden text-error"></p>
                            </div>

                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col">
                                    <label for="position" class="mb-2"><?php echo $language['position']; ?></label>
                                    <select name="position" id="position" class="p-2 w-52 rounded" name="position">
                                        <option value="">select position</option>
                                        <option value="CB">Center Back</option>
                                        <option value="CM">Central Midfield</option>
                                        <option value="GK">Goalkeeper</option>
                                        <option value="LB">Left Back</option>
                                        <option value="LW">Left Winger</option>
                                        <option value="RB">Right Back</option>
                                        <option value="RW">Right Winger</option>
                                        <option value="ST">Striker</option>
                                    </select>
                                </div>
                                <p id="position-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col">
                                    <label for="nationality" class="mb-2"><?php echo $language['nationality']; ?></label>
                                    <select name="nationality" id="nationality" class="p-2 w-52 rounded">
                                        <option value=""><?php echo $language['select-nationality']; ?></option>

                                        <?php
                                        while ($nt = mysqli_fetch_assoc($contries)) {
                                            ?>
                                            <option value="<?php
                                            echo $nt['nationality_id']
                                                ?>"><?php
                                            echo $nt['country_name']
                                                ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p id="nationality-error" class="w-80 hidden text-error"></p>
                            </div>

                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col">
                                    <label for="nationality" class="mb-2"><?php echo $language['club']; ?></label>
                                    <select name="club" id="club" class="p-2 w-52 rounded">
                                        <option value=""><?php echo $language['select-club']; ?></option>

                                        <?php
                                        while ($club = mysqli_fetch_assoc($clubs)) {
                                            ?>
                                            <option value="<?php
                                            echo $club['club_id']
                                                ?>"><?php
                                            echo $club['club_name']
                                                ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p id="club-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col">
                                    <label for="rating" class="rating"><?php echo $language['rating']; ?></label>
                                    <input id="rating-input" name="rating" type="number" placeholder="Rating"
                                        class="p-2 rounded w-52 border border-gray-500" />
                                    <p id="rating-input-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>


                        </div>

                        <div class="flex flex-wrap items-center justify-center gap-4 mb-4">

                            <div id="pace-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="pace" class="pace">Pace</label>
                                    <input id="pace" name="pace" type="number" placeholder="Pace"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="pace-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Diving input for GK  -->
                            <div id="diving-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="diving" class="diving">Diving</label>
                                    <input id="diving" name="diving" type="Number" placeholder="Diving"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="diving-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="shooting-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="shooting" class="shooting">Shooting</label>
                                    <input id="shooting" name="shooting" type="number" placeholder="Shooting"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="shooting-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- handling input for GK  -->
                            <div id="Handling-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="handling" class="handling">Handling</label>
                                    <input id="handling" name="handling" type="number" placeholder="Handling"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="handling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="passing-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="passing" class="Passing">Passing</label>
                                    <input id="passing" name="passing" type="number" placeholder="passing"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="passing-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Kicking input for GK  -->
                            <div id="Kicking-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="kicking" class="kicking">Kicking</label>
                                    <input id="kicking" name="kicking" type="number" placeholder="Kicking"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="kicking-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div class="hidden" id="dribbling-field">
                                <div class="flex flex-col">
                                    <label for="dribbling" class="dribbling">Dribbling</label>
                                    <input id="dribbling" name="dribbling" type="number" placeholder="dribbling"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="dribbling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Reflexes input for GK  -->
                            <div id="reflexes-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="reflexes" class="reflexes">Reflexes</label>
                                    <input id="reflexes" name="reflexes" type="number" placeholder="Reflexes"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="reflexes-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="defending-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="defending" class="defending">Defending</label>
                                    <input id="defending" name="defending" type="number" placeholder="defending"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="defending-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- speed input for GK  -->

                            <div id="speed-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="speed" class="speed">Speed</label>
                                    <input id="speed" name="speed" type="number" placeholder="Speed"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="speed-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="physical-field" class="hidden ">
                                <div class="flex flex-col">
                                    <label for="physical" class="physical">Physical</label>
                                    <input id="physical" name="physical" type="number" placeholder="Physical"
                                        class="p-2 rounded w-36  border border-gray-500" />
                                </div>
                                <p id="physical-error" class="hidden text-error"></p>
                            </div>
                            <!-- Positioning input for GK  -->

                            <div id="positioning-field" class="hidden ">
                                <label for="positioning" class="positioning">Positioning</label>
                                <input id="positioning" name="positioning" type="number" placeholder="Positioning"
                                    class="p-2 rounded mb-6 border border-gray-500" />
                                <p id="positioning-error" class="hidden text-error"></p>
                            </div>
                        </div>


                        <div id="change">
                            <button id="addNewPlayer" type="submit" name="addPlayer"
                                class="bg-primary hover:bg-primary-hover text-white p-2 w-80 rounded mb-6">
                                Add Player
                            </button>
                            <button id="updatePlayer"
                                class="bg-primary hover:bg-primary-hover text-white p-2 w-80 rounded mb-6 hidden">
                                Update Player
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <script src="../../assets/js/script.js"></script>
</body>

</html>