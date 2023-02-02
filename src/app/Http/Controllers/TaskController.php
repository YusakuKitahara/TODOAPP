<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;


class TaskController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得
        $folders = Folder::all();

        // 選択フォルダを取得
        $current_folder = Folder::find($id);

        // 選択フォルダに紐づくタスクを取得
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }
}
