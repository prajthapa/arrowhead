<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Manage Item</h2>
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
          <i class="fa fa-table"></i> Items</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0; ?>
                <?php foreach($users as $u) { ?>
                <tr>
                    <td><?=++$count; ?></td>
                    <td><?=$u->item_name; ?></td>
                    <td><?=$u->unit_type; ?></td>
                    <td><?=$u->unit_price; ?></td>
                    <td>
                        <a class="btn btn-md btn-primary" href="<?=base_url(); ?>item/edit_item/<?=$u->item_id; ?>">
                            Edit
                        </a>
                        <a class="btn btn-md btn-danger" href="<?=base_url(); ?>item/delete_item/<?=$u->item_id; ?>">
                            Delete
                        </a>
                        
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
