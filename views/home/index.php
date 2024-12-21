<?php
include '../../config/connection.php';
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
$gk_players = mysqli_query($connection, $get_gk_players);
if (!$gk_players) {
  die("Connection failed: " . mysqli_connect_error());
}


$gk_stade = mysqli_fetch_assoc($gk_players);

$rw_players = mysqli_query($connection, $get_rw_players);
if (!$rw_players) {
  die("connection field" . mysqli_connect_error());
}
$rw_stade = mysqli_fetch_assoc($rw_players);


$lw_players = mysqli_query($connection, $get_lw_players);
if (!$lw_players) {
  die("connection field" . mysqli_connect_error());
}
$lw_stade = mysqli_fetch_assoc($lw_players);

$st_players = mysqli_query($connection, $get_st_players);
if (!$st_players) {
  die("connection field" . mysqli_connect_error());
}
$st_stade = mysqli_fetch_assoc($st_players);

$rb_players = mysqli_query($connection, $get_rb_players);
if (!$rb_players) {
  die("connection field" . mysqli_connect_error());
}
$rb_stade = mysqli_fetch_assoc($rb_players);

$lb_players = mysqli_query($connection, $get_lb_players);
if (!$lb_players) {
  die("connection field" . mysqli_connect_error());
}
$lb_stade = mysqli_fetch_assoc($lb_players);

// afficher CM les joueurs dans le terrain
$cm_players = mysqli_query($connection, $get_3cm_players);
if (!$cm_players) {
  die("connection field" . mysqli_connect_error());
}
$player1 = mysqli_fetch_assoc($cm_players);
$player2 = mysqli_fetch_assoc($cm_players);
$player3 = mysqli_fetch_assoc($cm_players);

// AFFICHER les joueurs cm dans le changement
$cm_players_changement= mysqli_query($connection, $get_cmchangemet_players);
if (!$cm_players_changement) {
  die("connection field" . mysqli_connect_error());
}

// afficher CB les joueurs dans le terrain
$cb_players = mysqli_query($connection, $get_2cb_players);
if (!$cm_players) {
  die("connection field" . mysqli_connect_error());
}
$cb1 = mysqli_fetch_assoc($cb_players);
$cb2 = mysqli_fetch_assoc($cb_players);


