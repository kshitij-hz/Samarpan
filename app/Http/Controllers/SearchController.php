<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    /**
     * retrieve all the related ministries
     *
     * @return Response
     **/
    public function getMinistry() {
    	$term = Input::get('term');
    	$results = array();
    	$queries = DB::table('work_experiences')->where('ministry', 'LIKE', '%'.$term.'%')->get();

    	foreach($queries as $query) {
    		array_push($results, ['id' => $query->id, 'value' => $query->ministry]);
    	}
	return response()->json($results);
    }

    /**
     * retrieve all the related departments
     *
     * @return Response
     **/
    public function getDepartment() {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('work_experiences')->where('department', 'LIKE', '%'.$term.'%')->get();

        foreach($queries as $query) {
            array_push($results, ['id' => $query->id, 'value' => $query->department]);
        }
    return response()->json($results);
    }

    /**
     * retrieve all the related companies
     *
     * @return Response
     **/
    public function getCompany() {
    	$term = Input::get('term');
    	$results = array();
    	$queries = DB::table('work_experiences')->where('company', 'LIKE', '%'.$term.'%')->get();

    	foreach($queries as $query) {
    		array_push($results, ['id' => $query->id, 'value' => $query->company]);
    	}
	return response()->json($results);
    }

    /**
     * retrieve all the related locations
     *
     * @return Response
     **/
    public function getCompany() {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('work_experiences')->where('location', 'LIKE', '%'.$term.'%')->get();

        foreach($queries as $query) {
            array_push($results, ['id' => $query->id, 'value' => $query->location]);
        }
    return response()->json($results);
    }

    /**
     * retrieve all the related roles
     *
     * @return Response
     **/
    public function getRole() {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('work_experiences')->where('role', 'LIKE', '%'.$term.'%')->get();

        foreach($queries as $query) {
            array_push($results, ['id' => $query->id, 'value' => $query->role]);
        }
    return response()->json($results);
    }

    /**
     * retrieve all the related positions
     *
     * @return Response
     **/
    public function getPosition() {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('work_experiences')->where('position', 'LIKE', '%'.$term.'%')->get();

        foreach($queries as $query) {
            array_push($results, ['id' => $query->id, 'value' => $query->position]);
        }
    return response()->json($results);
    }
}
