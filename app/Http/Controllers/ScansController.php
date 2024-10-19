<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateScansRequest;
use App\Models\Asset;
use App\Models\AssetVerification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ScansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('scans.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'decoded-text' => [
                'required',
                'url',
                'regex:/\/assets\/[a-f0-9\-]+\/scans$/',
            ],
        ]);

        $url = $request->input('decoded-text');
        $id = basename(dirname($url));

        $asset = Asset::find($id);

        if ($validator->fails() || $asset == null) {
            return redirect()->route('scans.index')
                ->with('message', 'The QR code is invalid. Please try again.');
        }

        return redirect(route('scans.show', $id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('scans.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset): View
    {
        return view('scans.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScansRequest $request, Asset $asset): RedirectResponse
    {
        DB::transaction(function () use ($request, $asset) {
            if ($asset->verified) {
                $asset->latestVerification->date = now()->toDateString();
                $asset->latestVerification->condition = $request->input('condition');
                $asset->latestVerification->notes = $request->input('notes');

                if ($request->hasFile('photo')) {
                    if ($asset->latestVerification->photo &&
                        Storage::disk('public')->exists($asset->latestVerification->photo)) {
                        Storage::disk('public')->delete($asset->latestVerification->photo);
                    }

                    $asset->latestVerification->photo = Storage::disk('public')->put(
                        'photos',
                        $request->file('photo'),
                    );
                }

                $asset->latestVerification->save();
            } else {
                $verification = new AssetVerification;
                $verification->date = now()->toDateString();
                $verification->asset_id = $asset->getAttribute('id');
                $verification->condition = $request->input('condition');
                $verification->notes = $request->input('notes');

                if ($request->hasFile('photo')) {
                    $verification->photo = Storage::disk('public')->put(
                        'photos',
                        $request->file('photo'),
                    );
                }

                $verification->save();
            }

            $asset->verified = true;
            $asset->save();
        });

        return redirect()->route('scans.index')
            ->with('message', 'The asset has been verified.');
    }
}
