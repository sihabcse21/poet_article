<?php class Payments extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isUserLoggedIn')) {
            $this->load->model('Article');
            $this->load->model('user');
        }
    }

    public function index(){
        $data           = $this->data_array('payment');
        $data['file']   = 'index';
        $data['result'] = $this->Article->paymentDataShow('payments');
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

    public function paymentAdd(){
        $data                   = $this->data_array('payment');
        $data['file']           = 'add';
        $data['user']           = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function paymentSave(){
        $insert_data = array(
            'user_id'                => $this->input->post('user_id'),
            'amount'                 => $this->input->post('amount'),
            'payment_month'          => $this->input->post('payment_month'),
            'payment_year'           => $this->input->post('payment_year'),
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
            'status_id'              => $this->input->post('status_id')
        );
        $this->Article->insertData('payments', $insert_data);

        $user_id = $this->input->post('user_id');
        $today = new DateTime(date("Y-m-d"));
        $user_data = array(
            'is_monthly_paid' => 1,
            'subscribe_end_date' => $today->format('Y-m-t')
        );
        $this->Article->updateData('users', 'id', $user_id, $user_data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

    public function paymentView(){
        $data                  = $this->data_array('payment');
        $data['file']          = 'view';
        $id                    = $this->uri->segment(3);
        $table                 = 'payments';
        $col_name              = 'id';
        $data['result']        = $this->Article->getDataByIdRow($table, $col_name, $id);
        $data['user']           = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function paymentEdit(){
        $data                  = $this->data_array('payment');
        $data['file']          = 'edit';
        $id                    = $this->uri->segment(3);
        $table                 = 'payments';
        $col_name              = 'id';
        $data['result']        = $this->Article->getDataByIdRow($table, $col_name, $id);
        $data['user']           = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view($data['folder'] . '/' . $data['file'], $data);
    }

    public function paymentUpdate(){
        $id         = $this->uri->segment(3);
        $table      = 'payments';
        $col_name   = 'id';
        $update_data = array(
            'amount'                 => $this->input->post('amount'),
            'payment_month'          => $this->input->post('payment_month'),
            'payment_year'           => $this->input->post('payment_year'),
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
            'status_id'           => $this->input->post('status_id')
        );
        $this->Article->updateData($table, $col_name, $id, $update_data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

    public function paymentDelete(){
        $id         = $this->uri->segment(3);
        $col_name   = 'id';
        $table      = 'payments';
        $data       = array('status_id' => '-999');
        $this->Article->updateData($table, $col_name, $id, $data);
        $controller = $this->uri->segment(1);

        redirect($controller);
    }

}
