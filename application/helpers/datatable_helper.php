<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  edit_column callback function in Codeigniter (Ignited Datatables)
 *
 * Grabs a value from the edit_column field for the specified field so you can
 * return the desired value.
 *
 * @access   public
 * @return   mixed
 */


if ( !function_exists('id_encryption'))
{
	function id_encryption($id){
		$ci =& get_instance();
		$encryptedId = $ci->GB->url_encode($id);
		return $encryptedId;
	}
}

if ( !function_exists('get_balance'))
{
	function get_balance($id){
		$ci =& get_instance();
		$ci->db->select('customer_id');
		$cusDetails = $debAmnt = $ci->db->get_where('phr_customer_information',['id'=>$id])->result();

		$ci->db->select('sum(amount) as debit');
		$debAmnt = $ci->db->get_where('phr_customer_ledger',['customer_id'=>$cusDetails[0]->customer_id,'d_c'=>'d'])->result();

		$ci->db->select('sum(amount) as credit');
		$credAmnt = $ci->db->get_where('phr_customer_ledger',['customer_id'=>$cusDetails[0]->customer_id,'d_c'=>'c'])->result();

		$balance = $debAmnt[0]->debit - $credAmnt[0]->credit;

		return number_format($balance,'2','.',',');
	}
}

if ( !function_exists('num_format'))
{
	function num_format($nmbr){
		return number_format($nmbr,'2','.',',');
	}
}
