<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>
    <div class="py-12">
            {{-- Errors --}}

            {{-- if the course already exists for the semester --}}
            @if (!empty(session('courseExist')))       
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('courseExist') }}
                </div>
            @endif

            {{-- if the course is added successfully --}}
            @if (!empty(session('courseAdded')))       
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('courseAdded') }}
            </div>
            @endif

            {{-- if the course has been retaken --}}
            @if (!empty(session('courseRetaken')))      
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('courseRetaken') }}
            </div>
            @endif

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
                                <th scope="col">Select</th>
                               
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($sections as $section)
                                <tr>
                                    <form action="{{ route('advisingPost', ['section_id' => $section->id, 'course_id' => $section->course->id]) }}" method="POST">
                                        @csrf
                                        <th scope='row'>{{ $loop->iteration }}</th>
                                        <td><a href={{ url('/dashboard/attendance', $section->id) }}>{{ $section->course->course_id }}</a></td>
                                        <td>{{ $section->section_id }}</td>
                                        <td>{{ $section->faculty }}</td>
                                        <td>{{ $section->timing }}</td>
                                        <td>{{ $section->room_no }}</td>
                                        <td><button class="btn btn-danger">Enroll</button></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>