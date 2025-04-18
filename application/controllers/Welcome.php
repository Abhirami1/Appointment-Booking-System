<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function save_appointment_time()
	{
		
		$this->load->view('welcome_message');
	}


	public function check_slot_availability()
	{
		
		$time = $this->input->post('time');
		$date = $this->input->post('date');
		
	    $sql="SELECT * FROM slot_booking WHERE slot='$time' and D_DATE='$date'";
		$query = $this->db->query($sql);
		$result = $query->row();
		if($result)
		{
			$response = array(
				'available' => false,
				'time' => $time,
				'date' => $date
			);	
		}
		else
		{
			$response = array('available' => true);
		}
	
		
		echo json_encode($response);
		exit;
	}







	public function booking_page()
	{
		$this->load->view('booking_page');
	}


	public function save_appointment()
	{
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$date = $this->input->post('date');
		$time = $this->input->post('time');

		$data = array(
			'c_name' => $name,
			'n_mobile' => $mobile,
			'd_date' => $date,
			'slot' => $time
		);

		if ($this->db->insert('slot_booking', $data)) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
		
		exit;
	}



 public function get_booked_slots()
 {
	$date = $this->input->post('date');
	$sql = "SELECT * FROM slot_booking WHERE d_date='$date'";
	$query = $this->db->query($sql);
	$result = $query->result();
	$booked_slots = array();

	foreach ($result as $row) {
		$booked_slots[] = $row->slot;
	}

	echo json_encode(array('booked_slots' => $booked_slots));
	exit;




 }







}
