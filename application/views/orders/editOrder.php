<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit Order</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" style = "text-align: center;"><?php echo validation_errors(); ?></div>
        <?php } ?>
    </div>
</div>
<form role="form" action="<?php echo base_url(); ?>orders/edit_order/<?php echo $users->orders_id; ?> " method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Item</label>
                <select class="form-control" name="order_item" value="<?=set_value('order_item'); ?>" required >
                    <option value="">Select an Item</option>
                    <?php foreach($items as $i) { ?>
                        <option value="<?php echo $i->item_id; ?>"><?php echo $i->item_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Quantity</label>
                <input type="numeric" name="quantity" class="form-control" value="<?php echo $users->quantity; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Ordered Date</label>
                <input type="date" name="ordered_date" class="form-control" value="<?php echo $users->ordered_date; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Delivery Date</label>
                <input type="date" name="delivery_date" class="form-control" value="<?php echo $users->delivery_date; ?>" required>
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
