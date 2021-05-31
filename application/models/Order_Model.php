<?php

class Order_Model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->load->database();
	}

	public function category() {

		$this->db->group_by('category');
		return $this->db->get('tb_services');
	}

	public function services($category) {

		if (empty($category)) {
			
			return false;

		} else {

			$get = $this->db->get_where('tb_services', array('category' => $category, 'status' => 'Aktif'));

			if ($get->num_rows() <= 0) {
				
				return false;

			} else {

				return $get;

			}
		}
	}

	public function service_data($id) {

		$get = $this->db->get_where('tb_services', array('id' => $id));

		if ($get->num_rows() <= 0) {
				
			return "Tidak Layanan";

		} else {

			$custom_array = array(749, 861, 873, 876, 952);

			if (in_array($id, $custom_array, true)) {
				$custom_comments = 'yes';
			} else {
				$custom_comments = in_array($id, $custom_array, true);
			}

			$data = array(
				'msg' => array(
					'price' => $get->row()->price,
					'min' => $get->row()->min,
					'max' => $get->row()->max,
					'note' => $get->row()->note,
					'custom' => $get->row()->custom
				)
			);
			
			return json_encode($data);
		}
	}

	public function total_price($id, $quantity) {

		$get = $this->db->get_where('tb_services', array('id' => $id));

		if ($get->num_rows() <= 0 || $id == 0) {
			
			return json_encode(array('total_price' => 0));

		} else {

			$price = $get->row()->price;

			$total_price = (($price / 1000 * 1.10) * $quantity);

			return json_encode(array('total_price' => $total_price));
		}
	}
}