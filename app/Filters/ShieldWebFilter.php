<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\MHzShieldAuth;

class ShieldWebFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //--If Guest and Login is CORRECT then goto 'Admin/Home':
        if($arguments[0] == 'guest'){
        	if(MHzShieldAuth::check()){
        		return redirect()->route('home');
        	}
        }

        //--If Guest and Login is FAIL then goto 'Admin/Login':
        if($arguments[0] == 'auth'){
        	if(!MHzShieldAuth::check()){
        		// return redirect()->route('admin.login.form')->with('fail', 'You must log in first!.');
        		return redirect()->route('login')->with('fail', 'You must log in first!.');
        	}
        }

        //--ONLY FOR EMPLOYEE:
        if($arguments[0] == 'employee'){
            if(!MHzShieldAuth::check()){
        		return redirect()->route('login')->with('fail', 'You must log in first!.');
        	}
            $variable = MHzShieldAuth::userdata()['roles'];
            if (!in_array($variable, ['Employee','Admin','Webmaster'], true ) ) {  //<-- Check if Loggedin as Employee or Admin
                return redirect()->route('forbidden');
            }
        }

        //--ONLY FOR CLIENT:
        if($arguments[0] == 'client'){
            if(!MHzShieldAuth::check()){
        		return redirect()->route('login')->with('fail', 'You must log in first!.');
        	}
        	if(MHzShieldAuth::userdata()['roles'] != 'Client'){    //<-- Check if Loggedin as Client
                return redirect()->route('forbidden');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}