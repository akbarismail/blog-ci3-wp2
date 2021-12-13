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
        print_r($blog_id);
    }

    public function delete_blog($blog_id)
    {
        print_r($blog_id);
    }
}
