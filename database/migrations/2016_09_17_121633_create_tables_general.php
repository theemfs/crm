<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesGeneral extends Migration
{



	public function up()
	{



		Schema::create('users', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('password')->nullable();
			$table->string('salt')->nullable();
			$table->string('hash')->nullable();
			$table->dateTime('last_login_at')->nullable();
			$table->rememberToken();
			$table->string('phone')->nullable();
			$table->string('mobile')->nullable();
			$table->string('homephone')->nullable();
			$table->string('title')->nullable();
			$table->string('department')->nullable();
			$table->integer('can_be_performer')->nullable();
			$table->integer('is_admin')->nullable();
			$table->integer('is_active')->nullable();
			$table->dateTime('last_activity_at')->nullable();
		});



		Schema::create('password_resets', function (Blueprint $table) {
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at')->nullable();
		});



		Schema::create('agents', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->index()->nullable();
			$table->string('name_full', 1024)->index()->nullable();
			$table->string('address_copr')->nullable();
			$table->string('address_mail')->nullable();
			$table->string('phone_1')->nullable();
			$table->string('phone_2')->nullable();
			$table->string('email_1')->nullable();
			$table->string('email_2')->nullable();
			$table->string('skype')->nullable();
			$table->string('website')->nullable();
			$table->string('inn')->nullable();
			$table->string('kpp')->nullable();
			$table->string('okpo')->nullable();
			$table->string('passport')->nullable();
			$table->string('segment_id')->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
		});



		Schema::create('actions', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('icon')->nullable();
		});



		Schema::create('articles', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('text')->unique();
			$table->integer('is_published')->nullable();
		});



		Schema::create('cases', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('text')->index()->nullable();
			$table->dateTime('due_to')->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
			$table->integer('status_id')->unsigned()->index();
			$table->dateTime('last_reply_at')->nullable();
			$table->integer('last_replier_id')->nullable();
		});



			Schema::create('case_performers', function (Blueprint $table) {
				$table->nullableTimestamps();
				$table->integer('case_id')->unsigned()->index();
					$table->foreign('case_id')->references('id')->on('cases');
				$table->integer('user_id')->unsigned()->index();
					$table->foreign('user_id')->references('id')->on('users');
			});



			Schema::create('case_members', function (Blueprint $table) {
				$table->nullableTimestamps();
				$table->integer('case_id')->unsigned()->index();
					$table->foreign('case_id')->references('id')->on('cases');
				$table->integer('user_id')->unsigned()->index();
					$table->foreign('user_id')->references('id')->on('users');
			});



		Schema::create('clients', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->index()->nullable();
			$table->string('name_full', 1024)->index()->nullable();
			$table->string('address_copr')->nullable();
			$table->string('address_mail')->nullable();
			$table->string('phone_1')->nullable();
			$table->string('phone_2')->nullable();
			$table->string('email_1')->nullable();
			$table->string('email_2')->nullable();
			$table->string('skype')->nullable();
			$table->string('website')->nullable();
			$table->string('inn')->nullable();
			$table->string('kpp')->nullable();
			$table->string('okpo')->nullable();
			$table->string('passport')->nullable();
			$table->string('segment_id')->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
		});



		Schema::create('contragents', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->index()->nullable();
			$table->string('name_full', 1024)->index()->nullable();
			$table->string('address_copr')->nullable();
			$table->string('address_mail')->nullable();
			$table->string('phone_1')->nullable();
			$table->string('phone_2')->nullable();
			$table->string('email_1')->nullable();
			$table->string('email_2')->nullable();
			$table->string('skype')->nullable();
			$table->string('website')->nullable();
			$table->string('inn')->nullable();
			$table->string('kpp')->nullable();
			$table->string('okpo')->nullable();
			$table->string('passport')->nullable();
			$table->string('segment_id')->nullable();
			$table->integer('user_id')->nullable()->unsigned()->index();
				//$table->foreign('user_id')->references('id')->on('users');
		});



		Schema::create('cards', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('text')->index()->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
			$table->integer('agent_id')->unsigned()->index();
				$table->foreign('agent_id')->references('id')->on('agents');
			$table->integer('activation_code')->unsigned()->nullable();
			$table->integer('balance');
			$table->dateTime('activated_at')->nullable();
			$table->integer('last_replier_id')->nullable();
		});



		Schema::create('deals', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('text')->index()->nullable();
			$table->dateTime('due_to')->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
			$table->integer('card_id')->unsigned()->index();
				$table->foreign('card_id')->references('id')->on('cards');
			$table->integer('status_id')->unsigned()->index();
			$table->dateTime('last_reply_at')->nullable();
			$table->dateTime('control_at')->nullable();
			$table->integer('last_replier_id')->nullable();
		});



		Schema::create('deals_statuses', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('color')->nullable();
			$table->integer('is_closed')->nullable();
			$table->integer('percent')->unsigned()->nullable();
		});



		Schema::create('files', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('ext')->nullable();
			$table->string('mimetype')->nullable();
			$table->string('size')->nullable();
			$table->integer('downloaded')->nullable();
			$table->integer('opened')->nullable();
			$table->string('original')->nullable();
			$table->string('converted')->nullable();
			$table->string('thumbnail')->nullable();

			$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');

			// $table->integer('case_id')->unsigned();
			// $table->foreign('case_id')->references('id')->on('cases');

			$table->integer('message_id')->unsigned();
			// $table->foreign('message_id')->references('id')->on('messages');
		});



		Schema::create('jobs', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('queue');
			$table->longText('payload');
			$table->tinyInteger('attempts')->unsigned();
			$table->tinyInteger('reserved')->unsigned();
			$table->unsignedInteger('reserved_at')->nullable();
			$table->unsignedInteger('available_at');
			$table->unsignedInteger('created_at');
			$table->index(['queue', 'reserved', 'reserved_at']);
		});



		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('text')->index()->nullable();
			$table->integer('user_id')->unsigned()->index();
				$table->foreign('user_id')->references('id')->on('users');
			$table->integer('case_id')->unsigned()->index();
			$table->integer('is_service_message')->unsigned();
		});



		Schema::create('ownerships', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('name_full')->nullable();
		});



		Schema::create('partnerships', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
		});



		Schema::create('priorities', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('color')->nullable();
		});



		Schema::create('segments', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
		});



		Schema::create('statuses', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
			$table->string('color')->nullable();
			$table->integer('is_closed')->nullable();
		});



		Schema::create('types', function (Blueprint $table) {
			$table->increments('id')->index();
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('comment')->nullable();

			$table->string('name')->nullable();
		});


























	}



	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		Schema::drop('users');
		Schema::drop('password_resets');

		Schema::drop('agents');
		Schema::drop('actions');
		Schema::drop('articles');
		Schema::drop('contragents');
		Schema::drop('cards');
		Schema::drop('cases');
			Schema::drop('case_members');
			Schema::drop('case_performers');
		Schema::drop('clients');
		Schema::drop('deals');
		Schema::drop('deals_statuses');
		Schema::drop('files');
		Schema::drop('jobs');
		Schema::drop('messages');
		Schema::drop('ownerships');
		Schema::drop('partnerships');
		Schema::drop('priorities');
		Schema::drop('segments');
		Schema::drop('statuses');
		Schema::drop('types');

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}



}