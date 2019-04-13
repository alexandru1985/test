<?php
use \App\Models\Survey;
use \App\Models\SettingSurvey;

public function saveFileDuelText(Survey $survey, Request $request) {

        if (isset($request->file_duel_text)) {
            $wave = $survey->waves()->first();
//          dd($wave->id);
//          dd($request->file_duel_text->getClientOriginalExtension());
//
//          Save file on server
            $strBaseFileName = 'template';
            $strFileName = $strBaseFileName . '.' . $request->file_duel_text->getClientOriginalExtension();
            $strFilePath = 'surveys/' . $survey->id;
            $x = $request->file_duel_text->storeAs('public/' . $strFilePath, $strFileName);
            $pathFile = 'storage/surveys/' . $survey->id . '/' . $strFileName;

//          dd(file_exists("storage/surveys/618/3k0r0wmKcv.xlsx"));
            $item = new DuelTesting();
            $item->wave_id = $wave->id;
//            dd($item);
            $objDuelTestingRepository = new DuelTestingRepository($item);
            $objDuelTestingRepository->saveTextsFromExcelFile($wave, $pathFile);

            return redirect()->route('wizard_duel', $survey->id);
        }
    }

    public function ajxCheckTemplate(Survey $survey, Request $request) {
//          dd($request->file_name);
//          Save file on server
        if (isset($request->file_name)) {

            $strBaseFileName = 'template';
            $strFileName = $strBaseFileName . '.' . $request->file_name->getClientOriginalExtension();
            $strFilePath = 'surveys/' . $survey->id;
            $x = $request->file_name->storeAs('public/' . $strFilePath, $strFileName);

            $pathFile = 'storage/surveys/' . $survey->id . '/' . $strFileName;
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($pathFile);

//          Read excel data and store it into an array
            $xlsxData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

//            dd($xlsxData[4]['B']);
            $error = '';
            if ($xlsxData[3]['B'] == null || $xlsxData[3]['C'] == null) {
                $error = 'Template not started with B3 or C3 looking Excel sheet.';
            }
            else {
            $nr = count($xlsxData);
            $countClaims = 0;
            for($i=3; $i<=$nr; $i++) {
            if ((strlen($xlsxData[$i]['B']) < 1 ) || (strlen($xlsxData[$i]['C']) < 1)) {
                    $error = 'Template includes empty fields.';
                    break;
                }
                else {
                    $countClaims++;
                    if($countClaims > 100) {
                    break;
                }
                }
            }
            if($countClaims > 100 ) {$error = 'The template has more than 100 claims/attributes.';}
            if(empty($error)) {$error = 'no_error';}
            }
            // dd($error);
            return response()->json(['error' => [
                            'check_template' => $error
            ]]);
        }
    }

    public function ajxCheckExtension(Request $request) {


        if ($request->file_duel_text == 'empty_file') {
            $error = 'No file selected.';
        } else {

            $strRev = strrev($request->file_duel_text);
            $arrRequest = explode('.', $strRev);
            $extension = strrev($arrRequest[0]);

            $checkExtensions = array("xlsx", "xls");

            if (!in_array($extension, $checkExtensions)) {
                $error = 'Just Excel files are allowed.';
            } else {

                $error = 'no_error';
            }
        }

//          dd($error);
        return response()->json(['error' => [
                        'file_duel_text' => $error
        ]]);
    }

    public function downloadTemplate() {

        $templateName = public_path() . '/templates/template_duel_claims.xlsx';
        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        $newName = 'template_duel_claims.xlsx';

        return response()->download($templateName, $newName, $headers);
    }
    public function ajxGetRateCardData(Request $request) {

        $stimuli = $request->post('stimuli');
        $groupedCompletes = ($request->post('completes') > 500) ? '>500' : '<=500';
        $incidence = $request->post('incidence');

        $results = collect(
            DB::table('duel_rate_card')
                ->where('grouped_completes', $groupedCompletes)
                ->whereRaw('? BETWEEN grouped_stimuli_start AND grouped_stimuli_end', [$stimuli])
                ->whereRaw('? BETWEEN grouped_incidence_start AND grouped_incidence_end', [$incidence])
                ->first()
        );

        return $results->toJson();

    }
    public function ajxLoadClaimsInfo(Survey $survey) {

        $wave = $survey->waves()->first();
        $objWaveSetting =  WaveSetting::where('wave_id', $wave->id)->first();
        $productType = $objWaveSetting->type;

        $objStartSurvey1 = new SettingsSurveyRepository();
        $arrClaimText1 = $objStartSurvey1->getClaimText1($productType,$wave->id);

        $objStartSurvey2 = new SettingsSurveyRepository();
        $arrClaimText2 = $objStartSurvey2->getClaimText2($productType,$wave->id);

        $blnOtherPair = 0;
        $duelSetting = DuelSetting::where('wave_id', $wave->id)->first();
        $termTexts = TermText::where('wave_id',$wave->id)->first();

        if ($termTexts !== null) { $blnOtherPair = 1;}
        //dd($blnOtherPair);
        //dd($survey->id);
        return view('duel.partials.load_claims_info', ['arrClaimText1' => $arrClaimText1,
                                                       'arrClaimText2' => $arrClaimText2,
                                                       'survey' => $survey,
                                                       'blnOtherPair' => $blnOtherPair,
                                                       'termTexts' => $termTexts,
                                                       'duelSetting' =>  $duelSetting
                                                       ]);
    }

    public function ajxSavePairText(Survey $survey, Request $request) {

        $wave = $survey->waves()->first();
        $objWaveSetting =  WaveSetting::where('wave_id', $wave->id)->first();
        $productType = $objWaveSetting->type;

        $objTerm =  Term::where('product_type', $productType)->where('type', 'text1')->first();


        if(isset($request->text)) {

        $objStartSurvey = new SettingsSurveyRepository();
        $objStartSurvey->savePairText($objTerm->id, $request->text, $wave->id);

        }

//        return true;
//        dd($objTerm);

    }
    public function ajxUploadLogoDuel(Survey $survey, Request $request) {
        
        $view ='';
        $error = '';
         if ($request->file_name == 'undefined') {
            $error = 'No file selected.';
           //dd($error);
        } else {

            $extension = $request->file_name->getClientOriginalExtension();

            $checkExtensions = array("jpg", "jpeg","png","gif","svg");

            if (!in_array($extension, $checkExtensions)) {
                $error = 'Just images files are allowed.';
            } 
            else {
                
            $arrRules = [
                'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=700,max_height=700',
            ];
            $validator = \Validator::make($request->all(), $arrRules);
                if ($validator->fails()) {
                $error = 'test.';
                }
            }
            if ($error == null) {
                $strBaseFileName = str_random(10);
                $strFileName = $strBaseFileName . '.' . $extension;
                $strFilePath = 'surveys/' . $survey->id;
                $x = $request->file_name->storeAs('public/' . $strFilePath, $strFileName);
                $error = 'no_error';

                $view = view("duel.partials.logo_duel",compact('survey'))->render();
            }

        }
         //dd($error);

         return response()->json(['error' => ['file_duel_logo' => $error],
                                  'html'=> $view
                 ]);
    }
        public function ajxSaveTermsTextIds (Survey $survey, Request $request) {

            $wave = $survey->waves()->first();
            if(isset($request->pairId) && isset($request->preferenceId)) {
                $objStartSurvey = new SettingsSurveyRepository();
                $objStartSurvey->saveTermsTextIds($request->pairId, $request->preferenceId, $wave->id);
            }
        }
        
}
                Mail::send('emails.cron', ['firstName' => $firstName, 'lastName' => $lastName, 'urlHash' => $urlHash], function($message) use ($email) {
                    $message->to($email)
                            ->from('dev@clintelica.com')
                            ->subject('Reminder Activation Email');
                });



