<?php

// ------------------ M A I N - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/', 'LoginController@index')->name('BaseUrl');

Route::post('/Login', 'LoginController@login')->name('login');

Route::get('/CreateAcount', 'LoginController@CreateAccount')->name('CreateAccount');

Route::post('/CreateAcount', 'LoginController@SubmitAccount')->name('AddAccount');

Route::get('/ForgetPassword', 'LoginController@ForgetPassword')->name('ForgetPassword');

Route::get('/LogoutManager', function () {
    session()->forget('ManagerSis');
    return redirect(route('BaseUrl'));})->name('logout.manager');

//-------------A D M I N ----------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/Admin/Login', 'LoginController@Admin')->name('login.Admin');

Route::post('/Admin/Login', 'LoginController@loginAdmin')->name('login.checkAdmin');

Route::prefix('/Admin')->middleware('AdminL')->group(function () {

    Route::get('/', 'Admin\MainController@index')->name('Admin.SchoolAdd');

    Route::get('/AddSchool', 'Admin\MainController@index')->name('Admin.SchoolAdd');

    Route::get('/ListSchool', 'Admin\MainController@ListSchool')->name('Admin.SchoolsList');

    Route::post('/School', 'Admin\Schools@AddSchool')->name('Admin.RegisterSchool');

    Route::post('/ChangeStatusSchool', 'Admin\Schools@ChangeStatusSchool')->name('Admin.ChangeStatusSchool');

});

// ------------------ M A N A G E R - S C H O O l - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------

