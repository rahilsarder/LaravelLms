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
                            <form action="" method="POST" class="form-outline d-flex justify-between">
                                @csrf
                                <input type="search" id="form1" class="form-control" id="search" name="search" placeholder="Search"/>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
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
                                <th scope="col">Total Seats</th>
                                <th scope="col">Available Seats</th>
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($sections as $section)
                                <tr>

                                    <th scope='row'>{{ $loop->iteration }}</th>
                                    <td><a href={{ url('/dashboard/section', $section->id) }}>{{ $section->course->course_id }}</a></td>
                                    <td>{{ $section->section_id }}</td>
                                    <td>{{ $section->faculty }}</td>
                                    <td>{{ $section->timing }}</td>
                                    <td>{{ $section->room_no }}</td>
                                    <td>{{ $section->total_seats }}</td>
                                    <td>{{ $section->seats_available }}</td>
                                    {{-- <td>{{$course->pre_req ? $course->preRequisite->course_id : 'N/A'}}</td>
                                    <td>{{ $course->credit_count }}</td>
                                    <td>{{ $course->section_id }}</td>
                                    <td>{{ $course->require_lab ? 'Yes' : 'No'}}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>