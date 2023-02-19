<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class SubmissionController extends Controller
{
    public function index() {
        $submissions = Submission::get()->toArray();

        return view('submission.index', [
            'submissions' => $submissions,
        ]);
    }

    public function create() {
        return view('submission.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|max:255'
        ]);

        try{
            DB::beginTransaction();
            $submission = new Submission();
            $submission->text = $request->input('text');
            $submission->user_id = Auth::guard('user')->user()->id;
            
            $submission->save();
            DB::commit();

            return  redirect(route('submission.index'))->with('message', '投稿しました。');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', '投稿できませんでした。もう一度お試し下さい。');
        }
    }
}
