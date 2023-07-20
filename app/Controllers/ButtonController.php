<?php

namespace app\Controllers;

use app\Controllers\URI;

class ButtonController
{
    public function buttonControllers(): void
    {
        if (array_key_exists('botao_home', $_POST)) {
            require_once '../app/Views/Pages/home.phtml';
        }

        if (array_key_exists('botao_entrar', $_POST)) {
            require_once('../app/Views/Pages/entrar.html');
        }

        if (array_key_exists('botao_criar_conta', $_POST)) {
            require_once('../app/Views/Pages/criando-conta.html');
        }

        /*
        if (array_key_exists('botao_entrar', $_POST)) {

            if ("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" === "http://frame.localhost/") {

                print "1<br>";
                print "sim, 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]' === 'http://frame.localhost/'" . "<br>";

                print "<br>2<br>";
                print "'http://$_SERVER[HTTP_HOST] espaço $_SERVER[REQUEST_URI]'";

                print "<br>3<br>";
                $url = "this->$_SERVER[HTTP_HOST]/entrar";
                print "<br>url aqui<br>" . $url;
            } else {
                print "não é igual, 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]' === 'http://frame.localhost/'";
            }

            //require_once('../app/Views/Pages/entrar.html');
        }
        */
    }
}
