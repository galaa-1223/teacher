@extends('../teacher.layout.side-menu')

@section('subcontent')
    @if (\Session::has('success'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-18 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Сургуулийн нийт багш нар</h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        @if(!count($teachers))
            <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-17 text-theme-11">
                <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Мэдээлэл алга байна!
            </div>
        @else
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form class="xl:flex sm:mr-auto" id="tabulator-html-filter-form">
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Талбар</label>
                    <select class="form-control w-full sm:w-32 xxl:w-full mt-2 sm:mt-0 sm:w-auto border" id="tabulator-html-filter-field">
                        <option value="teachers.ner">Багшийн нэр</option>
                        <option value="tenhim.ner">Тэнхим</option>
                        <option value="teachers.code">Багшийн код</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <input type="text" class="form-control w-full sm:w-50 xxl:w-full mt-2 sm:mt-0 border" id="tabulator-html-filter-value" placeholder="Хайлт үг...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button type="button" class="btn w-full sm:w-28 bg-theme-1 text-white" id="tabulator-html-filter-go">Хайлт хийх</button>
                    <button type="button" class="btn w-full sm:w-20 mt-2 sm:mt-0 sm:ml-1 bg-gray-200 text-gray-600 dark:bg-dark-5 dark:text-gray-300" id="tabulator-html-filter-reset">Арилгах</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button class="btn w-1/2 sm:w-auto flex items-center border text-gray-700 mr-2 dark:bg-dark-5 dark:text-gray-300" id="tabulator-print">
                    <i data-feather="printer" class="w-4 h-4 mr-2"></i> Хөрвүүлэх
                </button>
                <div class="pos-dropdown dropdown ml-auto sm:ml-0">
                    <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="chevron-down"></i> </span>
                    </button>
                    <div class="pos-dropdown__dropdown-menu dropdown-menu">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                            <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">CSV Файл</span> 
                            </a>
                            <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">JSON Файл</span> 
                            </a>
                            <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">XLSX Файл</span> 
                            </a>
                            <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">HTML Файл</span> 
                            </a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div class="mt-5 table-report table-report--tabulator" id="teacher_tabulator"></div>
        </div>
        @endif
    </div>
    <!-- END: HTML Table Data -->
@endsection

@section('style')
@endsection

@section('script')
@endsection