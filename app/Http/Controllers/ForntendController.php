<?php

namespace App\Http\Controllers;

use App\Models\grouplearns;
use App\Models\groupstudents;
use App\Models\groupworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForntendController extends Controller
{
    public function dashborad(Request $request){
        $showgrops=grouplearns::where('user_id','=',$request->session()->get('user_id'))->get();
        $data=[
            'showgrops'=>$showgrops,
        ];
        return view('dashboard',$data);
    }
    public function grouplearn(Request $request){
        return view('grouplearn');
    }
    public function studentinfo(Request $request){
        $groupstudents=DB::table('grouplearns')
            ->join('groupstudents', 'groupstudents.group_learn_id', '=', 'grouplearns.group_learn_id')
            ->join('members', 'members.user_id', '=', 'grouplearns.user_id')
            ->select('members.*', 'grouplearns.*','groupstudents.*')
            ->where('groupstudents.students_id','=',$request->session()->get('user_id'))
            ->get();
        $data=[
            'groupstudents'=>$groupstudents
        ];
        return view('studentinfo',$data);
    }
    public function studentingroup(Request $request,$id){
        $students=DB::table('groupstudents')
            ->join('members', 'members.user_id', '=', 'groupstudents.students_id')
            ->select('members.*','groupstudents.*')
            ->where('groupstudents.group_learn_id','=',$id)
            ->get();
        $data=[
            'students'=>$students
        ];
        return view('studeningroup',$data);
    }
    public function workinfo(Request $request,$id){
        $groupwork = groupworks::where('group_works_id', '=', $id)->get();
        foreach ($groupwork as $groupwork) {
            $grouppostwork = DB::table('groupworks')
                ->join('studentpostworks', 'studentpostworks.group_works_id', '=', 'groupworks.group_works_id')
                ->join('members', 'members.user_id', '=', 'studentpostworks.students_id')
                ->select('studentpostworks.*', 'groupworks.*','members.*')
                ->get();
            $student=groupstudents::join('members', 'members.user_id', '=', 'groupstudents.students_id')
                ->select('groupstudents.*','members.*')
                ->where('groupstudents.group_learn_id', '=', $groupwork->group_learn_id)->get();
        }
        $data=[
            'groupwork'=>$groupwork,
            'student'=>$student,
            'grouppostwork'=>$grouppostwork
        ];
        return view('workinfo',$data);
    }
}
