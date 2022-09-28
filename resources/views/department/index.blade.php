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
                                    {{ __('Departments') }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ __('All Departments') }}
                                </p>
                            </div>
                        </div>   
                        @if (Auth::user()->hasAnyRole(['admin', 'Super Admin']))
                            
                        <button type='button' data-toggle='modal' data-target='#exampleModalCenter' class="btn btn-danger">Add Department</button>
                                    <form action="{{ route('department.store') }}" method="POST">
                                      @csrf
                                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Add a Department</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Department Name</label>
                                                    <input type="text" class="form-control" id="name" name='name' aria-describedby="nameHelp" placeholder="Enter Name">
                                                    <label for="exampleInputEmail1">Code</label>
                                                    <input type="number" class="form-control" id="code" name='code' aria-describedby="numberHelp" placeholder="Enter Department Code">
                                                    <small id='emailHelp' class="form-text text-muted">Must be Unique</small>
                                                    <select class="form-select" aria-label="Default select example" id="chairman" name="chairman">
                                                        <option selected>Select Chairman</option>
                                                        @foreach ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
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
                        @else
                            
                        @endif                     
                    </div>

                    <div class="mt-3 pt-2">

                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Chairman</th>
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($departments as $department)
                                <tr>
                                    <th scope='row'>{{ $loop->iteration }}</th>
                                    <td>{{ $department->name }}</td>
                                    @if ($department->chairman)
                                    <td>{{ $department->chairman->name }}</td>
                                    @else
                                      <td>N/A</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>