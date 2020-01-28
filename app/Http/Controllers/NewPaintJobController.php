<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PaintJobsModel;

use Config;
use Session;
use DB;

class NewPaintJobController extends Controller {

	protected $PaintJobsModel;

	/**
     * Create a new model instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->PaintJobsModel = new \App\Models\PaintJobsModel;
    }

    /**
     * Load the view page for new paint.
     *
     * @return void
     */
	public function view_page() 
    {
    	return view('newpaint');
    }

    /**
     * Save the the created new pain job.
     *
     * @return void
     */
    public function SavePaintJob (Request $request)
    {

    	$validatedData =Validator::make($request->all(), $this->rules(), $this->messages());

		$return_data = ['success' => 0, 'error' => $validatedData->errors()];

		if (!$validatedData->fails()) {
			$return_data = ['success' => 1, 'error' => []];
			$data = [
				'plate_number' => $request['plate_number'],
				'current_color' => $request['current_color'],
				'target_color' => $request['target_color'],
				'is_vip' => (!empty($request['is_vip']) ? 1 : 0),
				'status' => 0,
			];

			$this->PaintJobsModel->savePaintJob($data);
			$return_data = ['success' => 1, 'error' => []];
		}

    	return $return_data;

    }

    /**
     * Setting default rules for validation.
     *
     * @return void
     */
    public function rules()
    {
        return [
                'plate_number'         => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $data['plate_number.required'] = 'Invalid plate number.';

        return $data;
    }  




}