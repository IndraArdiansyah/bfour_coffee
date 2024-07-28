<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

require_once 'dompdf-master/autoload.inc.php';

use Dompdf\Options;
use Dompdf\Dompdf;

class Pdf {
  public function load($html, $filename = '', $paper_size = '', $orientation = '')
  {
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper_size, $orientation);
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0));
  }
}