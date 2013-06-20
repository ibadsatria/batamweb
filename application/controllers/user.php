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
		$user = new User();
		$data = array();
		$id = Input::get('userid');
		
		if($this->checkifexists($id)) {
			$data['error_message'] = 'id ' . $id . ' already exists!';
		} else {
			$user->id = $id;
			$user->name = Input::get('fullname');
			$user->card_serial_number = Input::get('csn');
			$user->password = Input::get('password');
			$repassword = Input::get('password2');
			if(Input::get('isactive') != null) $user->active = true;
			$user->authority = Input::get('priviledge');
			$data['success_message'] = 'successfully save user id '. $id . '!';
			$user->save();
		}		
		$user = null;
		return Redirect::to('/')->with('data', $data);
	}
	
	
}