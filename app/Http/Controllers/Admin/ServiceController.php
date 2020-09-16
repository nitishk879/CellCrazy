<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Our services';
        $services = Service::withCount('categories')->get();

        return  view('admin.services.index', compact('title','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Service';

        return view('admin.services.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name'  => 'required|unique:services|min:2',
        ]);

        Service::create([
            'name' => $validationData['name'],
            'slug'  => Str::slug($validationData['name']),
        ]);

        return redirect('admin/services')->with('success', "Service {$validationData['name']} has been created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $title = $service->name;

        return view('admin.services.view', compact('title', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        Gate::authorize('edit-service', $service);
        $title = $service->name;

        return view('admin.services.edit', compact('title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        Gate::authorize('edit-service', $service);
        $validateData = $request->validate(array(
            'name' =>  'required'
        ));

        $service->update([
            'name' => $validateData['name'],
            'slug'  => Str::slug($validateData['name'])
        ]);

        return redirect("admin/services/{$service->id}")->with("success", "{$service->name} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Gate::authorize('delete-service', $service);
    }
}
