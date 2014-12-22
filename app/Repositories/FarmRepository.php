<?php namespace Repositories;

use \Farm;
use \Sentry;

class FarmRepository {


	/**
	 * @return array
	 *
	 * List All Managers
	 *
	 */
	public function listManagers(){

		// list clients according to groups
		$group = Sentry::findGroupByName('Client');
		$users = Sentry::findAllUsersInGroup($group);
		return $users;

	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 *
	 * List All Farms
	 *
	 */
	public function listFarms(){

		$farms = Farm::all();
		return $farms;
	}


	/**
	 * @param array $credentials
	 * @return bool
	 *
	 * Create A New Farm
	 *
	 */
	public function createFarm(array $credentials){

		// create a new Farm
		$farm =  new Farm();
		$farm->farm_name = $credentials['farm_name'];
		$farm->farm_address = $credentials['farm_address'];
		$farm->company_name = $credentials['company_name'];
		$farm->user_id = $credentials['manager_id'];
		$farm->save();

		if($farm->save()){
			return true;
		}else{
			return false;
		}
	}

	public function findById($id){

		$farm = Farm::findOrFail($id);
		return $farm;
	}

	public function deleteFarm($id){

		$farm = Farm::findOrFail($id);
		$farm->delete();
	}


	public function updateFarm($id , array $credentials){

		$farm = Farm::findOrFail($id);
		$farm->farm_name = $credentials['farm_name'];
		$farm->farm_address = $credentials['farm_address'];
		$farm->company_name = $credentials['company_name'];
		$farm->save();

		if($farm->save()){
			return true;
		}else{
			return false;
		}
	}









}
