
<?PHP

// Set session variables
if (!isset($_SESSION['heroData'])){
    $json = json_decode(file_get_contents("./data/heroes.json"), true);
    $_SESSION['heroData']=$json;
} else {
    $json = $_SESSION['heroData'];
}

// loop through json records
foreach ($json["heroesString"] as $index => $item) {

// remove spaces in rating string
$rating_revised = preg_replace('/\s+/', '', $item["Rating_Revised"]);

// build html wrapping
echo '    <div id="'. $item["ID"] .'" data-content="./templates/index_heroes_colio.php?var1='. $item["ID"] .'" class="charProfile isotopeTrigger charImg heroFilter expanded-list' . ' ' .$item["Release_Code"] . ' ' .$item["Roles"] . ' ' .$item["Offense_Stat"] . ' ' .$item["Affinity"] . ' ' . $item["Retail_Code"] . ' theme'. preg_replace('/\s+/', '', $item["Theme"]) . ' tier' .$rating_revised . '">
              <a class="colio-link colioTmp" href="#" onClick="ga(\'send\', \'event\', \''. $item["Name_Long"] .'\', \'colio-expand\', \'from Hero Guide\')">
                  <img src="' .$item["Image_Path"] . '_icon.jpg" alt="" class="charPicture img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="' .$item["Name_Long"] . '" />' .$item["Name_Long"] . '
              </a>
          </div>';
}

?>
