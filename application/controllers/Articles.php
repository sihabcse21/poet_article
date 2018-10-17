<?php class Articles extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isUserLoggedIn')) {
            $this->load->model('Article');
            $this->load->model('user');
        }
    }

    public function index(){
        $data           = $this->data_array('article');
        $data['file']   = 'index';
        $data['result'] = $this->Article->showAllData('articles');
        $data['user']   = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function data_array($var){
        $data['title']       = $var;
        $data['header']      = $var;
        $data['nav_bar']     = $var;
        $data['table_title'] = $var;
        $data['ctrl']        = $this->uri->segment(1);
        $data['func']        = $var;
        $data['add']         = 'Add';
        $data['edit']        = 'Edit';
        $data['view']        = 'View';
        $data['save']        = 'Save';
        $data['update']      = 'Update';
        $data['delete']      = 'Delete';
        $data['folder']      = $var;
        return $data;
    }

    public function articleAdd(){
        $data                   = $this->data_array('article');
        $data['file']           = 'add';
        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function articleSave(){
        $insert_data = array(
            'title'                => $this->input->post('title'),
            'content'                => $this->input->post('content'),
            'status_id'           => $this->input->post('status_id')
        );
        $this->Article->insertData('articles', $insert_data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

    public function articleView(){
        $data                  = $this->data_array('article');
        $data['file']          = 'view';
        $id                    = $this->uri->segment(3);
        $table                 = 'articles';
        $col_name              = 'id';
        $data['result']        = $this->Article->getDataByIdRow($table, $col_name, $id);
        $data['user']          = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function articleEdit(){
        $data                  = $this->data_array('article');
        $data['file']          = 'edit';
        $id                    = $this->uri->segment(3);
        $table                 = 'articles';
        $col_name              = 'id';
        $data['result']        = $this->Article->getDataByIdRow($table, $col_name, $id);

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function articleUpdate(){
        $id         = $this->uri->segment(3);
        $table      = 'articles';
        $col_name   = 'id';
        $update_data = array(
            'title'                => $this->input->post('title'),
            'content'                => $this->input->post('content'),
            'status_id'           => $this->input->post('status_id')
        );
        $this->Article->updateData($table, $col_name, $id, $update_data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

    public function articleDelete(){
        $id         = $this->uri->segment(3);
        $col_name   = 'id';
        $table      = 'articles';
        $data       = array('status_id' => '-999');
        $this->Article->updateData($table, $col_name, $id, $data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

}
