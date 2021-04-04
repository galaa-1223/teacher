@extends('../teacher.layout.side-menu')

@section('subcontent')
    @if (\Session::has('success'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-18 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Notification -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <h2 class="intro-y text-lg font-medium mt-10">Eschool цахим хичээлийн талбар</h2>
                </div>
                <!-- BEGIN: Notification -->
                
                <!-- BEGIN: Visitors -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2">
                    <div class="report-box-2 intro-y mt-5">
                        <div class="box p-5">
                            <div class="flex items-center">
                                Angi 
                                <div class="dropdown ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;" aria-expanded="false"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Санал хүсэлт </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Тохиргоо </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xl font-medium mt-2">Хичээлийн нэр</div>
                            <div class="border-b border-gray-200 flex pb-2 mt-4">
                                <div class="text-gray-600 dark:text-gray-600 text-xs">Оюутны тоо</div>
                                <div class="text-theme-9 flex text-xs font-medium ml-auto"> 12 </div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-600 text-xs border-b border-gray-200 flex mb-2 pb-2 mt-4">
                                <div>Статистик</div>
                                <div class="ml-auto">Too</div>
                            </div>
                            <div class="flex">
                                <div>Агуулга</div>
                                <div class="ml-auto">0</div>
                            </div>
                            <div class="flex mt-1.5">
                                <div>Даалгавар</div>
                                <div class="ml-auto">0</div>
                            </div>
                            <div class="flex mt-1.5">
                                <div>Нэвтэрсэн</div>
                                <div class="ml-auto">83</div>
                            </div>
                            <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4">Хичээл эхлүүлэх</button>
                        </div>
                    </div>
                </div>
                <!-- END: Visitors -->
                
                
            </div>
        </div>
        <div class="col-span-12 xxl:col-span-3">
            <div class="xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Онлайнд байгаа оюутнууд -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Онлайнд байгаа оюутнууд
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Angelina Jolie</div>
                                        <div class="text-gray-600 text-xs mt-0.5">18 August 2020</div>
                                    </div>
                                    <div class="text-theme-9">+$155</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Robert De Niro</div>
                                        <div class="text-gray-600 text-xs mt-0.5">27 April 2020</div>
                                    </div>
                                    <div class="text-theme-9">+$108</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-8.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Robert De Niro</div>
                                        <div class="text-gray-600 text-xs mt-0.5">25 May 2022</div>
                                    </div>
                                    <div class="text-theme-9">+$68</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Russell Crowe</div>
                                        <div class="text-gray-600 text-xs mt-0.5">7 October 2021</div>
                                    </div>
                                    <div class="text-theme-9">Online</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Al Pacino</div>
                                        <div class="text-gray-600 text-xs mt-0.5">23 August 2021</div>
                                    </div>
                                    <div class="text-theme-6">Offline</div>
                                </div>
                            </div>
                            <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a> 
                        </div>
                    </div>
                    <!-- END: Онлайнд байгаа оюутнууд -->
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection