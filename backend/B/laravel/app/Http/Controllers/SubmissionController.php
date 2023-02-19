<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index() {
        $submissions = Submission::get()->toArray();

        return view('submission.index', [
            'submissions' => $submissions,
        ]);
    }
}
