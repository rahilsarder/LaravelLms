<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-gray-900">
                            {{ __('Categories') }}
                        </p>
                        <p class="text-sm leading-5 text-gray-500">
                            {{ __('All Category') }}
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>