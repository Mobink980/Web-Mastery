<?php
include VIEW . "header.php";
?>

    <!-- upload start -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Upload Image or GIF</h3>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="filename">Filename / Title</label>
                    <input id="filename" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="area">Description</label>
                    <textarea name="area" id="area" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="cat-select">Category</label>
                    <select class="form-control" name="cat-select" id="cat-select">
                        <option value="">Nature</option>
                        <option value="">Urban</option>
                        <option value="">Outer Space</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cat-select">Upload Type</label>
                    <div class="form-inline">

                        <label for="">
                            <input type="radio" name="upload-type"> Online File
                        </label>
                        <pre>  </pre>
                        <label for="">
                            <input type="radio" name="upload-type"> Local File
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label for="">Choose Local File</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Upload</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- upload end -->


<?php
include VIEW . "footer.php";
?>








