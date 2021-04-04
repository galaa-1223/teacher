@extends('../teacher.layout.side-menu')

@section('subcontent')
    @if (\Session::has('success'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-18 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {!! \Session::get('success') !!}
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Сургуулийн тэнхимүүд</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 lg:col-span-6 overflow-auto lg:overflow-visible">
            @if(!count($irtses))
                <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-17 text-theme-11">
                    <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Мэдээлэл алга байна!
                </div>
            @else
            <table id="table" class="table table-report mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Тэнхимийн нэр</th>
                        <th class="text-center whitespace-nowrap">Багшийн тоо</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $i = 1;?>
                        @foreach($irtses as $irts)
                        <tr class="intro-x">
                            <td class="w-10">
                                <div class="flex">
                                    {{ $i }}
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $irts->ner }} {{ $irts->course }}{{ $irts->buleg }}</a>
                            </td>
                            <td class="text-center">0</td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- END: Data List -->
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection