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
		header('Content-type: application/json');
		
		$workcode = new Workcode();
		$data = array();
		$id = Input::get('workcodeid');
		$response_array = array();
		$response_array['iditem'] = Input::get('workcode');
		
		if($this->checkifexists($id)) {
			$response_array['status'] = 'error';
		} else {
			$workcode->id = $id;
			$workcode->name = Input::get('workcode');
			$workcode->remark = Input::get('remarks');
			//$data['success_message'] = 'successfully save lesson code, id '. $id . '!';
			$workcode->save();
			$workcode = null;
			$response_array['status'] = 'success';
		}
		echo json_encode($response_array);
	}
	
	public function action_delete($id) {
		header('Content-type: application/json');
		
		$workcode = Workcode::find($id);
		
		$response_array = array();
		$response_array['iditem'] = $id;
		if($workcode->delete()) {
			$response_array['status'] = 'success';
		} else {
			$response_array['status'] = 'error';
		}
		
		echo json_encode($response_array);
	}
}