public function saveWaveCategories($requestTarget) {


      $template  = TargetTemplate::find($requestTarget);
      $defaultCategoryId = $template->category_id;
      $level = 0;
      if($defaultCategoryId > 0 ) {
      $level = $template->category->level;
//      $defaultCategoryId = $template->category_id;
//      dd($defaultCategoryId);
//      dd($level);
//      $categId = $template->category_id;
//      dd($survey->id);
//
//
//      dd($level);
//      dd($template);
      $parentIdSuperiorCat = $template->category->parent_id;
//      dd($parentIdSuperiorCat);
      $oneCategory = Category::where('id', $parentIdSuperiorCat)->first();
//      dd($oneCategory);
      $parentIdLevelOneCat = $oneCategory->parent_id;
//      dd($parentIdLevelOneCat);
    }
      if ($level == 2) {
             $waveCategories = new WaveCategories();
             $waveCategories->wave_id = session('wave_id');
             $waveCategories->category_id = $defaultCategoryId;
             $waveCategories->type = 1;
             $waveCategories->save();
      $levelTwoCategoriesIds=  DB::table('categories')
               ->join('target_templates', 'categories.id', '=', 'target_templates.category_id')
               ->select('categories.*', 'target_templates.category_id','target_templates.name')
               ->where('categories.level','=',2)
               ->whereNotIn('categories.id',[$defaultCategoryId])
               ->inRandomOrder()
               ->limit(5)
               ->get();
//      dd($levelTwoCategoriesIds);

    //dd($defaultCategoryId);        
         
      foreach($levelTwoCategoriesIds as $levelTwoCategoriesId) {
             $waveCategories = new WaveCategories();
             $waveCategories->wave_id = session('wave_id');
             $waveCategories->category_id = $levelTwoCategoriesId->id;
             $waveCategories->type = 2;
             $waveCategories->save();

}
 //      dd('Test');
  }
      else if ($level == 3) {
             $waveCategories = new WaveCategories();
             $waveCategories->wave_id = session('wave_id');
             $waveCategories->category_id = $defaultCategoryId;
             $waveCategories->type = 1;
             $waveCategories->save();
             $parentIdLevelTwoCatTT = DB::table('categories')
                         ->join('target_templates', 'categories.id', '=', 'target_templates.category_id')
                         ->select('categories.parent_id')
                         ->where('categories.level','=',3)
                         ->distinct()->pluck('categories.parent_id')->toArray();          
            //dd($parentIdLevelTwoCatTT);
      $levelTwoCategoriesParentId = DB::table('categories')->select(DB::raw('group_concat(id separator ", ") as group_id'))
               ->where('level','=',2)
               ->whereIn('id',$parentIdLevelTwoCatTT)
               ->whereNotIn('parent_id',[$parentIdLevelOneCat])
               ->groupBy('parent_id')
               ->inRandomOrder()
               ->limit(5)
               ->get();
//        dd($levelTwoCategoriesParentId);

       //dd($levelTwoCategoriesParentId);        
     
       $idLevelThreeCatTT = DB::table('categories')
                         ->join('target_templates', 'categories.id', '=', 'target_templates.category_id')
                         ->select('target_templates.category_id')
                         ->where('categories.level','=',3)
                         ->pluck('target_templates.category_id')->toArray();  
       //dd($idLevelThreeCatTT);
      $categories = [];

      foreach($levelTwoCategoriesParentId as $levelTwoCategoryParentId) {

          $levelTwoCategoryParentId = explode(',',$levelTwoCategoryParentId->group_id);
          $key = array_rand($levelTwoCategoryParentId);
          $valueParentIdLevelTwo = $levelTwoCategoryParentId[$key];
//         dd($v);
          $categories[] = DB::table('categories')->select('*')
               ->whereIn('id',$idLevelThreeCatTT)
               ->whereIn('parent_id',[$valueParentIdLevelTwo])
               ->inRandomOrder()
               ->limit(1)
               ->first();
      }



       //dd($categories); 
      foreach($categories as $category) {
             $waveCategories = new WaveCategories();
             $waveCategories->wave_id = session('wave_id');
             $waveCategories->category_id = $category->id;
             $waveCategories->type = 2;
             $waveCategories->save();

  }
  }
        session()->forget('wave_id');
        return true;
  }

stabilire mod de logare a unui utilizator dupa tipul acestuia;
incarcare, descarcare, validare fisiere de tip xlsx, jpg, jpeg, png;
validare formulare ajax;
crearea unor tabele noi si popularea acestora in conformitate cu datele primite;
operatii de tip CRUD (Create Read Update Delete) in diferite zone ale aplicatiei;
realizarea unui cron de trimitere a mail-urilor din 2 in 2 zile;
diferite task-uri de front-end de nivel mediu: aranjare block-uri in pagina, numarare litere ramase disponibile in mai multe campuri, afisare pop-up-uri de confirmare etc.