Route::prefix('/Manager')->middleware('ManagerL')->group(function () {

    Route::get('/Dashboard', 'User\MainController@index')->name('Dashboard');

    Route::post('/Students/Register', 'User\MainController@Register')->name('Student.Register');

    Route::post('send_section', 'User\SectionController@Ajax')->name('section.ajax');

    Route::post('send_basic', 'User\BasicController@Ajax')->name('basic.ajax');

    Route::get('/Students/ImportData', 'User\MainController@ImportWithExcel')->name('Student.Excel');

    Route::post('/Students/view_classes','User\MainController@GetClassesForView');

    Route::get('/Students/UploadPhoto', 'User\MainController@UploadPhoto')->name('Student.Photo');

    Route::get('/Students/AlbumPhoto', 'User\MainController@AlbumPhoto')->name('Student.AlbumPhoto');

    Route::get('/Students/List', 'User\MainController@ListStudents')->name('Student.List');

    Route::post('Students/changeBasicForStudent', 'User\MainController@changeBasicForStudent')->name('Student.changeBasicForStudent');

    Route::get('/Students/EditStudent/{id?}', 'User\StudentsContorller@Student')->name('Student.EditStudent');

    Route::get('/Students/SendSMS/{student}', 'User\StudentsContorller@SendSMSView')->name('Student.SendSMSView');

    Route::post('/Students/SendSMS', 'User\StudentsContorller@SendSMS')->name('Student.SendSMS');
    

    Route::get('/Students/EditClass', 'User\MainController@EditClass')->name('Student.EditClass');

    Route::post('/Students/get_basics', 'User\MainController@GetBasics');

    Route::post('/Students/get_classes', 'User\MainController@getClasses');

    Route::post('Students/EditClass/ShowClasses', 'User\MainController@showClasses')->name('Student.EditClassShow');

    Route::post('/Students/ImportExel', 'User\StudentsContorller@import')->name('Student.importEx');

    Route::post('/Students/Photo', 'User\StudentsContorller@setPhoto')->name('Student.setPhoto');

    Route::post('/Students/Excel/Export', 'User\StudentsContorller@export')->name('Excel.export');

    Route::get('/Students/deleteSes', function () {
        session()->forget('import_data');
        return redirect(route('Student.Excel'));
    })->name('deleteSes');

    Route::post('send_section', 'User\SectionController@Ajax')->name('section.ajax');

    Route::post('send_basic', 'User\BasicController@Ajax')->name('basic.ajax');

    Route::get('/Students/AddSection', 'User\SectionController@AddSection')->name('Student.AddSection');

    Route::post('/Students/SubmitSection', 'User\SectionController@InsertSection')->name('Student.SubmitSection');

    Route::get('/Students/AddBasic', 'User\BasicController@AddBasic')->name('Student.AddBasic');

    Route::post('/Students/SubmitBasic', 'User\BasicController@InsertBasic')->name('Student.SubmitBasic');

    Route::get('/Students/AddClass', 'User\ClassificationController@AddClass')->name('Student.AddClass');
    Route::get('/Students/DeleteClass/{item}', 'User\ClassificationController@DeleteClass')->name('Class.Delete');

    Route::post('/Students/SubmitClass', 'User\ClassificationController@InsertClass')->name('Student.SubmitClass');

    Route::post('/Students/ExitClass', 'User\ClassificationController@ExitClass')->name('Student.ExitClass');

    Route::post('/Students/EnterClass', 'User\ClassificationController@EnterClass')->name('Student.EnterClass');

    Route::post('/EditInfo', 'User\StudentsContorller@EditInfo')->name('Student.EditInfo');

    Route::post('Students/Allbum_getClasses', 'User\AllbumController@getClasses')->name('Allbum.Classes');

    Route::get('/Students/Class/getPDF/{id}', 'User\AllbumController@getPDF')->name('Allbum.getPDF');

    Route::get('/AddDiscipline', 'User\MainController@Discipline')->name('Discipline.Add');

    Route::post('Discipline/AddItem', 'User\Discipline\DisciplineController@AddCase')->name('Discipline.AddCase');

    Route::get('discipline/student_chart', 'User\Discipline\DisciplineController@getChart');

    Route::get('discipline/AddItems', 'User\Discipline\DisciplineController@AddCases')->name('Discipline.AddCases');

    Route::post('discipline/AddItems', 'User\Discipline\DisciplineController@InsertCases')->name('Discipline.AddCases');

    Route::get('discipline/AddPoints', 'User\Discipline\DisciplineController@AddPoints')->name('Discipline.AddPoints');

    Route::post('discipline/changeBasicForLaw', 'User\Discipline\DisciplineController@changeBasicForLaw')->name('Discipline.changeBasicForLaw');

    Route::post('discipline/InsertPoints', 'User\Discipline\DisciplineController@InsertPoints')->name('Discipline.InsertPoints');

    Route::post('discipline/changeBasic', 'User\Discipline\DisciplineController@changeBasic')->name('Discipline.changeBasic');

    Route::get('discipline/lists', 'User\Discipline\DisciplineController@DisciplineLists')->name('Discipline.lists');

    Route::get('discipline/show/{student}', 'User\Discipline\DisciplineController@DisciplineShow')->name('Discipline.student.Show');


    Route::get('discipline/DefineLow', 'User\Discipline\DisciplineController@DefineLow')->name('Discipline.defineLow');

    Route::post('discipline/InsertLow', 'User\Discipline\DisciplineController@InsertLow')->name('Discipline.InsertLow');
    Route::get('discipline/DeleteLow/{item}', 'User\Discipline\DisciplineController@DeleteLow')->name('Discipline.DeleteLow');
    Route::get('discipline/AbsenceAndDelayList', 'User\Discipline\DisciplineController@AbsenceAndDelayList')->name('Discipline.AbsenceAndDelayList');

    Route::post('discipline/get_absenceAndDelayList', 'User\Discipline\DisciplineController@getAbsenceAndDelayList')->name('Discipline.get_absenceAndDelayList');

    Route::get('/Studing/StudyingModels', 'User\Studing\StudingController@StudyingModels')->name('Studing.StudyingModels');

    Route::post('Studing/getStudyClasses', 'User\Studing\StudingController@getStudyClasses')->name('Studing.getStudyClasses');

    Route::post('Studing/InsertStudy', 'User\Studing\StudingController@InsertStudy')->name('Studing.InsertStudy');

    Route::get('/Studing/StudyingReport', 'User\Studing\StudingController@StudyingReport')->name('Studing.StudyingReport');

    Route::post('Studing/getStudyingReport', 'User\Studing\StudingController@getStudyingReport')->name('Studing.getStudyingReport');

    Route::get('/Studing/StudyingLessonsReport', 'User\Studing\StudingLessonController@StudyingLessonsReport')->name('Studing.StudyingLessonsReport');

    Route::post('/Studing/StudyingLessonsReportList', 'User\Studing\StudingLessonController@StudyingLessonsReportList')->name('Studing.StudyingLessonsReportList');

    Route::get('/Studing/StudyingReportList', 'User\Studing\StudingClassListController@StudyingReportList')->name('Studing.StudyingReportList');

    Route::post('Studing/getStudyingReportList', 'User\Studing\StudingClassListController@getStudyingReportList')->name('Studing.getStudyingReportList');

    Route::get('/Studing/StudyingReportList/{student}', 'User\Studing\StudingClassListController@StudyingReportListStudent')->name('Studing.StudyingReportListStudent');

    Route::get('/ActivityClass/ClassScore', 'User\activityClass\ClassScoreController@index')->name('activity_class.classScore');

    Route::post('/ActivityClass/getlessens', 'User\activityClass\ClassScoreController@getlesson')->name('ActivityClass.getLessons');

    Route::post('/ActivityClass/getstudent', 'User\activityClass\ClassScoreController@getStudent')->name('ActivityClass.getStudents');


    Route::post('/ActivityClass/ClassScore', 'User\activityClass\ClassScoreController@insertClassScore')->name('activity_class.classScoreInsert');

    Route::get('/ActivityClass/ExerciseDaily/Add', 'User\activityClass\ExerciseController@exerciseAddDaily')->name('activity_class.ExerciseAdddaily');

    Route::post('/ActivityClass/ExerciseDaily/Add', 'User\activityClass\ExerciseController@InsertExerciseAddDaily')->name('activity_class.SubmitExerciseAdddaily');

    Route::get('/ActivityClass/ScoreExercise', 'User\activityClass\ExerciseController@ScoreExercise')->name('activity_class.ScoreExercise');

    Route::post('/ActivityClass/getExercise', 'User\activityClass\ExerciseController@getExercise')->name('ActivityClass.getExercise');

    Route::post('/ActivityClass/getExerciseDate', 'User\activityClass\ExerciseController@getExerciseDate')->name('ActivityClass.getExerciseDate');

    Route::post('/ActivityClass/ScoreExercise', 'User\activityClass\ExerciseController@insertScoreExercise')->name('activity_class.ScoreExercise');

    Route::get('/ActivityClass/StatusAbsence', 'User\activityClass\StatusAbsence@Status_absence')->name('activity_class.Status_absence');

    Route::post('/ActivityClass/StatusAbsence', 'User\activityClass\StatusAbsence@GetClass')->name('activity_class.GETCLASSFORAB');

    Route::post('ActivityClass/InsertStatusAbsence', 'User\activityClass\StatusAbsence@insertAbsence')->name('activity_class.insertAbsence');

    Route::get('/ActivityClass/ExitClass', 'User\activityClass\dismisaalController@exitClass')->name('activity_class.exitClass');

    Route::post('ActivityClass/insertExitClass', 'User\activityClass\dismisaalController@InsertExitClass')->name('activity_class.InsertExitClass');

    Route::get('/ActivityClass/Reporting_class', 'User\activityClass\reportingStudentController@Reporting')->name('activity_class.Reporting');

    Route::get('/ActivityClass/ReportScoresClassStudent/{id?}', 'User\activityClass\reportingStudentController@ReportScoresClassStudent')->name('activity_class.ReportScoresClassStudent');

    Route::post('/ActivityClass/getReportstudent', 'User\activityClass\reportingStudentController@getReportstudent');

    Route::get('/ActivityClass/getStudyingexerciseList/{student}', 'User\activityClass\reportingStudentController@ReportScoresExerciseStudent')->name('activity_class.getStudyingexerciseList');

    Route::post('/ActivityClass/getStudyingexerciseList', 'User\activityClass\reportingStudentController@ReportScoresExerciseStudent');


    //گزارشات
    Route::get('/Reports/ClassAvgView', 'User\Reports\ReportController@ClassAvgView')->name('Reports.ClassAvg');
    Route::post('/Reports/ClassAvgView', 'User\Reports\ReportController@ClassAvg')->name('Reports.ClassAvg');



});

