# send-mailer-with-phpmailer

发送邮件，使用php自带的mail函数需要服务器支持smtp协议，然鹅，大多数服务器是没有安装该协议的。
因此，在这种情况下，phpmailer就是一个很好的选择
/src：包含了发送邮件所需的类，如SMTP.php, PHPMailer.php
template.php:发送邮件模板
sendmailfunction.php:可供调用的函数
