<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $usaha, $user, $produk;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->usaha = new UsahaModel();
        $this->user = new UserModel();
        $this->produk = new ProdukModel();
    }
    public function index()
    {
        // $data['laporan'] = $this->usaha->TampilProdukAllAdm();
        // return view('laporan/print', $data);
        return view('laporan/index');
    }
    public function print()
    {
        $filename = 'laporan-asmami-' . date('d-m-y') . '.pdf';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        // load HTML content
        $data['laporan'] = $this->usaha->findAll();
        $dompdf->loadHtml(view('laporan/print', $data));
        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);
    }
}
