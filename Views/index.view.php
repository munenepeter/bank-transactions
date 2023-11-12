<?php include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>

<!-- Hero-->
<div class="md:mt-18 mt-12">
    <div class="container px-2 p-4 lg:p-4 mx-auto bg-rose-100 rounded-md">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="hero-text col-span-6">
                <h1 class="font-bold text-2xl md:text-5xl max-w-xl text-purple-900 leading-tight">Modern Web solutions for your business</h1>
                <hr class="w-12 h-1 bg-orange-500 rounded-full mt-4">
                <p class="text-gray-800 text-base leading-relaxed mt-4 font-semibold">We are a team of digital experts equipped with skills to help your dream solution become a reality.</p>

                <!-- Qoute Modal toggle -->
                <button id="getQouteModalButton" data-modal-toggle="getQouteModal" class="mt-6 rounded-lg bg-orange-800 px-6 py-2.5 text-center text-sm font-medium leading-5 text-white hover:bg-orange-700 focus:outline-none lg:mx-0 lg:w-auto" type="button">
                    Get
                    a Free Qoute
                </button>

            </div>
            <div class="col-span-6">
                <img class="" src="<?php asset("imgs/hero.png") ?>" alt="Hero">
            </div>
        </div>
    </div>
</div>



<!-- Get Qoute modal -->
<div id="getQouteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-gradient-to-r from-rose-100 from-2% via-pink-100 via-40% to-purple-200 to-90%  rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b border-orange-600 sm:mb-5">
                <h3 class="text-lg font-semibold text-purple-900 ">
                    Let's Get Started on Your Project
                </h3>
                <button id="closeQouteModal" type="button" class="text-purple-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="getQouteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="quoteForm" action="index/intent/sendqoute" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-purple-700 ">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 " placeholder="Type your name" required="">
                        <span class="text-red-500 text-xs error-message" id="name_error"></span>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-purple-700">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 " placeholder="Your email">
                        <span class="text-red-500 text-xs error-message" id="email_error"></span>
                    </div>
                    <div>
                        <label for="project_title" class="block mb-2 text-sm font-medium text-purple-700">Project Title</label>
                        <input type="text" name="project_title" id="project_title" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 " placeholder="Your project name" required="">
                        <span class="text-red-500 text-xs error-message" id="project_title_error"></span>
                    </div>
                    <div>
                        <label for="project_type" class="block mb-2 text-sm font-medium text-purple-700">Project Type</label>
                        <select id="project_type" name="project_type" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 ">
                            <option value="" selected>Select type of project</option>
                            <option value="web design">Website Design</option>
                            <option value="web development">Website Development</option>
                            <option value="web maintenance">Website & System Maintenance</option>
                            <option value="data analysis">Data Analysis (Excel)</option>
                            <option value="IT automation (scripting)">IT Automation (scripting)</option>
                            <option value="IT consulting">IT Consulting</option>
                        </select>
                        <span class="text-red-500 text-xs error-message" id="project_type_error"></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-purple-700">Project Description</label>
                        <textarea id="description" name="project_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-purple-300 focus:ring-purple-600 focus:border-purple-600" placeholder="Write your project description here"></textarea>
                        <span class="text-red-500 text-xs error-message" id="project_description_error"></span>
                    </div>
                </div>
                <button id="submitRequestForQoute" type="submit" :disabled="loading" class="text-white inline-flex items-center bg-orange-900 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                    <span id="btnMessage">Get Your Custom Quote</span>
                    <svg style="display: none;" id="loadingSVG" class="-mr-1 ml-1 w-4 h-4 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                    </svg>
                    <svg id="normalSVG" class="-mr-1 ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>






<!-- What We Provide -->
<section class="bg-purple-50 body-font mt-6">
    <div class="container px-2 py-6 mx-auto">
        <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-3xl font-medium title-font mb-4 text-orange-800">
                What We Provide
            </h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-800 text-lg">We are a team of experienced professionals who specialize in creating high-quality websites and web applications for businesses of all sizes. </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 items-center md:mx-16 gap-1">

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold title-font mb-2 text-orange-800">Web Development</h2>
                <p class="leading-relaxed text-base">Our Web Development services are designed to help businesses of all sizes create a powerful online presence. We use the latest technologies and best practices to deliver high-quality, responsive websites that look great on all devices.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>

                </div>
                <h2 class="text-lg  font-bold title-font mb-2 text-orange-800">System Maintenance</h2>
                <p class="leading-relaxed text-base">Our services include ongoing monitoring, maintenance, and optimization of your systems to ensure they are always performing at their best. We proactively identify and resolve issues before they impact your operations, saving you time and money.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                </div>
                <h2 class="text-lg  font-bold title-font mb-2 text-orange-800">IT Consulting</h2>
                <p class="leading-relaxed text-base">Our IT Consulting services provide strategic guidance and support to help you make informed decisions about your technology investments. We work closely with you to understand your goals and identify areas where technology can drive growth and innovation.</p>

            </div>
        </div>
        <button class="flex mx-auto mt-10 text-white bg-orange-800 border-0 py-2 px-10 focus:outline-none hover:bg-orange-700 rounded text-lg">Get Qoute</button>

</section>
<!-- End Our Solutions Section -->



<section class="p-6 bg-purple-50 text-gray-900 shadow-md border border-purple-50">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-rose-800 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a project? Need details about our operations? Let us know.</p>
        <form action="#" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input type="email" id="email" class=" bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 " placeholder="name@chungu.co.ke" required>
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <input type="text" id="subject" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 " placeholder="Let us know how we can help you" required>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" rows="6" class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-purple-300 focus:ring-purple-600 focus:border-purple-600" placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-purple-700 sm:w-fit hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-orange-800">Send message</button>
        </form>

    </div>
</section>

<?php include_once 'sections/footer.view.php' ?>