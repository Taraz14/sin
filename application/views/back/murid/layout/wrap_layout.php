<?php
    $this->load->view('back/murid/layout/start_header_script');
    $this->load->view('back/murid/layout/top_navbar');
    $this->load->view('back/murid/layout/side_navbar');
    $this->load->view($content);
    $this->load->view('back/murid/layout/footer');
    // $this->load->view('back/layout/side_panel');
    $this->load->view('back/murid/layout/end_script');
?>