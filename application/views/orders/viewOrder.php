<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Orders</h2>
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
                    <th>Ordered Date</th>
                    <th>Delivery Date</th>
                    <th>Order By</th>
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
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
