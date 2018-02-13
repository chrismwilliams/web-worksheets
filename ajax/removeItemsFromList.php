<?php

require_once '../includes/db.php';
require_once '../classes/lists.classes.php';

if($_POST['itemid']) {
  $todoListObj = new todoLists($db);
  echo $todoListObj->removeItemFromList($_POST['itemid']);
}