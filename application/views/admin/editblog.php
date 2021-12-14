<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>Edit Blog</h2>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blogs/edit_blog_post'; ?>" method="post">
        <div class="form-group">
            <input type="text" value="<?= $result[0]['blog_title'] ?>" class="form-control" name="blog_title" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="blog_desc" class="form-control" cols="30" rows="5" placeholder="Description"><?= $result[0]['blog_desc'] ?></textarea>
        </div>
        <div class="form-group">
            <img width="250" src="<?= base_url() . $result[0]['blog_img'] ?>" alt="">
            <input type="file" class="form-control" name="blog_img">
        </div>

        <button type="submit" class="btn btn-primary">Edit Blog</button>
    </form>
</main>

<?php $this->load->view('admin/footer_view'); ?>

<script>
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == "yes") {

            echo "alert('Data Inserted Success')";
        } else {
            echo "alert('Not Inserted')";
        }
        return;
    }
    ?>
</script>