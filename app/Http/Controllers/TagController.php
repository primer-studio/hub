<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function DummiesDeactiveJob()
    {
        $tags = Tag::latest('id')->get();
        foreach ($tags as $tag) {
            if ( $tag->news()->count() < 3) {
                $tag->active = 0;
                $tag->save();
            } else {
                $tag->active = 1;
                $tag->save();
            }
        }
    }

    public function SetDummyTag(Request $request)
    {
        if ($request->isMethod('POST')) {
            $id = $request['id'];
            $tag = Tag::findOrFail($id);
            $tag->active = 0;
            $tag->save();
            return response()->CustomHttpResponse(200, 'تگ غیرفعال شد.', 'success');
        } else {
            return abort(403, 'Access forbidden.');
        }
    }
}