// ------------------ P E S R O N A L S - S C H O O l - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------

// ------------------ S T U D E N T - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'Students'],function () {

// Route::get('/Register','Students\RegisterController@RegisterView')->name('Student.WorkSpace.Register');
Route::get('/Login','Students\RegisterController@LoginView')->name('Student.WorkSpace.LoginView');
Route::post('Login','Students\RegisterController@Login')->name('Student.WorkSpace.Login');
Route::get('/LogOut','Students\RegisterController@LogOut')->name('Student.WorkSpace.LogOut');

Route::get('/Dashboard','Students\MainController@Dashboard')->name('Student.WorkSpace.Dashboard');
Route::get('/DisciplineReport','Students\MainController@DisciplineReport')->name('Student.WorkSpace.DisciplineReport');
Route::get('/Study','Students\MainController@StudyingReport')->name('Student.WorkSpace.StudyingReport');
Route::post('Study','Students\MainController@StudyingReportInsert')->name('Student.WorkSpace.StudyingReportInsert');
Route::get('/StudyList','Students\MainController@StudyingReportList')->name('Student.WorkSpace.StudyingReportList');
Route::get('/EditProfile','Students\MainController@EditProfileView')->name('Student.WorkSpace.EditProfileView');

Route::get('/ExerciseDailyView','Students\ExerciseController@ExerciseDailyView')->name('Student.WorkSpace.ExerciseDailyView');
Route::post('ExerciseDailyInsert','Students\ExerciseController@ExerciseDailyInsert')->name('Student.WorkSpace.ExerciseDailyInsert');
Route::post('getStudyModel','Students\MainController@getStudyModel')->name('Students.WorkSpace.getStudyModel');



});

