<?php
    $this->load->view('back/admin/layout/start_header_script');
    $this->load->view('back/admin/layout/top_navbar');
    $this->load->view('back/admin/layout/side_navbar');
    $this->load->view($content);
    $this->load->view('back/admin/layout/footer');
    // $this->load->view('back/layout/side_panel');
    $this->load->view('back/admin/layout/end_script');
?>