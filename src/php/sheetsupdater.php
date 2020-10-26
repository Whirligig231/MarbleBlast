<?php

header("Content-Type: text/plain");

$mistoname = array(
	"Beginner" => "cell",
	"Level,Time,Runner,.wrec submitted?" => "cell",
	"beginner/movement.mis" => "Learning to Roll",
	"beginner/gems.mis" => "Collect the Gems",
	"beginner/jumping.mis" => "Jump Training",
	"beginner/powerjump.mis" => "Learn the Super Jump",
	"beginner/platform.mis" => "Platform Training",
	"beginner/superspeed.mis" => "Learn the Super Speed",
	"beginner/elevator.mis" => "Elevator",
	"beginner/airmove.mis" => "Air Movement",
	"beginner/copter.mis" => "Gyrocopter",
	"beginner/timetrial.mis" => "Time Trial",
	"beginner/bounce.mis" => "Super Bounce",
	"beginner/gravity.mis" => "Gravity Helix",
	"beginner/shock.mis" => "Shock Absorber",
	"beginner/backagain.mis" => "There and Back Again",
	"beginner/friction.mis" => "Marble Materials Lab",
	"beginner/bumpers.mis" => "Bumper Training",
	"beginner/ductfan.mis" => "Breezeway",
	"beginner/mine.mis" => "Mine Field",
	"beginner/trapdoor.mis" => "Trapdoors!",
	"beginner/tornado.mis" => "Tornado Bowl",
	"beginner/pitfall.mis" => "Pitfalls",
	"beginner/platformparty.mis" => "Platform Party",
	"beginner/windingroad.mis" => "Winding Road",
	"beginner/finale.mis" => "Grand Finale",
	"Intermediate" => "cell",
	"Level,Time,Runner,.wrec submitted?" => "cell",
	"intermediate/jumpjumpjump.mis" => "Jump jump jump",
	"intermediate/racequalifying.mis" => "Monster Speedway Qualifying",
	"intermediate/skatepark.mis" => "Skate Park",
	"intermediate/rampmatrix.mis" => "Ramp Matrix",
	"intermediate/hoops.mis" => "Hoops",
	"intermediate/goforgreen.mis" => "Go for the Green",
	"intermediate/forkinroad.mis" => "Fork in the Road",
	"intermediate/tritwist.mis" => "Tri Twist",
	"intermediate/marbletris.mis" => "Marbletris",
	"intermediate/spaceslide.mis" => "Space Slide",
	"intermediate/skeeball.mis" => "Skee Ball Bonus",
	"intermediate/playground.mis" => "Marble Playground",
	"intermediate/hopskipjump.mis" => "Hop Skip and Jump",
	"intermediate/highroadlowroad.mis" => "Take the High Road",
	"intermediate/gauntlet.mis" => "Gauntlet",
	"intermediate/halfpipe.mis" => "Half-Pipe",
	"intermediate/motomarblecross.mis" => "Moto-Marblecross",
	"intermediate/shockdrop.mis" => "Shock Drop",
	"intermediate/forkinroad2.mis" => "Spork in the Road",
	"intermediate/greatdivide.mis" => "Great Divide",
	"intermediate/thewave.mis" => "The Wave",
	"intermediate/tornado.mis" => "Tornado Alley",
	"intermediate/racetrack.mis" => "Monster Speedway",
	"intermediate/upward.mis" => "Upward Spiral",
	"Advanced" => "cell",
	"Level,Time,Runner,.wrec submitted?" => "cell",
	"advanced/thrillride.mis" => "Thrill Ride",
	"advanced/tree.mis" => "Money Tree",
	"advanced/fan_lift.mis" => "Fan Lift",
	"advanced/leapoffaith.mis" => "Leap of Faith",
	"advanced/highway.mis" => "Freeway Crossing",
	"advanced/steppingstones.mis" => "Stepping Stones",
	"advanced/obstacle.mis" => "Obstacle Course",
	"advanced/compasspoints.mis" => "Points of the Compass",
	"advanced/3foldmaze.mis" => "Three-Fold Maze",
	"advanced/tubetreasure.mis" => "Tube Treasure",
	"advanced/slipslide.mis" => "Slip 'n Slide",
	"advanced/skyscraper.mis" => "Skyscraper",
	"advanced/halfpipe2.mis" => "Half Pipe Elite",
	"advanced/a-maze-ing.mis" => "A-Maze-ing",
	"advanced/blockparty.mis" => "Block Party",
	"advanced/trapdoor.mis" => "Trapdoor Madness",
	"advanced/moebius.mis" => "Moebius Strip",
	"advanced/greatdivide2.mis" => "Great Divide Revisited",
	"advanced/3foldmaze2.mis" => "Escher's Race",
	"advanced/tothemoon.mis" => "To the Moon",
	"advanced/aroundtheworld.mis" => "Around the World in 30 seconds",
	"advanced/willowisp.mis" => "Will o' Wisp",
	"advanced/twisting.mis" => "Twisting the Night Away",
	"advanced/survival.mis" => "Survival of the Fittest",
	"advanced/plumbing.mis" => "Plumber's Portal",
	"advanced/siege.mis" => "Siege",
	"advanced/ski.mis" => "Ski Slopes",
	"advanced/reloaded.mis" => "Ramps Reloaded",
	"advanced/towermaze.mis" => "Tower Maze",
	"advanced/freefall.mis" => "Free Fall",
	"advanced/acrobat.mis" => "Acrobat",
	"advanced/whorl.mis" => "Whirl",
	"advanced/mudslide.mis" => "Mudslide",
	"advanced/pipedreams.mis" => "Pipe Dreams",
	"advanced/scaffold.mis" => "Scaffold",
	"advanced/airwalk.mis" => "Airwalk",
	"advanced/shimmy.mis" => "Shimmy",
	"advanced/leastresist.mis" => "Path of Least Resistance",
	"advanced/daedalus.mis" => "Daedalus",
	"advanced/ordeal.mis" => "Ordeal",
	"advanced/battlements.mis" => "Battlements",
	"advanced/pinball.mis" => "Pinball Wizard",
	"advanced/eyeofthestorm.mis" => "Eye of the Storm",
	"advanced/dive.mis" => "Dive!",
	"advanced/tightrope.mis" => "Tightrope",
	"advanced/selection.mis" => "Natural Selection",
	"advanced/tango.mis" => "Tango",
	"advanced/icarus.mis" => "Icarus",
	"advanced/construction.mis" => "Under Construction",
	"advanced/pathways.mis" => "Pathways",
	"advanced/darwin.mis" => "Darwin's Dilemma",
	"advanced/kingofthemountain.mis" => "King of the Mountain",
);

$cwd = getcwd();

// Generate a CSV
function get_data() {
	global $cwd;
	global $mistoname;

	$lbs = json_decode(file_get_contents($cwd . "/../storage/leaderboard/leaderboard.json"), true);
	$wrecs = json_decode(file_get_contents($cwd . "/../storage/wrecs/wrecs.json"), true);

	$output = "";

	foreach ($mistoname as $key => $value) {
		$mis = $key;

		if ($mistoname[$key] === "cell") {
			$output .= $key . "\n";
			continue;
		}

		@$highscore = $lbs[$mis][0];
		if (!$highscore) {
			$highscore = array("Nardo Polo", "99:59.999");
		}

		$has_rec = isset($wrecs[$mis]);
		$rec_owner = NULL;

		if ($has_rec) {
			$rec_owner = $wrecs[$mis][0];
		}

		$rec_latest = $has_rec? $rec_owner === $highscore[0] : false;

		$output .= $mistoname[$mis] . "," . $highscore[1] . "," . $highscore[0] . "," . ($rec_latest? "Yes" : "No") . "\n";
	}

	return $output;
}

echo get_data();