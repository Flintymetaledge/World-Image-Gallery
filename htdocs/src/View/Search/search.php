<?php include VIEW . 'header.php'; ?>
<?php $images = $this->data['data']['images']; ?>

<div class="container mt-3 mb-3 text-light">
  <div class="row">
    <div class="col-md-12 text-light">
    <h3><?php echo sizeof($images); ?> results for "<b><?php echo $_GET[
     'query'
 ]; ?>"</b> 
 found</h3>
    </div>
  </div>
</div>
<?php include VIEW . 'image/imagesList.php'; ?>

<?php include VIEW . 'footer.php'; ?>
