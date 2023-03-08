<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];


    public static function getFirstFolderTasks() {
        $folders = Auth::user()->folders()->get();
        $firstFolder = $folders->first();

        $tasks = Task::where('folder_id', $firstFolder->id)->get();
        return $tasks;
    }

    public function getStatusLabelAttribute(){
        // 状態
        $status = $this->attributes['status'];

        // 未定義なら空文字を返す
        if (!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}
