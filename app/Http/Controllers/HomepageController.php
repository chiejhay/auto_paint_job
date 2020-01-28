<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PaintJobsModel;

use Config;
use Session;
use DB;

class HomepageController extends Controller {
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
     * Load the view page for paint job list.
     *
     * @return void
     */
	public function index() 
    {
    	$get_paint_job_list = json_decode($this->PaintJobsModel->GetPaintJobList(),true);
    
    	$paint_jobs = $this->ReconstructPaintJobs($get_paint_job_list);

    	return view('homepage', compact('paint_jobs'));
    }

    /**
     * Update status of the paint job.
     *
     * @return void
     */
    public function UpdateStatus (Request $request)
    {
    	$return_data = ['success' => 0, 'error' => []];

    	$success = $this->PaintJobsModel->UpdateStatus($request['id']);

		if (!empty($success)) {
			$return_data = ['success' => 1, 'error' => []];
		}

    	return $return_data;

    }

    /**
     * Reconstruct array for viewing of data.
     *
     * @return void
     */
    private function ReconstructPaintJobs ($data = [])
    {

    	$return_data = [
    		'inprogress' => $data,
    		'queue'	=> [],
    		'total_cars_painted' => $data[0]['total_cars_painted'] ?? 0,
    		'red_painted' => $data[0]['red_painted'] ?? 0,
    		'green_painted' => $data[0]['green_painted'] ?? 0,
    		'blue_painted' =>  $data[0]['blue_painted'] ?? 0
    	];


    	if (count($data) > 5) {
    		$chunk_array_to_five = array_chunk($data, 5);
    		$get_priority_job_paints = $chunk_array_to_five[0];
    		$get_queue_job_paints = [];

    		foreach ($chunk_array_to_five as $key => $queue) {
    			if ($key === 0) continue;
    			$get_queue_job_paints = array_merge($get_queue_job_paints, $queue);
    			
    		}
    		$return_data['inprogress'] = $get_priority_job_paints;
	    	$return_data['queue']	= $get_queue_job_paints;
	    	
    	}
        if (empty($data[0]['id'])) $return_data['inprogress'] = [];
    	return $return_data;
    }
}