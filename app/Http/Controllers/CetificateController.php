<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;



class CetificateController extends Controller
{
    public function Addtopdf(User $user,Course $course){

        //$curso = Course::where('slug','=',$course);
        
        //$respuesta = Review::where('user_id', auth()->user()->id)->where('course_id', $course->id)->count();
        //return $respuesta;

        if(Review::where('user_id', auth()->user()->id)->where('course_id', $course->id)->count()<1){
            return redirect()->route('home');
        }else{

            $titulo =$course->title;
            $credito = $course->credito;
            $hora = $course->hora;
            $libro = $course->libro;
            $registro = $course->registro == '' ? ' ' : $course->registro;

            $review = Review::all()
            ->where('user_id',auth()->user()->id)
            ->where('course_id', $course->id)->take(1);

            //return dd($review);
            
            $fecha = "";
            $fechacertificado = "";

            foreach($review as $fe){
                $fecha = $fe->created_at;
            }

            //return dd($fecha[0]->created_at); 2021-10-12

            $date = explode(" ", $fecha);

            $formato = explode("-", $date[0]);
            
            $mes = "";
            switch($formato[1]){
                case 1;
                    $mes = "Enero";
                    break;
                case 2;
                    $mes = "Febrero";
                    break;
                case 3;
                    $mes = "Marzo";
                    break;
                case 4;
                    $mes = "Abril";
                    break;
                case 5;
                    $mes = "Mayo";
                    break;
                case 6;
                    $mes = "Junio";
                    break;
                case 7;
                    $mes = "Julio";
                    break;
                case 8;
                    $mes = "Agosto";
                    break;
                case 9;
                    $mes = "Septiembre";
                    break;
                case 10;
                    $mes = "Octubre";
                    break;
                case 11;
                    $mes = "Noviembre";
                    break;
                case 12;
                    $mes = "Diciembre";
                    break;
            }

             $fechacertificado ='Otorgado el: '. $formato[2] .' de '. $mes .' de '. $formato[0];

            $pdf = new Fpdi();

            $pdf->AddPage();

            $pdf->SetFont('Arial','B','21');

            $path =  public_path("UNDAC_CERT.pdf");

            $pdf->setSourceFile($path);

            $tplId = $pdf->importPage(1);

            $pdf->useTemplate($tplId, null, null,null, 225, true);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY(0,110);

            $alumno = auth()->user()->name;
            //$pdf->Write(0.1, $alumno,0,1,'C');
            $pdf->cell(0,0,utf8_decode(strtoupper($alumno)),0,0,'C');

            $pdf->SetFont('Arial','B','18');
            $pdf->SetXY(55,130);
            $pdf->MultiCell(200, 6, utf8_decode($titulo.$titulo),0,'C');

            //imprimiendo las fecha
            $pdf->SetFont('Arial','','12');
            $pdf->SetXY(0,155);
            $pdf->cell(0,0,utf8_decode(strtoupper($fechacertificado)),0,0,'C');

            

            // imprimeindo las horas y creditos del curso
            $pdf->SetFont('Arial','','10');
            $pdf->SetXY(60,162);
            $pdf->cell(0,0,utf8_decode(strtoupper($credito)),0,0,'L');

            $pdf->SetXY(60,166);
            $pdf->cell(0,0,utf8_decode(strtoupper($hora)),0,0,'L');

            $pdf->SetXY(60,170);
            $pdf->cell(0,0,utf8_decode(strtoupper($registro)),0,0,'L');

            $pdf->SetXY(60,174);
            $pdf->cell(0,0,utf8_decode(strtoupper($libro)),0,0,'L');



            $pdf->Output('I', "demotyest.pdf");

        }

    }
}
