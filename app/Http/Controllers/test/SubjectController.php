<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.add_subject', compact('subjects'));
    }
    public function addSubject(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'subject' => 'required|string',
                'description' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            Subject::insert([
                'subject' => $request->subject,
                'description' => $request->description
            ]);

            return response()->json(['success' => true, 'msg' => 'Subject added successfully']);
        } catch (\Exception $e) {
            response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
