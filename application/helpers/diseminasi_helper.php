<?php

function cekmasuk()
{
    $gi = get_instance();
    if (!$gi->session->userdata('email')) {
        redirect('masuk');
    }
}
