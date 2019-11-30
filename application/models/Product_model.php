<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/28/2019
 * Time: 11:18 PM
 */
class Product_model extends CI_Model{
    public function loadProductCategories(){
        $query = $this->db->query("SELECT * FROM productcategories");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function addProductDetails(){
//        $data = array(
////            'varProductName' => $this->input->post('pName'),
////            'doubleUnitPrice' => $this->input->post('unitPrice'),
////            'varProductDescription' => $this->input->post('ProductDescription'),
////            'intproductCategoryID' => $this->input->post('pCategoryID')
//            'varProductName' => 'Singer',
//            'doubleUnitPrice' => '17000.00',
//            'varProductDescription' => '17inches',
//            'intproductCategoryID' => '1'
//        );
        $pName = $this->input->post('pName');
        $unitPrice = $this->input->post('unitPrice');
        $pDescription = $this->input->post('ProductDescription');
        $pCategoryId = $this->input->post('pCategoryID');

        $savePrductDetailsStoredProc = "CALL saveProductData('".$pName."','".$unitPrice."','".$pDescription."','".$pCategoryId."')";

        $query = $this->db->query($savePrductDetailsStoredProc);

        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function loadProductSupplier(){
        $query = $this->db->query("SELECT intVendorID,varVName FROM supplier");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
}