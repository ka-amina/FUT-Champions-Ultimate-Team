<?php
include '../../config/connection.php';
include '../../assets/lang/lang.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($connection, $get_clubs);
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

if (isset($_POST['addclub'])) {
    $name = $_POST['clubname'];

    $logo = $_FILES['clubImg']['name'];
    $temp_file = $_FILES['clubImg']['tmp_name'];
    $folder = "../../assets/img/clubs/$logo";
    move_uploaded_file($temp_file, $folder);

    $query = "INSERT INTO clubs (club_name, club_logo)
             VALUES ('$name', '$logo')";
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
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <span class="group-hover:text-gray-700"><?= $language['Dplayers']?></span>
                    </a>
                </li>
                <li>
                    <a href="clubs.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                        <span class="group-hover:text-gray-700"><?= $language['Clubs']?></span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block"><?= $language['Clubs']?></h5>
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

        <div class="mt-8 bg-white p-4 shadow rounded-lg clubs-table">
            <div class="flex justify-between items-center">
                <h2 class="text-gray-500 text-lg font-semibold pb-4"><?= $language['tclubs']?></h2>

                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded "
                    id="show-form-country">
                    <?= $language['addclubs']?>
                </button>
            </div>

            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm ">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['id']?>
                        </th>
                        <th
                            class="w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['clubname']?>
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['logo']?>
                        </th>
                        <th
                            class=" w-1/4 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            <?= $language['actions']?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($club = mysqli_fetch_assoc($result)):
                        ?>
                        <tr class="hover:bg-grey-lighter">
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?= $club['club_id']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <?= $club['club_name']; ?>
                            </td>
                            <td class="text-center py-2 px-4 border-b border-grey-light">
                                <div class="flex justify-center">
                                    <img src="../../assets/img/clubs/<?= $club['club_logo']; ?>" alt="Foto Perfil"
                                        class="rounded-full h-10 w-10">

                                </div>
                            </td>

                            <td class="text-center flex justify-center py-2 px-4 border-b border-grey-light">
                                <div class="flex">
                                    <a href="updateclub.php?action=update&id=<?php echo $club['club_id']; ?>" id="delete"
                                        name="delete">
                                        <img class="cursor-pointer" src="../../assets/icons/edit.svg" alt="" width="40"
                                            height="40">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>


        <div id="country_form" class="flex justify-center hidden">
            <div class="flex md:justify-end justify-center ml-8 md:ml-0">
                <div id="personal-info" class="w-[450px] rounded-md mr-5 mt-9">
                    <form action="clubs.php" class="flex flex-col items-center" method="POST"
                        enctype="multipart/form-data">
                        <div
                            class="p-4 border-b-2 w-full text-center font-bold border-b-black flex justify-between items-center">
                            <span><?= $language['addclubs']?></span>
                            <span class="close-form cursor-pointer"><img src="../../assets/icons/close.svg" alt=""
                                    width="24" height="24" /></span>
                        </div>

                        <div class="flex flex-col ">
                            <label for="name" class="name my-2"><?= $language['clubname']?></label>
                            <input id="player-name" name="clubname" type="text" placeholder="name"
                                class="p-2 w-52 rounded border border-gray-500" />
                        </div>
                        <p id="player-name-error" class="w-80 hidden text-error"></p>

                        <div class="flex flex-col w-52">
                            <label for="photo" class="mb-2"><?= $language['photo']?></label>
                            <img src="" alt="Profile Image" id="showImg" class="w-40 h-40 hidden mb-6" />
                            <input id="profile-img" name="clubImg" type="file" accept=".jpg, .png, .jpeg, .webp"
                                class="hidden" />
                            <label for="profile-img"
                                class="cursor-pointer bg-primary text-white py-1 px-2 rounded text-center">
                                <?= $language['selectimage']?>
                            </label>
                        </div>



                        <div id="change" class="mt-8">
                            <button id="addNewPlayer" type="submit" name="addclub"
                                class="bg-primary hover:bg-primary-hover text-white p-2 w-80 rounded mb-6">
                                <?= $language['add-club-btn']?>
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
        const close = document.querySelector(".close-form");
        const getCountryForm = document.getElementById("show-form-country")
        getCountryForm.addEventListener("click", (e) => {
            e.preventDefault();
            countryForm.classList.remove("hidden");
            table.classList.add("hidden");
        })
        close.addEventListener("click", (e) => {
            e.preventDefault();
            countryForm.classList.add("hidden");
            table.classList.remove("hidden");
        })
    </script>
</body>

</html>