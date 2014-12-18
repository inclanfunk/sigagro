<?php namespace Repositories;

use \User;
use \Sentry;

class UserRepository {


	public function UserSave(array $credentials){



		try
		{
			// Create the user
			$user = Sentry::createUser(array(

				'email'          => $credentials['email'],
				'first_name'     => $credentials['first_name'],
				'last_name'      => $credentials['last_name'],
				'phone'          => $credentials['phone'],
				'password'       => $credentials['password'],
				'activated'      => true,

			));

			// Find the group using the group id
			$adminGroup = Sentry::findGroupByName($credentials['roles']);

			// Assign the group to the user
			$user->addGroup($adminGroup);

			return true;

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
		}







	}









}
