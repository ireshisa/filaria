$total_postive_cx = 0;
        $data = $request->all();
        $from = $data['from'];
        $to = $data['to'];
        $mq_postive_for_l3 = 0;
        $name_of_heo = 0;
        $moh_area = 0;
        $phi_and_phm = 0;
        $gn_divison = 0;
        $no_of_premises = 0;
        $no_of_premises_positive = 0;
        $poscx = 0;
        $mansonia_species_of_positive = 0;
        $posms = 0;
        $total_time_spend = 0;
        $mosquitodensity = 0;
        $total_mosquitos_collected = 0;
        $no_of_dissected = 0;
        $infected = 0;
        $infective = 0;
        $infectedpercentage = 0;
        $infectivepercentage = 0;

        $result2 = DB::table('ento_01')
            ->select('*')
            ->where('district', $data['district'])
            ->WhereBetween('date', [$from, $to])
            // ->groupBy('moh_area')
            ->get();

        //         $result2 = DB::select('select ento_01_id,date,name_of_heo,moh_area,phi_and_phm,gn_divison,
        //   sum(no_of_premises) as no_of_premises,
        //   sum(no_of_premises_positive) as no_of_premises_positive,
        //   sum(total_time_spend) as total_time_spend,
        //   sum(mansonia_species_of_positive) as mansonia_species_of_positive,
        //   sum(mansonia_spcies_of_mosquitos_collected) as mansonia_spcies_of_mosquitos_collected
        //         from ento_01
        //         GROUP BY moh_area

        //         ');



        $viewData = "";
        if ($result2) {
            for ($i = 0; $i < count($result2); $i++) {
                $formid = $result2[$i]->ento_01_id;
                $id = $result2[$i]->date;
                $name_of_heo = $result2[$i]->name_of_heo;
                $moh_area = $result2[$i]->moh_area;
                $phi_and_phm = $result2[$i]->phi_and_phm;
                $gn_divison = $result2[$i]->gn_divison;


                $no_of_premises = $result2[$i]->no_of_premises;
                $no_of_premises_positive = $result2[$i]->no_of_premises_positive;
                $total_time_spend = $result2[$i]->total_time_spend;
                $mansonia_species_of_positive = $result2[$i]->mansonia_species_of_positive;
                $mansonia_spcies_of_mosquitos_collected = $result2[$i]->mansonia_spcies_of_mosquitos_collected;


                if ($no_of_premises == "" or $no_of_premises == 0) {
                    $posms = 0;
                } else {
                    $posms = ($mansonia_species_of_positive / $no_of_premises) * 100;
                    $posms = round($posms);
                }
                $result34 = DB::table('ento_05')
                    ->select('*')
                    ->where('main_form_type', "ento_01")
                    ->where('main_form_id', $formid)
                    ->get();
                if ($result34) {
                    for ($j = 0; $j < count($result34); $j++) {
                        $ento_05_id = $result34[$j]->ento_05_id;
                        $total_mosquitos_collected = $result34[$j]->total_cx_quin_mosq;

                        // $resultdi = DB::table('ento_05_species')
                        //     ->select('*')
                        //     ->where('species', "CX")
                        //     ->where('ento_05_id', $ento_05_id)
                        //     ->get();

                        // if ($resultdi) {
                        //     for ($k = 0; $k < count($resultdi); $k++) {
                        //         $no_of_dissected = $resultdi[$k]->no_of_dissected;
                        //     }
                        // }

                        $resultin = DB::table('ento_05_mosq')
                            ->select('*')
                            ->where('species2', "CX")
                            ->where('ento_05_id', $ento_05_id)
                            ->get();

                        if ($resultin) {

                            for ($l = 0; $l < count($resultin); $l++) {


                                $total_postive_cx = $resultin[$l]->positive_mosq;
                                $mq_postive_for_l3 = $resultin[$l]->mq_postive_for_l3;

                                $head_mf = $resultin[$l]->head_mf;
                                $head_l1 = $resultin[$l]->head_l1;
                                $head_l2 = $resultin[$l]->head_l2;
                                $head_l3 = $resultin[$l]->head_l3;
                                $thorax_mf = $resultin[$l]->thorax_mf;
                                $thorax_l1 = $resultin[$l]->thorax_l1;
                                $thorax_l2 = $resultin[$l]->thorax_l2;
                                $thorax_l3 = $resultin[$l]->thorax_l3;
                                $abdomen_mf = $resultin[$l]->abdomen_mf;
                                $abdomen_l1 = $resultin[$l]->abdomen_l1;
                                $abdomen_l2 = $resultin[$l]->abdomen_l2;
                                $abdomen_l3 = $resultin[$l]->abdomen_l3;
                                $infective = $head_l3 + $thorax_l3 + $abdomen_l3;
                                /*echo "<br>thi is infected".$infective;*/
                                $infected = $head_mf + $head_l1 + $head_l2 + $head_l3 + $thorax_mf + $thorax_l1 + $thorax_l2 + $thorax_l3 + $abdomen_mf + $abdomen_l1 + $abdomen_l2 + $abdomen_l3;
                                /*echo "<br>thi is infected".$infected;*/
                                $no_of_dissected = $resultin[$l]->no_of_dissected;
                            }
                        }
                    }



                    if ($total_mosquitos_collected == "" or  $total_mosquitos_collected == 0) {
                        $mosquitodensity = 0;
                    } else {
                        $mosquitodensity =  $total_time_spend / $total_mosquitos_collected;
                        $mosquitodensity = round($mosquitodensity, 2);
                    }

                    if (empty($no_of_dissected)) {
                        $infectedpercentage = 'Fill ento5_species';
                        $infectivepercentage = 'Fill ento5_species';
                    } else {
                        $infectedpercentage = ($total_postive_cx / $no_of_dissected) * 100;
                        $infectivepercentage = ($mq_postive_for_l3 / $no_of_dissected) * 100;

                        $infectedpercentage = round($infectedpercentage, 2) . '%';
                        $infectivepercentage = round($infectivepercentage, 2) . '%';
                    }
                    //          get %+

                    if ($no_of_premises == "" or $no_of_premises == 0) {
                        $poscx = 0;
                    } else {
                        $poscx = ($no_of_premises_positive / $no_of_premises) * 100;
                        $poscx = round($poscx) . "%";
                    }

                    //        mosquito density

                    if ($total_postive_cx == "" or $total_postive_cx == 0) {
                        $mosquitodensity = 0;
                    } else {
                        $mosquitodensity =  $total_time_spend / $total_postive_cx;
                        $mosquitodensity = round($mosquitodensity, 2);
                    }


                    $viewData = $viewData .
                        '<tr>' .
                        '<td>' . $name_of_heo . '</td>' .
                        '<td>' . $moh_area . '</td>' .
                        '<td>' . $phi_and_phm . '</td>' .
                        '<td>' . $gn_divison . '</td>' .
                        '<td>' . $no_of_premises . '</td>' .
                        '<td>' . $no_of_premises_positive . '</td>' .
                        '<td>' . $poscx . '</td>' .
                        // '<td>' . $mansonia_species_of_positive . '</td>' .
                        // '<td>' . $posms . '</td>' .
                        '<td>' . $total_time_spend . '</td>' .
                        '<td>' . $mosquitodensity . '</td>' .
                        '<td>' . $total_mosquitos_collected . '</td>' .
                        '<td>' . $no_of_dissected . '</td>' .
                        '<td>' . $total_postive_cx   . '</td>' ./* $infected */
                        '<td>' . $mq_postive_for_l3 . '</td>' .
                        '<td>' . $infectedpercentage . '</td>' .
                        '<td>' . $infectivepercentage . '</td>
                </tr>';
                }
            }
        }



        $content = ob_get_clean();
        $html2pdf_path = base_path() . '/pdf_lib/html2pdf/html2pdf.class.php';
        File::requireOnce($html2pdf_path);
        $template = view(
            'report/b1_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district']]
        );
        try {
            $html2pdf = new HTML2PDF('L', 'A3', 'en', true, 'UTF-8', array(1, 1, 1, 1));
            $html2pdf->pdf->SetTitle('B 1 Report');
            $html2pdf->WriteHTML($template);
            $html2pdf->Output('b1_report.pdf');
            ob_flush();
            ob_end_clean();
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        return view(
            'report/b1_view',
            compact('data'),
            ["dataView" => $viewData, 'district' => $data['district']]
        );
