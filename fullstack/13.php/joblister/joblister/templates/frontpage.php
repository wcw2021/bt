<?php include 'inc/header.php'; ?>
      <div class="jumbotron">
        <h1 class="text-primary display-3 text-center">Find A Job</h1>
        <form method="GET" action="index.php">
            <select name="category" class="form-control">
                <option value="0">Choose Category</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <div class="text-center">
              <input type="submit" class="btn btn-lg btn-success" value="FIND">
            </div>
        </form>
      </div>

      <div class="container">
        <h3 class="mb-4"><?php echo $title; ?></h3>
      	<?php foreach($jobs as $job): ?>
        	<div class="row my-2">
            <div class="col-md-10">
              <h4 class="text-primary mt-0"><?php echo $job->job_title; ?></h4>
              <p class="lead"><?php echo $job->description; ?></p>
              <p class="text-muted">Category: <?php echo $job->cname; ?></p>
            </div>
            <div class="col-md-2">
            		<a class="btn btn-secondary" href="job.php?id=<?php echo $job->id; ?>">View</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

<?php include 'inc/footer.php'; ?>
