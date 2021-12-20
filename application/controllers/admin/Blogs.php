<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $query = $this->db->query("SELECT * FROM `articles` ORDER BY `blogid` DESC");
        $data['result'] = $query->result_array();
        $this->load->view('admin/viewblog', $data);
    }

    public function addBlog()
    {
        $this->load->view('admin/addblog');
    }

    public function add_blog_post()
    {
        if ($_FILES) {
            // passed
            $config['upload_path']          = './assets/upload/blog_img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('blog_img')) {
                $error = array('error' => $this->upload->display_errors());
                die($error['error']);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $fileUrl = "assets/upload/blog_img/" . $data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];

                $query = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title', '$blog_desc', '$fileUrl')");

                if ($query) {
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blogs/addBlog');
                } else {
                    $this->session->set_flashdata('inserted', 'no');
                }
            }
        }
    }

    public function edit_blog($blog_id)
    {
        $query = $this->db->query("SELECT `blog_title`, `blog_desc`, `blog_img`, `status` FROM `articles` WHERE `blogid`='$blog_id'");

        $data['result'] = $query->result_array();
        $data['blog_id'] = $blog_id;
        $this->load->view('admin/editblog', $data);
    }

    public function edit_blog_post()
    {
        if ($_FILES['blog_img']['name']) {
            $config['upload_path']          = './assets/upload/blog_img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('blog_img')) {
                $error = array('error' => $this->upload->display_errors());
                die($error['error']);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $fileUrl = "assets/upload/blog_img/" . $data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];
                $blog_id = $_POST['blog_id'];
                $publish_unpublish = $_POST['publish_unpublish'];

                $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$blog_desc',`blog_img`='$fileUrl',`status`='$publish_unpublish' WHERE `blogid`='$blog_id'");

                if ($query) {
                    $this->session->set_flashdata('updated', 'yes');
                    redirect('admin/blogs');
                } else {
                    $this->session->set_flashdata('updated', 'no');
                    redirect('admin/blogs');
                }
            }
        } else {
            $blog_title = $_POST['blog_title'];
            $blog_desc = $_POST['blog_desc'];
            $blog_id = $_POST['blog_id'];
            $publish_unpublish = $_POST['publish_unpublish'];

            $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$blog_desc',`status`='$publish_unpublish' WHERE `blogid`='$blog_id'");

            if ($query) {
                $this->session->set_flashdata('updated', 'yes');
                redirect('admin/blogs');
            } else {
                $this->session->set_flashdata('updated', 'no');
                redirect('admin/blogs');
            }
        }
    }

    public function delete_blog()
    {
        $deleteId = $_POST['deleteId'];
        $query = $this->db->query("DELETE FROM `articles` WHERE `blogid`='$deleteId'");

        if ($query) {
            echo "deleted";
        } else {
            echo "Not Deleted";
        }
    }
}
