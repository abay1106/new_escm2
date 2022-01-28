<?php

class LanguageLoader
{
   function initialize() {
       $ci = &get_instance();
       $ci->load->helper('language');
       $siteLang = $ci->session->userdata('site_lang');
       if ($siteLang) {
            $ci->lang->load('header',$siteLang);
            $ci->lang->load('dashboard',$siteLang);
       } else {
           $ci->lang->load('header','indonesian');
       }
   }

}