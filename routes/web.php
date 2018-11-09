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
    return view('welcome')
        ->name('info');
});

Route::get('/api', 'MainController@main')
    ->name('api.main');

// create passwordhash
Route::get('/ph/{password}', 'MainController@passwordhash')->name('ph');

Route::middleware(['auth.api'])->group(function () {
    // student
    Route::get('/student/all', 'StudentController@all')->name('student.all');
    Route::post('/student/add', 'StudentController@add')->name('student.add');
    Route::get('/student/{id}', 'StudentController@get')->name('student.get');
    Route::post('/student/{id}', 'StudentController@update')->name('student.update');
    Route::delete('/student/{id}', 'StudentController@delete')->name('student.delete');

    Route::get('/student/group/all/{groupId}', 'StudentController@groupAll')->name('student.group.all');
    Route::get('/student/groups/{studentId}', 'StudentController@groups')->name('student.groups');
    Route::get('/student/learningPlans/{studentId}', 'StudentController@learningPlans')->name('student.learningPlans');

    // studentGroup
    Route::get('/studentGroup/all', 'StudentGroupController@all')->name('studentGroup.all');
    Route::post('/studentGroup/add', 'StudentGroupController@add')->name('studentGroup.add');
    Route::get('/studentGroup/{id}', 'StudentGroupController@get')->name('studentGroup.get');
    Route::post('/studentGroup/{id}', 'StudentGroupController@update')->name('studentGroup.update');
    Route::delete('/studentGroup/{id}', 'StudentGroupController@delete')->name('studentGroup.delete');

    Route::get('/studentGroup/faculty/all/{facultyId}', 'StudentGroupController@facultyAll')->name('studentGroup.faculty.all');

    // studentStudentGroup
    Route::get('/studentStudentGroup/all', 'StudentStudentGroupController@all')->name('studentStudentGroup.all');
    Route::post('/studentStudentGroup/add', 'StudentStudentGroupController@add')->name('studentStudentGroup.add');
    Route::get('/studentStudentGroup/{id}', 'StudentStudentGroupController@get')->name('studentStudentGroup.get');
    Route::post('/studentStudentGroup/{id}', 'StudentStudentGroupController@update')->name('studentStudentGroup.update');
    Route::delete('/studentStudentGroup/{id}', 'StudentStudentGroupController@delete')->name('studentStudentGroup.delete');

    // faculty
    Route::get('/faculty/all', 'FacultyController@all')->name('faculty.all');
    Route::post('/faculty/add', 'FacultyController@add')->name('faculty.add');
    Route::get('/faculty/{id}', 'FacultyController@get')->name('faculty.get');
    Route::post('/faculty/{id}', 'FacultyController@update')->name('faculty.update');
    Route::delete('/faculty/{id}', 'FacultyController@delete')->name('faculty.delete');

    // facultyStudentGroup
    Route::get('/facultyStudentGroup/all', 'FacultyStudentGroupController@all')->name('facultyStudentGroup.all');
    Route::post('/facultyStudentGroup/add', 'FacultyStudentGroupController@add')->name('facultyStudentGroup.add');
    Route::get('/facultyStudentGroup/{id}', 'FacultyStudentGroupController@get')->name('facultyStudentGroup.get');
    Route::post('/facultyStudentGroup/{id}', 'FacultyStudentGroupController@update')->name('facultyStudentGroup.update');
    Route::delete('/facultyStudentGroup/{id}', 'FacultyStudentGroupController@delete')->name('facultyStudentGroup.delete');

    // teacher
    Route::get('/teacher/all', 'TeacherController@all')->name('teacher.all');
    Route::post('/teacher/add', 'TeacherController@add')->name('teacher.add');
    Route::get('/teacher/{id}', 'TeacherController@get')->name('teacher.get');
    Route::post('/teacher/{id}', 'TeacherController@update')->name('teacher.update');
    Route::delete('/teacher/{id}', 'TeacherController@delete')->name('teacher.delete');

    // position
    Route::get('/position/all', 'PositionController@all')->name('position.all');
    Route::post('/position/add', 'PositionController@add')->name('position.add');
    Route::get('/position/{id}', 'PositionController@get')->name('position.get');
    Route::post('/position/{id}', 'PositionController@update')->name('position.update');
    Route::delete('/position/{id}', 'PositionController@delete')->name('position.delete');

    Route::get('/position/teacher/all/{id}', 'PositionController@teacherAll')->name('position.teacher.all');

    // experience
    Route::get('/experience/all', 'ExperienceController@all')->name('experience.all');
    Route::post('/experience/add', 'ExperienceController@add')->name('experience.add');
    Route::get('/experience/{id}', 'ExperienceController@get')->name('experience.get');
    Route::post('/experience/{id}', 'ExperienceController@update')->name('experience.update');
    Route::delete('/experience/{id}', 'ExperienceController@delete')->name('experience.delete');

    Route::get('/experience/teacher/all/{id}', 'ExperienceController@teacherAll')->name('experience.teacher.all');

    // education
    Route::get('/education/all', 'EducationController@all')->name('education.all');
    Route::post('/education/add', 'EducationController@add')->name('education.add');
    Route::get('/education/{id}', 'EducationController@get')->name('education.get');
    Route::post('/education/{id}', 'EducationController@update')->name('education.update');
    Route::delete('/education/{id}', 'EducationController@delete')->name('education.delete');

    Route::get('/education/teacher/all/{id}', 'EducationController@teacherAll')->name('education.teacher.all');

    // academicDegree
    Route::get('/academicDegree/all', 'AcademicDegreeController@all')->name('academicDegree.all');
    Route::post('/academicDegree/add', 'AcademicDegreeController@add')->name('academicDegree.add');
    Route::get('/academicDegree/{id}', 'AcademicDegreeController@get')->name('academicDegree.get');
    Route::post('/academicDegree/{id}', 'AcademicDegreeController@update')->name('academicDegree.update');
    Route::delete('/academicDegree/{id}', 'AcademicDegreeController@delete')->name('academicDegree.delete');

    Route::get('/academicDegree/teacher/all/{id}', 'AcademicDegreeController@teacherAll')->name('academicDegree.teacher.all');

    // academicRank
    Route::get('/academicRank/all', 'AcademicRankController@all')->name('academicRank.all');
    Route::post('/academicRank/add', 'AcademicRankController@add')->name('academicRank.add');
    Route::get('/academicRank/{id}', 'AcademicRankController@get')->name('academicRank.get');
    Route::post('/academicRank/{id}', 'AcademicRankController@update')->name('academicRank.update');
    Route::delete('/academicRank/{id}', 'AcademicRankController@delete')->name('academicRank.delete');

    Route::get('/academicRank/teacher/all/{id}', 'AcademicRankController@teacherAll')->name('academicRank.teacher.all');

    // department
    Route::get('/department/all', 'DepartmentController@all')->name('department.all');
    Route::post('/department/add', 'DepartmentController@add')->name('department.add');
    Route::get('/department/{id}', 'DepartmentController@get')->name('department.get');
    Route::post('/department/{id}', 'DepartmentController@update')->name('department.update');
    Route::delete('/department/{id}', 'DepartmentController@delete')->name('department.delete');

    // departmentHead
    Route::get('/departmentHead/all', 'DepartmentHeadController@all')->name('departmentHead.all');
    Route::post('/departmentHead/add', 'DepartmentHeadController@add')->name('departmentHead.add');
    Route::get('/departmentHead/{id}', 'DepartmentHeadController@get')->name('departmentHead.get');
    Route::post('/departmentHead/{id}', 'DepartmentHeadController@update')->name('departmentHead.update');
    Route::delete('/departmentHead/{id}', 'DepartmentHeadController@delete')->name('departmentHead.delete');

    Route::get('/departmentHead/department/{id}', 'DepartmentHeadController@departmentAll')->name('departmentHead.department.all');

    // learningPlan
    Route::get('/learningPlan/all', 'LearningPlanController@all')->name('learningPlan.all');
    Route::post('/learningPlan/add', 'LearningPlanController@add')->name('learningPlan.add');
    Route::get('/learningPlan/{id}', 'LearningPlanController@get')->name('learningPlan.get');
    Route::post('/learningPlan/{id}', 'LearningPlanController@update')->name('learningPlan.update');
    Route::delete('/learningPlan/{id}', 'LearningPlanController@delete')->name('learningPlan.delete');

    // learningPlanDiscipline
    Route::get('/learningPlanDiscipline/all', 'LearningPlanDisciplineController@all')->name('learningPlanDiscipline.all');
    Route::post('/learningPlanDiscipline/add', 'LearningPlanDisciplineController@add')->name('learningPlanDiscipline.add');
    Route::get('/learningPlanDiscipline/{id}', 'LearningPlanDisciplineController@get')->name('learningPlanDiscipline.get');
    Route::post('/learningPlanDiscipline/{id}', 'LearningPlanDisciplineController@update')->name('learningPlanDiscipline.update');
    Route::delete('/learningPlanDiscipline/{id}', 'LearningPlanDisciplineController@delete')->name('learningPlanDiscipline.delete');

    Route::get('/learningPlanDiscipline/learningPlan/{id}', 'LearningPlanDisciplineController@learningPlanAll')->name('learningPlanDiscipline.learningPlan.all');

    // learningPlanDisciplineSemester
    Route::get('/learningPlanDisciplineSemester/all', 'LearningPlanDisciplineSemesterController@all')->name('learningPlanDisciplineSemester.all');
    Route::post('/learningPlanDisciplineSemester/add', 'LearningPlanDisciplineSemesterController@add')->name('learningPlanDisciplineSemester.add');
    Route::get('/learningPlanDisciplineSemester/{id}', 'LearningPlanDisciplineSemesterController@get')->name('learningPlanDisciplineSemester.get');
    Route::post('/learningPlanDisciplineSemester/{id}', 'LearningPlanDisciplineSemesterController@update')->name('learningPlanDisciplineSemester.update');
    Route::delete('/learningPlanDisciplineSemester/{id}', 'LearningPlanDisciplineSemesterController@delete')->name('learningPlanDisciplineSemester.delete');

    Route::get('/learningPlanDisciplineSemester/learningPlanDiscipline/{id}', 'LearningPlanDisciplineSemesterController@learningPlanDisciplineAll')->name('learningPlanDisciplineSemester.learningPlanDiscipline.all');

    // note
    Route::get('/note/all', 'NoteController@all')->name('note.all');
    Route::post('/note/add', 'NoteController@add')->name('note.add');
    Route::get('/note/{id}', 'NoteController@get')->name('note.get');
    Route::post('/note/{id}', 'NoteController@update')->name('note.update');
    Route::delete('/note/{id}', 'NoteController@delete')->name('note.delete');

    // studentStudentGroup
    Route::get('/studentLearningPlan/all', 'StudentLearningPlanController@all')->name('studentLearningPlan.all');
    Route::post('/studentLearningPlan/add', 'StudentLearningPlanController@add')->name('studentLearningPlan.add');
    Route::get('/studentLearningPlan/{id}', 'StudentLearningPlanController@get')->name('studentLearningPlan.get');
    Route::post('/studentLearningPlan/{id}', 'StudentLearningPlanController@update')->name('studentLearningPlan.update');
    Route::delete('/studentLearningPlan/{id}', 'StudentLearningPlanController@delete')->name('studentLearningPlan.delete');

    // TeacherCard
    Route::get('/teacherCard/allYears', 'TeacherCardController@allYears')->name('teacherCard.allYears');

    Route::get('/teacherCard/all', 'TeacherCardController@all')->name('teacherCard.all');
    Route::post('/teacherCard/add', 'TeacherCardController@add')->name('teacherCard.add');
    Route::get('/teacherCard/{id}', 'TeacherCardController@get')->name('teacherCard.get');
    Route::post('/teacherCard/{id}', 'TeacherCardController@update')->name('teacherCard.update');
    Route::delete('/teacherCard/{id}', 'TeacherCardController@delete')->name('teacherCard.delete');

    Route::get('/teacherCard/teacher/{id}', 'TeacherCardController@teacherAll')->name('teacherCard.teacher.all');
    Route::get('/teacherCard/year/{year}', 'TeacherCardController@year')->name('teacherCard.year.all');
    Route::get('/teacherCard/yearDepartmentIds/{year}', 'TeacherCardController@yearDepartmentIds')->name('teacherCard.yearDepartmentIds');
    Route::get('/teacherCard/departmentId/{departmentId}', 'TeacherCardController@departmentId')->name('teacherCard.departmentId.all');
    Route::get('/teacherCard/yearDepartmentId/{year}/{departmentId}', 'TeacherCardController@yearDepartmentId')->name('teacherCard.yearDepartmentId.all');
    Route::get('/teacherCard/yearDepartmentIdJoined/{year}/{departmentId}', 'TeacherCardController@yearDepartmentIdJoined')->name('teacherCard.yearDepartmentIdJoined.all');


    // TeacherCardItem
    Route::get('/teacherCardItem/all', 'TeacherCardItemController@all')->name('teacherCardItem.all');
    Route::post('/teacherCardItem/add', 'TeacherCardItemController@add')->name('teacherCardItem.add');
    Route::get('/teacherCardItem/{id}', 'TeacherCardItemController@get')->name('teacherCardItem.get');
    Route::post('/teacherCardItem/{id}', 'TeacherCardItemController@update')->name('teacherCardItem.update');
    Route::delete('/teacherCardItem/{id}', 'TeacherCardItemController@delete')->name('teacherCardItem.delete');

    Route::get('/teacherCardItem/teacherCard/{id}', 'TeacherCardItemController@teacherCardAll')->name('teacherCardItem.teacherCardAll');
    Route::get('/teacherCardItem/teacher/{id}', 'TeacherCardItemController@teacherAll')->name('teacherCardItem.teacherAll');

    // UserPermission
    Route::get('/userPermission/all', 'UserPermissionController@all')->name('userPermission.all');
    Route::get('/userPermission/{id}', 'UserPermissionController@get')->name('userPermission.get');

    Route::get('/userPermission/byName/{username}', 'UserPermissionController@getByName')->name('userPermission.getByName');

    // BIGREDBUTTON
    Route::get('/brb/importStudentsAndGroups', 'BigRedButtonController@importStudentsAndGroups')->name('brb.importStudentsAndGroups');

});


