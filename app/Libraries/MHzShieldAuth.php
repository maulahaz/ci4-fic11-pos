<?php

namespace App\Libraries;

class MHzShieldAuth
{
    public static function id()
    {
        helper("auth");

        if (!auth("tokens")->loggedIn()) {
            return null;
        }else{
            return auth()->id();
        }
    }

    // public static function user()
    public static function userdata()
    {
    	helper("auth");

    	if(auth("tokens")->loggedIn()){
    		return auth()->user();
    	}else{
    		return null;
    	}
    }

    public static function check()
    {
    	helper("auth");

        return auth("tokens")->loggedIn();
    }

    public static function forget()
    {
        auth()->logout();

        auth()->user()->revokeAllAccessTokens();
    }
}