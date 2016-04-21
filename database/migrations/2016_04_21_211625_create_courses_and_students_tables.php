<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesAndStudentsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('begin');
			$table->dateTime('end');
			$table->string('title')->default('');
			$table->integer('candidate_limit')->unsigned()->default(0);
			$table->timestamps();
		});

		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('gender')->default('');
			$table->string('first_name')->default('');
			$table->string('last_name')->default('');
			$table->timestamps();
		});

		Schema::create('course_student', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id');
			$table->integer('student_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
		Schema::drop('students');
		Schema::drop('course_students');
	}

}
