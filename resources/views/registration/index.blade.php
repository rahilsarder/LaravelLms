<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
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
                                    <form action="{{ route('register_user.store') }}" method="POST">
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
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Enter Email">
                                                    <label for="exampleInputPassword">Password</label>
                                                    <input type="password" class="form-control" id="password" name='password' placeholder="Enter Password">
                                                    <select class="form-select" aria-label="Default select example" id="curriculumn" name="curriculumn">
                                                        <option selected>Select Curriculumn</option>
                                                        @foreach ($curriculums as $curriculum)
                                                        <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <label for="exampleInputPassword">Test Pass</label>
                                                    <input type="number" class="form-control" id="test_pass" name='test_pass' pattern="[0-9]{4}" maxlength="4" placeholder="Enter Test Pass Number">
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
                                <th scope="col">Student/Faculty ID</th>
                                <th scope="col">Curriculum Name</th>
                                <th scope="col">Current CGPA</th>
                                <th scope="col">Credits Passed</th>
                                <th scope="col">Probations</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->userInfo->full_name }}</td>
                                        <td>{{ $user->userInfo->student_id }}</td>
                                        <td>{{ $user->userInfo->curriculum_name }}</td>
                                        <td>{{ $user->userInfo->current_cgpa }}</td>
                                        <td>{{ $user->userInfo->credit_passed }}</td>
                                        <td>{{ $user->userInfo->probation }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>