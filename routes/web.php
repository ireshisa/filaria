<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect('login');

    // return view('welcome');
});
// report routes start  

Route::get('c1_report', ['uses' => 'C1Controller@c1_report']);
Route::post('c1_report_print', ['uses' => 'C1Controller@c1_report_print']);

Route::get('c2_report', ['uses' => 'C2Controller@c2_report']);
Route::post('c2_report_print', ['uses' => 'C2Controller@c2_report_print']);

Route::get('b2_report', ['uses' => 'Ento1Controller@b2_report']);
Route::post('b2_report_print', ['uses' => 'B2Controller@b2_report_print']);
Route::get('b1_report', ['uses' => 'Ento1Controller@b1_report']);
Route::post('b1_report_print', ['uses' => 'B1Controller@b1_report_print']);
Route::get('b1_report_print_man', ['uses' => 'Ento1Controller@b1_report_print_man']);
Route::get('f1_report', ['uses' => 'H867Controller@f1_report']);
Route::post('f1_report_print', ['uses' => 'H867Controller@f1_report_print']);
Route::get('a2_report', ['uses' => 'H867Controller@a2_report']);
Route::post('a2_report_print', ['uses' => 'H867Controller@a2_report_print']);
Route::get('a3_report', ['uses' => 'H867Controller@a3_report']);
Route::post('a3_report_print', ['uses' => 'H867Controller@a3_report_print']);

// report routes end

// Route::get('/', ['uses'=>'UserController@index']);

// c1 routes start
Route::get('c1_form', ['uses' => 'C1Controller@index']);
Route::get('c1_data', ['uses' => 'C1Controller@c1_data']);
Route::get('c1_view', ['uses' => 'C1Controller@c1_view']);
Route::post('c1_save', ['uses' => 'C1Controller@create']);

Route::get('view_c1_data', ['uses' => 'C1Controller@view_c1_data_new']);
//new crated by ISA 9/8/2021
Route::post('c1_data_save', ['uses' => 'C1Controller@c1_data_save']);
Route::get('view_c1_data/{id}', ['uses' => 'C1Controller@view_c1_data']);
Route::get('delete_c1/{id}', ['uses' => 'C1Controller@delete_c1']);
Route::get('delete_c1_data/{id}', ['uses' => 'C1Controller@delete_c1_data']);
Route::post('c1_update', ['uses' => 'C1Controller@c1_update']);
Route::post('c1_data_update', ['uses' => 'C1Controller@c1_data_update']);
// c1 routes end

// h867 routes start
Route::get('h867_form', ['uses' => 'H867Controller@index']);
Route::get('h867_data', ['uses' => 'H867Controller@h867_data']);
Route::get('h867_view', ['uses' => 'H867Controller@h867_view']);
Route::post('h867_save', ['uses' => 'H867Controller@create']);
Route::post('h867_data_save', ['uses' => 'H867Controller@h867_data_save']);
Route::get('view_h867_list_data/{id}', ['uses' => 'H867Controller@view_h867_list_data']);
Route::get('delete_h867/{id}', ['uses' => 'H867Controller@delete_h867']);
Route::get('delete_h867_data/{id}', ['uses' => 'H867Controller@delete_h867_data']);
Route::post('h867_update', ['uses' => 'H867Controller@h867_update']);
Route::post('h867_data_update', ['uses' => 'H867Controller@h867_data_update']);
Route::get('h867_report', ['uses' => 'H867Controller@H867_report']);

Route::get('isa', ['uses' => 'H867Controller@isa']);

Route::post('h867_report_view', ['uses' => 'H867Controller@h867_report_view']);
Route::get('view_h867_list_data_re/{id}', ['uses' => 'H867Controller@view_h867_list_data_re']);

Route::get('h867_print/{id}', ['uses' => 'H867Controller@h867_print']);

// h867 routes end

