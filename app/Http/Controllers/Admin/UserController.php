<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        return view('admin.user.index');
    }


    public function filter(Request $request, User $user)
    {

        $query = $user->newQuery();


        return $query
            ->filterStatus($request->status)
            ->searchUser($request->text)
            ->filterRole($request->role_id)
            ->with('roles')
            ->paginate($this->perPage);
    }


    public function destroy($id)
    {

        $user = User::find($id);
        $hasAuth = Auth::check();
        if (!$hasAuth) {
            $msj = 'Usuario ' . $user->user . 'bloqueado';
            $isValid = true;
            $user->delete();
        } else {
            $isValid = false;
            $msj = 'No es posible bloquear al usuario actualmente autenticado';
        }

        return response()->json(['isValid' => $isValid, 'msj' => $msj]);
    }


    public function notifications($id)
    {
        $user = User::find($id);
        return  $user->unreadNotifications
            ->where('type', 'App\Notifications\FailedRowNotification')
            ->all();
    }


    public function markAsRead(Request $request)
    {

        $user = User::find($request->user_id);
        $notification = $user->unreadNotifications->where('id', $request->alert_id);
        $notification->markAsRead();
        return 'marcado como leido';
    }


    public function notReadNotifications($user_id)
    {
        $notification_no_leidas = User::find($user_id)->unreadNotifications->where('type', 'App\Notifications\ProcessedRowNotification')->all();
        // return $notification_no_leidas->sortByDesc('created_at');
        $notifications = [];
        foreach ($notification_no_leidas as $key => $noRead) {
            $array = [
                'id' => $noRead->id,
                'icon' => 'fas fa-fw fa-envelope text-warning',
                'text' => $noRead->data['message'],
                'time' => $noRead->created_at->diffForHumans(),
            ];
            $notifications[$key] = $array;
        }

        $dropdownHtml = '';

        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";

            $time = "<span class='float-right text-muted text-sm'>
                       {$not['time']}
                     </span>";

            $dropdownHtml .= "<a href='#'" . $not['id'] . " class='dropdown-item text-sm'>
                                {$icon}{$not['text']}{$time}
                              </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }

        // Return the new notification data.

        return [
            'label'       => count($notifications),
            'label_color' => 'danger',
            'icon_color'  => 'dark',
            'dropdown'    => $dropdownHtml,
        ];
    }
}
