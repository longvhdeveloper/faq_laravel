<?php
class AuthController extends BaseController
{
    public $data = array();
    public function signin()
    {
        $data['titlepage'] = 'Sign in';

        $valid = Validator::make(
            Input::all(),
            User::$login_rules,
            User::$user_languages
            );

        if ($valid->passes()) {
            try {
                $dataLogin = array(
                    'username' => Input::get('username'),
                    'password' => Input::get('password')
                );
                Sentry::authenticate($dataLogin, false);
                return Redirect::route('index')->with('success' , 'Login successfully');
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                $data['error'] = 'Username or password invalid';
                return View::make('site.auth.signin', $data);
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                $data['error'] = 'Username or password invalid';
                return View::make('site.auth.signin', $data);
            }
        } else {
            $data['error'] = $valid->errors()->first();
            return View::make('site.auth.signin', $data);
        }
    }

    public function signout()
    {
        Sentry::logout();
        return Redirect::route('index')->with('success' , 'Sign out  successfully');
    }

    public function signup()
    {
        return View::make('site.auth.signup');
    }

    public function doSignup()
    {
        $valid = Validator::make(Input::all(), User::$register_rules, User::$user_languages);

        if ($valid->passes()) {
            $user = array(
                'first_name' => Input::get('firstname'),
                'last_name' => Input::get('lastname'),
                'username' => Input::get('username'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => 1
            );

            $dataLogin = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
                );

            Sentry::createUser($user);
            Sentry::authenticate($dataLogin, false);

            return Redirect::route('index')->with('success', 'Login successfully');
        } else {
            return Redirect::route('signup')->withInput(Input::except('password', 'repassword'))->with('error', $valid->errors()->first());
        }
    }

    public function changePassword()
    {
        return View::make('site.auth.changepassword');
    }

    public function doChangePassword()
    {
        $valid = Validator::make(Input::all(), User::$changepass_rules, User::$user_languages);
        if ($valid->passes()) {
            try {
                $user = Sentry::findUserByCredentials(
                    array(
                        'username'      => Sentry::getUser()->username,
                        'password'   => Input::get('oldpassword'),
                    )
                );
                $user->password = Input::get('newpassword');
                $user->save();

                return Redirect::route('change_password')->with('success', 'Change password success');
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                return Redirect::route('change_password')->with('error', 'Old password is wrong');
            }
        } else {
            return Redirect::route('change_password')->with('error', $valid->errors()->first());
        }
    }

    public function forgotPassword()
    {
        return View::make('site.auth.forgotpassword')->with('titlepage' , 'Forgot password');
    }

    public function doForgotPassword()
    {
        $valid = Validator::make(Input::all(), User::$forgot_rules, User::$user_languages);

        if ($valid->passes()) {
            try {
                // Find the user using the user email address
                $user = Sentry::findUserByLogin(Input::get('username'));
                // Get the password reset code
                $resetCode = $user->getResetPasswordCode();

                //send mail with reset code
                $dataEmail = array(
                    'user' => $user->username,
                    'code' => $resetCode,
                    'name' => $user->first_name . ' '. $user->last_name,
                    'email' => $user->email,
                );
                Mail::send('emails.activecode', $dataEmail, function($message) use ($dataEmail){
                    $message->from('demo.faq.smtp07@gmail.com', 'No reply email');
                    $message->to($dataEmail['email'], $dataEmail['name']);
                    $message->subject('Required reset password');
                });

                return Redirect::route('forgot_password')->with('success', 'Email to reset password has send. Please check your email.');

            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return Redirect::route('forgot_password')->with('error', 'Username was not found');
            }
        } else {
            return Redirect::route('forgot_password')->with('error', $valid->errors()->first());
        }
    }

    public function getActiveReset($user, $code)
    {
        try {
            $user = Sentry::findUserByLogin($user);
            if ($user->checkResetPasswordCode($code)) {
                $newPassword = Str::random(6);
                $user->attemptResetPassword($code, $newPassword);

                $dataEmail = array(
                    'user' => $user->username,
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'email' => $user->email,
                    'password' => $newPassword,
                );

                Mail::send('emails.resetpass', $dataEmail, function($message) use ($dataEmail){
                    $message->from('demo.faq.smtp07@gmail.com', 'No reply email');

                    $message->to($dataEmail['email'], $dataEmail['name']);
                    $message->subject('New password in faq system');
                });

                return Redirect::route('index')->with('success','New password have send your email');
            } else {
                return Redirect::route('forgot_password')->with('error', 'Cant not reset password. Please try again.');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('forgot_password')->with('error', 'Username was not found');
        }
    }
}