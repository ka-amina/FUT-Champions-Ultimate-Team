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
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 rw" />
          </div>
        </div>
        <!-- st1 -->
        <div class="player-ST">
          <div id="player-ST" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 st" />
          </div>
        </div>
        <!-- st2 -->
        <div class="player-ST1 hidden">
          <div id="player-ST1" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 st1" />
          </div>
        </div>
        <!-- lw -->
        <div class="player-LW">
          <div id="player-LW" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 lw" />
          </div>
        </div>
        <!-- cm1 -->
        <div class="player-CM">
          <div id="player-CM" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 cm" />
          </div>
        </div>
        <!-- cm2 -->
        <div class="player-CM2">
          <div id="player-CM2" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 cm2" />
          </div>
        </div>
        <!-- cm3 -->
        <div class="player-CM3">
          <div id="player-CM3" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 cm3" />
          </div>
        </div>
        <!-- CB1 -->
        <div class="player-CB">
          <div id="player-CB" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 cb" />
          </div>
        </div>
        <!-- CB2 -->
        <div class="player-CB2">
          <div id="player-CB2" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 cb2" />
          </div>
        </div>
        <!-- RB -->
        <div class="player-RB">
          <div id="player-RB" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 rb" />
          </div>
        </div>
        <!-- LB -->
        <div class="player-LB">
          <div id="player-LB" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 lb" />
          </div>
        </div>
        <!-- gk -->
        <div class="player-GK">
          <div id="player-GK" class="relative player-card w-fit">
            <img src="../../assets/img/badge_gold.webp" alt="" class="w-52 h-72 gk" />
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
        </div>
        <span class="text-gray-900 ml-5 font-bold">Center Back</span>
        <div class="CB-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Central Midfield</span>
        <div class="CM-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Left Back</span>
        <div class="LB-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Right Back</span>
        <div class="RB-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Left Winger</span>
        <div class="LW-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Right Winger</span>
        <div class="RW-players flex flex-wrap"></div>
        <span class="text-gray-900 ml-5 font-bold">Striker</span>
        <div class="ST-players flex flex-wrap"></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

  <script src="../../assets/js/script.js"></script>
</body>

</html>