// migrant routes start
Route::get('migrant_form', ['uses' => 'Migrant_formController@index']);
Route::get('migrant_follow_up', ['uses' => 'Migrant_formController@migrant_follow_up']);
Route::post('migrant_save', ['uses' => 'Migrant_formController@create']);
Route::post('migrant_follow_up_save', ['uses' => 'Migrant_formController@migrant_follow_up_save']);
Route::get('migrant_view', ['uses' => 'Migrant_formController@migrant_view']);
Route::get('view_migrant_data/{id}', ['uses' => 'Migrant_formController@view_migrant_data']);
Route::get('delete_migrant_follow/{id}', ['uses' => 'Migrant_formController@delete_migrant_follow']);
Route::get('delete_migrant/{id}', ['uses' => 'Migrant_formController@delete_migrant']);
Route::post('migrant_follow_update', ['uses' => 'Migrant_formController@migrant_follow_update']);
Route::post('migrant_update', ['uses' => 'Migrant_formController@migrant_update']);
Route::post('migrant_custom', ['uses' => 'Migrant_formController@migrant_custom']);
// migrant routes end

// caselx routes start
Route::get('case_investigation_form', ['uses' => 'FormController@index']);
Route::get('case_lx_follow_up', ['uses' => 'FormController@case_lx_follow_up']);
Route::get('case_lx_view', ['uses' => 'FormController@index']);
Route::post('register_case_lx', ['uses' => 'FormController@register_case_lx']);
Route::post('case_lx_follow_up_save', ['uses' => 'FormController@case_lx_follow_up_save']);
Route::get('caselx_view', ['uses' => 'FormController@view_all']);


Route::post('caselx_custom', ['uses' => 'FormController@caselx_custom']);




Route::get('view_caselx_data/{id}', ['uses' => 'FormController@view_caselx_data']);
Route::get('delete_caselx/{id}', ['uses' => 'FormController@delete_caselx']);
Route::get('delete_caselx_follow/{id}', ['uses' => 'FormController@delete_caselx_follow']);
Route::post('caselx_update', ['uses' => 'FormController@caselx_update']);
Route::post('caselx_followup_update', ['uses' => 'FormController@caselx_followup_update']);
// caselx routes end

// ento1 routes start
Route::get('ento1', ['uses' => 'Ento1Controller@index']);
Route::get('ento1_data', ['uses' => 'Ento1Controller@ento1_data']);
Route::post('ento1_data_save', ['uses' => 'Ento1Controller@ento1_data_save']);
Route::post('ento1_save', ['uses' => 'Ento1Controller@create']);
Route::get('ento1_view', ['uses' => 'Ento1Controller@view_all']);

Route::get('ento1newForm', ['uses' => 'Ento1Controller@newForm']);

// save data in data base
Route::post('ento1_newForm_save', ['uses' => 'Ento1Controller@newcreate']);
Route::get('view_ento1/{id}', ['uses' => 'Ento1Controller@view_ento1']);
Route::get('delete_ento1_data_new/{id}', ['uses' => 'Ento1Controller@delete_ento1_data_new']);

Route::get('view_ento1_print/{id}', ['uses' => 'Ento1Controller@view_ento1_print']);
Route::get('view_ento1_excel/{id}', ['uses' => 'Ento1Controller@view_ento1_excel']);



// Route::get('ento1_newview_all', ['uses' => 'Ento1Controller@newview_all']);









Route::get('view_ento1_data/{id}', ['uses' => 'Ento1Controller@view_ento1_data']);
Route::get('delete_ento1/{id}', ['uses' => 'Ento1Controller@destroy']);
Route::get('delete_ento1_data/{id}/{fid}', ['uses' => 'Ento1Controller@delete_ento1_data']);
Route::post('ento1_update', ['uses' => 'Ento1Controller@ento1_update']);




Route::post('newento1_update', ['uses' => 'Ento1Controller@newento1_update']);

// ento1 routes end

// ento2 routes start 
Route::get('ento2', ['uses' => 'Ento2Controller@index']);
Route::get('ento2_data', ['uses' => 'Ento2Controller@ento2_data']);
Route::post('ento2_save', ['uses' => 'Ento2Controller@create']);
Route::post('ento2_data_save', ['uses' => 'Ento2Controller@ento2_data_save']);
Route::get('ento2_view', ['uses' => 'Ento2Controller@view_all']);
Route::get('view_ento2_data/{id}', ['uses' => 'Ento2Controller@view_ento2_data']);
Route::get('delete_ento2/{id}', ['uses' => 'Ento2Controller@destroy']);
Route::get('delete_ento2_data/{id}', ['uses' => 'Ento2Controller@delete_ento2_data']);
Route::post('ento2_update', ['uses' => 'Ento2Controller@ento2_update']);
Route::post('ento2_data_update', ['uses' => 'Ento2Controller@ento2_data_update']);
// ento2 routes end





