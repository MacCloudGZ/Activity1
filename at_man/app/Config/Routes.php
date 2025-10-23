<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('students', 'Home::students');
$routes->post('add-student', 'Home::addStudent');

$routes->get('attendance-form', 'Home::attendanceForm');
$routes->post('submit-attendance', 'Home::submitAttendance');
$routes->get('attendance-report', 'Home::attendanceReport');
