<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="alert alert-primary" role="alert">
                <a href="<?= base_url() . 'admin/blogs/addBlog' ?>">Add Blog</a>
            </div>
        </div>
        <div class="col-3">
            <div class="alert alert-secondary" role="alert">
                <a href="<?= base_url() . 'admin/blogs' ?>">View Blog</a>
            </div>
        </div>
    </div>
</main>

<?php $this->load->view('admin/footer_view'); ?>