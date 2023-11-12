<?php

use Chungu\Core\Mantle\Request; ?>
<nav class="px-2 sm:px-4 py-2 fixed w-full  top-0 left-0 backdrop-blur-3xl shadow-sm bg-rose-50">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
    <div class="flex items-center space-x-2">
      <div class="h-8 w-8 bg-orange-200 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full p-1 text-orange-700">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
      </div>
      <div class="flex flex-col">
        <span style="font-size: 10px;" class="text-purple-900">Hotline 24/7</span>
        <span class="text-sm text-purple-900 font-semibold">developers@chungu.co.ke</span>
      </div>
    </div>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center justify-center text-sm text-purple-900 rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-semibold flex flex-col p-4 md:p-0 mt-4 md:text-sm md:font-semibold border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white  dark:border-gray-400">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 text-orange-700 md:p-0
          <?= (Request::uri() == '') ? 'text-orange-700 md:hover:text-purple-700' : 'text-purple-700 md:hover:text-orange-700'; ?>
          " aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-purple-700 md:hover:text-orange-700 md:p-0 ">About</a>
        </li>
        <li>
          <a href="/projects" class="block py-2 pl-3 pr-4  md:p-0 
          <?= str_contains(Request::uri(),'projects') ? 'text-orange-700 md:hover:text-purple-700' : 'text-purple-700 md:hover:text-orange-700'; ?>
          ">Projects</a>
        </li>
        <li>
          <a href="/projects-new" class="block py-2 pl-3 pr-4  md:p-0 
          <?= str_contains(Request::uri(), 'projects-new') ? 'text-orange-700 md:hover:text-purple-700' : 'text-purple-700 md:hover:text-orange-700'; ?>
          ">Projects-New</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-purple-700 md:hover:text-orange-700 md:p-0 ">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>