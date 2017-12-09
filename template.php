<?php
//希望中文注释不要乱码
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//这里需要保证src目录的相对路径
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);
try {
    //比较重要的配置
    $mail->SMTPDebug = 2;                                 // Debug用的，设成0就没有debug输出，1234是不同级别的debug输出
    $mail->isSMTP();                                      // 必要
    $mail->Host = 'smtp.gmail.com';  // 这里填写你用来发送邮件的邮箱的smtp地址
    $mail->SMTPAuth = true;                               // 身份验证
    $mail->Username = '76ucmefer@gmail.com';                 // 用来发送邮件的邮箱
    $mail->Password = 'arkjvpbxjzaczkoy';                      // 用来发送邮件的邮箱的密码，这里这个乱码是我生成的应用程序专用密码
    $mail->SMTPSecure = 'tls';                            // 加密方式，tls和ssl都可以
    $mail->Port = 587;                                    // 对于gmail，tls对应587端口，ssl对应465端口，国内大部分应该是25端口

    //这些配置主要影响邮件上的显示，你测试即知
    $mail->setFrom('76ucmefer@gmail.com', 'Lejian Ren');    //源地址，后面的名字可选
    $mail->addAddress('sdhsf2009@qq.com');    //目标地址
    $mail->addReplyTo('76ucmefer@gmail.com', 'Lejian Ren');    //收到邮件后reply ，reply all那个地址
    $mail->addCC('rlj_ww@163.com');    //抄送地址
    //$mail->addBCC('rlj_ww@163.com');    //这个是什么抄送没仔细看。。。

    //添加附件没测试，但是输入参数是服务器上的文件路径，应该问题不大
    //$mail->addAttachment('/var/tmp/file.tar.gz');         

    //邮件正文
    $mail->isHTML(true);                                  //设成html格式的话就可以使用html那些斜体，加重标签了
    $mail->Subject = 'Test subject';
    $mail->Body    = 'Test mail content';
    $mail->AltBody = 'Test mail content (plain text for non-HTML mail clients)';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}