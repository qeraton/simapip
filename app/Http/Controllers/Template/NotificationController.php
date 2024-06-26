<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    public function index()
    {
        $TodayNotification = array(
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago']
        );
        $LastSevenDaysNotification = array(
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago']
        );
        $AllNotification = array(
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago'],
            ['assets/img/notify-1.png','Your Account has been created','successfully done','2 min ago'],
            ['assets/img/notify-2.png','Thank you !','you made your frast sell 232.98 ETH','5 h ago'],
            ['assets/img/notify-3.png','Broklan SimonsStart','Following you','43 h ago']
        );

        return view('Template.Notification',['TodayNotification'=>$TodayNotification,'LastSevenDaysNotification'=>$LastSevenDaysNotification,'AllNotification'=>$AllNotification]);

    }
    
}
