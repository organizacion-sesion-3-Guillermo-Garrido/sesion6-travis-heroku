<?php


namespace cursophp7\app\utils;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MyMail
{
    private Swift_Mailer $mailer;
    private string $smtp_server;
    private int $smtp_port;
    private string $smtp_security;
    private string $username;
    private string $password;
    private string $email;
    private string $name;

    /**
     * MyMail constructor.
     * @param string $smtp_server
     * @param int $smtp_port
     * @param string $smtp_security
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $name
     */
    public function __construct(string $smtp_server, int $smtp_port, string $smtp_security, string $username,
                                string $password, string $email, string $name)
    {
        $this->smtp_server = $smtp_server;
        $this->smtp_port = $smtp_port;
        $this->smtp_security = $smtp_security;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $transport = (new Swift_SmtpTransport($this->smtp_server, $this->smtp_port, $this->smtp_security))
            ->setUsername($this->username)
            ->setPassword($this->password);
        $this->mailer = new Swift_Mailer($transport);
    }

    public function send(string $asunto, string $mailTo, string $nameTo, string $text): void{
        $message = (new Swift_Message())
            ->setSubject($asunto)
            ->setFrom([$this->email => $this->name])
            ->setTo([$mailTo => $nameTo]);
        $message->setBody('<html><body><p>'.$text.'</p></body></html>', 'text/html');
        $this->mailer->send($message);
    }

    /**
     *
     * @return MyMail
     */
    public static function load(string $smtp_server, string $smtp_port, string $smtp_security, string $username,
                                string $password, string $email, string $name):MyMail{
        return new MyMail($smtp_server, $smtp_port, $smtp_security, $username, $password, $email, $name);
    }




}