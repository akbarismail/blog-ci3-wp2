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
                        <td><a class=\"btn btn-info\" href='" . base_url() . 'admin/blogs/edit_blog/' . $value['blogid'] . "'>Edit</a>
                            <a class=\"btn delete btn-danger\" data-id='" . $value['blogid'] . "'>Delete</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(".delete").click(function() {
        let deleteId = $(this).attr('data-id');
        let isConfirm = confirm('Are you sure want to delete the blog ?');

        if (isConfirm) {
            $.ajax({
                url: '<?= base_url() . 'admin/blogs/delete_blog/' ?>',
                type: 'post',
                data: {
                    'deleteId': deleteId
                },
                success: function(res) {
                    console.info(res);
                    if (res == "deleted") {
                        location.reload();
                    }
                }
            })
        }
    })

    <?php

    if (isset($_SESSION['updated'])) {
        if ($_SESSION['updated'] == "yes") {
            echo 'alert("Data has been updated")';
        } else if ($_SESSION['updated'] == "no") {
            echo 'alert("Some with wrong")';
        }
        return;
    }


    ?>
</script>