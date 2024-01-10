<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignCreateRequest;
use App\Http\Requests\CampaignUpdateRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    private $campaignViewPrefix = 'campaigns';

    public function index()
    {
        $campaigns = Campaign::all();

        return view("{$this->campaignViewPrefix}.index", compact('campaigns'));
    }

    public function create()
    {
        return view("{$this->campaignViewPrefix}.create");
    }

    public function store(CampaignCreateRequest $request, Campaign $campaign)
    {
        $thumbnailPathName = $this->uploadImage($request, 'thumbnail');

        $campaignRequest = $request->all();
        $campaignRequest['administrator_id'] = Auth::user()->id;
        $campaignRequest['thumbnail'] = $thumbnailPathName;

        $campaign->fill($campaignRequest)->save();
  
        return redirect()->route('index.campaign');
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);

        return view("{$this->campaignViewPrefix}.show", compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        $this->authorize('view', $campaign);

        $campaign = Campaign::findOrFail($campaign->id);

        return view("{$this->campaignViewPrefix}.edit", compact('campaign'));
    }

    public function update(CampaignUpdateRequest $request, Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $campaignRequest = $request->all();

        if ($request->hasFile('thumbnail')) {
            unlink($campaign->thumbnail);
            $thumbnailPathName = $this->uploadImage($request, 'thumbnail');
            $campaignRequest['thumbnail'] = $thumbnailPathName;
        }

        $campaign->fill($campaignRequest)->save();

        return redirect()->route('show.campaign', $campaign->id);
    }

    public function delete(Campaign $campaign)
    {
        unlink($campaign->thumbnail);
        $campaign->delete();

        return redirect()->route('index.campaign');
    }

    private function uploadImage($request, $key)
    {
        $thumbnailName = time() . '_' . $request->file($key)->getClientOriginalName();
        $thumbnailPathName = "storage/campaign/thumbnails/{$thumbnailName}";
        $request->file($key)->storeAs('public/campaign/thumbnails/', $thumbnailName);

        return $thumbnailPathName;
    }
}
