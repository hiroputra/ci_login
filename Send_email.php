<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
        $this->load->library('email');


            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://mail.gijagijug.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'hiro@gijagijug.com';
            $config['smtp_pass']    = 'sysnki1919';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['wordwrap']     = TRUE;
            $config['mailtype'] = 'text'; // or html
            $config['validation'] = FALSE;


            $this->email->initialize($config);

        // Load library email dan konfigurasinya
      
      $this->email->initialize($config);
        // Email dan nama pengirim
      $this->email->from('hiro@gijagijug.com', 'hiro@gijagijug.com');

        // Email penerima
        $this->email->to('hiroputra@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

        // Isi email
        $this->email->message("tes");

        // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
        //     echo 'Sukses! email berhasil dikirim.';

        // } else {
        //     echo $this->email->print_debugger(array('headers'));
        //     //echo 'Error! email tidak dapat dikirim.';
        // }

        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim. bujug';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}