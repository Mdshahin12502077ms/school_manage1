<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class MailProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function () {
            if (Schema::hasTable('s_m_t_p_s')) {
                $email=DB::table('s_m_t_p_s')->first();
                    if($email){
                         $config=[
                             'diver'=>$email->mailer,
                             'host'=>$email->host,
                             'port'=>$email->port,
                             'from'=>array('address'=>$email->sender,'name'=>('APP_NAME')),
                             'encryption'=>$email->encryption,
                             'password'=>$email->password,
                             'username'=>$email->username,
                             'sendmail'=>'/usr/sbin/sendmail -bs',
                             'pretend'=>false,
                         ];

                         Config::set('email', $config);
            }
        }
        });

    //   if(Schema::hasTabele('s_m_t_p_s')){
    //     $email=DB::table('s_m_t_p_s')->first();
    //     if($email){
    //          $config=[
    //              'diver'=>$email->mailer,
    //              'host'=>$email->host,
    //              'port'=>$email->port,
    //              'from'=>array('address'=>$email->sender,'name'=>('APP_NAME')),
    //              'encryption'=>$email->encryption,
    //              'password'=>$email->password,
    //              'username'=>$email->username,
    //              'sendmail'=>'/usr/sbin/sendmail -bs',
    //              'pretend'=>false,
    //          ];

    //          Config::set('email', $config);
    //     }
    //   }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
