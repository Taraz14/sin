<?php
    $this->load->view('back/guru/layout/start_header_script');
    $this->load->view('back/guru/layout/top_navbar');
    $this->load->view('back/guru/layout/side_navbar');
    $this->load->view($content);
    $this->load->view('back/guru/layout/footer');
    // $this->load->view('back/layout/side_panel');
    $this->load->view('back/guru/layout/end_script');
?>