<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit Item</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" style = "text-align: center;"><?php echo validation_errors(); ?></div>
        <?php } ?>
    </div>
</div>
<form role="form" action="<?php echo base_url(); ?>item/edit_item/<?php echo $user->item_id; ?> " method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Item Name</label>
                <input type="text" name="item_name" class="form-control" value="<?php echo $user->item_name; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Unit Type</label>
                <input type="text" name="unit_type" class="form-control" value="<?php echo $user->unit_type; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Unit Price</label>
                <input type="text" name="unit_price" class="form-control" value="<?php echo $user->unit_price; ?>" required>
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
