<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Exception;
use Illuminate\Validation\Rule;

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

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.'
            ], 404);
        }
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

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.'
            ], 404);
        }

        // Use current values if same to avoid unnecessary unique constraint errors
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($student->id),
            ],
            'phone' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('students')->ignore($student->id),
            ],
        ], [
            'name.required'  => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email'    => 'The email must be a valid email address.',
            'email.unique'   => 'This email is already taken.',
            'phone.required' => 'The phone field is required.',
            'phone.digits'   => 'The phone must be exactly 10 digits.',
            'phone.unique'   => 'This phone number is already taken.',
        ]);

        try {
            // Even if nothing changes, update() will return true
            $student->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Student updated successfully.',
                'data' => $student
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.'
            ], 404);
        }
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
