<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RolesNPermissions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10m0 0v10m0-10L7 3" />
                                </svg>
                            </div>

                            @if (!empty(session('success')))       
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            
                            <div class="d-flex justify-content-between">
                                <div class="ml-3 ">
                                    <p class="text-sm leading-5 font-medium text-gray-900">
                                        {{ __('Roles') }}
                                    </p>
                                    <p class="text-sm leading-5 text-gray-500">
                                        {{ __('All Roles') }}
                                    </p>
                                </div>
                                <div>
                                    <button type='button' data-toggle='modal' data-target='#exampleModalCenter' class="btn btn-danger">Add Role</button>
                                    <form action="{{ route('rolesNpermission.store') }}" method="POST">
                                      @csrf
                                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Role Name</label>
                                                <input type="text" class="form-control" id="role_name" name='role_name' aria-describedby="emailHelp" placeholder="Enter name">
                                              </div>
                                            </div>
                                            <select class="form-select" aria-label="Default select example" id="select_form" name="select_form">
                                              <option selected>Select Permission Associated to this Role</option>
                                              @foreach ($permissions as $permission)
                                              <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                              @endforeach
                                            </select>
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
                              </div>
                              </div>
                              
                    
                    <div class="mt-3 pt-2">

                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Guard Name</th>
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($roles as $role)
                                <tr>
                                    <th scope='row'>{{ $loop->iteration }}</th>
                                    <th>{{ $role->name }}</th>
                                    <th>{{ $role->permissions->pluck('name') }}</th>
                                    <th>{{ $role->guard_name }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
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
                                    {{ __('Permissions') }}
                                </p>
                                <p class="text-sm leading-5 text-gray-500">
                                    {{ __('All Permissions') }}
                                </p>
                            </div>
                        </div>   
                        <div>
                            <button type='button' data-toggle='modal' data-target='#exampleModalCenter2' class="btn btn-danger">Add Permission</button>
                        </div>
                        <form action="{{ route('addPermission') }}" method="POST">
                          @csrf
                          <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2Title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Add Permission</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Permission Name</label>
                                    <input type="text" class="form-control" id="permission_name" name='permission_name' aria-describedby="emailHelp" placeholder="Enter name">
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
                                <th scope="col">Name</th>
                                <th scope="col">Guard Name</th>
                              </tr>
                            </thead>
                            <tbody>

                              
                                @foreach ($permissions as $permission)
                                <tr>
                                    <th scope='row'>{{ $loop->iteration }}</th>
                                    <th>{{ $permission->name }}</th>
                                    <th>{{ $permission->guard_name }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>