<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(){

        $notifications = Notification::orderBy('id','DESC') -> paginate(50);
        return view('admin.notifications.index',compact('notifications'));

    }

    public function delete($id){

        try{
            $notification = Notification::findOrFail($id);
            $notification->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical support");
            return back();
        }

    }
}
