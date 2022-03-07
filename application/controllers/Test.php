<?php
  
class Test extends CI_Controller {
   
   /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct(); 
      $this->load->helper('url'); 
     
          $this->load->model('Barangmasuk_m');
          $this->load->model('Databarang_m');
          $this->load->library('form_validation', 'upload');
      
   }
  
   /**
    * Manage index
    *
    * @return Response
   */
   public function index() { 
      $this->load->view('imageUploadForm'); 
   } 
    
   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function aaa() { 
   
    $data = [];
   
    $count = count($_FILES['files']['name']);
  
    for($i=0;$i<$count;$i++){
      if(!empty($_FILES['files']['name'][$i])){
  
        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

        $config['upload_path'] = './assets/file/test';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000';
        $config['file_name'] = $_FILES['files']['name'][$i];
 
        $this->load->library('upload',$config); 
        $this->upload->initialize($config);
        $id_barangmasuk = $this->Barangmasuk_m->idsm();
        if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $data1[$i] = [
                    'id_transaksi' =>$id_barangmasuk,
                    'nama_dokumen' => $filename,
                ];
                // var_dump($data1[$x]);
            $this->Barangmasuk_m->input_data($data1[$i], 'detail_dokumen');
            // var_dump($filename);
        }
      }
 
    }
 
    $this->load->view('imageUploadForm', $data); 
 }
  
} 
?>