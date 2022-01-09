<?php 
include_once '../src/class-f1r.php';
use F1r_php as shourtlink;
$name = @$_GET['name'];
if (isset($name) && !empty($name)){
  $result = shourtlink::getview("$name");
  if (gettype($result) == "array"){
    echo "views : " . $result['views'],
                        "date_created : " . $result['date_created'] . 
                        "Last_visit : " . $result['Last_visit'] . 
                        "Redirect : " . $result['Redirect'] . 
                        "Visits_today : " . $result['Visits_today'] . 
                        "Real_hits : " . $result['Real_hits'];
  } else {
    shourtlink::error_log("false","code name is null to db","ERROR_PAGE_GET_VIEW_STATUS [300]");
    echo 'not found this link';
  }
}else {
  shourtlink::error_log("falses","not found parametr name","ERROR_PAGE_GET_VIEW_STATUS [300]");
  echo 'error: plase enter parametr name';
}
