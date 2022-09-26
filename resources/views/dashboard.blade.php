<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section style="background-color: #eee;">
                    <div class="container py-5">
                      <div class="row">
                        <div class="col">
                          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">User</a></li>
                              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                          </nav>
                        </div>
                      </div>
                  
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid mx-auto" style="width: 150px;">
                              <h5 class="my-3">{{ Auth::user()->name }}</h5>
                              <p class="text-muted mb-1">{{ $student->curriculum_name }}</p>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Student ID</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $student->student_id }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Curriculum</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $student->curriculum_name }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Current Status</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ strtoupper($student->current_status) }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </section>
        </div>
    </div>
</x-app-layout>