// AFFICHER les joueurs CB dans le changement
$cb_players_changement= mysqli_query($connection, $get_cbchangemet_players);
if (!$cb_players_changement) {
  die("connection field" . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
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
  <link href="../../assets/css/style.css" rel="stylesheet" />
  <title>FUT Champ Ultimate Team</title>
</head>

<body>
  <div class="relative md:flex-row md:justify-between mt-20 backdrop-blur-sm">
    <div>
      <div class="relative terrin w-full formationState">
        <div class="player-RW">
          <div id="player-RW" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $rw_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $rw_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $rw_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $rw_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $rw_stade['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $rw_stade['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $rw_stade['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $rw_stade['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $rw_stade['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $rw_stade['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $rw_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $rw_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- st1 -->
        <div class="player-ST">
          <div id="player-ST" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $st_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $st_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $st_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $st_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $st_stade['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $st_stade['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $st_stade['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $st_stade['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $st_stade['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $st_stade['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $st_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $st_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- lw -->
        <div class="player-LW">
          <div id="player-LW" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $lw_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $lw_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $lw_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $lw_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $lw_stade['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $lw_stade['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $lw_stade['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $lw_stade['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $lw_stade['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $lw_stade['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $lw_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $lw_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- cm1 -->
        <div class="player-CM">
          <div id="player-CM" class="relative player-card w-fit">
          <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $player1['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $player1['rating'] ?></span>
                <span class="font-mono"><?php echo $player1['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $player1['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $player1['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $player1['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $player1['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $player1['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $player1['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $player1['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $player1['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $player1['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- cm2 -->
        <div class="player-CM2">
          <div id="player-CM2" class="relative player-card w-fit">
          <div id="player-CM" class="relative player-card w-fit">
          <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $player2['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $player2['rating'] ?></span>
                <span class="font-mono"><?php echo $player2['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $player2['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $player2['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $player2['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $player2['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $player2['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $player2['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $player2['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $player2['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $player2['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- cm3 -->
        <div class="player-CM3">
          <div id="player-CM3" class="relative player-card w-fit">
          <div id="player-CM" class="relative player-card w-fit">
          <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $player3['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $player3['rating'] ?></span>
                <span class="font-mono"><?php echo $player3['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $player3['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $player3['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $player3['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $player3['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $player3['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $player3['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $player3['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $player3['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $player3['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- CB1 -->
        <div class="player-CB">
          <div id="player-CB" class="relative player-card w-fit">
          <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $cb1['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $cb1['rating'] ?></span>
                <span class="font-mono"><?php echo $cb1['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $cb1['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $cb1['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $cb1['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $cb1['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $cb1['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $cb1['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $cb1['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $cb1['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $cb1['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- CB2 -->
        <div class="player-CB2">
          <div id="player-CB2" class="relative player-card w-fit">
          <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $cb2['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $cb2['rating'] ?></span>
                <span class="font-mono"><?php echo $cb2['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $cb2['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $cb2['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $cb2['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $cb2['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $cb2['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $cb2['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $cb2['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $cb2['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $cb2['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- RB -->
        <div class="player-RB">
          <div id="player-RB" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $rb_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $rb_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $rb_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $rb_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $rb_stade['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $rb_stade['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $rb_stade['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $rb_stade['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $rb_stade['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $rb_stade['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $rb_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $rb_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- LB -->
        <div class="player-LB">
          <div id="player-LB" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $lb_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $lb_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $lb_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $lb_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAC</span>
                  <span class=""><?php echo $lb_stade['pace'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SHO</span>
                  <span class=""><?php echo $lb_stade['shooting'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PAS</span>
                  <span class=""><?php echo $lb_stade['passing'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DRI</span>
                  <span class=""><?php echo $lb_stade['driblling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DEF</span>
                  <span class=""><?php echo $lb_stade['defending'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">PHY</span>
                  <span class=""><?php echo $lb_stade['physical'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $lb_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $lb_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
        <!-- gk -->
        <div class="player-GK">
          <div id="player-GK" class="relative player-card w-fit">
            <div class="relative player-card w-fit">
              <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
              <img src="../../assets/img/profile/<?php echo $gk_stade['photo'] ?>" alt=""
                class="displayProfileImage absolute top-16 left-10" />
              <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                <span class="font-bold text-xl"><?php echo $gk_stade['rating'] ?></span>
                <span class="font-mono"><?php echo $gk_stade['position_name'] ?></span>
              </div>

              <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                <?php echo $gk_stade['name'] ?>
              </div>

              <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">DIV</span>
                  <span class=""><?php echo $gk_stade['diving'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">HAN</span>
                  <span class=""><?php echo $gk_stade['handling'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">KIC</span>
                  <span class=""><?php echo $gk_stade['kicking'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">REF</span>
                  <span class=""><?php echo $gk_stade['refelexes'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">SPD</span>
                  <span class=""><?php echo $gk_stade['speed'] ?></span>
                </div>
                <div class="flex flex-col leading-3">
                  <span class="text-xxs">POS</span>
                  <span class=""><?php echo $gk_stade['positioning'] ?></span>
                </div>
              </div>
              <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                <img src="<?php echo $gk_stade['flag_image'] ?>" alt="" class="w-5 h-3" />
                <img src="../../assets/img/clubs/<?php echo $gk_stade['club_logo'] ?>" alt="" class="w-5 h-6" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- players div -->
      <div class="mt-10 mb-6 players-div rounded-md m-20 overflow-y-auto h-72 md:overflow-x-hidden changements">
        <div class="flex justify-center">
          <span class="font-mono p-2 border-b-2 w-fit">Players</span>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Goalkeeper</span>
        <div class="Gk-players flex flex-wrap">
          <?php
          while ($row = mysqli_fetch_assoc($gk_players)):
            ?>
            <div id="player-GK" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo']; ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating']; ?></span>
                  <span class="font-mono"><?php echo $row['position_name']; ?></span>
                </div>
                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name']; ?>
                </div>
                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DIV</span>
                    <span><?php echo $row['diving']; ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">HAN</span>
                    <span><?php echo $row['handling']; ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">KIC</span>
                    <span><?php echo $row['kicking']; ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">REF</span>
                    <span><?php echo $row['refelexes']; ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SPD</span>
                    <span><?php echo $row['speed']; ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">POS</span>
                    <span><?php echo $row['positioning']; ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image']; ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo']; ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Center Back</span>
        <div class="CB-players flex flex-wrap">
        <?php
          while($row=mysqli_fetch_assoc($cb_players_changement)):
          ?>
           <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
          <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Central Midfield</span>
        <div class="CM-players flex flex-wrap">
          <?php
          while($row=mysqli_fetch_assoc($cm_players_changement)):
          ?>
           <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
          <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Left Back</span>
        <div class="LB-players flex flex-wrap">
        <?php
          while ($row = mysqli_fetch_assoc($lb_players)):
            ?>
            <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Right Back</span>
        <div class="RB-players flex flex-wrap">
          <?php
          while ($row = mysqli_fetch_assoc($rb_players)):
            ?>
            <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Left Winger</span>
        <div class="LW-players flex flex-wrap">
          <?php
          while ($row = mysqli_fetch_assoc($lw_players)):
            ?>
            <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>
        </div>
        <span class="text-gray-900 ml-5 font-bold">Right Winger</span>
        <div class="RW-players flex flex-wrap">
          <?php
          while ($row = mysqli_fetch_assoc($rw_players)):
            ?>
            <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>

        </div>
        <span class="text-gray-900 ml-5 font-bold">Striker</span>
        <div class="ST-players flex flex-wrap">
          <?php
          while ($row = mysqli_fetch_assoc($st_players)):
            ?>
            <div id="player-RW" class="relative player-card w-fit">
              <div class="relative player-card w-fit">
                <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72" />
                <img src="../../assets/img/profile/<?php echo $row['photo'] ?>" alt=""
                  class="displayProfileImage absolute top-16 left-10" />
                <div class="flex text-center flex-col leading-3 absolute top-16 left-8">
                  <span class="font-bold text-xl"><?php echo $row['rating'] ?></span>
                  <span class="font-mono"><?php echo $row['position_name'] ?></span>
                </div>

                <div class="absolute bottom-20 right-20 font-semibold player-name-card">
                  <?php echo $row['name'] ?>
                </div>

                <div class="flex flex-row gap-2 absolute bottom-14 left-7 font-semibold">
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAC</span>
                    <span class=""><?php echo $row['pace'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">SHO</span>
                    <span class=""><?php echo $row['shooting'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PAS</span>
                    <span class=""><?php echo $row['passing'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DRI</span>
                    <span class=""><?php echo $row['driblling'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">DEF</span>
                    <span class=""><?php echo $row['defending'] ?></span>
                  </div>
                  <div class="flex flex-col leading-3">
                    <span class="text-xxs">PHY</span>
                    <span class=""><?php echo $row['physical'] ?></span>
                  </div>
                </div>
                <div id="logo-and-flag" class="flex absolute bottom-7 left-20 gap-2 items-center">
                  <img src="<?php echo $row['flag_image'] ?>" alt="" class="w-5 h-3" />
                  <img src="../../assets/img/clubs/<?php echo $row['club_logo'] ?>" alt="" class="w-5 h-6" />
                </div>
              </div>
            </div>
            <?php
          endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

  <script src="../../assets/js/script.js"></script>
</body>

</html>