<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Manage Orders</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success" role="alert">
                <?=$this->session->flashdata('message'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<div class="card-header">
          <i class="fa fa-table"></i> Orders</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Order Item</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                    <th>Ordered By</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0; ?>
                <?php foreach($users as $u) { ?>
                <tr>
                    <td><?=++$count; ?></td>
                    <td><?=$u->item_name; ?></td>
                    <td><?=$u->quantity; ?></td>
                    <td><?=$u->ordered_date; ?></td>
                    <td><?=$u->delivery_date; ?></td>
                    <td><?=$u->order_by; ?></td>
                    <td><?php if ($u->delivery_flag == 'N') {
                        echo "Undelivered";
                    } else {echo "Delivered"; } ?></td>
                    <td>
                        <a class="btn btn-md btn-primary" href="<?=base_url(); ?>orders/edit_order/<?=$u->orders_id; ?>">
                            Edit
                        </a>
                        <a class="btn btn-md btn-danger" href="<?=base_url(); ?>orders/delete_order/<?=$u->orders_id; ?>">
                            Delete
                        </a>
                        <?php if ($u->delivery_flag == 'N') { ?>
                        <a class="btn btn-md btn-secondary" href="<?=base_url(); ?>orders/deliver_order/<?=$u->orders_id; ?>">
                            Delivered
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
