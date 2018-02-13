<?php
require_once('../includes/db.php');
require_once('../classes/lists.classes.php');

if($_POST['listid'] && $_POST['itemName']) {
  $todoListsObj = new todoLists($db);
  echo $todoListsObj->addItemToList($_POST['listid'], $_POST['itemName']);
}
