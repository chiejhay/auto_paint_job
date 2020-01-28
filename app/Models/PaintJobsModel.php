<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use app\Http\Controllers\HelperController;

use DB;

class PaintJobsModel extends Model
{
    /**
     * Save data
     *
     * @return void
     */
    public function savePaintJob($data=[])
    {
    	DB::table('paint_jobs')->insert([$data]);
    }

    /**
     * Update data
     *
     * @return void
     */
    public function UpdateStatus($id=0)
    {
    	$result = DB::table('paint_jobs')
                    ->where('id',$id)
                    ->update(['status' => 1]);

        return $result;
    }

    /**
     * get list of all paint job
     *
     * @return void
     */
    public function GetPaintJobList ()
    {
    	$list = DB::table('paint_jobs')
    				->selectRaw('id, plate_number, current_color, target_color, is_vip, status,
    							 (SELECT count(id) from paint_jobs WHERE status = 1) as total_cars_painted,
    							 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="red") as red_painted,
    							 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="green") as green_painted,
    							 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="blue") as blue_painted
    							')
    				->where('status', 0)
    				->orderBy('id','ASC')
    				->get();

        if (count($list) === 0) {
            $list = DB::table('paint_jobs')
                    ->selectRaw('
                                 (SELECT count(id) from paint_jobs WHERE status = 1) as total_cars_painted,
                                 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="red") as red_painted,
                                 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="green") as green_painted,
                                 (SELECT count(id) from paint_jobs WHERE status = 1 AND target_color ="blue") as blue_painted
                                ')
                    ->limit(1)
                    ->get();
        }

    	return $list;
    }                
}