// ------------------ E N D - S T U D E N T - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------

// ------------------ T E A C H E R - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'Teachers'],function () {

    Route::get('/Register','Teachers\RegisterController@RegisterView')->name('Teachers.WorkSpace.Register');
    Route::get('/Login','Teachers\RegisterController@LoginView')->name('Teachers.WorkSpace.LoginView');
    Route::post('Login','Teachers\RegisterController@Login')->name('Teachers.WorkSpace.Login');
    Route::get('/LogOut','Teachers\RegisterController@LogOut')->name('Teachers.WorkSpace.LogOut');
    Route::get('/Dashboard','Teachers\MainController@Dashboard')->name('Teachers.WorkSpace.Dashboard');
    Route::get('Discipline/list', 'Teachers\DisciplineController@DisciplineList')->name('Teachers.WorkSpace.DisciplineList');
    Route::get('Discipline/show/{student}', 'Teachers\DisciplineController@DisciplineShow')->name('Teachers.WorkSpace.DisciplineShow');
    Route::get('Discipline/AddItem', 'Teachers\DisciplineController@AddDisciplineView')->name('Teachers.WorkSpace.AddDisciplineView');
    Route::put('Profile/Edit/{teacher}', 'Teachers\ProfileController@EditProfile')->name('Teachers.WorkSpace.EditProfile');
    Route::get('/AddStudyView','Teachers\StudyController@AddStudyView')->name('Teachers.WorkSpace.AddStudyView');
    Route::post('/getTeacherClasses','Teachers\StudyController@getTeacherClasses')->name('Teachers.WorkSpace.getTeacherClasses');
    Route::post('/InsertStudy','Teachers\StudyController@InsertStudy')->name('Teachers.WorkSpace.InsertStudy');
    Route::get('Studing/ReportList', 'Teachers\StudyController@StudyReportListView')->name('Teachers.WorkSpace.StudyReportListView');
    Route::post('Studing/getStudyingReport', 'Teachers\StudyController@getStudyingReport')->name('Teachers.WorkSpace.getStudyingReport');
    Route::get('Studing/Student/{student}', 'Teachers\StudyController@StudyStudentView')->name('Teachers.WorkSpace.StudyStudentView');
    Route::get('Activity/ClassScores', 'Teachers\ActivityController@ClassScores')->name('Teachers.WorkSpace.ClassScores');
    Route::post('Activity/getStudents', 'Teachers\ActivityController@getStudents__Ajax')->name('Teachers.WorkSpace.getStudents');
    Route::post('Activity/ClassScores', 'Teachers\ActivityController@InsertClassScores')->name('Teachers.WorkSpace.InsertClassScores');
    Route::get('Activity/ExerciseDaily/Add', 'Teachers\ActivityController@AddExerciseDailyView')->name('Teachers.WorkSpace.AddExerciseDailyView');
    Route::get('Activity/ExerciseScores/Add', 'Teachers\ActivityController@AddExerciseScoresView')->name('Teachers.WorkSpace.AddExerciseScoresView');


    Route::get('/ActivityClass/StatusAbsence', 'Teachers\ActivityController@Status_absence')->name('Teachers.WorkSpace.Status_absence');
    Route::post('/ActivityClass/PresenceAbsence/getStudents', 'Teachers\ActivityController@getStudent')->name('Teachers.WorkSpace.getStudent');


});
// ------------------ E N D - T E A C H E R - R O U T E S ----------------------------------------------------------------------------------------------------------------------------------------------