// ento2 new forms routes start 
// ento2 new forms routes start 
Route::get('ento2newForm', ['uses' => 'Ento2Controller@newForm']);
Route::post('ento2_newsave', ['uses' => 'Ento2Controller@createNew']);

Route::get('view_ento2new/{id}', ['uses' => 'Ento2Controller@view_ento2new']);
Route::get('view_ento2new_print/{id}', ['uses' => 'Ento2Controller@view_ento2new_print']);
Route::get('view_ento2new_excel/{id}', ['uses' => 'Ento2Controller@view_ento2new_excel']);






Route::post('ento2UpdateNew', ['uses' => 'Ento2Controller@ento2UpdateNew']);
Route::get('delete_ento2_data_new/{id}', ['uses' => 'Ento2Controller@delete_ento2_data_new']);






// ento3 routes start
Route::get('ento3', ['uses' => 'Ento3Controller@index']);
Route::get('ento3_data', ['uses' => 'Ento3Controller@ento3_data']);
Route::post('ento3_save', ['uses' => 'Ento3Controller@create']);

Route::get('ento3_view', ['uses' => 'Ento3Controller@view_all']);
Route::get('delete_ento3/{id}', ['uses' => 'Ento3Controller@destroy']);
Route::get('delete_ento3_data/{id}', ['uses' => 'Ento3Controller@delete_ento3_data']);
Route::get('view_ento3_data/{id}', ['uses' => 'Ento3Controller@view_ento3_data']);
Route::post('ento3_update', ['uses' => 'Ento3Controller@ento3_update']);
Route::post('ento3_data_update', ['uses' => 'Ento3Controller@ento3_data_update']);
// ento3 routes end

// ento3 New 
Route::get('ento3New', ['uses' => 'Ento3Controller@ento3New']);
Route::post('ento3_data_newsave', ['uses' => 'Ento3Controller@ento3_datanew_save']);
Route::get('new_view_ento3/{id}', ['uses' => 'Ento3Controller@new_view_ento3']);
Route::get('new_view_ento3_print/{id}', ['uses' => 'Ento3Controller@new_view_ento3_print']);
Route::get('new_view_ento3_excel/{id}', ['uses' => 'Ento3Controller@new_view_ento3_excel']);




Route::post('ento3_data_newupdate', ['uses' => 'Ento3Controller@ento3_data_newupdate']);



Route::get('delete_ento3_data_new/{id}', ['uses' => 'Ento3Controller@delete_ento3_data_new']);






// ento4 routes start
Route::get('ento4', ['uses' => 'Ento4Controller@index']);
Route::get('ento4indoor', ['uses' => 'Ento4Controller@ento4indoor']);
Route::get('ento4outdoor', ['uses' => 'Ento4Controller@ento4outdoor']);
Route::post('ento4_indoor_save', ['uses' => 'Ento4Controller@ento4_indoor_save']);
Route::post('ento4_outdoor_save', ['uses' => 'Ento4Controller@ento4_outdoor_save']);
Route::post('ento4_save', ['uses' => 'Ento4Controller@create']);
Route::get('ento4_view', ['uses' => 'Ento4Controller@view_all']);
Route::get('delete_ento4/{id}', ['uses' => 'Ento4Controller@destroy']);
Route::get('getEntoIndoorData/{id}', ['uses' => 'Ento4Controller@getEntoIndoorData']);
Route::get('getEntoOutdoorData/{id}', ['uses' => 'Ento4Controller@getEntoOutdoorData']);
Route::get('delete_ento4_indoor/{id}', ['uses' => 'Ento4Controller@delete_ento4_indoor']);
Route::get('delete_ento4_outdoor/{id}', ['uses' => 'Ento4Controller@delete_ento4_outdoor']);
Route::post('ento4_update', ['uses' => 'Ento4Controller@ento4_update']);
Route::post('ento4_indoor_update', ['uses' => 'Ento4Controller@ento4_indoor_update']);
Route::post('ento4_outdoor_update', ['uses' => 'Ento4Controller@ento4_outdoor_update']);

// ento4 routes end
Route::get('ento4new', ['uses' => 'Ento4Controller@ento4new']);
Route::post('ento4_newsave', ['uses' => 'Ento4Controller@ento4_newsave']);


