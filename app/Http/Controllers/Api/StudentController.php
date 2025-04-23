<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Exception;

class StudentController extends Controller
{
    public function index()
    {
        try {
            $students = Student::all();

            return response()->json([
                'success' => true,
                'message' => 'Students retrieved successfully.',
                'data' => $students
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve students.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $student = Student::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Student created successfully.',
                'data' => $student
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Student $student)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Student details retrieved successfully.',
                'data' => $student
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve student details.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $student->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Student updated successfully.',
                'data' => $student
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();

            return response()->json([
                'success' => true,
                'message' => 'Student deleted successfully.'
            ], 204);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
