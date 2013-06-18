<?php

class User_Controller extends Controller {

	public function action_index() {
		return $this->retrievepage();
	}
	
	private function retrievepage($data = NULL) {
		return View::make('home.index', $data);
	}

	public function action_reg() {
		$user = new User();
		$data = array();
		
		$user->id = Input::get('userid');
		$user->name = Input::get('fullname');
		$user->card_serial_number = Input::get('csn');
		$user->password = Input::get('password');
		$repassword = Input::get('password2');
		$user->active = Input::get('isactive') != NULL ? true : false;
		$user->authority = Input::get('priviledge');
		
		if($user->id == NULL | $user->fullname) {
			$data['error_message'] .= '<br /> User cannot be null';
		} else { //success
			if($user->password !== $repassword) {
				$data['error_message'] .= '<br />passwords not match';
			} else {
				$data['success_message'] = 'successfully saved user!';
				$user->save();
			}
		}	
		return $this->retrievepage($data);
	}
	
	public function action_rege() {
		$data['id'] = Input::get('userid');
		$data['fullname'] = Input::get('fullname');
		$data['csn'] = Input::get('csn');
		$data['password'] = Input::get('password');
		$data['repassword'] = Input::get('password2');
		$data['isactive'] = Input::get('isactive');
		$data['priviledge'] = Input::get('priviledge');
		
		if($data['id'] == NULL) {
			return 'kosong';
		}
		dd($data);
	}
}