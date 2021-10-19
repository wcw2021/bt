<?php include 'inc/header.php'; ?>
<div class="container mt-4">
	<h2 class="text-primary"><?php echo $job->job_title; ?> (<?php echo $job->location; ?>)</h2>
	<small>Posted By <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?></small>
	<hr>
	<p class="lead"><?php echo $job->description; ?></p>
	<ul class="list-group">
		<li class="list-group-item"><strong>Company:</strong> <?php echo $job->company; ?></li>
		<li class="list-group-item"><strong>Salary:</strong> <?php echo $job->salary; ?></li>
		<li class="list-group-item"><strong>Contact Email:</strong> <?php echo $job->contact_email; ?></li>
	</ul>
	<br>
	<a href="index.php">&laquo; Go Back</a>
	<div class="mt-4">
			<a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-secondary mr-2">Edit</a>

			<form style="display:inline;" method="post" action="job.php">
				<input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
				<input type="submit" class="btn btn-danger" value="Delete">
			</form>
	</div>
</div>
<?php include 'inc/footer.php'; ?>
