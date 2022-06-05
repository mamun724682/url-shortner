<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\ShortLinkService;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public $shortLinkService;
    public function __construct(ShortLinkService $shortLinkService)
    {
        $this->shortLinkService = $shortLinkService;
    }

    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'link' => 'required|url'
        ]);

        try {
            $short_link = $this->shortLinkService->updateOrCreate($data);
            session()->flash('last_short_link_code', $short_link->code);
            return back();
        } catch (\Exception $e) {
            info($e->getMessage());
            return back()->withInput();
        }
    }

    public function show(ShortLink $code)
    {
        try {
            $this->shortLinkService->updateAndCreateTime($code);
            return redirect($code->link);
        } catch (\Exception $e) {
            info($e->getMessage());
            return back()->withInput();
        }
    }
}
