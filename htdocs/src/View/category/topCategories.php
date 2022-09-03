<?php $images = $this->data['data']['images'];
$categories = $this->data['data']['categories'];
?>
<!-- catatgories start -->
  <div class='category-list bg-success'>
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-light">
          <h4>Explore Catagories</h4>
        </div>
      </div>
      <div class="row">
        <?php foreach ($categories as $category) { ?>
        <div class="col-md-4 col-sm-6 ">
          <a href="/image?category=<?php echo $category[
              'category'
          ]; ?>" class="card-ref text-body">
            <div class="card border-1 border-dark mb-3 overflow-hidden category-title">
              <div class="card-body bg-primary bg-opacity-25">
                <h4 class="card-text ">
                  <?php echo $category['category']; ?>
                </h4>
              </div>
              <img
                class="image-card"
                src="<?php foreach ($images as $image) {
                    if ($image->getCategory() == $category['category']) {
                        echo $image->getPath();
                        break;
                    }
                } ?>"
                alt=""
              />
            </div>
          </a>
        </div> 
        <?php } ?>
      </div>
    </div>
  </div>
<!-- catatgories end -->
