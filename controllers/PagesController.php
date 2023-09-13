<?php

namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

class PagesController {
    public static function index(Router $router) {
        $properties = Property::get(3);
        $start = true;

        $router->render('pages/index', [
            'properties' => $properties,
            'start' => $start
        ]);
    }

    public static function aboutus(Router $router) {
        $router->render('pages/aboutus');
    }

    public static function properties(Router $router) {
        $properties = Property::all();
        $router->render('pages/properties', [
            'properties' => $properties
        ]);
    }

    public static function property(Router $router) {
        $id = validateORredirect('/properties');
        $property = Property::find($id);
        $router->render('pages/property', [
            'property' => $property
        ]);
    }

    public static function blog(Router $router) {
        $router->render('pages/blog');
    }

    public static function entry(Router $router) {
        $router->render('pages/entry');
    }

    public static function contact(Router $router) {

        $message = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $info = $_POST['contact'];

            // Create new instance
            $mail = new PHPMailer(true);
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'd4b1e27352a262';
            $mail->Password = '1d64f440bc252f';
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 2525; // TCP port to connect to

            // Mail settings
            $mail->setFrom('admin@realstate.com');
            $mail->addAddress('admin@realstate.com', 'RealState.com');
            $mail->Subject = 'Contact from our website';

            // HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Content
            $content = '<html>';
            $content .= '<p>You have a new message</p>';
            $content .= '<p>From: ' . $info['name'] . '</p>';

            if($info['contact'] === 'phone') {
                $content .= '<p> Chose to be contacted by phone </p>';
                $content .= '<p>Phone: ' . $info['phone'] . '</p>';
                $content .= '<p>Contact Date: ' . $info['date'] . '</p>';
                $content .= '<p>Contact Time: ' . $info['time'] . '</p>';
            } else {
                $content .= '<p> Chose to be contacted by email </p>';
                $content .= '<p>Email: ' . $info['email'] . '</p>';
            }

            $content .= '<p>Message: ' . $info['message'] . '</p>';
            $content .= '<p>Buy Or Sell: ' . $info['type'] . '</p>';
            $content .= '<p>Price or Budget: $' . $info['price'] . '</p>';
            $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = 'You have a new message';

            // Send email
            if($mail->send()) {
                $message = 'Message sent successfully';
            } else {
                $message = 'Message could not be sent';
            }

        } 

        $router->render('pages/contact', [
            'message' => $message
        ]);
    }
}