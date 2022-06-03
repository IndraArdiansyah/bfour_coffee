<?php

function cek_login() {
  $ci = get_instance();

  if (!$ci->session->userdata('nip')) {
    $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login ...!!</div>');
    redirect('home');
  } else {
    $nip = $ci->session->userdata('nip');
  }
}