Route::get('newgetEntoIndoorData/{id}', ['uses' => 'Ento4Controller@newgetEntoIndoorData']);

Route::get('newgetEntoIndoorData_print/{id}', ['uses' => 'Ento4Controller@newgetEntoIndoorData_print']);
Route::get('newgetEntoIndoorData_excel/{id}', ['uses' => 'Ento4Controller@newgetEntoIndoorData_excel']);










Route::get('newgetEntoOutdoorData/{id}', ['uses' => 'Ento4Controller@newgetEntoOutdoorData']);


Route::post('ento4_data_newupdate', ['uses' => 'Ento4Controller@ento4_data_newupdate']);


Route::get('delete_ento4_mosqdata/{id}', ['uses' => 'Ento4Controller@delete_ento4_mosqdata']);




// ento4 routes end

// ento5 routes start
Route::get('ento5', ['uses' => 'Ento5Controller@index']);
Route::get('getEnto1FromData/{id}', ['uses' => 'Ento5Controller@getEnto1FromData']);
Route::get('getEnto2FromData/{id}', ['uses' => 'Ento5Controller@getEnto2FromData']);
Route::get('getEnto3FromData/{id}', ['uses' => 'Ento5Controller@getEnto3FromData']);
Route::get('getEnto4FromData/{id}', ['uses' => 'Ento5Controller@getEnto4FromData']);

Route::get('getEntoAllFromData/{main_form_type}/{val}', ['uses' => 'Ento5Controller@getEntoAllFromData']);


// new ento5 
Route::get('ento5new', ['uses' => 'Ento5Controller@ento5new']);
Route::get('ento5_view_new/{type}/{id}', ['uses' => 'Ento5Controller@ento5_view_new']);
Route::post('ento_05_new_edit', ['uses' => 'Ento5Controller@ento_05_new_edit']);





Route::get('getEntoFrom/{id}', ['uses' => 'Ento5Controller@getEntoFrom']);
Route::get('ento5_view_new/getEntoFrom/{id}', ['uses' => 'Ento5Controller@getEntoFrom']);

Route::get('ento5mosq', ['uses' => 'Ento5Controller@ento5mosq']);
Route::post('ento5_save', ['uses' => 'Ento5Controller@create']);
Route::post('ento_05_mosq_save', ['uses' => 'Ento5Controller@ento_05_mosq_save']);

Route::post('ento_05_new_mosq_save', ['uses' => 'Ento5Controller@ento_05_new_mosq_save']);

Route::post('ento_05_species_save', ['uses' => 'Ento5Controller@ento_05_species_save']);
Route::get('ento5species', ['uses' => 'Ento5Controller@ento5species']);
Route::get('ento5_view', ['uses' => 'Ento5Controller@Newview_all']);
// Route::get('ento5_view', ['uses' => 'Ento5Controller@view_all']);
Route::get('getEnto5MosqData/{id}', ['uses' => 'Ento5Controller@getEnto5MosqData']);
Route::get('getEnto5NewMosqData/{id}', ['uses' => 'Ento5Controller@getEnto5NewMosqData']);

Route::get('ento5_view_new_delete/{id}', ['uses' => 'Ento5Controller@ento5_view_new_delete']);



Route::get('getEnto5SpeciesData/{id}', ['uses' => 'Ento5Controller@getEnto5SpeciesData']);
Route::get('delete_ento5_mosq/{id}', ['uses' => 'Ento5Controller@delete_ento5_mosq']);

Route::get('delete_ento5_new_mosq/{id}', ['uses' => 'Ento5Controller@delete_ento5_new_mosq']);

Route::get('delete_ento5_species/{id}', ['uses' => 'Ento5Controller@delete_ento5_species']);
Route::get('delete_ento5/{id}', ['uses' => 'Ento5Controller@delete_ento5']);
Route::post('ento5_update', ['uses' => 'Ento5Controller@ento5_update']);
Route::post('ento5_species_update', ['uses' => 'Ento5Controller@ento5_species_update']);
Route::post('ento5_mosq_update', ['uses' => 'Ento5Controller@ento5_mosq_update']);

Route::post('ento5_new_mosq_update', ['uses' => 'Ento5Controller@ento5_new_mosq_update']);



/* new ento 5 form save  */


Route::post('ento_05_new_save', ['uses' => 'Ento5Controller@ento_05_new_save']);


