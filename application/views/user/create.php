<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create User</li>
</ol>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Create User</h2>
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
<form role="form" action="<?=base_url(); ?>user/create_user" method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user_name" class="form-control" value="<?=set_value('user_name'); ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="user_password" class="form-control" value="<?=set_value('user_password'); ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Type</label>
                <select class="form-control"  name="user_type" value="<?=set_value('user_type'); ?>" required >
                    <option label="Restaurant" value="R"/>
                    <option label="Admin" value="A"/>
                </select>
            </input>
                
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
