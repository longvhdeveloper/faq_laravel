<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User {
    public static $login_rules = array(
        'username' => 'required',
        'password' => 'required'
    );

    public static $user_languages = array(
        'username.required' => 'Please enter username',
        'password.required' => 'Please enter password',
        'firstname.required' => 'Please enter first name',
        'lastname.required' => 'Please enter last name',
        'email.required' => 'Please enter your email',
        'min.username' => 'Username is minimum :min characters',
        'min.password' => 'Password is minimum :min characters',
        'email' => 'Email is not valid',
        'email.unique' => 'Email is exist in system, please try other',
        'username.unique' => 'Username is exist in system, please try other',
        'repassword.required' => 'Please enter re-password',
        'repassword.same' => 'Password and re password not match',
        'recaptcha_response_field.required' => 'Please enter recaptcha',
        'recaptcha_response_field.recaptcha' => 'Recaptcha not correct',
        'oldpassword.required' => 'Please enter old password',
        'newpassword.required' => 'Please enter new password',
        'renewpassword.required' => 'Please enter re new password',
        'newpassword.min' => 'New password is minium :min characters',
        'renewpassword.same' => 'Re new password is not macth new password'
    );

    public static $register_rules = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|min:4|unique:users,username',
        'password' => 'required|min:5',
        'repassword' => 'required|same:password',
        'recaptcha_response_field' => 'required|recaptcha',
    );

    public static $changepass_rules = array(
        'oldpassword' => 'required',
        'newpassword' => 'required|min:5',
        'renewpassword' => 'required|same:newpassword'
    );

    public static $forgot_rules = array(
        'username' => 'required',
        'recaptcha_response_field' => 'required|recaptcha',
    );

    public function questions()
    {
        return $this->hasMany('Question', 'user_id');
    }
}