Route::get('getMohByDistrict/{id}', ['uses' => 'Ento4Controller@getMohByDistrict']);
Route::get('getPhi/{id}', ['uses' => 'Ento4Controller@getPhi']);




Route::get('getaddress/{id}', ['uses' => 'Ento4Controller@getaddress']);
Route::get('newgetaddress/{main_form_type}/{val}', ['uses' => 'Ento4Controller@newgetaddress']);
Route::get('newgetaddress2/{main_form_type}/{val}', ['uses' => 'Ento4Controller@newgetaddress2']);
Route::get('ento5fill/{main_form_type}/{val}', ['uses' => 'Ento4Controller@ento5fill']);




Route::get('getEnto5MosqData/getaddress/{id}', ['uses' => 'Ento4Controller@getaddress']);


Route::get('getgroupnu/{id}', ['uses' => 'H867Controller@getgroupnu']);




Route::get('dashboard', ['uses' => 'Ento1Controller@dashboard']);

Route::post('register', ['uses' => "UserController@storeData"]);
Route::get('manage_users', ['uses' => "UserController@manage_users"]);
Route::get('delete_users/{id}', ['uses' => "UserController@delete_users"]);
Route::get('userRegister', ['uses' => "UserController@reg"]);

Auth::routes();

Route::get('mf_rate/{district}/{year}', ['uses' => 'DashboardController@mf_rate']);
Route::get('infectedRate/{district}/{year}', ['uses' => 'DashboardController@infected_rate']);
Route::get('infectiveRate/{district}/{year}', ['uses' => 'DashboardController@infective_rate']);
Route::get('mf_density/{district}/{year}', ['uses' => 'DashboardController@mf_density']);



Route::get('initial_registration', ['uses' => "NewpatentController@reg"]);
Route::get('initial_registration_view', ['uses' => "NewpatentController@view"]);
Route::post('pation_data_save', ['uses' => 'NewpatentController@pation_data_save']);
Route::get('viewData_patinDataReg/{id}', ['uses' => 'NewpatentController@viewData_patinDataReg']);
Route::get('printData_patinDataReg/{id}', ['uses' => 'NewpatentController@printData_patinDataReg']);





Route::post('pation_data_update', ['uses' => 'NewpatentController@pation_data_update']);
Route::get('delete_patinData/{id}', ['uses' => 'NewpatentController@delete_patinData']);


Route::get('initial_registration_mo', ['uses' => 'NewpatentController@initial_registration_mo']);
Route::post('getpationdata/', ['uses' => 'NewpatentController@getpationdata']);



Route::post('getbodydetailspost/', ['uses' => 'NewpatentController@getbodydetailspost']);


Route::post('mopation_data_save', ['uses' => 'NewpatentController@mopation_data_save']);












Route::get('initial_registration_mo_view',['uses' => 'NewpatentController@initial_registration_mo_view']);
Route::get('registration_mo_delete/{id}',['uses' => 'NewpatentController@registration_mo_delete']);

Route::get('viewData_patinMoDataReg/{id}',['uses' => 'NewpatentController@viewData_patinMoDataReg']);
Route::get('printData_patinMoDataReg/{id}',['uses' => 'NewpatentController@printData_patinMoDataReg']);



Route::post('mopation_data_update', ['uses' => 'NewpatentController@mopation_data_update']);

Route::post('newdatarequqewr', ['uses' => 'NewpatentController@newdatarequqewr']);



/* //  ******************************************* subsequent */




/* //  ******************************************* subsequent */
Route::get('subsequent', ['uses' => 'NewpatentController@subsequent']);

Route::get('subsequent_view', ['uses' => 'NewpatentController@subsequent_view']);

Route::post('subsequentsave', ['uses' => 'NewpatentController@subsequentsave']);
Route::get('viewData_psubsequent/{id}', ['uses' => 'NewpatentController@viewData_psubsequent']);
Route::get('printData_psubsequent/{id}', ['uses' => 'NewpatentController@printData_psubsequent']);


Route::post('subsequentupdate', ['uses' => 'NewpatentController@subsequentupdate']);



Route::get('delete_subsequent/{id}', ['uses' => 'NewpatentController@delete_subsequent']);



/* //  ******************************************* subsequent */


Route::get('getpationdata2/{id}', ['uses' => 'NewpatentController@getpationdata2']);
Route::get('treatment', ['uses' => 'NewpatentController@treatment']);

