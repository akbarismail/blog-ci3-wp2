<?php $this->load->view('admin/header_view'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>View Blog</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result) {
                    $counter = 1;
                    foreach ($result as $key => $value) {
                        echo "<tr>
                        <td>" . $counter . "</td>
                        <td>" . $value['blog_title'] . "</td>
                        <td>" . $value['blog_desc'] . "</td>
                        <td><img src='" . base_url() . $value['blog_img'] . "' class='img-fluid' width='100' ></td>
                        <td><a class=\"btn btn-info\" href='" . base_url() . 'admin/blogs/edit_blog/1' . "'>Edit</a>
                            <a class=\"btn btn-danger\" href='" . base_url() . 'admin/blogs/delete_blog/1' . "'>Delete</a>
                        </td>
                    </tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No Records Found</td></tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</main>

<?php $this->load->view('admin/footer_view'); ?>