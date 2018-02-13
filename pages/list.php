<div class="mainContainer">
  <div id="pageContainer" class="container">
    <ul id="todoList">
      <?php
        $todoListsObj = new todoLists($db);
        $listid = $_GET['id'];
        $listItems = $todoListsObj->getListItems($listid);

        foreach($listItems as $key => $value) {
          echo '<li data-id="' . $value['item_id'] . '">' . $value['item_name'] . '<i class="fa fa-times pull-right"></i></li>';
        }
      ?>
    </ul>
    <form class="row">
      <div class="col-md-10">
        <input type="text" class="form-control" id="product" placeholder="Milk...">
      </div>
      <div class="col-md-2">
        <input type="hidden" class="form-control" id="listid" value="<?= $_GET['id']; ?>">
        <button type="button" class="btn btn-primary" id="addproduct">Add Item</button>
      </div>
    </form>
  </div>
</div>
<script src="js/list.js"></script>