<?php

namespace asoabo\Http\Controllers;


use asoabo\Contribution;
use Illuminate\Http\Request;

use asoabo\Http\Requests;
use asoabo\Http\Controllers\Controller;
use asoabo\Lawyer;
use Illuminate\Support\Facades\App;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['getPayments', 'postPayments']]);
    }

    public function getReports()
    {
       return view('reports.index');
    }

    public function postReports(Request $request)
    {
        $lawyer = Lawyer::orderBy('last_name')->orderBy('first_name');

        if($request['gender'] != 'X')
        {
            $lawyer = $lawyer->where('gender', '=', $request['gender']);
        }

        $last_name = str_replace(' ', '', $request['last_name']);
        if($last_name != "")
        {
            $lawyer = $lawyer->where('last_name', 'like', $last_name.'%');
        }

        $first_name = str_replace(' ', '', $request['first_name']);
        if($first_name != "")
        {
            $lawyer = $lawyer->where('first_name', 'like', $first_name.'%');
        }


        $lawyers = $lawyer->get();

        $rows = "";

        if($lawyers->count() == 0)
        {
            $html = '<div style="text-align:center"><p>Sin datos para mostrar</p></div>';
        }
        else {
            $cont = 0;
            foreach ($lawyers as $lawyer) {
                $cont++;
                $mod = $cont % 2 == 0;
                if ($mod == 1) {
                    $rows .= '<tr>' .
                        '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: left;">' . $lawyer->last_name . '</td>' .
                        '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: left;">' . $lawyer->first_name . '</td>' .
                        '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: center;">' . $lawyer->identification . '</td>' .
                        '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: center;">' . $lawyer->registration_number . '</td>' .
                        '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: center; width: 150px;"></td>' .
                        '</tr>';
                } else {
                    $rows .= '<tr>' .
                        '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: left;">' . $lawyer->last_name . '</td>' .
                        '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: left;">' . $lawyer->first_name . '</td>' .
                        '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: center;">' . $lawyer->identification . '</td>' .
                        '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: center;">' . $lawyer->registration_number . '</td>' .
                        '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: center; width: 150px;"></td>' .
                        '</tr>';
                }
            }

            $html = '<div>' .
                '<table style="width:100%;">' .
                '<thead style="">' .
                '<tr>' .
                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">Apellidos</th>' .
                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">Nombres</th>' .
                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">C&#233;dula</th>' .
                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">Matricula</th>' .
                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px; width: 150px;">Firma</th>' .
                '</tr>' .
                '</thead>' .
                '<tbody style="">' .
                $rows .
                '</tbody>' .
                '</table>' .
                '</div>';
        }

        $header = '<header>'.
                    '<div>'.
                    '<h1 style="color:#2254AD; font-size:16px; text-align:left;">Asociaci&#243;n de Abogados de Manta</h1>'.
                    '<h2 style="color:#1E252B; font-size:12px; text-align:left;">Padr&#243;n Electoral</h2>'.
                    '</div>'.
                    '<div style="position:absolute; width: 55px; margin-top:-65px; margin-left:600px;">'.
                    '<img src="assets/image/logo.jpg" alt="" style="width: 50px; height: 50px;">'.
                    '</div>'.
                    '</header>'.
                    '<hr/>';

        $footer =   '<footer>'.
                        '<hr/>'.
                        '<div style="text-align:right;"><p>{PAGENO}</p></div>'.
                    '</footer>';

        $mpdf=new \mPDF('utf-8','A4','','','15','15','28','18');
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output('padron.pdf','D');
    }

    public  function  getPayments()
    {
        return view('reports.payments');
    }

    public  function  postPayments(Requests\DefaultRequest $request)
    {
        $identification = str_replace(' ', '', $request['identification']);
        $lawyers = Lawyer::where('identification','=',$identification)->get();
        if($lawyers->count() == 0) {
            $errors = array(
                "0" => 'No se encontr&#243; registro con la c&#233;dula ingresada!'
            );
            return $request->response($errors);
        }

        $contributions = Contribution::where('lawyer_id','=',$lawyers[0]->id)->where('year','=',$request['year'])->orderBy('month')->get();
        if($contributions->count() == 0) {
            $errors = array(
                "0" => 'No hay registro de pago!'
            );
            return $request->response($errors);
        }

        $lawyer = $lawyers[0];
        $month = array('enero','febrero','marzo','abril','mayo','junio','julio', 'agosto','septiembre','octubre','noviembre','diciembre');

        $rows = "";
        $cont = 0;
        foreach ($contributions as $item) {
            $cont++;
            $mod = $cont % 2 == 0;
            if ($mod == 1) {
                $rows .= '<tr>' .
                            '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: left;">' . $month[$item->month - 1] . '</td>' .
                            '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: center;">' . $item->amount . '</td>' .
                            '<td style="background: #E8EDFF; color: #1E252B; font-size: 12px; text-align: left; width: 400px;">' . $item->description . '</td>' .
                        '</tr>';
            } else {
                $rows .= '<tr>' .
                            '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: left;">' . $month[$item->month - 1] . '</td>' .
                            '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: center;">' . $item->amount . '</td>' .
                            '<td style="background: #F5F5F5; color: #1E252B; font-size: 12px; text-align: left; width: 400px;">' . $item->description . '</td>' .
                        '</tr>';
            }
        }

        $html = '<p><b style="color:#2254AD; font-size:14px; text-align:left;">Ab .'.$lawyer->first_name.' '.$lawyer->last_name.'</b></p>'.
                '<p>A&#241;o: '.$request->year.'</p>'.

                '<div>' .
                    '<table style="width:100%;">' .
                        '<thead style="">' .
                            '<tr>' .
                                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">Mes</th>' .
                                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px;">Monto</th>' .
                                '<th style="background: #D0DAFD; color: #2355AE; font-size: 14px; width: 400px;">Nota</th>'.
                            '</tr>' .
                        '</thead>' .
                        '<tbody style="">' .
                                 $rows.
                        '</tbody>' .
                    '</table>' .
                '</div>';

        $header = '<header>'.
            '<div>'.
            '<h1 style="color:#2254AD; font-size:16px; text-align:left;">Asociaci&#243;n de Abogados de Manta</h1>'.
            '<h2 style="color:#1E252B; font-size:12px; text-align:left;">Aportaciones</h2>'.
            '</div>'.
            '<div style="position:absolute; width: 55px; margin-top:-65px; margin-left:600px;">'.
            '<img src="assets/image/logo.jpg" alt="" style="width: 50px; height: 50px;">'.
            '</div>'.
            '</header>'.
            '<hr/>';

        $footer =   '<footer>'.
            '<hr/>'.
            '<div style="text-align:right;"><p>{PAGENO}</p></div>'.
            '</footer>';

        $mpdf=new \mPDF('utf-8','A4','','','15','15','28','18');
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output('aportaciones.pdf','D');
    }

}
