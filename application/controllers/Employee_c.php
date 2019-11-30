<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/30/2019
 * Time: 8:51 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_m', 'E');

        $this->session->set_flashdata('flashError', '');
        $this->session->set_flashdata('flashSuccess', '');
    }
    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('Employee_v');
        $this->load->view('partials/footer');
    }
    public function LoadJobCategoriesAndDesignations()
    {
        $result = $this->E->LoadJobCategoriesAndDesignationsFormM();
        if (!$result) {
            $result = "No records for Job Categoty or Designation ";
        }
        echo json_encode($result);
    }
    public function saveEmployee_c()
    {
        $empID = $this->input->post('empID');
        $empImage['empImage'] = $_FILES['empImage']['name'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fName', 'First Name', 'alpha');
        $this->form_validation->set_rules('mName', 'Middle Name', 'alpha');
        $this->form_validation->set_rules('lName', 'Last Name', 'alpha');
        $this->form_validation->set_rules('nicNo', 'NIC No', 'required');
        $this->form_validation->set_rules('addL1', 'Address Line 1', 'required');
        $this->form_validation->set_rules('contactNumberM', 'Contact No Mobile', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('contactNumberH', 'Contact No Home', 'numeric|exact_length[10]');
        $this->form_validation->set_rules('joinDate', 'Join Date', 'required');
        $this->form_validation->set_rules('description', 'Description', 'alpha_numeric_spaces');

        //file upload start
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 12224;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;

        if ($this->form_validation->run() == true) {
            if ($empID && !$empImage['empImage']) {
                // echo "no image".$empImage['empImage'];
                $result =  $this->E->updateEmpM(true);
                if ($result) {
                    $this->session->set_flashdata('flashSuccess', 'Employee updated successfully !');
                }
                else{
                    $this->session->set_flashdata('flashError', 'Employee upload failed !');
                }
            }
            else{
                $config['file_name'] = $this->input->post('nicNo') . '_' . $_FILES['empImage']['name']; //this name also created in employee model to generate name
                $this->load->library('upload', $config);
                if($this->upload->do_upload('empImage')){
                    if ($empID) {
                        $result = $this->E->updateEmpM(false);
                        if ($result) {
                            $this->session->set_flashdata('flashSuccess', 'Employee updated successfully !');
                        }
                        else{
                            $this->session->set_flashdata('flashError', 'Employee update failed !');
                        }
                    }
                    else{
                        $result = $this->E->saveEmployee_m();
                        if($result){
                            $this->session->set_flashdata('flashSuccess', 'Employee added successfully !');
                        }
                        else{
                            $this->session->set_flashdata('flashError', 'Employee is already added !');
                        }
                    }
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    $error =  $error['error'];
                    $this->session->set_flashdata('flashError', "$error");
                }
            }
        }
        $this->load->view('partials/header');
        $this->load->view('Employee_v');
        $this->load->view('partials/footer');




        // if ($empID && !$empImage) {
        //     // echo 'image no need to update';
        // }
        // else{
        //     // echo 'need to update';
        //     $config['file_name'] = $this->input->post('nicNo') . '_' . $_FILES['empImage']['name']; //this name also created in employee model to generate name
        // //  $this->load->library('upload', $config);
        // //file upload end
        // }


        // if ($this->form_validation->run() == false) {
        //     $this->load->view('partials/header');
        //     $this->load->view('Employee_v');
        //     $this->load->view('partials/footer');
        // } else {

        //     if (!$empID) {
        //         $result = $this->E->saveEmployee_m();


        //         if (!$result) {
        //             $this->session->set_flashdata('flashError', 'Employee already added!');
        //         } else if (!$this->upload->do_upload('empImage')) {
        //             $error = array('error' => $this->upload->display_errors());
        //             $error =  $error['error'];
        //             $this->session->set_flashdata('flashError', "$error");

        //             $this->load->view('partials/header');
        //             $this->load->view('Employee_v');
        //             $this->load->view('partials/footer');
        //         } else {
        //             $this->session->set_flashdata('flashSuccess', 'Employee added successfully !');
        //         }
        //     }
        //     else{
        //         echo 'ready to update';
        //     }
// $this->load->view('partials/header');
// $this->load->view('Employee_v');
// $this->load->view('partials/footer');
        // }
    }
    public function viewEmployees()
    {
        $this->load->view('partials/header');
        $this->load->view('Employee/viewEmployees');
        $this->load->view('partials/footer');
    }
    public function getAllEmployees()
    {
        $result =  $this->E->getAllEmpolyeesFromM();
        echo json_encode($result);
    }
    public function deleteEmployee()
    {
        $msg['message'] = 'Failed to delete user';

        $result = $this->E->deleteEmployeeM();

        if ($result) {
            $msg['message'] = 'User deleted successfully!';
        }
        echo json_encode($msg);
    }
    public function updateEmployee()
    {
        if (isset($this->session->userdata['uName']) && $this->session->userdata['uRole']=='Admin') {
            $empID = $this->input->get('empID');
            $result = $this->E->selectUserForUpdate($empID);


            if ($result) {
                $this->load->view('partials/header');
                $this->load->view('Employee_v', $result);
                $this->load->view('partials/footer');
            } else {
                $this->load->view('partials/header');
                $this->load->view('Employee/viewEmployees');
                $this->load->view('partials/footer');
            }
        }
        else{
            header('Location:' .base_url('index.php/Login_c/logOut'));
        }
    }
}
