<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\News;
use App\Models\Publisher;
use App\Models\Service;

use App\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function Index()
    {
        $statics = [
            'topday_news_count' => News::whereDate('created_at', Carbon::today())->get()->count(),
            'topday_news_hits' => News::whereDate('created_at', Carbon::today())->get()->sum('hits'),
            'jobs' => Log::whereDate('created_at', Carbon::today())->get(),
        ];
        $top_hits = News::orderByDesc('hits')->take(10)->get();
        return view('private.dashboard.index', compact(['statics', 'top_hits']));
    }

    /** ------- Publishers ------- **/
    public function ManagePublisher()
    {
        $publishers = Publisher::latest()->paginate(20);
        return view('private.publisher.manage', compact(['publishers']));
    }

    public function AddPublisher(Request $request)
    {
        $services = Service::all();
        if ($request->isMethod('get')) {
            return view('private.publisher.add', compact(['services']));
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

    public function EditPublisher(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $services = Service::all();
            $publisher = Publisher::findOrFail($id);
            return view('private.publisher.edit', compact(['services', 'publisher']));
        } elseif ($request->isMethod('post')) {
            // return json_encode($request['settings']);
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
                    'settings' => json_encode($request['settings']),
                    'avatar' => $request['avatar']
                ]);
            session(['message' => 'Publisher updated.']);
            return back();
        } else {
            return abort('cannot proccess request.');
        }
    }

    /** ------- Services ------- **/
    public function ManageService()
    {
        $services = Service::latest()->paginate(20);
        return view('private.service.manage', compact(['services']));
    }

    public function AddService(Request $request)
    {
        // should extends AddPublisher() method format.
    }

    public function EditService(Request $request, $id)
    {
        // should extends EditPublisher() method format.
    }

    /** ------- Services ------- **/
    public function ManageTags()
    {
        $tags = Tag::latest('id')->where('active', 1)->paginate(200);
        return view('private.tag.manage', compact(['tags']));
    }
}
