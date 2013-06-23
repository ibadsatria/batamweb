<?php

class Device_Controller extends Controller {

	public function action_index() {
		return $this->retrievepageindex();
	}
	
	public function action_view() {
		$data['devices'] = Device::all();
		return $this->retrievepageview($data);
	}
	
	private function retrievepageindex($data = NULL) {
		return View::make('home.registration', $data);
	}
	
	private function retrievepageview($data=null) {
		return View::make('table.deviceview')->with($data);
	}
	
	private function checkifexists($id) {
		return Device::find($id) != null;
	}
	
	public function action_reg() {
		header('Content-type: application/json');
		
		$device = new Device();
		$data = array();
		$id = Input::get('deviceno');
		$response_array['iditem'] = $id;
		
		if($this->checkifexists($id)) {
			$response_array['status'] = 'error';			
		} else {
			$device->id = $id;
			$device->IP = Input::get('ip');
			$device->port = Input::get('port');
			$data['success_message'] = 'successfully save device conf, id '. $id . '!';
			$device->save();
			
			$device = null;
			$response_array['status'] = 'success';
		}		
		echo json_encode($response_array);
	}
	
	public function action_delete($id) {
		header('Content-type: application/json');
		
		$device = Device::find($id);
		
		$response_array = array();
		$response_array['iditem'] = $id;
		if($device->delete()) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
		}
		
		echo json_encode($response_array);
	}
}