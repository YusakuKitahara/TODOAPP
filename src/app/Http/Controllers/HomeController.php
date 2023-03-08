<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Folder $folder)
    {
        $folders = Auth::user()->folders()->get();
        $firstFolder = $folders->first();

        $tasks = Task::getFirstFolderTasks();

        if (is_null($folders)) {
            return view('home');
        }

        return view('tasks.index', [
            'folder' => $firstFolder->id,
            'folders' => $folders,
            'current_folder_id' => $firstFolder->id,
            'tasks' => $tasks,
        ]);
    }
}
