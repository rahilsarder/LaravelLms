<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10m0 0v10m0-10L7 3" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-gray-900">
                                    {{ __('Sections') }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ __('All sections') }}
                                </p>
                            </div>
                        </div>                        

                    </div>

                    <div class="mt-3 pt-2">

                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Section</th>
                                <th scope="col">Faculty</th>
                                <th scope="col">Time</th>
                                <th scope="col">Room</th>
                               
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($student_course as $course)
                                <tr>
                                        <th scope='row'>{{ $loop->iteration }}</th>
                                        <td>{{ $course->section->course->course_id}}</td>
                                        <td>{{ $course->section_id }}</td>
                                        <td>{{ $course->section->faculty }}</td>
                                        <td>{{ $course->section->timing }}</td>
                                        <td>{{ $course->section->room_no }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>