Route::post('treatment_save', ['uses' => 'NewpatentController@treatment_save']);
Route::get('treatment_view', ['uses' => 'NewpatentController@treatment_view']);



Route::get('treatment_view_one/{id}', ['uses' => 'NewpatentController@treatment_view_one']);
Route::get('treatment_export_one/{id}', ['uses' => 'NewpatentController@treatment_export_one']);




Route::get('treatment_delete/{id}', ['uses' => 'NewpatentController@treatment_delete']);



Route::get('subsequent_treatment_delete/{id}', ['uses' => 'NewpatentController@subsequent_treatment_delete']);








Route::post('treatment_update', ['uses' => 'NewpatentController@treatment_update']);

Route::get('treatmentHistry_delete/{id}', ['uses' => 'NewpatentController@treatmentHistry_delete']);
Route::get('delete_treatment/{id}', ['uses' => 'NewpatentController@delete_treatment']);


// ajex

Route::get('gettreatmentHistory/{id}', ['uses' => 'NewpatentController@gettreatmentHistory']);
Route::get('getintialtableHistory/{id}', ['uses' => 'NewpatentController@getintialtableHistory']);
Route::get('getsubvisitTableHistory/{id}', ['uses' => 'NewpatentController@getsubvisitTableHistory']);

Route::post('getappoinmentdata', ['uses' => 'NewpatentController@getappoinmentdata']);


// change appoinmet

Route::get('change_appoinmentt', ['uses' => 'NewpatentController@change_appoinmentt']);

Route::post('changeappoinment_update', ['uses' => 'NewpatentController@changeappoinment_update']);





//dashboard data  freshing

Route::get('new_lymphoedema_patients_registered/{id}', ['uses' => 'NewpatentController@new_lymphoedema_patients_registered']);
Route::get('lymphoedema_patients_care', ['uses' => 'NewpatentController@lymphoedema_patients_care']);


// Route::get('/home', 'HomeController@index')->name('home');


Route::get('districtLymhedema', ['uses' => 'LymhedemaController@districtLymhedema']);
Route::get('genderstageofdisease', ['uses' => 'LymhedemaController@genderstageofdisease']);


Route::get('genderstageofdisease_sub', ['uses' => 'LymhedemaController@genderstageofdisease_sub']);


Route::post('districtLymhedema_report_print', ['uses' => 'LymhedemaController@districtLymhedema_report_print']);

Route::post('genderstageofdisease_report_print', ['uses' => 'LymhedemaController@genderstageofdisease_report_print']);
Route::post('genderstageofdisease_report_print2', ['uses' => 'LymhedemaController@genderstageofdisease_report_print2']);


Route::post('mobility_report_print', ['uses' => 'LymhedemaController@mobility_report_print']);
Route::post('regional_mobility_report_print', ['uses' => 'LymhedemaController@regional_mobility_report_print']);




Route::get('newmorbidity', ['uses' => 'LymhedemaController@newmorbidity']);
Route::get('newmorbidity_regional', ['uses' => 'LymhedemaController@newmorbidity_regional']);



Route::get('national_new_lympoedema', ['uses' => 'LymhedemaController@national_new_lympoedema']);
Route::get('national_new_lympoedema_subsquen', ['uses' => 'LymhedemaController@national_new_lympoedemasubsequen']);


Route::get('national_new_lympoedema_stage', ['uses' => 'LymhedemaController@national_new_lympoedema_stage']);
Route::get('national_subsquen_lympoedema_stage', ['uses' => 'LymhedemaController@national_subsquen_lympoedema_stage']);


Route::post('national_new_lympoedema_print', ['uses' => 'LymhedemaController@national_new_lympoedema_print']);
Route::post('national_new_lympoedema_print_subsquen', ['uses' => 'LymhedemaController@national_new_lympoedema_print_subsquen']);




Route::post('national_new_lympoedema_stage_print', ['uses' => 'LymhedemaController@national_new_lympoedema_stage_print']);
Route::post('national_subsequent_lympoedema_stage_print', ['uses' => 'LymhedemaController@national_subsequent_lympoedema_stage_print']);






Route::get('newmorbidityNational', ['uses' => 'LymhedemaController@newmorbidityNational']);





Route::get('getbodydetails/{id}', ['uses' => 'NewpatentController@getbodydetails']);



