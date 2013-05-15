<?php 

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {
 use HasRole;



 public static function isConfirmed( $credentials )
    {
        $user = (new User())
            ->where('email','=',$credentials['email'])
            ->orWhere('username','=',$credentials['email'])
            ->first();

        // If confirmed return true.
        if( !is_null($user) AND $user->confirmed ) {
            return true;
        } else {
            // Fail
            return false;
        }

    }

}