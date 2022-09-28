<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!empty(session('success')))       
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ul class="nav nav-tabs mx-1">
                        <li class="nav-item mx-2">
                          <a class="nav-link {{ request()->routeIs('register_user.index') ? 'active' : '' }}" aria-current="page" href="{{ route('register_user.index') }}">Students</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ request()->routeIs('faculty') ? 'active' : '' }}" href="{{ route('faculty') }}">Faculties</a>
                        </li>
                    </ul>
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
                                    {{ __('Users') }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ __('All Users') }}
                                </p>
                            </div>
                        </div>                        
                        <button type='button' data-toggle='modal' data-target='#exampleModalCenter' class="btn btn-danger">Add User</button>
                                    <form action="{{ route('registerFaculty') }}" method="POST">
                                      @csrf
                                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Add an User</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Full Name</label>
                                                    <input type="text" class="form-control" id="name" name='name' aria-describedby="nameHelp" placeholder="Enter name">
                                                    
                                                    <label for="exampleInputName">Email</label>
                                                    <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Enter email">
                                                    
                                                    <label for="exampleInputName">Password</label>
                                                    <input type="password" class="form-control" id="password" name='password' placeholder="Enter password">
                                                    <br>
                                                    <select class="form-select my-2" aria-label="Default select example" id="major_course" name="major_course">
                                                        <option selected>Select Course</option>
                                                        @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->course_id }}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <select class="form-select" aria-label="Default select example" id="department" name="department">
                                                        <option selected>Select Department</option>
                                                        @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                    </div>

                    <div class="mt-3 pt-2">

                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Faculty ID</th>
                                <th scope="col">Major Courses</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculties as $faculty)
                                    @if ($faculty->faculty)
                                        
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $faculty->name }}</td>
                                        <td>{{ $faculty->faculty->faculty_id }}</td>
                                        <td>{{ $faculty->faculty->major[0]->course_id }}</td>
                                    </tr>
                                    @else
                                        
                                    @endif
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>