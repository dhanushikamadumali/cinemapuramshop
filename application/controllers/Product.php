<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Common_model');
		$this->Common_model->is_logged_in();
		$this->load->library('upload');
		
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('product/category/add_category');
		$this->load->view('template/footer');
		
	}
	// add category
	public function category_ajax(){
		$this->load->view('product/category/ajax');
	}

	
	public function view_category()
	{
		$this->load->view('template/header');
		$this->load->view('product/category/view_category');
		$this->load->view('template/footer');
		
	}
    public function edit_category()
	{
		$this->load->view('template/header');
		$this->load->view('product/category/edit_category');
		$this->load->view('template/footer');
		
	}
	// end category

	// add unit
	public function add_unit()
	{
		$this->load->view('template/header');
		$this->load->view('product/unit/add_unit');
		$this->load->view('template/footer');
		
	}
	public function unit_ajax(){
		$this->load->view('product/unit/ajax');
	}

	public function view_unit()
	{
		$this->load->view('template/header');
		$this->load->view('product/unit/view_unit');
		$this->load->view('template/footer');
		
	}
	public function edit_unit()
	{
		$this->load->view('template/header');
		$this->load->view('product/unit/edit_unit');
		$this->load->view('template/footer');
		
	}
	// end unit


	// add manufature
	public function add_manu()
	{
		$this->load->view('template/header');
		$this->load->view('product/manufature/add_manufature');
		$this->load->view('template/footer');
		
	}
	public function manu_ajax(){
		$this->load->view('product/manufature/ajax');
	}
	public function view_manu()
	{
		$this->load->view('template/header');
		$this->load->view('product/manufature/view_manufature');
		$this->load->view('template/footer');
		
	}
	public function edit_manu()
	{
		$this->load->view('template/header');
		$this->load->view('product/manufature/edit_manufature');
		$this->load->view('template/footer');
		
	}
	// end manufature
	// add product
	public function add_product()
	{
		$this->load->view('template/header');
		$this->load->view('product/product/add_product');
		$this->load->view('template/footer');
		
	}
	public function product_ajax(){
		$this->load->view('product/product/ajax');
	}
	public function view_product()
	{
		$this->load->view('template/header');
		$this->load->view('product/product/view_product');
		$this->load->view('template/footer');
		
	}
	public function edit_product()
	{
		$this->load->view('template/header');
		$this->load->view('product/product/edit_product');
		$this->load->view('template/footer');
		
	}
	public function cropimage()

	{
		
		$folderPath = 'assets/content/product_images/';

		$image_parts = explode(";base64,", $_POST['image']);
		// var_dump($image_parts);
		$image_type_aux = explode("image/", $image_parts[0]);
		// var_dump($image_type_aux);
		$image_type = $image_type_aux[1];
		// var_dump($image_type);
		$image_base64 = base64_decode($image_parts[1]);
		// var_dump($image_base64);
		$file = $folderPath . uniqid() . '.png';
		// var_dump($file);
		// $fn=time().'.png';
		file_put_contents($file, $image_base64);
		echo json_encode($file);

		
	}

	// end product
	public function view_product_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		// $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
		// $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
		// $this->db->join("branch","branch.id=sales_order.branch_id");
		//    $order = $this->Common_model->get_all('sales_order')->result();
		// $product =$this->db->query("SELECT product_information.*,manufacturer_information.manufacturer_name as mname,product_category.category_name as cname FROM product_information 
        //                             LEFT JOIN product_category ON product_category.id=product_information.category_id LEFT JOIN manufacturer_information ON manufacturer_information.id=product_information.manufacturer_id")->result();
		$this->datatables->select("product_information.image  as dtb_proimage,product_information.image2  as dtb_proimage2,product_information.id  as DT_RowId,
									product_information.product_name as dtb_proname,
									product_information.product_code as dtb_procode,
									product_information.purchase_price as dtb_purprice,
									product_information.manufacturer_price as dtb_manuprice,
									product_information.package_charge as dtb_pkgprice,
									product_information.status as dtb_status, 
									manufacturer_name as dtb_mname, 
									category_name as dtb_cname, 
									");
		$this->datatables->join('manufacturer_information','manufacturer_information.id = product_information.manufacturer_id',"left");					
		$this->datatables->join('product_category','product_category.id = product_information.category_id',"left");					
		$this->datatables->from("product_information");
		// var_dump($this->input->post("pu_mid"));
		if($this->input->post("pu_mid") != null):
			$this->datatables->where(array("product_information.manufacturer_id"=> trim($this->input->post("pu_mid"))) );
		endif;//end check filter
		// if($this->input->post("pu_stat") != null):
		// 	$this->datatables->where(array("invoice.status"=> trim($this->input->post("pu_stat"))) );
		// endif;//end check filter
		// if($this->input->post("pu_dt") != null):
		// 	$this->datatables->like(array("invoice.date"=> trim($this->input->post("pu_dt"))) );
		// endif;//end check filter
		// if($this->input->post("pu_pytp") != null):
		// 	$this->datatables->like(array("invoice.payment_type"=> trim($this->input->post("pu_pytp"))) );
		// endif;//end check filter
		// if($this->input->post("pu_bnk") != null):
		// 	$this->datatables->like(array("invoice.bank_id"=> trim($this->input->post("pu_bnk"))) );
		// endif;//end check filter
		// if($this->input->post("pu_inv") != null):
		// 	$this->datatables->like(array("invoice.invoice_id"=> trim($this->input->post("pu_inv"))) );
		// endif;//end check filter
		$this->datatables->add_column("renival_igGrt", "$1" ,"DT_RowId");
		echo $this->datatables->generate();

	}//End Purchase view datatable ajax


 
	public function pick_me_food()
	{
		$this->load->view('template/header');
		$this->load->view('report/pickmefood');
		$this->load->view('template/footer');
		
	}
	
	// featured product
	public function featured_product()
	{
		$this->load->view('template/header');
		$this->load->view('product/product/featured_product');
		$this->load->view('template/footer');
		
	}
	

}