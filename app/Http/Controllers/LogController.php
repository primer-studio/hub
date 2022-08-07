<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\News;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function AddLog($type, $content) {
        $log = New Log();
        $log->type = $type;
        $log->current_status = 'running';
        $log->started_at = time();
        $log->content = $content;
        $log->read = 0;
        $log->save();
        return $log->id;
    }

    public function UpdateLog($id, Array $content)
    {
        $log = Log::find($id)->update($content);
        return;
    }
}
