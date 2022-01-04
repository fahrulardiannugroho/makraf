<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index()
	{
			if(Auth::user()->hasRole('student')){
				return view('students.studentdash');
			}elseif(Auth::user()->hasRole('reviewer')){
				return view('reviewers.reviwerdash');
			}elseif(Auth::user()->hasRole('admin')){
			 	return view('dashboard');
			}
	}
}
