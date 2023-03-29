<?php

namespace App\Http\Controllers;

use App\Models\grouplearns;
use App\Models\groupstudents;
use App\Models\groupworks;
use App\Models\members;
use App\Models\studentpostworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function register(Request $request)
    {
        $path = $request->file('image')->store('avatar', 'public');
        $registermember = new members();
        $registermember->firstname = $request->input('firstname');
        $registermember->lastname = $request->input('lastname');
        $registermember->email = $request->input('email');
        $registermember->password = $request->input('password');
        $registermember->image = $path;
        $registermember->status = $request->input('status');
        $registermember->save();
        return redirect(url('/'));
    }

    public function login(Request $request)
    {
        $checkmembers = members::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->first();
        if (isset($checkmembers)) {
            $session_set = [
                "user_id" => $checkmembers->user_id,
                "firstname" => $checkmembers->firstname,
                "lastname" => $checkmembers->lastname,
                "image" => $checkmembers->image,
                "status" => $checkmembers->status,
            ];
            $request->session()->put($session_set);
            if ($checkmembers->status == 1) {
                return redirect(url('/dashborad'));
            } elseif ($checkmembers->status == 2) {
                return redirect(url('/studentinfo'));
            }
        } else
            return redirect('/')->with('error', 'ท่านกรอกอีเมลหรือรหัสผ่านไม่ถูกต้อง!!!');
    }

    public function signout(Request $request)
    {
        $request->session()->forget(['lastname', 'lastname', 'user_id', 'status']);
        return redirect(url('/'));
    }

    public function creategroup(Request $request, $length = 6)
    {
        $code = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $code .= $characters[$rand];
        }
        $crategroup = new grouplearns();
        $crategroup->group_learn_name = $request->input('namegrouplearn');
        $crategroup->group_learn_description = $request->input('descriptiongrouplearn');
        $crategroup->group_learn_code = $code;
        $crategroup->image = $request->session()->get('image');
        $crategroup->user_id = $request->session()->get('user_id');
        $crategroup->save();
        return redirect(url('/grouplearn'));
    }

    public function groupupdate(Request $request)
    {
        $objgroup = grouplearns::find($request->input('id'));
        $objgroup->group_learn_name = $request->input('names');
        $objgroup->group_learn_description = $request->input('description');
        $objgroup->save();
        return redirect(url('/dashborad'));
    }

    public function groupwork(Request $request, $id)
    {
        $groupwork = groupworks::where('group_learn_id', '=', $id)->where('group_works_type', '=', 1)->get();
        $groupworktwo = groupworks::where('group_learn_id', '=', $id)->where('group_works_type', '=', 2)->get();
        $data = [
            'groupwork' => $groupwork,
            'groupworktwo' => $groupworktwo
        ];
        return view('groupwork', $data);
    }

    public function grouppostwork(Request $request)
    {
        $st_date = new \DateTime($request->input('startdate'));
        $en_date = new \DateTime($request->input('enddate'));
        $st_date->format('Y-m-d H:i:s');
        $en_date->format('Y-m-d H:i:s');
        $path = $request->file('image')->store('work', 'public');
        $crategroupwork = new groupworks();
        $crategroupwork->group_works_file = $path;
        $crategroupwork->group_works_name = $request->input('names');;
        $crategroupwork->group_works_start = $st_date;
        $crategroupwork->group_works_end = $en_date;
        $crategroupwork->group_works_type = $request->input('type');
        $crategroupwork->group_works_description = $request->input('description');
        $crategroupwork->group_learn_id = $request->input('id');
        $crategroupwork->save();
        return redirect(url('/dashborad'));
    }

    public function groupworkupdate(Request $request)
    {
        $url=$request->input('group_id');
        $objgroupwork = groupworks::find($request->input('id'));
        $objgroupwork->group_works_name = $request->input('names');
        $objgroupwork->group_works_description = $request->input('description');
        $objgroupwork->save();
        return redirect(url("/group/work/$url"));
    }

    public function joingroup(Request $request)
    {
        $grouplearn = grouplearns::where('group_learn_code', '=', $request->input('group_id'))->first();
        if (isset($grouplearn)) {
            $joingroup = new groupstudents();
            $joingroup->students_id = $request->session()->get('user_id');
            $joingroup->group_learn_id = $grouplearn->group_learn_id;
            $joingroup->save();
            return redirect(url('/studentinfo'));
        } else
            return redirect('/studentinfo')->with('error', 'รหัสเข้าร่วมชั้นเรียนไม่ถูกต้อง!!!');
    }

    public function detailwork(Request $request, $id)
    {
        $groupwork = DB::table('groupworks')
            ->join('grouplearns', 'grouplearns.group_learn_id', '=', 'groupworks.group_learn_id')
            ->join('members', 'members.user_id', '=', 'grouplearns.user_id')->leftJoin('studentpostworks', 'studentpostworks.group_works_id', '=', 'groupworks.group_works_id')
            ->select('members.*', 'grouplearns.*', 'groupworks.*')
            ->where('groupworks.group_learn_id', '=', $id)
            ->orderBy('groupworks.group_works_start','DESC')
            ->get();
        foreach ($groupwork as $groupworks) {
            $grouppostwork = DB::table('groupworks')
                ->join('studentpostworks', 'studentpostworks.group_works_id', '=', 'groupworks.group_works_id')
                ->select('studentpostworks.*', 'groupworks.*')
                ->where('studentpostworks.students_id','=', $request->session()->get('user_id'))
                ->get();
        }
        if (!isset($grouppostwork)){
            return redirect('/studentinfo')->with('error', 'ไม่มีงานในชั้นเรียน!!!');
        }
        $x = array();
        $y = 0;
        foreach ($groupwork as $groupworks) {
            $x[$y] = $groupworks;
            $x[$y]->thaidatestart = $this->formatDateThat($groupworks->group_works_start);
            $x[$y]->thaidateend = $this->formatDateThat($groupworks->group_works_end);
            $y = $y + 1;
        }
        foreach ($grouppostwork as $grouppostworks) {
            $x[$y] = $grouppostworks;
            $x[$y]->verifytimethai = $this->formatDateThat($grouppostworks->verifytime);
            $y = $y + 1;
        }
        $data = [
            'groupwork' => $groupwork,
            'grouppostwork' => $grouppostwork,
        ];
        return view('detailwork', $data);
    }

    public function studentpostwork(Request $request)
    {
        $checkpostwork = studentpostworks::where('students_id', '=', $request->session()->get('user_id'))
            ->where('group_works_id', '=', $request->input('work_id'))->first();
        $path = $request->file('image')->store('studentwork', 'public');
        $url=$request->input('group_id');
        if ($checkpostwork) {
            date_default_timezone_set("Asia/Bangkok");
            $datevertifytime = new \DateTime;
            $datevertifytime->format('Y-m-d H:i:s');
            $id = $checkpostwork->studentpostworks_id;
            $objworkstd = studentpostworks::find($id);
            $objworkstd->studentpostworks_file = $path;
            $objworkstd->verifytime = $datevertifytime;
            $objworkstd->save();
            return redirect(url("/detail/work/$url"));
        } else
            date_default_timezone_set("Asia/Bangkok");
        $datevertifytime = new \DateTime;
        $datevertifytime->format('Y-m-d H:i:s');
        $objworkstd = new studentpostworks();
        $objworkstd->studentpostworks_file = $path;
        $objworkstd->verifytime = $datevertifytime;
        $objworkstd->students_id = $request->session()->get('user_id');
        $objworkstd->group_works_id = $request->input('work_id');
        $objworkstd->save();
        return redirect(url("/detail/work/$url"));
    }
    public function formatDateThat($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $monthTH = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear $strHour:$strMinute น";
    }
    public function learningpost(Request $request,$id){
        $grouplearn=grouplearns::where('group_learn_id','=',$id)->first();
        $data = [
            'grouplearn' => $grouplearn,
        ];
        return view('learningpost', $data);
    }
}
