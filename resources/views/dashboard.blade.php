<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>Admin</title>
</head>
<body>
    <div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
        <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
            <div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
                <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
    
                <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                    class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-gray-600 dark:bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                    <div class="flex items-center justify-center mt-10">
                        <div class="w-4/6 flex items-center">
                            <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" alt=""></a>
                        </div>
                    </div>
    
                    <nav class="flex flex-col mt-16 px-4 text-left">
                        <a href="{{ url('dashboard') }}"
                            class="py-2 text-sm text-gray-700 font-bold px-3 dark:text-gray-100 bg-gray-200 dark:bg-gray-800 rounded">Overview</a>
                        <a href="{{ url('dashboard/studentlist') }}"
                            class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Students</a>
                        <a href="{{ url('dashboard/subjectlist') }}"
                            class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Subjects</a>
                        <a href="{{ url('dashboard/payments') }}"
                            class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Payments</a>                        
                        <a href="{{ url('dashboard/transaction') }}"
                            class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Transaction</a>
                    </nav>
                </div>
    
                <div class="flex-1 flex flex-col overflow-hidden">
                    <header class="flex justify-between items-center p-6">
                        <div class="flex items-center space-x-4 lg:space-x-0">
                            <button @click="sidebarOpen = true"
                                class="text-gray-500 dark:text-gray-300 focus:outline-none lg:hidden">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
    
                            <div>
                                <h1 class="text-2xl text-gray-800 font-bold dark:text-white">Admin Dashboard</h1>
                            </div>
                        </div>
    
                        <div class="flex items-center space-x-4">
                            
    
                            <div x-data="{ dropdownOpen: false }" class="relative">
                                <button @click="dropdownOpen = ! dropdownOpen"
                                    class="flex items-center space-x-2 relative focus:outline-none">
                                    <h2 class="text-gray-700 font-bold dark:text-gray-300 text-sm hidden sm:block">{{ Auth::user()->name }}
                                    </h2>
                                    <img class="h-9 w-9 rounded-full border-2 border-purple-500 object-cover"
                                        src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                                        alt="Your avatar">
                                </button>
    
                                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                    x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75 transform"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95" @click.away="dropdownOpen = false">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Tickets</a>
                                    <form action="{{ url('logout') }}" method="Post">
                                        @csrf
                                        <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Logout</button>                                        
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </header>
    
                    <main class="flex-1 overflow-x-hidden overflow-y-auto">
                        <div class="container mx-auto px-6 py-8">
                            <div>
                                @if(session()->get('admin') == 'admin')

                                <div class="flex justify-center items-center">
                                    <h2>Admin Dashboard</h2>
                                </div>

                                @elseif(session()->get('admin') == 'addStudent')

                                <section class=" py-1 bg-blueGray-50">
                                    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
                                        <div
                                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                            <div class="rounded-t bg-white mb-0 px-6 py-6">
                                                <div class="text-center flex justify-between">
                                                    <h6 class="text-blueGray-700 text-xl font-bold">
                                                        Add Student
                                                    </h6>                                                    
                                                </div>
                                            </div>
                                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                                                <form method="Post" action="{{ url('dashboard/addstudent') }}">
                                                    @csrf
                                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                        Personal Information
                                                    </h6>
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlfor="grid-password">
                                                                    First Name
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="fname"
                                                                    placeholder="Jane">
                                                                    @error('fname')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlfor="grid-password">
                                                                    Last Name
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="lname"
                                                                    placeholder="Doe">
                                                                    @error('lname')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlfor="grid-password">
                                                                    Gender
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="gender"
                                                                    placeholder="Female">
                                                                    @error('gender')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlfor="grid-password">
                                                                    Date of Birth
                                                                </label>
                                                                <input type="date"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="dob">
                                                                    @error('dob')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                
                                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                        Contact Information
                                                    </h6>
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-12/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlfor="grid-password">
                                                                    Email Address
                                                                </label>
                                                                <input type="email"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="email"
                                                                    placeholder="jane.doe@email.com">
                                                                    @error('email')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                                    Phone Number
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="phoneno"
                                                                    placeholder="Enter Phone Number">
                                                                    @error('phoneno')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                                    Class
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="class"
                                                                    placeholder="Class A1">
                                                                    @error('class')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>

                                                        <div class="ml-3 mt-3">
                                                            <button
                                                                class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-6 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                                                type="submit">
                                                                Add Student
                                                            </button>
                                                        </div>
                                                        
                                                    </div>
                                
                                                    
                                                    
                                                </form>
                                            </div>
                                        </div>                                        
                                    </div>
                                </section>

                                @elseif(session()->get('admin') == 'studentList')

                                <table class="min-w-full border-collapse block md:table">
                                    <thead class="block md:table-header-group">
                                        <tr
                                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                First Name</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Last Name</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Birth Date</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Gender</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Email Address</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Mobile</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Class</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group">
                                        @foreach ($students as $student)                                            
                                        
                                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">First Name</span>{{ $student->first_name }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Last Name</span>{{ $student->last_name }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Birth Date</span>{{ $student->dob }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Gender</span>{{ $student->gender }}</td>                                            
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Email Address</span>{{ $student->email }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Mobile</span>{{ $student->phoneno }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Class</span>{{ $student->class }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                                
                                                <a href="{{ url('dashboard/student/edit/'. $student->id) }}"><button
                                                    class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded-md">Edit</button></a>
                                                <a href="{{ url('dashboard/student/delete/'. $student->id) }}"><button
                                                    class="bg-pink-400 hover:bg-pink-500 text-white font-bold py-1 px-2 rounded-md">Delete</button>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    <a href="{{ url('dashboard/addstudent') }}"><button
                                        class="bg-gray-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-6 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        type="submit">
                                        Add Student
                                    </button></a>
                                </div>

                                @elseif(session()->get('admin') == 'addSubject')
                                
                                <section class=" py-1 bg-blueGray-50">
                                    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
                                        <div
                                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                            <div class="rounded-t bg-white mb-0 px-6 py-6">
                                                <div class="text-center flex justify-between">
                                                    <h6 class="text-blueGray-700 text-xl font-bold">
                                                        Add Subject
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                
                                
                                                <form method="Post" action="{{ url('dashboard/addsubject') }}">
                                                    @csrf
                                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                        Subject Details
                                                    </h6>
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-12/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                                    Subject Name
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="subject" placeholder="Mathamatics">
                                                                    @error('subject')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>

                                                        <div class="w-full lg:w-12/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                                    Cost
                                                                </label>
                                                                <input type="number"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="cost" placeholder="8000">
                                                                    @error('cost')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>                                            
                                
                                                        <div class="ml-3 mt-3">
                                                            <button
                                                                class="bg-gray-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-6 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                                                type="submit">
                                                                Add Subject
                                                            </button>
                                                        </div>
                                
                                                    </div>
                                
                                
                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                @elseif(session()->get('admin') == 'subjectList')

                                <table class="min-w-full border-collapse block md:table">
                                    <thead class="block md:table-header-group">
                                        <tr
                                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Name</th>
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                User Name</th>                                            
                                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group">
                                        @foreach($subjects as $subject)                                            
                                        
                                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Subject Name</span>{{ $subject->subject_name }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                    class="inline-block w-1/3 md:hidden font-bold">Subject Cost</span>${{ $subject->cost }}</td>
                                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                                <button
                                                    class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded-md">Edit</button>
                                                <button
                                                    class="bg-pink-400 hover:bg-pink-500 text-white font-bold py-1 px-2 rounded-md"">Delete</button>
                                            </td>
                                        </tr> 
                                        @endforeach                                       
                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    
                                    <a href="{{ url('dashboard/addsubject') }}"><button
                                        class="bg-gray-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-6 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        type="submit">
                                        Add Subject
                                    </button></a>
                                </div>

                                @endif

                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
