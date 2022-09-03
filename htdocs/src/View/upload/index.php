<?php include VIEW . 'header.php'; ?>

<!-- Upload start -->
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-12 text-light">
          <h3>
            Upload image of GIF
          </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="/upload/upload" method='POST' enctype='multipart/form-data' class='text-light'>
            <div class="form-group">
              <label for="">File Name</label>
              <input type="text" name ='title' required class="form-control" />
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" required name='description' rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="category" id="">
                <option value="Nature">Nature</option>
                <option value="Urban">Urban</option>
                <option value="Outer Space">Outer Space</option>
                <option value="Food">Food</option>
                <option value="People">People</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Upload Type</label>
              <div class="form-inline">
                <label for="">
                  <input type="radio" onclick="changeUploadType('online-file')" name="upload-type" value = 'online-file' checked/>
                  Online File
                </label>
                <label for="">
                  <input type="radio"  onclick="changeUploadType('local-file')"name="upload-type" value='local-file'/>
                  Local File
                </label>
              </div>
            </div>
            <div class="form-group" id='online-file'>
              <label for="">Image URL</label>
              <input type="text" name='image-url' class="form-control" />
            </div>
            <div class="form-group" id='local-file'>
              <label for="">Choose Local File</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">
                  Upload
                </label>
                <input type="file" name='file' class="form-control" id="inputGroupFile01" />
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php if (isset($_SESSION['userId'])) { ?>
                  <button class="btn btn-primary btn-lg" type='submit'>Upload</button>
                <?php } else { ?>
                  <p>Please, login to upload an image</p>
                <?php } ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- upload end -->

<?php include VIEW . 'footer.php'; ?>
