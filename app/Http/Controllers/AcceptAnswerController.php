<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
    	$this->authorize('accept', $answer);
	    // TODO: Implement __invoke() method.
	    $answer->question->acceptBestAnswer($answer);
	    
	    return back();
    }
}
