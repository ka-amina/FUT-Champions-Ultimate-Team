<?php
include '../../config/connection.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$player_id = $_GET['id'];
$player_data = "SELECT 
players.player_id,name,
photo,nationality_id,
position_name,rating,
pace,shooting,passing,
driblling,defending,
physical,diving,
handling,kicking,
refelexes,speed,
positioning, club_id
FROM players
LEFT JOIN OUTFIELD_PLAYERS
ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
ON players.player_id = GOALKEEPERS.player_id
where players.player_id=$player_id
";
$data_result = mysqli_query($connection, $player_data);
$update_player = mysqli_fetch_row($data_result);
// print_r($update_player);
// print_r($update_player[4]);

$contries = mysqli_query($connection, $get_contries);

if (!$contries) {
    die("Query failed: " . mysqli_error($connection));
}

$clubs = mysqli_query($connection, $get_clubs);
if (!$clubs) {
    die("Query failed: " . mysqli_error($connection));
}

if (isset($_POST['updateplayer'])) {
    $id = $_POST['id'];
    if (isset($_FILES['profileImg']) && !empty($_FILES['profileImg']['name'])) {
        // If a new image is uploaded
        $photo_name = $_FILES['profileImg']['name'];
        $temp_file = $_FILES['profileImg']['tmp_name'];
        $folder = "../../assets/img/profile/$photo_name";
        move_uploaded_file($temp_file, $folder);
    } else {
        // Use the existing image
        $photo_name = $update_player[2];
        
    }

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


    $query1 = "UPDATE players 
    SET name='$player_name', photo='$photo_name', club_id='$club', nationality_id='$nationality', position_name='$position', rating='$rating', is_deleted='0'
    where player_id=$id";
    $data = mysqli_query($connection, $query1);

    if ($data) {
        if ($position === "GK") {
            $query2 = "UPDATE GOALKEEPERS
                       SET  diving ='$diving', handling = '$handling', kicking ='$kicking',  refelexes ='$reflexes', speed='$speed', positioning='$positioning' 
                       where player_id=$id";
            mysqli_query($connection, $query2);

        } else {
            $query3 = "UPDATE OUTFIELD_PLAYERS 
                       SET pace ='$pace', shooting ='$shooting', passing ='$passing', driblling='$dribling', defending ='$defending', physical ='$physical'
                       where player_id =$id";
            mysqli_query($connection, $query3);
        }
    } else {
        echo "Error: " . mysqli_error($connection);
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
                        <span class="-mr-1 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="players.php"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                        <span class="group-hover:text-gray-700">Players</span>
                    </a>
                </li>
                <li>
                    <a href="../home/index.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700">Views formation </span>
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
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700">nationalities</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Players</h5>
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


        <div id="show-form" class="flex justify-center">
            <div class="flex md:justify-end justify-center ml-8 md:ml-0">
                <div id="personal-info" class="w-[600px] rounded-md mr-5 mt-9">
                    <form action="" class="flex flex-col items-center"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                        <div
                            class="p-4 border-b-2 w-full text-center font-bold border-b-black flex justify-between items-center">
                            <span>Update Player </span>
                            <a href="players.php" class="close-form cursor-pointer"><img
                                    src="../../assets/icons/close.svg" alt="" width="24" height="24" /></a>
                        </div>
                        <div class="flex flex-col gap-8 my-2 w-full">
                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col">
                                    <label for="name" class="name my-2">name</label>
                                    <input id="player-name" name="pname" type="text" placeholder="name"
                                        value="<?php echo $update_player[1]; ?>"
                                        class="p-2 w-52 rounded border border-gray-500" />
                                </div>
                                <p id="player-name-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col w-52">
                                    <label for="photo" class="mb-2">Photo</label>
                                    <img src="" alt="Profile Image" id="showImg" class="w-40 h-40 hidden mb-6" />
                                    <input id="profile-img" name="profileImg" type="file"
                                        accept=".jpg, .png, .jpeg, .webp" class="hidden" />
                                    <label for="profile-img"
                                        class="cursor-pointer bg-primary text-white py-1 px-2 rounded text-center">
                                        Select Image
                                    </label>
                                </div>
                                <p id="profile-img-error" class="w-80 hidden text-error"></p>
                            </div>

                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col">
                                    <label for="position" class="mb-2">Position</label>
                                    <select name="position" id="position2" class="p-2 w-52 rounded">
                                        <option value="">select position</option>
                                        <option value="CB" <?php echo ($update_player[4] == 'CB') ? 'selected' : ''; ?>>
                                            Center Back</option>
                                        <option value="CM" <?php echo ($update_player[4] == 'CM') ? 'selected' : ''; ?>>
                                            Central Midfield</option>
                                        <option value="GK" <?php echo ($update_player[4] == 'GK') ? 'selected' : ''; ?>>
                                            Goalkeeper</option>
                                        <option value="LB" <?php echo ($update_player[4] == 'LB') ? 'selected' : ''; ?>>
                                            Left Back</option>
                                        <option value="LW" <?php echo ($update_player[4] == 'LW') ? 'selected' : ''; ?>>
                                            Left Winger</option>
                                        <option value="RB" <?php echo ($update_player[4] == 'RB') ? 'selected' : ''; ?>>
                                            Right Back</option>
                                        <option value="RW" <?php echo ($update_player[4] == 'RW') ? 'selected' : ''; ?>>
                                            Right Winger</option>
                                        <option value="ST" <?php echo ($update_player[4] == 'ST') ? 'selected' : ''; ?>>
                                            Striker</option>
                                    </select>
                                </div>
                                <p id="position-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col">
                                    <label for="nationality" class="mb-2">Nationality</label>
                                    <select name="nationality" id="nationality" class="p-2 w-52 rounded">
                                        <option value="">select Nationality</option>

                                        <?php
                                        while ($nt = mysqli_fetch_assoc($contries)) {
                                            $is_selected = ($nt['nationality_id'] == $update_player[3]) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $nt['nationality_id']; ?>" <?php echo $is_selected; ?>>
                                                <?php echo $nt['country_name']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>

                                    </select>

                                </div>
                                <p id="nationality-error" class="w-80 hidden text-error"></p>
                            </div>

                            <div class="flex items-center justify-center gap-4">
                                <div class="flex flex-col">
                                    <label for="nationality" class="mb-2">Club</label>
                                    <select name="club" id="club" class="p-2 w-52 rounded">
                                        <option value="">select club</option>

                                        <?php
                                        while ($club = mysqli_fetch_assoc($clubs)) {
                                            $is_selected = ($club['nationality_id'] == $update_player[19]) ? 'selected' : '';
                                            ?>
                                            <option value="<?php
                                            echo $club['club_id']
                                                ?>" <?php echo $is_selected; ?>><?php
                                               echo $club['club_name']
                                                   ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p id="club-error" class="w-80 hidden text-error"></p>

                                <div class="flex flex-col">
                                    <label for="rating" class="rating">rating</label>
                                    <input id="rating-input" name="rating" type="number" placeholder="Rating"
                                        class="p-2 rounded w-52 border border-gray-500"
                                        value="<?php echo $update_player[5]; ?>" />
                                    <p id="rating-input-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>


                        </div>

                        <div class="flex flex-wrap items-center justify-center gap-4 mb-4">

                            <div id="pace-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="pace" class="pace">Pace</label>
                                    <input id="pace" name="pace" type="number" placeholder="Pace"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[6]; ?>" />
                                    <p id="pace-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Diving input for GK  -->
                            <div id="diving-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="diving" class="diving">Diving</label>
                                    <input id="diving" name="diving" type="Number" placeholder="Diving"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[13]; ?>" />
                                    <p id="diving-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="shooting-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="shooting" class="shooting">Shooting</label>
                                    <input id="shooting" name="shooting" type="number" placeholder="Shooting"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[7]; ?>" />
                                    <p id="shooting-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- handling input for GK  -->
                            <div id="Handling-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="handling" class="handling">Handling</label>
                                    <input id="handling" name="handling" type="number" placeholder="Handling"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[14]; ?>" />
                                    <p id="handling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="passing-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="passing" class="Passing">Passing</label>
                                    <input id="passing" name="passing" type="number" placeholder="passing"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[8]; ?>" />
                                    <p id="passing-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Kicking input for GK  -->
                            <div id="Kicking-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="kicking" class="kicking">Kicking</label>
                                    <input id="kicking" name="kicking" type="number" placeholder="Kicking"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[15]; ?>" />
                                    <p id="kicking-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div class="hidden" id="dribbling-field">
                                <div class="flex flex-col">
                                    <label for="dribbling" class="dribbling">Dribbling</label>
                                    <input id="dribbling" name="dribbling" type="number" placeholder="dribbling"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[9]; ?>" />
                                    <p id="dribbling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Reflexes input for GK  -->
                            <div id="reflexes-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="reflexes" class="reflexes">Reflexes</label>
                                    <input id="reflexes" name="reflexes" type="number" placeholder="Reflexes"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[16]; ?>" />
                                    <p id="reflexes-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="defending-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="defending" class="defending">Defending</label>
                                    <input id="defending" name="defending" type="number" placeholder="defending"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[10]; ?>" />
                                    <p id="defending-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- speed input for GK  -->

                            <div id="speed-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="speed" class="speed">Speed</label>
                                    <input id="speed" name="speed" type="number" placeholder="Speed"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[17]; ?>" />
                                    <p id="speed-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>

                            <div id="physical-field" class="hidden ">
                                <div class="flex flex-col">
                                    <label for="physical" class="physical">Physical</label>
                                    <input id="physical" name="physical" type="number" placeholder="Physical"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[11]; ?>" />
                                </div>
                                <p id="physical-error" class="hidden text-error"></p>
                            </div>
                            <!-- Positioning input for GK  -->

                            <div id="positioning-field" class="hidden ">
                                <div class="flex flex-col">
                                    <label for="positioning" class="positioning">Positioning</label>
                                    <input id="positioning" name="positioning" type="number" placeholder="Positioning"
                                        class="p-2 rounded w-36 border border-gray-500"
                                        value="<?php echo $update_player[18]; ?>" />
                                </div>
                                <p id="positioning-error" class="hidden text-error"></p>
                            </div>
                        </div>


                        <div class="items-center p-2">
                            <button id="backToPreviousForm" class="p-2 bg-primary hover:bg-primary-hover rounded-sm">
                                <img src="../../assets/icons/arrowLeft.svg" alt="" /></button><span
                                class="mx-3">2/2</span>
                            <button id="NavigateToNextForm" class="p-2 bg-primary rounded-sm mb-6 cursor-no-drop"
                                disabled>
                                <img src="../../assets/icons/arrowRight.svg" alt="" />
                            </button>
                        </div>
                        <div id="change">
                            <button id="updateplayer" type="submit" name="updateplayer"
                                class="bg-primary hover:bg-primary-hover text-white p-2 w-80 rounded mb-6">
                                Update Player
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <!-- <script src="../../assets/js/script.js"></script> -->
    <script>
        // navigation to forms
        const NavigateToNextForm = document.getElementById("NavigateToNextForm");
        const pesonalInfo = document.getElementById("personal-info");
        const rating = document.getElementById("rating");
        const backToPreviousForm = document.getElementById("backToPreviousForm");
        const form = document.getElementById("show-form");
        const showForm = document.getElementById("show-form-button");
        const closeForm = document.querySelectorAll(".close-form");
        const table = document.querySelector(".players-table");
        const position = document.getElementById("position");
        const position2 = document.getElementById("position2");
        const gkFields = [
            "diving-field",
            "Handling-field",
            "Kicking-field",
            "reflexes-field",
            "speed-field",
            "positioning-field",
        ];

        const playerRating = [
            "pace-field",
            "shooting-field",
            "passing-field",
            "dribbling-field",
            "defending-field",
            "physical-field",
        ];
        position2.addEventListener("change", (e) => {
            e.preventDefault();
            console.log(position2.value)
            if (position2.value === "GK") {
                gkFields.forEach((field) => {
                    const input = document.getElementById(field);
                    console.log(input)
                    input.classList.remove("hidden");
                });
                playerRating.forEach((field) => {
                    const input = document.getElementById(field);
                    console.log(input)
                    input.classList.add("hidden");
                });
            } else {
                gkFields.forEach((field) => {
                    const input = document.getElementById(field);
                    input.classList.add("hidden");
                });
                playerRating.forEach((field) => {
                    const input = document.getElementById(field);
                    input.classList.remove("hidden");
                });
            }
        });
    </script>
</body>

</html>