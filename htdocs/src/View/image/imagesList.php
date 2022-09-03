<?php
$images = $this->data['data']['images']; ?>

<!-- Images Start -->
<div class = 'container-fluid bg-dark border-top border-bottom border-primary rounded border-2 image-list'>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-light text-decoration-underline">Explore 
          <?php if (isset($this->data['data']['user'])) {
              echo $this->data['data']['user']->getUserName() . ' Uploads';
          } else {
              echo isset($_GET['category']) ? $_GET['category'] : 'images';
          } ?></h2>
      </div>
    </div>
    <!-- Image card template that values are retrived from the image model -->
    <div class="row">
      <?php foreach ($images as $image) { ?>
        <div class="col-md-4 col-lg-3 col-sm-6" >
          <div class="card rounded-2 border mb-3 border-dark overflow-hidden">
            <a href="/image?id=<?php echo $image->getId(); ?>" class='card-ref text-body'>
              <img class="image-card" src="<?php echo $image->getPath(); ?>" alt=""/>
              <div class="card-body ">
                <h4 class="card-title">
                  <?php echo $image->getTitle(); ?>
                </h4>
                <p class='card-text'><?php echo $image->getUserName(); ?></p>
              </div>
            </a>
            <div class="card-footer">
              <div class="row">
              <?php if (isset($_SESSION['userId'])) { ?>
                <div class="col-2">
                  <a href="/image?vote=down&id=<?php echo $image->getId(); ?>" class="fas fa-arrow-down border-0 rounded-circle card-ref bg-light mt-1"></a>
                </div>
                <div class="col-2">
                  <a href="/image?vote=up&id=<?php echo $image->getId(); ?>" class="fas fa-arrow-up border-0 rounded-circle card-ref bg-light mt-1"></a>
                </div>
              <?php } else { ?>
                <div class="col-4">
                  <h6>Votes:</h6>
                </div>
              <?php } ?>
                <div class="col-4">
                 <?php echo $image->getVotes(); ?>
                </div>
                <div class="col-4 text-end">
                  <i class="fas fa-eye"></i><?php echo $image->getViews(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
  <!-- Images End -->