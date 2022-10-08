<?php

function index()
{
    loadView('backend/auth/login');
}

function register($request)
{

    global $host;

    $email       = strtolower($request->email);
    $username    = strtolower($request->username);
    $password    = mysqli_real_escape_string($host, $request->password);

    $cek         = query()->table('users')->where('email', $email)->single();

    if ($cek->email) {

        $error_register = 'Email sudah ada, gunakkan email lain!';
        view('backend/auth/register.php', compact('error_register'));
    } else {

        session_start();

        query()->insert('users', [

            $username,
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            'null'

        ]);

        $dataUsers = query()->table('users')->where('email', $email)->get();

        $dataUsers = assoc($dataUsers);

        sessionAuth($dataUsers);

        if (auth()->level() == 'admin') {

            view('backend/dashboard/data');
        } else {
            view('home');
        }
    }
}

function login($request)
{

    session_start();


    $email    = $request->email;
    $password = $request->password;

    $cek = query()->table('users')->where('email', $email)->get();

    if (rows($cek) === 1) {

        $dataUsers = assoc($cek);

        if (password_verify($password, $dataUsers['password'])) {

            sessionAuth($dataUsers);

            if (auth()->level() == 'admin') {
                view('backend/dashboard/data');
            } elseif (auth()->level() == "kurir") {
                view('backend/pickup/data');
            } else {
                view('home');
            }
        } else {
            $error_login = 'Sepertinya ada yang salah, pastikan email & password sudah benar';
            view('backend/auth/login', compact('error_login'));
        }
    } else {

        $error_login = 'Sepertinya ada yang salah, pastikan email & password sudah benar';
        view('backend/auth/login', compact('error_login'));
    }
}

function logout()
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_id']);
    unset($_SESSION['auth_email']);
    unset($_SESSION['auth_username']);
    unset($_SESSION['auth_level']);
    view('home');
}

function sessionAuth($dataUsers)
{
    $_SESSION['auth']          = true;
    $_SESSION['auth_id']       = $dataUsers['id'];
    $_SESSION['auth_username'] = $dataUsers['username'];
    $_SESSION['auth_level']    = $dataUsers['level'];
    $_SESSION['auth_email']    = $dataUsers['email'];
}

    /*[PandoraCode - Phoenix - Controller]*/
