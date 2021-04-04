@extends('../teacher.layout.side-menu')

@section('subcontent')
    @if (\Session::has('success'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-18 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {!! \Session::get('success') !!}
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Миний ангийн явц</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 xl:col-span-8 overflow-auto lg:overflow-visible">
            <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert"> 
                <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Мэдээлэл ороогүй байна! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button> 
            </div>
        </div>
        <!-- END: Data List -->
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection