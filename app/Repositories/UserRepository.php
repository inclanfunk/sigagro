<?php namespace Repositories;

use \User;
use \Sentry;

class UserRepository {

	/**
	 * @param array $credentials
	 * Create a New User
	 *
	 */
	public function UserSave(array $credentials ){


		try
		{
			// Create the user

			if(isset($credentials['admin_id'])) {
				$user = Sentry::createUser(array(

					'email' => $credentials['email'],
					'admin_id' => $credentials['admin_id'],
					'first_name' => $credentials['first_name'],
					'last_name' => $credentials['last_name'],
					'phone' => $credentials['phone'],
					'password' => $credentials['password'],
					'activated' => true,
				));
			}else{
				$user = Sentry::createUser(array(
					'email' => $credentials['email'],
					'first_name' => $credentials['first_name'],
					'last_name' => $credentials['last_name'],
					'phone' => $credentials['phone'],
					'password' => $credentials['password'],
					'activated' => true,
				));

			}


			// Find the group using the group id
			$adminGroup = Sentry::findGroupByName($credentials['roles']);

			// Assign the group to the user
			$user->addGroup($adminGroup);

			return true;
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			\Session::flash('error_msg', 'Email field is required...');
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			\Session::flash('error_msg', 'Password field is required...');
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
			\Session::flash('error_msg', 'User with this email already exists.');
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			\Session::flash('error_msg', 'Login field is required...');
		}
	}


	/**
	 * @return array
	 * gets All Users
	 *
	 */
	public function listAll(){

		$users = Sentry::findAllUsers();

		return $users;
	}


	/**
	 * @param $userid
	 * @return \Cartalyst\Sentry\Users\UserInterface
	 * gets user by Id
	 */
	public function findById($userid){

		$user = Sentry::findUserById($userid);
		return $user;
	}

	public function updateUser($userid , array $credentials){

		$user = Sentry::findUserById($userid);

		$user->email = $credentials['email'];
		$user->first_name = $credentials['first_name'];
		$user->last_name = $credentials['last_name'];
		$user->phone = $credentials['phone'];

		if($credentials['password'] and $credentials['password'] == $credentials['password_confirm'] ) {
			$user->password = $credentials['password'];
		}

		$user->save();

		if($user->save()){
			return true;
		}
	}


	public function deleteUser($userid){

		try
		{
			// Find the user using the user id
			$user = Sentry::findUserById($userid);

			// Delete the user
			$user->delete();
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::flash('error_msg', 'User was not found');
		}

	}








}
