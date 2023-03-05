<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = Http::get('https://dummyjson.com/users/' . $id);
            $data = json_decode($response->getBody());
            if ($data == null) {
                return $this->response('01', 'client, failed to load profile', 'data null');
            }
            $details = $data;
            $profile_details = $this->tableDetailUser($details);
            return compact("profile_details");
        } catch (\Throwable $th) {
            return $this->response('01', 'failed to display detail user', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response = Http::delete('https://dummyjson.com/users/' . $id);
            $data = json_decode($response->getBody());
            // if ($data->response_code == '01') {
            //     return abort(500);
            // }
            return compact('data');
        } catch (\Throwable $th) {
            return $this->response('01', 'client, failed to delete users', $th->getMessage());
        }
    }

    public function getListUser()
    {
        try {
            $response = Http::get('https://dummyjson.com/users');
            $data = json_decode($response->getBody());
            $profiles = $data->users;
            if ($profiles == null) {
                return $this->response('01', 'client, failed to get profile', 'data null');
            }
            $profile_table = $this->tableListUser($profiles);
            return compact("profile_table");
        } catch (\Throwable $th) {
            return $this->response('01', 'failed to display list user', $th->getMessage());
        }
    }

    public function tableListUser($profiles)
    {
        return view('layout.user-list.user-table', compact('profiles'))->render();
    }

    public function tableDetailUser($details)
    {
        return view('layout.user-list.user-details', compact('details'))->render();
    }
}

