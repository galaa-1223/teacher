@extends('../teacher.layout.side-menu')

@section('subcontent')
    @if (\Session::has('success'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-18 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {!! \Session::get('success') !!}
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Миний цагийн фонд</h2>
    <div class="intro-y text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $teacher->mergejil }}</div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 xl:col-span-8 overflow-auto lg:overflow-visible">
            @if($fonds->isEmpty())
                <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-2 bg-theme-17 text-theme-11">
                    <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Мэдээлэл алга байна!
                </div>
            @else
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Ангийн нэр</th>
                        <th class="text-center whitespace-nowrap">Хичээл</th>
                        <th class="text-center whitespace-nowrap">Цаг</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $i = 1;
                            $tsag = 0;
                        ?>
                        @foreach($fonds as $fond)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    {{ $i }}
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $fond->angi }} {{ $fond->course }}{{ $fond->buleg }}</a>
                            </td>
                            <td class="text-center">{{ $fond->hicheel }}</td>
                            <td class="text-center">{{ $fond->tsag }}</td>
                            </td>
                        </tr>
                        <?php 
                            $i++;
                            $tsag += $fond->tsag;
                        ?>
                        @endforeach
                        <tr class="intro-x">
                            <td class="w-40"></td>
                            <td></td>
                            <td></td>
                            <td class="text-center text-pink-800 font-bold">{{ $tsag }}</td>
                        </tr>
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