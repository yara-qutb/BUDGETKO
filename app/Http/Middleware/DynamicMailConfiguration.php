<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Crypt;

// class DynamicMailConfiguration
// {
//     public function handle($request, Closure $next)
//     {
//         $mailCredentials = DB::table('mail_credentials')->first();

//         config([
//             'mail.mailers.smtp.username' => $mailCredentials->username,
//             'mail.mailers.smtp.password' => Crypt::decrypt($mailCredentials->password),
//         ]);

//         return $next($request);
//     }
// }
