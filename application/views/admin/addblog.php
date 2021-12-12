<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>Add Blog</h2>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blogs/add_blog_post'; ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="blog_title" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="blog_desc" class="form-control" cols="30" rows="8" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="blog_img">
        </div>

        <button type="submit" class="btn btn-primary">Add Blog</button>
    </form>
</main>
</div>
</div>

<?php $this->load->view('admin/footer_view'); ?>

<script>
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == "yes") {
            // echo '<div class="alert alert-success" role="alert">';
            // echo 'A simple success alert—check it out!';
            // echo '</div>';
            echo "alert('Data Inserted Success')";
        } else {
            echo "alert('Not Inserted')";
        }
    }
    ?>
</script>