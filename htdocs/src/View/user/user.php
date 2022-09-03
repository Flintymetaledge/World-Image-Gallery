<?php include VIEW . 'header.php'; ?>

<?php $user = $this->data['data']['user']; ?>
<?php if ($user) { ?>
  <div class="container border-5 rounded mt-3 p-2 bg-light">
    <div class="row">
      <div class="col-md-4">
        <h6 class='text-decoration-underline mb-0'>Viewing profile of:</h6>
        <h3><?php echo $user->getUserName(); ?></h3>
        #<?php echo $user->getId(); ?>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
    <h4 class='text-decoration-underline mt-3'>Details</h4>
    <div class="row">
      <div class="col-md-6">
            <p>Email:
            <?php echo $user->getEmail(); ?>
            </p>
          </div>
        <div class="col-md-6">
        <p>Created Account:
            <?php echo $user->getCreatedAt(); ?>
            </p>
        </div>
      </div>
      <hr>
      <?php include VIEW . 'image/imagesList.php'; ?>
  </div>
<?php } else { ?>
  <h1 class='text-center'>Please log in to view user profile</h1>
<?php } ?>

<?php include VIEW . 'footer.php'; ?>
