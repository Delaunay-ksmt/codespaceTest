<?php
$setfunc_array = glob($root_path . '/assets/inc/function/*.php');
// foreach ($setfunc_array as $set_func) {
//   if (basename($set_func) != "index.php") {
//     include(basename($set_func));
//   }
// }
include(basename('_setValue.php'));
include(basename('_setHtml.php'));
