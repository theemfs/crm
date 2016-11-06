<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contragents;
use App\User;
use DB;
use Illuminate\Support\Facades\Schema;

class PagesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}



	public function home()
	{
		return view('pages.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request	 $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int	$id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int	$id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request	 $request
	 * @param  int	$id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int	$id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}



	public function syncGb()
	{


		// CLEAN TABLES
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('users')->truncate();
		DB::table('contragents')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');



		// USERS
		$users_gb = DB::connection('mysql_crm_gb')->table('users')->get();
		foreach ($users_gb as $user_gb) {
			$user = new User([
				'id'				=>	$user_gb->user_id,
				'created_at'		=>	$user_gb->dt_create,
				'comment'			=>	$user_gb->user_comment,
				'email'				=>	$user_gb->email,
				'last_login_at'		=>	$user_gb->dt_last_login,
				'name'				=>	$user_gb->user_fio,
				'password'			=>	$user_gb->password,
				'last_activity_at'	=>	$user_gb->dt_last_activity
			]);
			$user->save();
		}



		// CLIENTS->CONTRAGENTS
		$contragents_gb = DB::connection('mysql_crm_gb')->table('clients')->get();
		foreach ($contragents_gb as $contragent_gb) {
			$contragent = new Contragents([
				'id'				=>	$contragent_gb->client_id,
				'created_at'		=>	$contragent_gb->dt_create,
				'comment'			=>	$contragent_gb->client_comment,
				'name'				=>	$contragent_gb->client_name,
				'name_full'			=>	$contragent_gb->client_name_full,
				'user_id'			=>	$contragent_gb->user_id
			]);
			$contragent->save();
		}



		// RETURN VIEW
		// return view('pages.inbox')
		// 		->with('spams', $spams);



	}



	public function syncRv()
	{


		// CLEAN TABLES
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('users')->truncate();
		DB::table('contragents')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');



		// USERS
		$users_gb = DB::connection('mysql_crm_rv')->table('users')->get();
		foreach ($users_gb as $user_gb) {
			$user = new User([
				'id'				=>	$user_gb->user_id,
				'created_at'		=>	$user_gb->dt_create,
				'comment'			=>	$user_gb->user_comment,
				'email'				=>	$user_gb->email,
				'last_login_at'		=>	$user_gb->dt_last_login,
				'name'				=>	$user_gb->user_fio,
				'password'			=>	$user_gb->password,
				'last_activity_at'	=>	$user_gb->dt_last_activity
			]);
			$user->save();
		}



		// CLIENTS->CONTRAGENTS
		$contragents_gb = DB::connection('mysql_crm_gb')->table('clients')->get();
		foreach ($contragents_gb as $contragent_gb) {
			$contragent = new Contragents([
				'id'				=>	$contragent_gb->client_id,
				'created_at'		=>	$contragent_gb->dt_create,
				'comment'			=>	$contragent_gb->client_comment,
				'name'				=>	$contragent_gb->client_name,
				'name_full'			=>	$contragent_gb->client_name_full,
				'user_id'			=>	$contragent_gb->user_id
			]);
			$contragent->save();
		}



		// RETURN VIEW
		// return view('pages.inbox')
		// 		->with('spams', $spams);



	}



}
