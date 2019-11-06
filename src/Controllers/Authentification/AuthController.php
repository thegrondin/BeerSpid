<?php

class AuthController extends BaseController {

    protected Traductor $traductor;
    protected AuthCommands $commands;
    protected MessageArray $messageArray;
    protected Redirector $redirector;

    function __construct(IAuthCommands $commands, ITraductor $traductor, IRedirector $redirector, IMessageArray $messageArray) {
        $this->traductor = $traductor;
        $this->commands = $commands;
        $this->messageArray = $messageArray;
        $this->redirector = $redirector;
    }

    public function get__login(Request $request = null, MessageArray $messages) : Response {

        return $this->renderView([
            "message" => $messages,
        ]);
    }

    public function post__login(Request $request) {

        $this->$auth->checkCreds($request->post("username"), $request->post("password"));

        if ($this->$auth->credsValid()) {
            $this->$auth->allowUserFor($this->$auth->getPrivilegesObject());
            return $this->redirector->redirectTo("/home/");
        }
        else {

            $this->messageArray->addMessage(Message::Notice, $this->traductor->auth['login']['failure']);

            return $this->get__login(null, $messages);
        }
    }
}
