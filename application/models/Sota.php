<?php

class Sota extends CI_Model {

	function get_all() {
		$CI =& get_instance();
		$CI->load->model('logbooks_model');
		$logbooks_locations_array = $CI->logbooks_model->list_logbook_relationships($this->session->userdata('active_station_logbook'));

		$this->db->where_in("station_id", $logbooks_locations_array);
		$this->db->order_by("COL_SOTA_REF", "ASC");
		$this->db->where('COL_SOTA_REF !=', '');

		return $this->db->get($this->config->item('table_name'));
	}
}

?>
