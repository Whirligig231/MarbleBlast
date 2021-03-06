# Marble Blast Gold - Web Port
This project is a complete web port of the 3D platformer game Marble Blast Gold by GarageGames, implemented in TypeScript.

Play it here: https://marbleblast.vani.ga/ (Hoping the link will still work)

## Features
In this game, the objective is to roll your marble to the finish pad in the fastest time possible, while avoiding hazards and collecting gems and power-ups. It includes all 100 default levels of the original (24 beginner, 24 intermediate, 52 advanced), as well as almost 2,000 community custom levels. It implements all gameplay elements, sounds, music and UI/menu components - additional features include a replay system and online leaderboards.

[View version history](https://github.com/Vanilagy/MarbleBlast/blob/master/version_history.md)

## Screenshots
<img src="./screenshots/natural_selection.png" width="640">
<img src="./screenshots/twisting.png" width="640">
<img src="./screenshots/tube_treasure.png" width="640">
<img src="./screenshots/avi_training_2.png" width="640">
<img src="./screenshots/level_select.png" width="640">
<img src="./screenshots/options.png" width="640">

## Technical overview
The game is implemented in TypeScript and utilizes a modified version of [three.js](https://github.com/mrdoob/three.js/) for rendering and [OimoPhysics](https://github.com/saharan/OimoPhysics) as its physics engine. Its levels and assets weren't rebuilt from scratch; instead, they are read and imported from .dif, .dts and .mis files used internally by the Torque 3D Engine, on which the original game runs. All the game's internal logic was implemented from scratch, however. The physics simulation runs at a fixed rate of 120 Hz and utilizes continuous collision detection - it was tuned to feel like a Marble Blast game, but there are still differences in the physics, because of which times in this game shouldn't be compared to those in the original. Resources are lazily loaded over the network when required for levels, making the initial load time of the website relatively short (about 4 MB). The UIs are all implemented in plain HTML and CSS, and local persistence for settings, scores and replays is provided by IndexedDB. The game features a state-based replay system which guarantees deterministic playback - replays are compressed using [pako](https://github.com/nodeca/pako) and stored locally. Custom levels are supplied by HiGuy's online [CLA API](https://cla.higuy.me/) and are cached on the server. The backend itself is implemented using PHP and mostly handles resource loading and leaderboard updates.

## Building and developing
If you wish to build the game yourself, simply clone the repository, then run `npm install` and `npm run compile`, which will compile the TypeScript code using [rollup](https://rollupjs.org/guide/en/). Then simply make the repository directory accessible through any regular, static web server with PHP enabled and navigate to `src/index.html`. For fast development run `npm run watch-fast` (or `npm run watch` for a slower, but typechecked version). If you wish to bundle the project, run `npm run bundle`, which uses [Sarcina](https://github.com/Vanilagy/Sarcina) and writes to `dist/`.

## Notes
The current version only runs on the newest versions of Chromium-based browsers, Firefox and Safari. Special thanks to the maintainers of [three.js](https://github.com/mrdoob/three.js/), [OimoPhysics](https://github.com/saharan/OimoPhysics), [pako](https://github.com/nodeca/pako) and [jszip](https://github.com/Stuk/jszip) for making this project possible, as well as to [Jeff](https://github.com/JeffProgrammer) and [RandomityGuy](https://github.com/RandomityGuy) for helping me out with parts of the code, and to the entire Marble Blast community for their feedback and support. The gameplay itself wasn't my idea at all and I highly recommend you check out GarageGames's original version, as well as the game's community, here: https://marbleblast.com/