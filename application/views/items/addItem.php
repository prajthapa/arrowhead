<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Item</li>
      </ol>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Add Item</h2>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" style = "text-align: center;"><?=validation_errors(); ?></div>
        <?php } ?>
    </div>
</div>
<form role="form" action="<?=base_url(); ?>item/add_item" method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Item Name</label>
                <input type="text" name="item_name" class="form-control" value="<?=set_value('item_name'); ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Unit Type</label>
                <input type="text" name="unit_type" class="form-control" value="<?=set_value('unit_type'); ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Unit Price</label>
                <input type="numeric" name="unit_price" class="form-control" value="<?=set_value('unit_price'); ?>" required />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Submit"/>
            </div>
        </div>
    </div>
</form>
