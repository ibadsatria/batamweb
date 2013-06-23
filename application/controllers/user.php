<?php

class User_Controller extends Controller {

	public function action_index() {
		return $this->retrievepageindex();
	}
	
	public function action_view() {
		$data['users'] = User::all();
		return $this->retrievepageview($data);
	}
	
	private function retrievepageindex($data = NULL) {
		return View::make('home.registration', $data);
	}
	
	private function retrievepageview($data=NULL) {
		return View::make('table.userview')->with($data);
	}
	
	private function checkifexists($id) {
		return User::find($id) != null;
	}

	public function action_reg() {
		header('Content-type: application/json');
		
		$user = new User();
		$data = array();
		$id = Input::get('userid');
		$response_array = array();
		$response_array['iditem'] = $id;
		
		if($this->checkifexists($id)) {
			//$data['error_message'] = 'id ' . $id . ' already exists!';
			$response_array['status'] = 'error';
		} else {
			$user->id = $id;
			$user->name = Input::get('fullname');
			$user->card_serial_number = Input::get('csn');
			$user->password = Input::get('password');
			$repassword = Input::get('password2');
			if(Input::get('isactive') != null) $user->active = true;
			$user->authority = Input::get('priviledge');
			//$data['success_message'] = 'successfully save user id '. $id . '!';
			$user->save();
			
			$user = null;
			$response_array['status'] = 'success';
		}
		echo json_encode($response_array);
	}
	
	public function action_delete($id) {
		header('Content-type: application/json');
		
		$user = User::find($id);
		
		$response_array = array();
		$response_array['iditem'] = $id;
		if($user->delete()) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
		}
		
		echo json_encode($response_array);
	}
	
	
}