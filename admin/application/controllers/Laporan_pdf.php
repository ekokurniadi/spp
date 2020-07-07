  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan_pdf extends MY_Controller {

   
    function __construct() {
        parent::__construct();
       
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }
    
    public function rekap_spp()
    {
        $dompdf= new Dompdf();
      
        $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where status_spp='Lunas'")->result();
        $data['start']=0;
        $html=$this->load->view('rekap_spp',$data,true);
        
        $dompdf->load_html($html);
        $dompdf->set_paper('A4','potrait');
        $dompdf->render();
        
        $pdf = $dompdf->output();
  
        $dompdf->stream('Bukti Pembayaran Uang Komite.pdf',array("Attachment"=>FALSE));
      }

    public function rekap_osis()
    {
        $dompdf= new Dompdf();
      
        $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where status_osis='Lunas'")->result();
        $data['start']=0;
        $html=$this->load->view('rekap_osis',$data,true);
        
        $dompdf->load_html($html);
        $dompdf->set_paper('A4','potrait');
        $dompdf->render();
        
        $pdf = $dompdf->output();
  
        $dompdf->stream('Bukti Pembayaran Uang Osis.pdf',array("Attachment"=>FALSE));
      }
      
    public function rekap_ekskul()
    {
        $dompdf= new Dompdf();
      
        $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where status_ekstrakurikuler='Lunas'")->result();
        $data['start']=0;
        $html=$this->load->view('rekap_ekskul',$data,true);
        
        $dompdf->load_html($html);
        $dompdf->set_paper('A4','potrait');
        $dompdf->render();
        
        $pdf = $dompdf->output();
  
        $dompdf->stream('Bukti Pembayaran Uang Ekskul.pdf',array("Attachment"=>FALSE));
      }
}

