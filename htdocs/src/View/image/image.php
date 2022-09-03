<?php include VIEW . 'header.php'; ?>
<?php $image = $this->data['data']; ?>
<!-- image start -->
<div class="container mt-3">
      <div class="row">
        <div class="col-md-9">
          <h3 class='text-light'><?php echo $image->getTitle(); ?></h3>
        </div>
        <div class="col-md-12 col-lg-10">
          <img
            class="card-img-top border rounded rounded-2"
            src="<?php echo $image->getPath(); ?>"
            alt=""
          />
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <p>
                    By
                    <a href=""><?php echo $image->getUserName(); ?></a>
                    on
                    <?php echo $image->getCreatedAt(); ?>
                  </p>
                  <div class="row">
                    <div class="col-2 m-1">
                      <a href="/image?vote=down&id=<?php echo $image->getId(); ?>" class="fas fa-arrow-down border-0 rounded-circle card-ref bg-light mt-1"></a>
                      <a href="/image?vote=up&id=<?php echo $image->getId(); ?>" class="fas fa-arrow-up border-0 rounded-circle card-ref bg-light ms-1 mt-1"></a>
                      <?php echo $image->getVotes(); ?>
                    </div>
                    <div class="col-2 m-1">
                      <i class="fas fa-eye"></i><?php echo $image->getViews(); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <h5>Description</h5>
                    <p><?php echo $image->getDescription(); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <!-- image end -->

<?php include VIEW . 'footer.php'; ?>
