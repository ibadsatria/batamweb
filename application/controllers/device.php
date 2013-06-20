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
		$device = new Device();
		$data = array();
		$id = Input::get('deviceno');
		
		if($this->checkifexists($id)) {
			$data['error_message'] = 'id ' . $id . ' already exists!';
		} else {
			$device->id = $id;
			$device->IP = Input::get('ip');
			$device->port = Input::get('port');
			$data['success_message'] = 'successfully save device conf, id '. $id . '!';
			$device->save();
		}
		$device = null;
		return Redirect::to('/')->with('data', $data);
	}
}