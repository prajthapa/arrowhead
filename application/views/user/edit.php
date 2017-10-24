<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Edit User</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" style = "text-align: center;"><?php echo validation_errors(); ?></div>
        <?php } ?>
    </div>
</div>
<form role="form" action="<?php echo base_url(); ?>user/edit_user/<?php echo $user->user_id; ?> " method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user_name" class="form-control" value="<?php echo $user->user_name; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_email" class="form-control" value="<?php echo $user->user_email; ?>" required>
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
