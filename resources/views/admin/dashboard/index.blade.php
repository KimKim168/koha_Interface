@extends('admin.layouts.admin')
@section('content')
<div class="flex h-screen">
    <!-- Main content -->
    <div class="flex flex-col flex-1">
        <!-- Dashboard content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
            <div class="container px-6 py-8 mx-auto">
                <h3 class="text-3xl font-medium text-gray-700">Overview</h3>
                <div class="mt-4">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-full">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-2xl font-semibold text-gray-700">1,294</h4>
                                    <p class="text-gray-600">Users</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-12 h-12 text-white bg-green-500 rounded-full">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-2xl font-semibold text-gray-700">$13,574</h4>
                                    <p class="text-gray-600">Revenue</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-12 h-12 text-white bg-yellow-500 rounded-full">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-2xl font-semibold text-gray-700">24%</h4>
                                    <p class="text-gray-600">Growth</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional grid content -->
                    <div class="mt-8">
                        <h3 class="text-2xl font-medium text-gray-700">Recent Activity</h3>
                        <div class="p-6 mt-4 bg-white rounded-lg shadow-lg">
                            <ul>
                                <li class="flex items-center justify-between py-2 border-b">
                                    <span>User registered: John Doe</span>
                                    <span class="text-sm text-gray-500">2 hours ago</span>
                                </li>
                                <li class="flex items-center justify-between py-2 border-b">
                                    <span>New sale: $100</span>
                                    <span class="text-sm text-gray-500">4 hours ago</span>
                                </li>
                                <li class="flex items-center justify-between py-2">
                                    <span>Server backup completed</span>
                                    <span class="text-sm text-gray-500">8 hours ago</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


@endsection
