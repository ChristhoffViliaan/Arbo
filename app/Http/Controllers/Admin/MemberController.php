<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.members.index', [
            'page_title' => 'Member',
            'page_description' => 'Manage your members',
            'members' => Member::all(),
            ]
        );
    }

    public function show($id){

        $member = Member::find($id);

        return view('admin.members.show', [
            'page_title' => 'Member',
            'page_description' => 'Manage your members',
            'member' => $member
            ]
        );
    }
}
