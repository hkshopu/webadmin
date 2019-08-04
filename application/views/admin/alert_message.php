<?php
        if($this->session->flashdata())
        {
          $msg_class = ($this->session->flashdata('message_type') == 'Success') ? 'success' : 'danger';
          $msg_icon = ($this->session->flashdata('message_type') == 'Success') ? 'check' : 'ban';
         
          $html_message = '';
          $html_message .= '<div class="alert alert-'.$msg_class.' alert-dismissible">';
          $html_message .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          $html_message .= '<h4><i class="icon fa fa-'.$msg_icon.'"></i>';
          $html_message .= $this->session->flashdata('message_type');
          $html_message .= '</h4>';
          $html_message .= $this->session->flashdata('message');
          $html_message .= '</div>';
          echo $html_message;
        }                
    ?>