<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h2>Add Blog</h2>
    </div>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blogs/add_blog_post'; ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="blog_title" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="blog_desc" class="form-control" cols="30" rows="5" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="blog_img">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</main>

<?php $this->load->view('admin/footer_view'); ?>

<script>
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == "yes") {
            echo "alert('Data Inserted Success')";
        } else if ($_SESSION['inserted'] == "no") {
            echo 'alert("Not Inserted")';
        }
        return;
    }
    ?>
</script>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('blog_desc');
</script>