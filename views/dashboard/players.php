<?php
include '../../config/connection.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($connection, $get_players);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
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
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="players.php"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Players</span>
                    </a>
                </li>
                <li>
                    <a href="../home/index.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Views formation </span>
                    </a>
                </li>
                <li>
                    <a href="DeletedPlayers.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Deleted players</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="group-hover:text-gray-700">Finance</span>
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

        <div class="mt-8 bg-white p-4 shadow rounded-lg players-table">
            <div class="flex justify-between items-center">
                <h2 class="text-gray-500 text-lg font-semibold pb-4">players table</h2>

                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded "
                    id="show-form-button">
                    Add Player
                </button>
            </div>

            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm ">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="w-1/12 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            id
                        </th>
                        <th
                            class="w-1/12 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                        </th>
                        <th
                            class="w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            name
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            position
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            rating
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            actions
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
                                <img src="<?php echo $player['photo']; ?>"
                                    alt="Player Photo" class="rounded-full h-10 w-10">
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
                            <td class="text-center py-2 px-4 border-b border-grey-light">icons</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <div id="show-form" class="flex justify-center hidden">
            <div class="flex md:justify-end justify-center ml-8 md:ml-0">
                <div id="personal-info" class="w-96 rounded-md mr-5 mt-9">
                    <form action="" class="flex flex-col items-center">
                        <div
                            class="p-4 border-b-2 w-72 text-center font-bold border-b-black flex justify-between items-center">
                            <span>Add Player</span>
                            <span class="close-form cursor-pointer"><img src="../../assets/icons/close.svg" alt=""
                                    width="24" height="24" /></span>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="name my-2">name</label>
                            <input id="player-name" type="text" placeholder="name"
                                class="p-2 w-80 rounded border border-gray-500" />
                        </div>
                        <p id="player-name-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col">
                            <label for="photo" class="mb-2">Photo</label>
                            <img src="" alt="Profile Image" id="showImg" class="w-40 h-40 hidden mb-6" />
                            <input id="profile-img" type="file" accept=".jpg, .png, .jpeg, .webp" class="hidden" />
                            <label for="profile-img" class="cursor-pointer bg-primary text-white py-1 px-2 rounded">
                                Select Image
                            </label>
                        </div>
                        <p id="profile-img-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col">
                            <label for="position" class="mb-2">Position</label>
                            <select name="position" id="position" class="p-2 w-80 rounded">
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
                            <label for="nationality" class="mb-2">Nationality</label>
                            <select name="nationality" id="nationality" class="p-2 w-80 rounded">
                                <option value="">select Nationality</option>
                                <option value="ar">Argentina</option>
                                <option value="pt">Portugal</option>
                                <option value="be">Belgium</option>
                                <option value="fr">France</option>
                                <option value="nl">Netherlands</option>
                                <option value="de">Germany</option>
                                <option value="br">Brazil</option>
                                <option value="eg">Egypt</option>
                                <option value="eg">Morocco</option>
                            </select>
                        </div>
                        <p id="nationality-error" class="w-80 hidden text-error"></p>
                        <p id="flag-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col">
                            <label for="club" class="mb-2">Club</label>
                            <input id="club" type="text" placeholder="club"
                                class="p-2 w-80 rounded border border-gray-500" />
                        </div>
                        <p id="club-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col">
                            <label for="logo" class="mb-2"> Logo</label>
                            <input id="logo" type="file" class="w-80 mb-6" />
                        </div>
                        <p id="logo-error" class="w-80 hidden text-error"></p>

                        <div class="items-center p-2">
                            <button class="p-2 bg-primary rounded-sm cursor-no-drop" disabled>
                                <img src="../../assets/icons/arrowLeft.svg" alt="" /></button><span
                                class="mx-3">1/2</span>
                            <button id="NavigateToNextForm"
                                class="p-2 bg-primary hover:bg-primary-hover rounded-sm mb-6">
                                <img src="../../assets/icons/arrowRight.svg" alt="" />
                            </button>
                        </div>
                    </form>
                </div>
                <div id="rating" class="hidden w-96 rounded-md mr-5 mt-9">
                    <form action="" class="flex flex-col items-center">
                        <div
                            class="p-4 border-b-2 w-72 text-center font-bold border-b-black flex justify-between items-center">
                            <span>Add Player</span>
                            <span class="close-form cursor-pointer"><img src="../../assets/icons/close.svg" alt=""
                                    width="24" height="24" /></span>
                        </div>
                        <div class="flex gap-8 my-2">
                            <div class="flex flex-col">
                                <label for="rating" class="rating">rating</label>
                                <input id="rating-input" type="number" placeholder="Rating"
                                    class="p-2 rounded w-36 border border-gray-500" />
                                <p id="rating-input-error" class="w-36 hidden text-error"></p>
                            </div>

                            <div id="pace-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="pace" class="pace">Pace</label>
                                    <input id="pace" type="number" placeholder="Pace"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="pace-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Diving input for GK  -->
                            <div id="diving-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="diving" class="diving">Diving</label>
                                    <input id="diving" type="Number" placeholder="Diving"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="diving-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-8">
                            <div id="shooting-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="shooting" class="shooting">Shooting</label>
                                    <input id="shooting" type="number" placeholder="Shooting"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="shooting-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- handling input for GK  -->
                            <div id="Handling-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="handling" class="handling">Handling</label>
                                    <input id="handling" type="number" placeholder="Handling"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="handling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="passing-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="passing" class="Passing">Passing</label>
                                    <input id="passing" type="number" placeholder="passing"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="passing-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Kicking input for GK  -->
                            <div id="Kicking-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="kicking" class="kicking">Kicking</label>
                                    <input id="kicking" type="number" placeholder="Kicking"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="kicking-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-8">
                            <div class="hidden" id="dribbling-field">
                                <div class="flex flex-col">
                                    <label for="dribbling" class="dribbling">Dribbling</label>
                                    <input id="dribbling" type="number" placeholder="dribbling"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="dribbling-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- Reflexes input for GK  -->
                            <div id="reflexes-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="reflexes" class="reflexes">Reflexes</label>
                                    <input id="reflexes" type="number" placeholder="Reflexes"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="reflexes-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <div id="defending-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="defending" class="defending">Defending</label>
                                    <input id="defending" type="number" placeholder="defending"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="defending-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                            <!-- speed input for GK  -->

                            <div id="speed-field" class="hidden">
                                <div class="flex flex-col">
                                    <label for="speed" class="speed">Speed</label>
                                    <input id="speed" type="number" placeholder="Speed"
                                        class="p-2 rounded w-36 border border-gray-500" />
                                    <p id="speed-error" class="w-36 hidden text-error"></p>
                                </div>
                            </div>
                        </div>
                        <div id="physical-field" class="hidden mt-6">
                            <label for="physical" class="physical">Physical</label>
                            <input id="physical" type="number" placeholder="Physical"
                                class="p-2 rounded mb-6 border border-gray-500" />
                            <p id="physical-error" class="hidden text-error"></p>
                        </div>
                        <!-- Positioning input for GK  -->

                        <div id="positioning-field" class="hidden mt-6">
                            <label for="positioning" class="positioning">Positioning</label>
                            <input id="positioning" type="number" placeholder="Positioning"
                                class="p-2 rounded mb-6 border border-gray-500" />
                            <p id="positioning-error" class="hidden text-error"></p>
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
                            <button id="addNewPlayer"
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