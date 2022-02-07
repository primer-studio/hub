<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;
use App\Models\Service;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function Index() {
        $statics = [
            'topday_news_count' => News::whereDate('created_at', Carbon::today())->get()->count(),
        ];
        $top_hits = News::orderByDesc('hits')->take(10)->get();
        return view('private.dashboard.index', compact(['statics','top_hits']));
    }

    public function ManagePublisher() {
        $publishers = Publisher::latest()->paginate(20);
        return view('private.publisher.manage', compact(['publishers']));
    }

    public function AddPublisher(Request $request) {
        if ($request->isMethod('get')) {
            $services = Service::all();
            return view('private.publisher.add');
        } elseif ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|min:4',
                'website' => 'required|min:7',
                'feeds' => 'required|json',
                'avatar' => 'required|min:13'
            ]);

            $publisher = new Publisher;
            $publisher->name = $request['name'];
            $publisher->website = $request['website'];
            $publisher->feeds = $request['feeds'];
            $publisher->avatar = $request['avatar'];
            $publisher->active = true;
            $publisher->save();
            session(['message' => 'Publisher added.']);
            return redirect(route('Admin > Dashboard > Publishers > Edit', $publisher->id));

            
        } else {
            return abort('cannot proccess request.');
        }
    }

    public function EditPublisher(Request $request, $id) {
        if ($request->isMethod('get')) {
            $services = Service::all();
            $publisher = Publisher::findOrFail($id);
            return view('private.publisher.edit', compact(['services', 'publisher']));
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:4',
                'website' => 'required|min:7',
                'feeds' => 'required|json',
                'avatar' => 'required|min:13'
            ]);

            $publisher = Publisher::findOrFail($id)
                        ->update([
                            'name' => $request['name'],
                            'website' => $request['website'],
                            'feeds' => $request['feeds'],
                            'avatar' => $request['avatar']
                        ]);
            session(['message' => 'Publisher updated.']);
            return back();
        } else {
            return abort('cannot proccess request.');
        }
    }
}
