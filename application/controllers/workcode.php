<?php

class Workcode_Controller extends Controller {

	public function action_index() {
		return $this->retrievepageindex();
	}
	
	public function action_view() {
		$data['workcodes'] = Workcode::all();
		return $this->retrievepageview($data);
	}
	
	private function retrievepageindex($data = NULL) {
		return View::make('home.registration', $data);
	}
	
	private function retrievepageview($data) {
		return View::make('table.workcodeview')->with($data);
	}
	
	private function checkifexists($id) {
		return Workcode::find($id) != null;
	}
	
	public function action_reg() {
		$workcode = new Workcode();
		$data = array();
		$id = Input::get('workcodeid');
		
		if($this->checkifexists($id)) {
			$data['error_message'] = 'id ' . $id . ' already exists!';
		} else {
			$workcode->id = $id;
			$workcode->name = Input::get('workcode');
			$workcode->remark = Input::get('remarks');
			$data['success_message'] = 'successfully save lesson code, id '. $id . '!';
			$workcode->save();
		}		
		$workcode = null;
		return Redirect::to('/')->with('data', $data);
	}
}