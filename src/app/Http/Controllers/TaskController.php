<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;


class TaskController extends Controller
{
    public function index()
    {
//        return 'hello, world.';

        $folders = Folder::all();

        return view('tasks/index', [
            'folders' => $folders,
        ]);
    }
}
