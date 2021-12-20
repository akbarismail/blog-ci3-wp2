<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h2>Edit Blog</h2>
    </div>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blogs/edit_blog_post'; ?>" method="post">
        <select name="publish_unpublish" class="custom-select mb-3">
            <option value="1" <?= ($result[0]['status'] == "1" ? "selected" : "") ?>>Publish</option>
            <option value="0" <?= ($result[0]['status'] == "0" ? "selected" : "") ?>>Unpublish</option>
        </select>

        <input type="hidden" name="blog_id" value="<?= $blog_id ?>" id="">

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

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</main>

<?php $this->load->view('admin/footer_view'); ?>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('blog_desc');
</script>