<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php session_start(); ?>


<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name">
                    <?php echo $_SESSION['UserName'];?>
                </h5>
				<h6 class="user-email">
                <?php echo $_SESSION['UserEmail'];?>
                </h6>
			</div>
			<div class="about">
            <a href="javascript:void(0)" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                <a href="javascript:void(0)" class="btn btn-default btn-sm">Profile</a>&nbsp;
				<h5>About</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
    <table class="table user-view-table m-0">
        <tbody>
        <tr>
            <td>Registered:</td>
            <td>01/23/2017</td>
        </tr>
        <tr>
            <td>Latest activity:</td>
            <td>01/23/2018 (14 days ago)</td>
        </tr>
        <tr>
            <td>Verified:</td>
            <td><span class="fa fa-check text-primary"></span>&nbsp; Yes</td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>User</td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><span class="badge badge-outline-success">Active</span></td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>

<?php include_once 'includes/footer.inc.php' ?>